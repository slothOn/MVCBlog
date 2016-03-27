<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 下午9:19
 */
class newsModel
{
    public $table='news';

    function count(){
        $sql="select count(*) from $this->table";
        return DB::findResult($sql);
    }

    function findOne_by_id($id){
        $sql="select * from $this->table WHERE id='$id'";
        return DB::findOne($sql);
    }

    function insert($data){
        return DB::insert($this->table,$data);
    }

    function updateById($data,$id){
        return DB::update($this->table,$data,"id='$id");
    }

    function findAll_orderby_dateline(){
        $sql = "select * from $this->table order by dateline desc";
        return DB::findAll($sql);
    }

    function deleteById($id){
        return DB::del($this->table,"id='$id'");
    }

    function findProcessedAll(){
        $rows=$this->findAll_orderby_dateline();
        foreach($rows as $row){
            $row['content']=substr($row['content'],0,200);
        }
        return $rows;
    }
}