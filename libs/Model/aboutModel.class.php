<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-15
 * Time: 下午8:55
 */
//Model从非数据库文件中获取数据
class aboutModel
{
    function getInfo(){
        $content=file_get_contents("data/conclusion");
        return $content;
    }
}