<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 下午7:00
 */
class authModel
{
    function checkAuth($username,$password){
        $admin=M('admin');
        $row=$admin->fetchOneByUsername($username);
        if($row && $row['password']==$password){
            return $row;
        }else return false;
    }
}