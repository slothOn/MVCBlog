<?php
/* Smarty version 3.1.29, created on 2016-04-01 23:36:54
  from "/var/www/html/MVCLearn/frontendindex.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fe95965234b4_18901339',
  'file_dependency' => 
  array (
    'eff4666fb5adcf8e51aead21782ffd2dac5f58a6' => 
    array (
      0 => '/var/www/html/MVCLearn/frontendindex.html',
      1 => 1459498683,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:frontendnav.html' => 1,
    'file:frontendfooter.html' => 1,
  ),
),false)) {
function content_56fe95965234b4_18901339 ($_smarty_tpl) {
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
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:frontendnav.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ol class="breadcrumb">
                    <li class="active">Home</li>
                </ol>
            </div>
            <div class="col-xs-12">
                <h3>Home</h3>
                <hr>
            </div>
        </div>
    </div>
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
    <div class="news row row-content">
        <div class="col-xs-12">
            <h2 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['val']->value['title'];?>
&nbsp;&nbsp;<!--<span class="label label-danger">NEW</span>--></h2>
            <br>
            <span class="label label-danger mycategory"><span class="glyphicon glyphicon-tag"></span><?php echo $_smarty_tpl->tpl_vars['val']->value['category'];?>
</span>
            <span class="label label-primary mysubcategory"><span class="glyphicon glyphicon-tag"></span><?php echo $_smarty_tpl->tpl_vars['val']->value['subcategory'];?>
</span>
            <span class="keyword">
                <?php
$_from = $_smarty_tpl->tpl_vars['val']->value['keywords'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_keyword_1_saved_item = isset($_smarty_tpl->tpl_vars['keyword']) ? $_smarty_tpl->tpl_vars['keyword'] : false;
$_smarty_tpl->tpl_vars['keyword'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['keyword']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['keyword']->value) {
$_smarty_tpl->tpl_vars['keyword']->_loop = true;
$__foreach_keyword_1_saved_local_item = $_smarty_tpl->tpl_vars['keyword'];
?>
                    <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
</span>
                <?php
$_smarty_tpl->tpl_vars['keyword'] = $__foreach_keyword_1_saved_local_item;
}
if ($__foreach_keyword_1_saved_item) {
$_smarty_tpl->tpl_vars['keyword'] = $__foreach_keyword_1_saved_item;
}
?>
            </span>
            <p><?php echo substr($_smarty_tpl->tpl_vars['val']->value['content'],0,250);?>
</p>
            <p><a href="index.php?method=detail&id=<?php echo $_smarty_tpl->tpl_vars['val']->value['id'];?>
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
            <p>暂时没有内容发布</p>
        </div>
    </div>
    <?php
}
if ($__foreach_val_0_saved_item) {
$_smarty_tpl->tpl_vars['val'] = $__foreach_val_0_saved_item;
}
?>
    <div id="no_more_data" class="row" style="display: none;font-size: large">
        <div style="width:1000px;height:60px;margin: 20px auto; vertical-align: middle" class="alert alert-warning alert-dismissable">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <strong>Warning:</strong>:
            已经是最后一篇，没有更多的文章了
        </div>
    </div>
    <div id="news_loading" style="text-align: center;display: none"><img height="100px" src="img/images/news_loading.gif"></div>

    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:frontendfooter.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php echo '<script'; ?>
 src="img/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="img/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="img/js/myhelper.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="img/js/myajax.js"><?php echo '</script'; ?>
>
    <!--markdown js插件-->
    <?php echo '<script'; ?>
 src="img/js/showdown.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="img/js/showdown-twitter.min.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
