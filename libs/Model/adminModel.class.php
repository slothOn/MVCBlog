<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 下午7:16
 */
class adminModel
{
    private $table='admin';//操作一张表

    function fetchOneByUsername($username){
        $sql="select * from ".$this->table." where username='$username'";
        $row=DB::findOne($sql);
        return $row;
    }
}