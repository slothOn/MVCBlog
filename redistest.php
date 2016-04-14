<?php
/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-4-13
 * Time: 下午2:07
 */
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
$redis->set('a', '123');
echo "key saved";