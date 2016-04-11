<?php
/**
 * Created by PhpStorm.
 * User: zxc
 * Date: 16-4-10
 * Time: 下午11:57
 */

require_once("libs/ORG/QC.class.php");

$qc = new QC();
$acs = $qc->qq_callback();
$oid = $qc->get_openid();
$qc = new QC($acs,$oid);
$uinfo = $qc->get_user_info();
//echo "<meta charset='utf-8'>";
//print_r($uinfo);
//print_r($_SESSION['QC_userData']);
$_SESSION['QC_userInfo'] = $uinfo;
header("location:index.php");
