<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-4-7
 * Time: 下午11:32
 */
class CACHE
{
    private static $cache;
    public static function init($cachename){
        self::$cache = new $cachename();
        self::$cache->connect();
    }

    public static function save(){

    }

    public static function get(){

    }
}