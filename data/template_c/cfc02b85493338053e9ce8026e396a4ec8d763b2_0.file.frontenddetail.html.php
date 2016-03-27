<?php
/* Smarty version 3.1.29, created on 2016-03-15 21:24:09
  from "/media/zxc/Personal_Affairs/WebDev/imooc/MVCLearn/frontenddetail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e80cf9903c07_33359964',
  'file_dependency' => 
  array (
    'cfc02b85493338053e9ce8026e396a4ec8d763b2' => 
    array (
      0 => '/media/zxc/Personal_Affairs/WebDev/imooc/MVCLearn/frontenddetail.html',
      1 => 1458048217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e80cf9903c07_33359964 ($_smarty_tpl) {
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
                        <li><a href="#"><span class="glyphicon glyphicon-info-sign"></span>关于</a></li>
                        <li><a href="#"><i class="fa fa-bitbucket"></i>Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <header class="jumbotron">
        <!-- Main component for a primary marketing message or call to action -->
        <div class="container">
            <div class="row row-header">
                <div class="col-xs-12 col-sm-8">
                    <h1>新闻浏览页</h1>
                    <p style="padding:40px;"></p>
                    <p>基于Bootstrap,MVC,Smarty模版构建</p>
                </div>
            </div>
        </div>
    </header>
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
    <?php echo '<script'; ?>
 src="img/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="img/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
