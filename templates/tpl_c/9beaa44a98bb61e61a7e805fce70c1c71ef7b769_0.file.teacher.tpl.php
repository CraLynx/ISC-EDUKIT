<?php
/* Smarty version 3.1.29, created on 2016-12-06 23:55:35
  from "C:\OpenServer\domains\edukit.mgkit\templates\tpl\guest\teacher.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_584725c743be16_36242372',
  'file_dependency' => 
  array (
    '9beaa44a98bb61e61a7e805fce70c1c71ef7b769' => 
    array (
      0 => 'C:\\OpenServer\\domains\\edukit.mgkit\\templates\\tpl\\guest\\teacher.tpl',
      1 => 1481057734,
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
function content_584725c743be16_36242372 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Преподаватели", null);
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
					<div id="teachers">
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Жуков Евгений Юрьевич</figcaption>
						</figure>
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Глускер Александр Игоревич</figcaption>
						</figure>
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Сорокин Юрий Сергеевич</figcaption>
						</figure>
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Блёсткина Ольга Владимировна</figcaption>
						</figure>
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Панкова Валентина Геннадьвена</figcaption>
						</figure>
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Спирина Ирина Германовна</figcaption>
						</figure>
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Куликова Ольгая Фёдровна</figcaption>
						</figure>
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Миланова Ирина Анатольевна</figcaption>
						</figure>
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Тарасова Елена Анатольевна</figcaption>
						</figure>
						<figure class="teacher">
							<img src="http://placehold.it/250" alt="">
							<figcaption>Биткина Елена Сергеевна</figcaption>
						</figure>
					</div>
				</div>
			</div>
		</div>
<?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
