<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-4-11
 * Time: 下午4:45
 */
class commentModel
{
    private $table = "comment";

    public function insert($data){
        return DB::insert($this->table, $data);
    }

    public function findCommWithId($id){
        $sql = "select * from $this->table WHERE news_id=$id";
        return DB::findAll($sql);
    }

    public function countWithId($id){
        $sql = "select count(*) from $this->table WHERE news_id=$id";
        return DB::findResult($sql);
    }
}