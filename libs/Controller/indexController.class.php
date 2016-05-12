<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 上午10:44
 */
class indexController
{
    public function index(){
        if(!empty($_GET['code'])){
           $state = $_GET['state'];
            if(substr($state, 0, 2) == 'WB'){
                //weibo login
                $weibo = ORG('WeiboAuth');
                $params = array("client_id"=>WB_AKEY,"client_secret"=>WB_SKEY);
                foreach($params as $key=>$val){
                    $weibo->$key = $val;
                }
                if(isset($_REQUEST['code'])){
                    $params = array();
                    $params['code'] = $_REQUEST['code'];
                    $params['redirect_uri'] = WB_CALLBACK_URL;
                    try{
                        $token = $weibo->getAccessToken($params);
                    }catch (Exception $e){
                        $this->showMessage($e->getMessage(),'index.php');
                    }
                    if($token){
                        $weibo->access_token = $token;$uid = $weibo->get_uid();
                        $uinfo = $weibo->get_uinfo($uid);
                        $_SESSION['userInfo'] = $uinfo;
                        $preurl = substr($state, 2);
                        //header("location:index.php".$preurl);
                        $this->showMessage("登录成功","index.php".$preurl);
                    }
                }else{
                    $this->showMessage("授权错误",'index.php');
                }
            }else{
                $qc = ORG('QC');
                $acs = $qc->qq_callback();
                $access_token = $acs['access_token'];
                $preurl = $acs['preurl'];
                $preurl = str_replace("&amp;","&",$preurl);
                $oid = $qc->get_openid();
                $qc2 = new QC($access_token,$oid);
                $uinfo = $qc2->get_user_info();
                $_SESSION['userInfo'] = $uinfo;
                //header("location:index.php".$preurl);
                $this->showMessage("登录成功","index.php".$preurl);
            }
	    }else{
            $pagenum=$_GET['page']?$_GET['page']:1;
            $scate_id=$_GET['cate']?$_GET['cate']:0;
            $searchkeywords=$_GET['searchkeywords']?$_GET['searchkeywords']:'';
            if($pagenum<=1){
                $newsobj=M('news');
                if(empty($searchkeywords) || $searchkeywords == ''){
                    $data=$newsobj->findLimitedNewsWithCate($pagenum,3,$scate_id);
                }else{
                    $data=$newsobj->findLimitedNewsWithKeywords($pagenum, 3, $searchkeywords);
                }
                $this->processKeywords($data);
                VIEW::assign(array('data'=>$data));
                VIEW::display('frontendindex.html');
            }else{
                if(empty($searchkeywords) || $searchkeywords ==''){
                    $this->moreNews($pagenum,$scate_id);
                }else{
                    $this->moreNewsWithKeywords($pagenum, $searchkeywords);
                }
            }
        }
    }

    public function detail(){
        $cateobj=M('subcate');
        $tech=$cateobj->findAllTech();
        $life=$cateobj->findAllLife();
        $service=$cateobj->findAllService();

        $catelist=array(
            "Tech"=>$tech,
            "Life"=>$life,
            "Service"=>$service
        );
        $newsobj=M('news');
        $id=$_GET['id'];
        $data=$newsobj->findOne_by_id($id);
        $this->processDetailKeywords($data);

        $commobj = M('comment');
        $comms = $commobj->findCommWithId($id);
        $commsnum = $commobj->countWithId($id);
        $username = "";
        session_start();
        if(!empty($_SESSION['userInfo'])){
            $username = $_SESSION['userInfo']['nickname']?$_SESSION['userInfo']['nickname']:$_SESSION['userInfo']['name'];
            $usericon = $_SESSION['userInfo']['figureurl_qq_1']?$_SESSION['userInfo']['figureurl_qq_1']:$_SESSION['userInfo']['profile_image_url'];
        }

        VIEW::assign(array('data'=>$data,'catelist'=>$catelist, 'username'=>$username,
            'usericon'=>$usericon, 'comms'=>$comms, 'commsnum'=>$commsnum));
        VIEW::display('frontenddetail.html');
    }

    public function moreNews($pagenum,$category){
        $newsobj=M('news');
        $data=$newsobj->findLimitedNewsWithCate($pagenum,3,$category);
        $this->processKeywords($data);
        $arr=array("num"=>count($data),"list"=>$data);
        echo json_encode($arr);
    }

    public function moreNewsWithKeywords($pagenum, $keywords){
        $newsobj=M('news');
        $data=$newsobj->findLimitedNewsWithKeywords($pagenum, 3, $keywords);
        $this->processKeywords($data);
        $arr=array("num"=>count($data),"list"=>$data);
        echo json_encode($arr);
    }

    public function processKeywords(&$datas){
        //foreach跟for的区别?
        for($i=0;$i<count($datas);$i++){
            $keywords=$datas[$i]['keywords'];
            $keyarr=explode(',',$keywords);
            $datas[$i]['keywords']=$keyarr;
        }
    }

    public function processDetailKeywords(&$data){
        $keywords=$data['keywords'];
        $keyarr=explode(',',$keywords);
        $data['keywords']=$keyarr;
    }

    public function resource(){
        $cateobj=M('subcate');
        $tech=$cateobj->findAllTech();
        $life=$cateobj->findAllLife();
        $service=$cateobj->findAllService();
        $catelist=array(
            "Tech"=>$tech,
            "Life"=>$life,
            "Service"=>$service
        );
        $title=$_GET['title'];
        $resobj=M('resource');
        $data=$resobj->findOne_by_title($title);
        $this->processDetailKeywords($data);
        VIEW::assign(array('data'=>$data,'catelist'=>$catelist));
        VIEW::display('frontendresource.html');
    }

    public function addcomment(){
        $news_id = $_POST['news_id'];
        $com_user = $_POST['com_user'];
        $com_content = $_POST['com_content'];
        $com_icon = $_POST['com_icon'];
        $comment = M('comment');
        $data = array(
            'news_id' => $news_id,
            'com_user' => $com_user,
            'com_icon' => $com_icon,
            'com_content' => $com_content
        );
        if($comment->insert($data)){
            $response= 0;
        }else{
            $response = 1;
        }
        echo $response;
    }

    public function about(){
        $view = V('about');
        $view->display();
    }

    public function QQConnect(){
        $preurl = $_GET['preurl'];
        $qc = ORG('QC');
        $qc->qq_login(urlencode($preurl));
    }

    public function WeiboConnect(){
	$preurl = $_GET['preurl'];
	//$_SESSION['preurl'] = $preurl;
        $weibo = ORG('WeiboAuth');
        $params = array("client_id"=>WB_AKEY,"client_secret"=>WB_SKEY);
        foreach($params as $key=>$val){
            $weibo->$key = $val;
        }
        $code_url = $weibo->getAuthorizeURL(WB_CALLBACK_URL,'code','WB'.urlencode($preurl));
        //header("location: ".$code_url.'&preurl='.urlencode($preurl));
        header("location: ".$code_url);
    }

    protected function testM(){
        M('auth');
    }

    private function showMessage($mes,$href){
        echo "<script>alert('$mes');window.location.href='$href';</script>";
        exit;
    }
    public function test1(){
    	$preurl = $_GET['preurl'];
        $_SESSION['preurl'] = $preurl;
	//header("location:index.php?method=test2"); 
	header("location:https://localhost/test.php"); 
    }	
    public function test2(){
	echo "a:".$_GET['a'];    
	echo "preurl:".$_SESSION['preurl'];
    }	
}

