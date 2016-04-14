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
        $this->redis = new Redis();
        $this->redis->connect("localhost", 6379);
        ChromePhp::log('cache connected');
    }

    public function saveKey($key, $val){
        $this->redis->set($key, $val);
    }

    public function getKey($key){
        return $this->redis->get($key);
    }
}