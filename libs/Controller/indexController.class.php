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
        VIEW::assign(array('data'=>$data,'catelist'=>$catelist));
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

    public function about(){
        $view = V('about');
        $view->display();
    }

    protected function testM(){
        M('auth');
    }

    private function showMessage($mes,$href){
        echo "<script>alert('$mes');window.location.href='$href';</script>";
        exit;
    }
}

//(new indexController())->testM();
