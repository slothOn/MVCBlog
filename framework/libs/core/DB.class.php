<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 上午7:12
 */
//工厂模式
class DB
{
    private static $db;

    public static function init($dbname,$config){
        self::$db=new $dbname();
        self::$db->connect($config);
        //ChromePhp::log(self::$db->dbc);
    }

    public static function query($sql){
        return self::$db->query($sql);
    }

    public static function findAll($sql){
        return self::$db->findAll($sql);
    }

    public static function findOne($sql){
        $query = self::$db->query($sql);
        return self::$db->findOne($query);
    }

    public static function findResult($sql, $row = 0, $filed = 0){
//        $query = self::$db->query($sql);
        return self::$db->findResult($sql, $row, $filed);
    }

    public static function insert($table,$arr){
        return self::$db->insert($table,$arr);
    }

    public static function update($table, $arr, $where){
        return self::$db->update($table, $arr, $where);
    }

    public static function del($table,$where){
        return self::$db->del($table,$where);
    }

    public static function findLimited($sql,$skip,$limit){
        return self::$db->findLimited($sql,$skip,$limit);
    }
}