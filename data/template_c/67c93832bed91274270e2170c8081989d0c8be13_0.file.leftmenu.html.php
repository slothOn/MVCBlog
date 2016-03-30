<?php
/* Smarty version 3.1.29, created on 2016-03-30 14:24:14
  from "/var/www/html/MVCLearn/leftmenu.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56fb710eddc971_78728125',
  'file_dependency' => 
  array (
    '67c93832bed91274270e2170c8081989d0c8be13' => 
    array (
      0 => '/var/www/html/MVCLearn/leftmenu.html',
      1 => 1459147883,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56fb710eddc971_78728125 ($_smarty_tpl) {
?>
<aside id="sidebar" class="column">
	<h3>新闻管理</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="index.php?controller=admin&method=newsadd">添加新闻</a></li>
		<li class="icn_categories"><a href="index.php?controller=admin&method=newslist">管理新闻</a></li>
	</ul>
	<h3>管理员管理</h3>
	<ul class="toggle">
		<li class="icn_jump_back"><a href="index.php?controller=admin&method=logout">退出登录</a></li>
	</ul>
	
	<footer>
		
	</footer>
</aside><!-- end of sidebar --><?php }
}
