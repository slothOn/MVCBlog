<?php

/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 上午7:14
 */
class Mysql
{
    /**
     * 报错函数
     *
     * @param string $error
     */
    function err($error){
        die("对不起，您的操作有误，错误原因为：".$error);//die有两种作用 输出 和 终止   相当于  echo 和 exit 的组合
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
        if(!($con = mysql_connect($dbhost,$dbuser,$dbpsw))){//mysql_connect连接数据库函数
            $this->err(mysql_error());
        }
        if(!mysql_select_db($dbname,$con)){//mysql_select_db选择库的函数
            $this->err(mysql_error());
        }
        mysql_query("set names ".$dbcharset);//使用mysql_query 设置编码  格式：mysql_query("set names utf8")
    }
    /**
     * 执行sql语句
     *
     * @param string $sql
     * @return bool 返回执行成功、资源或执行失败
     */
    function query($sql){
        if(!($query = mysql_query($sql))){//使用mysql_query函数执行sql语句
            $this->err($sql."<br />".mysql_error());//mysql_error 报错
        }else{
            return $query;
        }
    }

    /**
     *列表
     *
     *@param source $query sql语句通过mysql_query 执行出来的资源
     *@return array   返回列表数组
     **/
    function findAll($query){
        $list=array();
        $result=mysql_query($query);
        while($rs=mysql_fetch_array($result, MYSQL_ASSOC)){//mysql_fetch_array函数把资源转换为数组，一次转换出一行出来
            //ChromePhp::log('rs:'.var_dump($rs));
            $list[]=$rs;
        }
        return $list;
    }

    /**
     *单条
     *
     *@param source $query sql语句通过mysql_query执行出的来的资源
     *return array   返回单条信息数组
     **/
    function findOne($query){
        $rs = mysql_fetch_array($query, MYSQL_ASSOC);
        return $rs;
    }

    /**
     *指定行的指定字段的值
     *
     *@param source $query sql语句通过mysql_query执行出的来的资源
     *return array   返回指定行的指定字段的值
     **/
    function findResult($query, $row = 0, $filed = 0){
        $rs = mysql_result($query,  $row, $filed);
        return $rs;
    }

    /**
     * 添加函数
     *
     * @param string $table 表名
     * @param array $arr 添加数组（包含字段和值的一维数组）
     *
     */
    function insert($table,$arr){
        //$sql = "insert into 表名(多个字段) values(多个值)";
        //print_r($arr);
        foreach($arr as $key=>$value){//foreach循环数组
            $value = mysql_real_escape_string($value);
            $keyArr[] = "`".$key."`";//把$arr数组当中的键名保存到$keyArr数组当中
            $valueArr[] = "'".$value."'";//把$arr数组当中的键值保存到$valueArr当中，因为值多为字符串，而sql语句里面insert当中如果值是字符串的话要加单引号，所以这个地方要加上单引号
        }
        $keys = implode(",",$keyArr);//implode函数是把数组组合成字符串 implode(分隔符，数组)
        $values = implode(",",$valueArr);
        $sql = "insert into ".$table."(".$keys.") values(".$values.")";//sql的插入语句  格式：insert into 表(多个字段)values(多个值)
        $this->query($sql);//调用类自身的query(执行)方法执行这条sql语句  注：$this指代自身
        return mysql_insert_id();
    }

    /**
     *修改函数
     *
     *@param string $table 表名
     *@param array $arr 修改数组（包含字段和值的一维数组）
     *@param string $where  条件
     **/
    function update($table,$arr,$where){
        //update 表名 set 字段=字段值 where ……
        foreach($arr as $key=>$value){
            $value = mysql_real_escape_string($value);
            $keyAndvalueArr[] = "`".$key."`='".$value."'";
        }
        $keyAndvalues = implode(",",$keyAndvalueArr);
        $sql = "update ".$table." set ".$keyAndvalues." where ".$where;//修改操作 格式 update 表名 set 字段=值 where 条件
        $this->query($sql);
    }

    /**
     *删除函数
     *
     *@param string $table 表名
     *@param string $where 条件
     **/
    function del($table,$where){
        $sql = "delete from ".$table." where ".$where;//删除sql语句 格式：delete from 表名 where 条件
        $this->query($sql);
        return mysql_affected_rows();
    }

    function findLimited($sql,$skip,$limit){
        $list=array();
        $query=$sql.' '."limit $skip,$limit";
        $result=mysql_query($query);
        while($rs=mysql_fetch_array($result, MYSQL_ASSOC)){//mysql_fetch_array函数把资源转换为数组，一次转换出一行出来
            $list[]=$rs;
        }
        return $list;
    }
}
