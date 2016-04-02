<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-4-2
 * Time: 上午9:24
 */
class resourceModel
{
    private $table="resource";

    public function findOne_by_title($title){
        $sql="select * from $this->table where title='$title'";
        return DB::findOne($sql);
    }

    public function findOne_by_id($id){
        $sql="select * from $this->table where id=$id";
        return DB::findOne($sql);
    }

    public function findAll_orderby_dateline(){
        $sql="select * from $this->table ORDER BY dateline DESC";
        return DB::findAll($sql);
    }

    public function updateById($data,$id){
        DB::update($this->table,$data,"id=$id");
    }

    public function insert($data){
        DB::insert($this->table,$data);
    }

    public function deleteById($id){
        return DB::del($this->table,"id=$id");
    }
}