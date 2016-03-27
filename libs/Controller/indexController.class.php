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
        $newsobj=M('news');
        $data=$newsobj->findProcessedAll();
        VIEW::assign(array('data'=>$data));
        VIEW::display('frontendindex.html');
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

    function testM(){
        M('auth');
    }
}

//(new indexController())->testM();
