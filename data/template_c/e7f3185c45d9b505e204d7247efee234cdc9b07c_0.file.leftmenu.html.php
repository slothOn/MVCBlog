<?php
/* Smarty version 3.1.29, created on 2016-03-14 21:16:28
  from "/media/zxc/Personal_Affairs/WebDev/imooc/MVCLearn/tpl/leftmenu.html" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_56e6b9ac7e7568_42744254',
  'file_dependency' => 
  array (
    'e7f3185c45d9b505e204d7247efee234cdc9b07c' => 
    array (
      0 => '/media/zxc/Personal_Affairs/WebDev/imooc/MVCLearn/tpl/leftmenu.html',
      1 => 1402838738,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e6b9ac7e7568_42744254 ($_smarty_tpl) {
?>
<aside id="sidebar" class="column">
	<h3>新闻管理</h3>
	<ul class="toggle">
		<li class="icn_new_article"><a href="admin.php?controller=admin&method=newsadd">添加新闻</a></li>
		<li class="icn_categories"><a href="admin.php?controller=admin&method=newslist">管理新闻</a></li>
	</ul>
	<h3>管理员管理</h3>
	<ul class="toggle">
		<li class="icn_jump_back"><a href="admin.php?controller=admin&method=logout">退出登录</a></li>
	</ul>
	
	<footer>
		
	</footer>
</aside><!-- end of sidebar --><?php }
}
