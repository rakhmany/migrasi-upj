<?php
/* Smarty version 3.1.31, created on 2022-05-10 10:06:33
  from "/home/upeje/public_html/fhadmin/templates/scale/header_meta.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_6279d6b914acb4_15271648',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e285425d91546b334094e16003773bc1adfefe44' => 
    array (
      0 => '/home/upeje/public_html/fhadmin/templates/scale/header_meta.tpl',
      1 => 1633933103,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6279d6b914acb4_15271648 (Smarty_Internal_Template $_smarty_tpl) {
?>

  <meta charset="utf-8" />
  <title><?php echo $_smarty_tpl->tpl_vars['project_name']->value;?>
 - <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
  <meta name="description" content="app, web app, responsive, admin dashboard, admin, flat, flat ui, ui kit, off screen nav" />
  
  <!-- <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />  -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
  <meta name="MobileOptimized" content="320">
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
css/bootstrap.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
css/animate.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
css/font-awesome.min.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
css/icon.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
css/font.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
css/app.css" type="text/css" /> 
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/chosen/chosen.css" type="text/css" /> 
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/select2/select2.min.css" type="text/css" /> 
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/datepicker/datepicker.css" type="text/css" />
  <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/spinner/jquery.bootstrap-touchspin.css" type="text/css" />
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
include/js/delete_script.js"><?php echo '</script'; ?>
>
  <!--[if lt IE 9]>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/ie/html5shiv.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/ie/respond.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/ie/excanvas.js"><?php echo '</script'; ?>
>
  <![endif]--><?php }
}
