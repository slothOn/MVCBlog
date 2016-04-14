<?php
/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 上午7:10
 */
//引擎程序
$currentdir=dirname(__FILE__);
require_once($currentdir.'/include.list.php');

foreach($paths as $path){
    include_once($currentdir.'/'.$path);
}
class PC{
    //单一入口程序
    public static $controller;
    public static $method;
    public static $configs;
    public static function initView(){
        VIEW::init('Smarty',self::$configs['view_config']);
    }
    public static function initDB(){
        DB::init('My_mysqli',self::$configs['db_config']);
    }
    public static function initCACHE(){
        CACHE::init('My_redis');
    }
    public static function initControllers(){
        self::$controller=isset($_GET['controller'])?$_GET['controller']:'index';
    }
    public static function initMethods(){
        self::$method=isset($_GET['method'])?$_GET['method']:'index';
    }
    public static function run($configs){
        self::$configs=$configs;
        self::initDB();
        self::initCACHE();
        self::initView();
        self::initControllers();
        self::initMethods();

        C(self::$controller,self::$method);
    }
}
