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
            $data=$newsobj->findLimitedNews($pagenum,3);
            $this->processKeywords($data);
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
        $this->processDetailKeywords($data);
        VIEW::assign(array('data'=>$data,'info'=>$aboutinfo));
        VIEW::display('frontenddetail.html');
    }

    public function category(){
        $pagenum=$_GET['page']?$_GET['page']:1;
        $category=$_GET['cate']?$_GET['category']:0;
        if($pagenum<=1){
            $newsobj=M('news');
            $data=$newsobj->findLimitedNewsWithCate($pagenum,3,$category);
            VIEW::assign(array('data'=>$data));
            VIEW::display('frontendindex.html');
        }else{
            $this->moreNewsWithCate($pagenum,$category);
        }
    }

    public function moreNews($pagenum){
        ChromePhp::log($pagenum);
        $newsobj=M('news');
        $data=$newsobj->findLimitedNews($pagenum,3);
        $this->processKeywords($data);
        $arr=array("num"=>count($data),"list"=>$data);
        echo json_encode($arr);
    }

    public function moreNewsWithCate($pagenum,$category){
        $newsobj=M('news');
        $data=$newsobj->findLimitedNewsWithCate($pagenum,3,$category);
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

    protected function testM(){
        M('auth');
    }

}

//(new indexController())->testM();
