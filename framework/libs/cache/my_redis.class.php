<?php
/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-4-7
 * Time: 下午11:17
 */
Class My_redis{

    private $redis;
    public function connect(){
        $redis = new Redis();
        $redis->connect("localhost", 6379);
    }


}