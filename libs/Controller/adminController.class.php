<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 上午9:26
 */

class adminController
{
    private $auth;
    //构造函数
    function __construct(){
        ChromePhp::log('init');
        session_start();
        if(!isset($_SESSION['auth']) && PC::$method!='login'){
            $this->showMessage('请先登录','index.php?controller=admin&method=login');
        }else{
            $this->auth=($_SESSION['auth'])?$_SESSION['auth']:array();
        }
    }

    function test(){
        VIEW::display('newsadd.html');
    }

    function login(){
        //已经登录
        ChromePhp::log('auth:'.$_SESSION['auth']);
        if(!empty($this->auth)){header('location:index.php?controller=admin&method=index'); return;}

        if(!$_POST['submit'])
            VIEW::display('login.html');
        else
            $this->checkLogin();
    }

    function logout(){
        $_SESSION=array();
        setcookie(session_name(),'',time()-1);
        session_destroy();
        $this->showMessage('退出成功','index.php?controller=admin&method=login');
    }

    function index(){
        $newsobj=M('news');
        $newsnum=$newsobj->count();
        VIEW::assign(array('newsnum' => $newsnum));
        VIEW::display('adminindex.html');
    }

    function checkLogin(){

        if(empty($_POST['username'])||empty($_POST['password'])){
            $this->showmessage('登录失败！', 'index.php?controller=admin&method=login');
        }
        $username=daddslashes($_POST['username']);
        $passwd=MD5(daddslashes($_POST['password']));
        $authobj=M('auth');
        $auth=$authobj->checkAuth($username,$passwd);
        if($auth){
            $_SESSION['auth']=$auth;
            $this->showMessage('登录成功','index.php?controller=admin&method=index');
        }else{
            $this->showMessage('用户名密码错误','index.php?controller=admin&method=login');
        }
    }

    function getAllCates(){
        $cateobj=M('subcate');
        return $cateobj->findAllCate();
    }

    function newsAdd(){
        $type=$_GET['type']?$_GET['type']:0;
        if(!isset($_POST['submit'])){
            if($type == 1){
                $data=$this->getResInfo();
                VIEW::assign(array('data'=>$data));
                VIEW::display('resadd.html');
            }else {
                $data=$this->getNewsInfo();
                $catelist=$this->getAllCates();
                VIEW::assign(array('data'=>$data,'catelist'=>$catelist));
                VIEW::display('newsadd.html');
            }
        }else{
            $this->newssubmit();
        }
    }

    private function newssubmit(){
        extract($_POST);
        if(!isset($title)||!isset($content)){
            $this->showMessage('请输入标题和内容','index.php?controller=admin&method=newsadd');
        }
        $title = daddslashes($title);
        $content = daddslashes($content);
        $keywords = daddslashes($keywords);
        $data=array(
            'title'=>$title,
            'content'=>$content,
            'keywords'=>$keywords,
            //'scate_id'=>$scate_id
        );
        if(isset($scate_id)){
            $scate_id = daddslashes($scate_id);
            $newsobj=M('news');
            $data['scate_id']=$scate_id;
            $flag=0;
        }else{
            $newsobj=M('resource');
            $flag=1;
        }

        //判断是插入还是修改
        if($_POST['id'] != ''){
            $newsobj->updateById($data,intval($_POST['id']));
            $this->showMessage('修改成功',"index.php?controller=admin&method=newslist&type=$flag");
        }else{
            $newsobj->insert($data);
            $this->showMessage('插入成功',"index.php?controller=admin&method=newslist&type=$flag");
        }
    }

    private function getNewsInfo(){
        if(isset($_GET['id'])){
            $id=intval($_GET['id']);
            $news=M('news');
            return $news->findOne_by_id($id);
        }else{
            return array();
        }
    }

    private function getResInfo(){
        if(isset($_GET['id'])){
            $id=intval($_GET['id']);
            $news=M('resource');
            return $news->findOne_by_id($id);
        }else{
            return array();
        }
    }

    public function newslist(){
        $type=$_GET['type']?$_GET['type']:0;
        if($type == 1){
            $dbobj=M('resource');
        }
        else $dbobj = M('news');
        $data=$dbobj->findAll_orderby_dateline();
        VIEW::assign(array('data'=>$data,'type'=>$type));
        VIEW::display('newslist.html');
    }

    public function newsdel(){
        $type=$_GET['type']?$_GET['type']:0;
        if($type == 1){
            $newsobj=M('resource');
        }else $newsobj=M('news');
        $id=$_GET['id'];
        if($newsobj->deleteById($id)){
            $this->showMessage('删除成功','index.php?controller=admin&method=newslist'."&type=$type");
        }else{
            $this->showMessage('删除失败','index.php?controller=admin&method=newslist'."&type=$type");
        }
    }

    private function showMessage($mes,$href){
        echo "<script>alert('$mes');window.location.href='$href';</script>";
        exit;
    }

    //test
    private function debugLog($mes){
        echo "<script>alert('$mes')</script>";
    }

    function testM(){
        M('auth');
    }
}

//(new adminController())->testM();