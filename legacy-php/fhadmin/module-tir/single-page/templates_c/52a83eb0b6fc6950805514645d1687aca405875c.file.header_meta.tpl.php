<?php /* Smarty version Smarty-3.1.17, created on 2023-01-02 22:34:02
         compiled from "/home/mitrasof/public_html/integrasi/fhadmin/templates/scale/header_meta.tpl" */ ?>
<?php /*%%SmartyHeaderCode:154341865663b2f96add4137-86467382%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52a83eb0b6fc6950805514645d1687aca405875c' => 
    array (
      0 => '/home/mitrasof/public_html/integrasi/fhadmin/templates/scale/header_meta.tpl',
      1 => 1415458518,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '154341865663b2f96add4137-86467382',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'project_name' => 0,
    'title' => 0,
    'themesurl_admin' => 0,
    'baseurl_admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_63b2f96aded4c1_80938801',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_63b2f96aded4c1_80938801')) {function content_63b2f96aded4c1_80938801($_smarty_tpl) {?>
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
js/datepicker/datepicker.css" type="text/css" />
  <script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
include/js/delete_script.js"></script>
  <!--[if lt IE 9]>
    <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/ie/html5shiv.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/ie/respond.min.js"></script>
    <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/ie/excanvas.js"></script>
  <![endif]--><?php }} ?>
