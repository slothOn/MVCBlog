<?php
/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 上午7:16
 */
//controller
function C($name,$method){
    $parent=dirname(dirname(dirname(__FILE__)));
    //echo $parent.'/libs/Controller/'.$name.'Controller.class.php';
    //require_once('../../../libs/Controller/'.$name.'Controller.class.php');
    require_once($parent.'/libs/Controller/'.$name.'Controller.class.php');
    $classname=$name."Controller";
    $obj=new $classname();
    $obj->$method();

}

//view
function V($name){
    $parent=dirname(dirname(dirname(__FILE__)));
    require_once($parent.'/libs/View/'.$name.'View.class.php');
    $classname=$name."View";
    $obj=new $classname();
    return $obj;
}

//model
function M($name){
    $parent=dirname(dirname(dirname(__FILE__)));
    require_once($parent.'/libs/Model/'.$name.'Model.class.php');
    $classname=$name."Model";
    $obj=new $classname();
    return $obj;
}

function ORG($name,$params=''){
    $parent=dirname(dirname(dirname(__FILE__)));
    require_once($parent.'/libs/ORG/'.$name.'.class.php');
    if($params != '') $obj=new $name();
    else $obj = new $name($params);
    return $obj;
}

function daddslashes($str){
    return (!get_magic_quotes_gpc())?addslashes($str):$str;
}