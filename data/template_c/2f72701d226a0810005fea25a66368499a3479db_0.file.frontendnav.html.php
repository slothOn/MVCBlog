<?php
/* Smarty version 3.1.29, created on 2016-04-01 10:46:37
  from "/var/www/html/MVCLearn/frontendnav.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fde10d13c556_06657186',
  'file_dependency' => 
  array (
    '2f72701d226a0810005fea25a66368499a3479db' => 
    array (
      0 => '/var/www/html/MVCLearn/frontendnav.html',
      1 => 1459408305,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fde10d13c556_06657186 ($_smarty_tpl) {
?>
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
                            <span class="glyphicon glyphicon-list-alt"></span>Menu<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-header" style="color: white;font-size: larger">文章分类</li>
                            <li class="divider"></li>
                            <li><a href="#">Tech</a></li>
                            <li><a href="#">Life</a></li>
                            <li><a href="#"><em>留学</em></a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="glyphicon glyphicon-list-alt"></span>资源<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">GIS工具下载</a></li>
                            <li><a href="#">GIS课程资料</a></li>
                            <li><a href="#">GIS考试作业</a></li>
                        </ul>
                    </li>
                    <li><a href="mailto:zxcheng95@gmail.com"><i class="fa fa-envelope"></i>Contact</a></li>
                </ul>
                <ul class="navbar-nav nav navbar-right">
                    <li>
                        <form class="form-inline" style="padding-top: 8px">
                            <div class="input-group">
                                <input type="text" class="form-control">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                            </div>
                        </form>
                    </li>
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
<?php }
}
