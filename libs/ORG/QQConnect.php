<?php
/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-4-11
 * Time: 上午10:42
 */
include_once("OAuthconfig.php");
include_once(QQCLASS_PATH."QC.class.php");
session_start();
$qc = new QC();
$qc->qq_login();