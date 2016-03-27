<?php
/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-3-14
 * Time: 上午9:26
 */
header('content-type:text/html;charset=utf8');
session_start();
include('ChromePhp.php');
require_once('config.php');
require_once('framework/pc.php');
PC::run($configs);
