<?php
/* Smarty version 3.1.29, created on 2016-04-01 23:36:57
  from "/var/www/html/MVCLearn/frontenddetail.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fe9599058126_35731205',
  'file_dependency' => 
  array (
    '1583ef1117423e94f1203d259462e4ae4e3bccec' => 
    array (
      0 => '/var/www/html/MVCLearn/frontenddetail.html',
      1 => 1459516578,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:frontendnav.html' => 1,
    'file:frontendcate.html' => 1,
    'file:frontendfooter.html' => 1,
  ),
),false)) {
function content_56fe9599058126_35731205 ($_smarty_tpl) {
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
    <div class="container">
        <div class="col-xs-12 col-sm-10">
            <div class="news row row-content" style="margin-left: 0px;margin-right: 5px">
                <div class="col-xs-12">
                    <h2 class="media-heading"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
&nbsp;&nbsp;</h2>
                    <br>
                    <span class="label label-danger mycategory"><span class="glyphicon glyphicon-tag"></span><?php echo $_smarty_tpl->tpl_vars['data']->value['category'];?>
</span>
                    <span class="label label-primary mysubcategory"><span class="glyphicon glyphicon-tag"></span><?php echo $_smarty_tpl->tpl_vars['data']->value['subcategory'];?>
</span>
                    <span class="keyword">
                        <?php
$_from = $_smarty_tpl->tpl_vars['data']->value['keywords'];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_keyword_0_saved_item = isset($_smarty_tpl->tpl_vars['keyword']) ? $_smarty_tpl->tpl_vars['keyword'] : false;
$_smarty_tpl->tpl_vars['keyword'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['keyword']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['keyword']->value) {
$_smarty_tpl->tpl_vars['keyword']->_loop = true;
$__foreach_keyword_0_saved_local_item = $_smarty_tpl->tpl_vars['keyword'];
?>
                            <span class="label label-success"><?php echo $_smarty_tpl->tpl_vars['keyword']->value;?>
</span>
                        <?php
$_smarty_tpl->tpl_vars['keyword'] = $__foreach_keyword_0_saved_local_item;
}
if ($__foreach_keyword_0_saved_item) {
$_smarty_tpl->tpl_vars['keyword'] = $__foreach_keyword_0_saved_item;
}
?>
                    </span>
                    <p><?php echo $_smarty_tpl->tpl_vars['data']->value['content'];?>
 </p>
                </div>
            </div>
        </div>
        <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:frontendcate.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    </div>

    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:frontendfooter.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <?php echo '<script'; ?>
 src="img/js/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="img/js/bootstrap.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="img/js/showdown.min.js"><?php echo '</script'; ?>
>
    <!--避免smarty定界符与jquery冲突-->
    
    <?php echo '<script'; ?>
>
        var converter=new showdown.Converter();
        var newsnode=document.getElementsByClassName("news")[0].getElementsByTagName("p")[0];
        var rawcontent=newsnode.innerHTML;
        var content=converter.makeHtml(rawcontent);
        newsnode.innerHTML=content;
    <?php echo '</script'; ?>
>
    
</body>
</html><?php }
}
