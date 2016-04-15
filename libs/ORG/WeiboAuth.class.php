<?php
/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-4-15
 * Time: 下午3:09
 */
require_once("OAuthconfig.php");
class WeiboAuth{
    public $data = array();
    public function __set($name, $val){
        $this->data[$name]=$val;
    }

    function authorizeURL()    { return 'https://api.weibo.com/oauth2/authorize'; }

    function accessTokenURL()  { return 'https://api.weibo.com/oauth2/access_token'; }

    public function getAuthorizeURL($url, $response_type = 'code', $state = NULL, $display = NULL){
        $params = array();
        $params['client_id'] = $this->data['client_id'];
        $params['redirect_uri'] = $url;
        $params['response_type'] = $response_type;
        $params['state'] = $state;
        $params['display'] = $display;
        return $this->authorizeURL()."?".http_build_query($params);
    }

    public function getAccessToken($params){
        $params['grant_type'] = 'authorization_code';
        $params['client_id'] = $this->data['client_id'];
        $params['client_secret'] = $this->data['client_secret'];
        //weibo的api有点奇怪,get/post混用
        $response = $this->post($this->accessTokenURL().'?'.http_build_query($params), $params);
        return json_decode($response, true)['access_token'];
    }

    public function post($url, $params, $headers = array()){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        // post的变量
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        $headers[] = "Content-Type: multipart/form-data;";
        if ( isset($this->data['access_token']) && $this->data['access_token'])
            $headers[] = "Authorization: OAuth2 ".$this->data['access_token'];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function get($url, $headers = array()){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HEADER, $headers);
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }

    public function get_uid(){
        $response = $this->get("https://api.weibo.com/2/account/get_uid.json".'?access_token='.$this->data['access_token']);
        return json_decode($response, true)['uid'];
    }

    public function get_uinfo($uid){
        $params = array();
        $params['access_token'] = $this->data['access_token'];
        $params['uid'] = $uid;
        return json_decode($this->get("https://api.weibo.com/2/users/show.json?".http_build_query($params)), true);
    }
}