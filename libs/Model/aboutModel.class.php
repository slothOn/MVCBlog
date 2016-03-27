<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-15
 * Time: 下午8:55
 */
class aboutModel
{
    function getInfo(){
        $content=file_get_contents("data/conclusion");
        return $content;
    }
}