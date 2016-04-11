<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 上午7:13
 */
//factory
class VIEW
{
    private static $view;

    public static function init($viewtype,$configs){
        self::$view=new $viewtype;
        foreach($configs as $key=>$val){
            $method="set".$key;
            self::$view->$method($val);
        }

    }

    public static function assign($data){
        foreach($data as $key=>$val){
            self::$view->assign($key,$val);
        }
    }

    public static function display($templ){
        self::$view->display($templ);
    }
}