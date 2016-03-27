<?php
/* Smarty version 3.1.29, created on 2016-03-15 21:13:29
  from "/media/zxc/Personal_Affairs/WebDev/imooc/MVCLearn/frontendindex.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e80a7989e8f1_92724707',
  'file_dependency' => 
  array (
    'e1f5a1db76f657c9797025dde9a6c7b7d82d0e36' => 
    array (
      0 => '/media/zxc/Personal_Affairs/WebDev/imooc/MVCLearn/frontendindex.html',
      1 => 1458047608,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e80a7989e8f1_92724707 ($_smarty_tpl) {
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
    <?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_val_0_saved_item = isset($_smarty_tpl->tpl_vars['val']) ? $_smarty_tpl->tpl_vars['val'] : false;
$_smarty_tpl->tpl_vars['val'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['val']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
$_smarty_tpl->tpl_vars['val']->_loop = true;
$__foreach_val_0_saved_local_item = $_smarty_tpl->tpl_vars['val'];
?>
    <div class="row row-content">
        <div class="col-xs-12">
            <h2 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
&nbsp;&nbsp;<span class="label label-danger">NEW</span></h2>
            <br><span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['val']->value['author'];?>
</span>
            <p><?php echo $_smarty_tpl->tpl_vars['val']->value['content'];?>
 </p>
            <p><a href="index.php?controller=index&method=detail&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
" class="btn btn-primary btn-xs">More &#187;</a></p>
        </div>
    </div>
    <?php
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_local_item;
}
if (!$_smarty_tpl->tpl_vars['val']->_loop) {
?>
    <div class="row row-content">
        <div class="col-xs-12">
            <p>暂时没有新闻发布</p>
        </div>
    </div>
    <?php
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
    <?php echo '<script'; ?>
 src="img/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="img/js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
