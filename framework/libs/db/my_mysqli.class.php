<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 上午7:14
 */
class My_mysqli
{
    public $dbc;
    /**
     * 报错函数
     *
     * @param string $error
     */
    function err($error){
        die("对不起，您的操作有误，错误原因为：".$error);
    }

    /**
     * 连接数据库
     *
     * @param string $dbhost 主机名
     * @param string $dbuser 用户名
     * @param string $dbpsw  密码
     * @param string $dbname 数据库名
     * @param string $dbcharset 字符集/编码
     * @return bool  连接成功或不成功
     **/
    function connect($config){
        extract($config);
        $this->dbc=mysqli_connect($dbhost,$dbuser,$dbpsw,$dbname) or die(mysqli_error($this->dbc));
        mysqli_set_charset($this->dbc,"utf8");
    }

    function query($sql){
        if(!isset($this->dbc)){
            $this->err("数据库尚未连接");
        }
        if(!($result = mysqli_query($this->dbc,$sql))){
            $this->err($sql."<br />".mysqli_error($this->dbc));
        }else{
            return $result;
        }
    }

    function findAll($query){
        if(!isset($this->dbc)){
            $this->err("数据库尚未连接");
        }
        $list=array();
        $result=mysqli_query($this->dbc,$query);
        while($rs=mysqli_fetch_array($result)){
            $list[]=$rs;
        }
        return $list;
    }

    function findOne($query){
        $rs = mysqli_fetch_array($query);
        return $rs;
    }

    /*返回结果集中指定行的字段值*/
    function findResult($query, $row = 0, $filed = 0){
        if(!isset($this->dbc)){
            $this->err("数据库尚未连接");
        }
        $query=$query.' limit '.$row.',1';
        $result=mysqli_query($this->dbc,$query);
        $rs=mysqli_fetch_row($result);
        ChromePhp::log('findResult:'.$rs[$filed]);
        return $rs[$filed];
    }

    function insert($table,$arr){
        if(!isset($this->dbc)){
            $this->err("数据库尚未连接");
        }
        foreach($arr as $key=>$value){//foreach循环数组
            $value = mysqli_real_escape_string($this->dbc,$value);
            $keyArr[] = "`".$key."`";
            $valueArr[] = "'".$value."'";
        }
        $keys = implode(",",$keyArr);
        $values = implode(",",$valueArr);
        $sql = "insert into ".$table."(".$keys.") values(".$values.")";
        $this->query($sql);
        return mysqli_insert_id($this->dbc);
    }

    function update($table,$arr,$where){
        if(!isset($this->dbc)){
            $this->err("数据库尚未连接");
        }
        foreach($arr as $key=>$value){
            $value=mysqli_real_escape_string($this->dbc,$value);
            $keyAndvalueArr[] = "`".$key."`='".$value."'";
        }
        $keyAndvalues = implode(",",$keyAndvalueArr);
        $sql = "update ".$table." set ".$keyAndvalues." where ".$where;
        $this->query($sql);
    }

    function del($table,$where){
        if(!isset($this->dbc)){
            $this->err("数据库尚未连接");
        }
        $sql = "delete from ".$table." where ".$where;
        $this->query($sql);
        return mysqli_affected_rows($this->dbc);
    }

    function findLimited($sql,$skip,$limit){
        if(!isset($this->dbc)){
            $this->err("数据库尚未连接");
        }
        $list=array();
        $query=$sql.' '."limit $skip,$limit";
        $result=mysqli_query($this->dbc,$query);
        while($rs=mysqli_fetch_array($result)){
            $list[]=$rs;
        }
        return $list;
    }
}
