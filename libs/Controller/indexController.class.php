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
        $pagenum=$_GET['page']?$_GET['page']:1;
        if($pagenum<=1){
            $newsobj=M('news');
            //$data=$newsobj->findProcessedAll();
            $data=$newsobj->findLimitedNews($pagenum,3);
            VIEW::assign(array('data'=>$data));
            VIEW::display('frontendindex.html');
        }else{
            $this->moreNews($pagenum);
        }
    }

    public function detail(){
        $about=M('about');
        $aboutinfo=$about->getInfo();
        $newsobj=M('news');
        $id=$_GET['id'];
        $data=$newsobj->findOne_by_id($id);
        VIEW::assign(array('data'=>$data,'info'=>$aboutinfo));
        VIEW::display('frontenddetail.html');
    }

    protected function testM(){
        M('auth');
    }

    public function moreNews($pagenum){
        ChromePhp::log($pagenum);
        $newsobj=M('news');
        $data=$newsobj->findLimitedNews($pagenum,3);
        $arr=array("num"=>count($data),"list"=>$data);
        echo json_encode($arr);
    }
}

//(new indexController())->testM();
