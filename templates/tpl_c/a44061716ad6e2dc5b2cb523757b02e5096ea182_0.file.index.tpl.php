<?php
/* Smarty version 3.1.29, created on 2016-12-06 23:45:43
  from "C:\OpenServer\domains\edukit.mgkit\templates\tpl\guest\index.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_584723771eaa40_05113189',
  'file_dependency' => 
  array (
    'a44061716ad6e2dc5b2cb523757b02e5096ea182' => 
    array (
      0 => 'C:\\OpenServer\\domains\\edukit.mgkit\\templates\\tpl\\guest\\index.tpl',
      1 => 1481057109,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:guest/menu.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_584723771eaa40_05113189 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Информационно-образовательный портал", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<header id="header" class="container">
						<div id="logoDiv" class="col-md-4">
							<figure>
								<img src="img/ukit.png" alt="">
								<figcaption></figcaption>
							</figure>
						</div>
						<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:guest/menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

					</header>
				</div>
			</div>
			<hr>
			<div class="row">
				<div id="content" class="col-md-12">
					<h1>Добро пожаловать</h1>
				</div>
			</div>
		</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
