<?php
/* Smarty version 3.1.29, created on 2016-03-29 10:39:32
  from "/var/www/html/MVCLearn/frontenddetail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56f9eae4c26325_57607800',
  'file_dependency' => 
  array (
    '1583ef1117423e94f1203d259462e4ae4e3bccec' => 
    array (
      0 => '/var/www/html/MVCLearn/frontenddetail.html',
      1 => 1459155495,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56f9eae4c26325_57607800 ($_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!--声明mobile first-->
    <meta http-equiv="X-UA-COMPATIBLE" content="IE=edge">
    <!--禁止屏幕缩放-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <!--引入bootstrap和fontawesome-->
    <link href="img/css/bootstrap.min.css" rel="stylesheet">
    <link href="img/css/bootstrap-theme.css" rel="stylesheet">
    <link href="img/css/font-awesome.min.css" rel="stylesheet">
    <link href="img/css/bootstrap-social.css" rel="stylesheet">
    <link href="img/css/mystyle.css" rel="stylesheet">
    <title>新闻页</title>
</head>
<body>
    <nav class="nav navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!--响应式navbar布局-->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">HOME</a>
        </div>
        <div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="navbar-nav nav">
                    <li class="active"><a href="index.php">
                        <!--glyphicon is part of bootstrap-->
                        <span class="glyphicon glyphicon-home" aria-hidden="true"></span>主页</a>
                    </li>
                    <li><a href="frontendabout.html"><span class="glyphicon glyphicon-info-sign"></span>关于</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-list-alt"></span>Service<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">Appetizers</a></li>
                            <li><a href="#">Main Courses</a></li>
                            <li><a href="#">Dessert Drinks</a></li>
                            <li><a href="#">Drinks</a></li>
                            <li class="divider"></li>
                            <li class="dropdown-header">Specials</li>
                            <li><a href="#">Lunch Buffet</a></li>
                            <li><a href="#">Weekend Brunch</a></li>
                        </ul>
                    </li>
                    <li><a href="mailto:zxcheng95@gmail.com"><i class="fa fa-envelope"></i>Contact</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>
    <header class="jumbotron">
        <!-- Main component for a primary marketing message or call to action -->
        <div class="container">
            <div class="row row-header">
                <div class="col-xs-12">
                    <h1 style="text-align: right">Geography 转学 CS</h1>
                    <p style="padding:40px;"></p>
                    <p style="text-align: right; padding-right: 150px">基于Bootstrap,PHP,Smarty模版构建</p>
                </div>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="row">
            <div></div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li class="active">Article Detail</li>
                </ol>
            </div>
            <div class="col-xs-12">
                <h3>Detail</h3>
                <hr>
            </div>
        </div>
    </div>
    <div class="row row-content">
        <div class="col-xs-12 col-sm-9">
            <h2 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
&nbsp;&nbsp;<span class="label label-danger">NEW</span></h2>
            <br><span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['data']->value['author'];?>
</span>
            <p><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
 </p>
        </div>
        <div class="col-xs-12 col-sm-3">
            <h2 class="media-heading">介绍</h2>
            <p><?php echo $_smarty_tpl->tpl_vars['info']->value;?>
</p>
        </div>
    </div>

    <footer class="row-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-sm-3">
                    <h5>Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="index.html#">Home</a></li>
                        <li><a href="about.html#">About</a></li>
                        <li><a href="#">Service</a></li>
                        <li><a href="contactus.html#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-sm-5">
                    <h5>Our Address</h5>
                    <address>
                        <!--awesome font-->
                        129 Luoyu Road<br>
                        School of Resource and Environment<br>
                        Wuhan University, China<br>
                        Tel:<i class="fa fa-phone"></i>+18202721163<br>
                        Email:<i class="fa fa-envelope"></i><a href="mailto:zxcheng95@gmail.com">zxcheng95@gmail.com</a><br>
                    </address>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="nav navbar-nav" style="padding: 40px 10px;">
                        <a class="btn btn-social-icon btn-google-plus" href="http://google.com/+"><i class="fa fa-google-plus"></i></a>
                        <a class="btn btn-social-icon btn-facebook" href="http://www.facebook.com/profile.php?id="><i class="fa fa-facebook"></i></a>
                        <a class="btn btn-social-icon btn-linkedin" href="http://www.linkedin.com/in/"><i class="fa fa-linkedin"></i></a>
                        <a class="btn btn-social-icon btn-wechat" href="http://twitter.com/"><i class="fa fa-wechat"></i></a>
                        <a class="btn btn-social-icon btn-weibo" href="http://youtube.com/"><i class="fa fa-weibo"></i></a>
                        <a class="btn btn-social-icon" href="mailto:zxcheng95@gmail.com"><i class="fa fa-envelope-o"></i></a>
                    </div>
                </div>
                <div class="col-xs-12">
                    <p style="padding:10px;"></p>
                    <p align="center"> Copyright 2016 X. Zhou</p>
                </div>
            </div>
        </div>
    </footer>
    <?php echo '<script'; ?>
 src="img/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="img/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
