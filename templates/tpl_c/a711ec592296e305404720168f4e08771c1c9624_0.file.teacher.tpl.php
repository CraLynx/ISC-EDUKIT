<?php
/* Smarty version 3.1.29, created on 2017-09-17 22:33:10
  from "C:\OpenServer\domains\EDUKIT\templates\tpl\teacher.tpl" */

if ($_smarty_tpl->smarty->ext->_validateCompiled->decodeProperties($_smarty_tpl, array (
  'has_nocache_code' => false,
  'version' => '3.1.29',
  'unifunc' => 'content_59becdf6799a56_17565763',
  'file_dependency' => 
  array (
    'a711ec592296e305404720168f4e08771c1c9624' => 
    array (
      0 => 'C:\\OpenServer\\domains\\EDUKIT\\templates\\tpl\\teacher.tpl',
      1 => 1505676789,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:html/begin.tpl' => 1,
    'file:blocks/user_menu.tpl' => 1,
    'file:blocks/guest_menu.tpl' => 1,
    'file:modals/reg_student.tpl' => 1,
    'file:modals/auth.tpl' => 1,
    'file:html/end.tpl' => 1,
  ),
),false)) {
function content_59becdf6799a56_17565763 ($_smarty_tpl) {
$_smarty_tpl->tpl_vars["title"] = new Smarty_Variable("Преподаватели", null);
$_smarty_tpl->ext->_updateScope->updateScope($_smarty_tpl, "title", 0);
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/begin.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <div class="container-fluid">
  
    <?php if ($_smarty_tpl->tpl_vars['user']->value != NULL) {?>
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/user_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php } else { ?>
      <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:blocks/guest_menu.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php }?>
  
    <div class="row">
      <div id="content" class="col-md-12">
        <div id="teachers">
          <?php if ($_smarty_tpl->tpl_vars['teachers']->value != NULL) {?>
            <?php
$_from = $_smarty_tpl->tpl_vars['teachers']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$__foreach_teacher_0_saved_item = isset($_smarty_tpl->tpl_vars['teacher']) ? $_smarty_tpl->tpl_vars['teacher'] : false;
$_smarty_tpl->tpl_vars['teacher'] = new Smarty_Variable();
$_smarty_tpl->tpl_vars['teacher']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['teacher']->value) {
$_smarty_tpl->tpl_vars['teacher']->_loop = true;
$__foreach_teacher_0_saved_local_item = $_smarty_tpl->tpl_vars['teacher'];
?>
              <figure class="teacher">
                <img width="250" src="img/people.jpg" alt="">
                <!-- <img src="http://placehold.it/250" alt=""> -->
                <figcaption><?php echo $_smarty_tpl->tpl_vars['teacher']->value->getSn();?>
 <?php echo $_smarty_tpl->tpl_vars['teacher']->value->getFn();?>
 <?php echo $_smarty_tpl->tpl_vars['teacher']->value->getPt();?>
</figcaption>
              </figure>
            <?php
$_smarty_tpl->tpl_vars['teacher'] = $__foreach_teacher_0_saved_local_item;
}
if ($__foreach_teacher_0_saved_item) {
$_smarty_tpl->tpl_vars['teacher'] = $__foreach_teacher_0_saved_item;
}
?>
          <?php } else { ?>
            <h2>Преподаватели ещё не зарегистрированны</h2>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
  <?php if ($_smarty_tpl->tpl_vars['user']->value == NULL) {?>
    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:modals/reg_student.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <?php $_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:modals/auth.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <?php }
$_smarty_tpl->smarty->ext->_subtemplate->render($_smarty_tpl, "file:html/end.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}