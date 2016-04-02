<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-4-1
 * Time: 下午8:28
 */
class subcateModel
{
    public $table = 'subcate';

    public function findAllCate(){
        $sql = "select * from subcate";
        $data = DB::findAll($sql);
        return $data;
    }

    public function findCate($cate){
        $sql = "select * from subcate WHERE cate_name='$cate'";
        $data = DB::findAll($sql);
        return $data;
    }

    public function findAllTech(){
        return $this->findCate('Tech');
    }
    public function findAllLife(){
        return $this->findCate('Life');
    }
    public function findAllService(){
        return $this->findCate('Service');
    }

}