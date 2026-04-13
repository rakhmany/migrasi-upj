<?php /* Smarty version Smarty-3.1.17, created on 2023-09-02 18:46:51
         compiled from "templates\pagestatisinsert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2329364f366fb52d594-80678815%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ac2058ebd348342aa95bd0d24a4cb19503378446' => 
    array (
      0 => 'templates\\pagestatisinsert.tpl',
      1 => 1415460650,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2329364f366fb52d594-80678815',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_productid' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'fh_basicconfigid' => 0,
    'strukturmenu' => 0,
    'fh_menu_name' => 0,
    'fh_menu_name_en' => 0,
    'optarray_strukturparenttipe' => 0,
    'fh_strukturparenttipe' => 0,
    'optarray_menucat' => 0,
    'fh_menu_catselected' => 0,
    'optarray_strukturcontentstatus' => 0,
    'fh_strukturcontentstatus' => 0,
    'optarray_strukturcontenttipe' => 0,
    'fh_strukturcontenttipe' => 0,
    'fh_menu_pageheader' => 0,
    'fh_menu_pageheader_en' => 0,
    'fh_menu_metakeyword' => 0,
    'fh_menu_metadescription' => 0,
    'fh_content_title' => 0,
    'fh_content_title_en' => 0,
    'width' => 0,
    'height' => 0,
    'fh_content_banner' => 0,
    'path_image' => 0,
    'fh_content_description' => 0,
    'fh_content_description_en' => 0,
    'fh_modulefilename' => 0,
    'flag1' => 0,
    'fh_strukturid' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_64f366fb5f4df4_29640338',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64f366fb5f4df4_29640338')) {function content_64f366fb5f4df4_29640338($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\upjnew\\fhadmin\\lib\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en" class="app">
<head>
<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- include style disini -->
</head>
<body class="">
<section class="vbox">
  <?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <section>
    <section class="hbox stretch">
      <?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <section id="content">
        <section class="vbox">
          <header class="header bg-info b-b clearfix">
			<div class="row m-t-sm">
			  <div class="col-sm-5 m-b-xs">
				<a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
				<span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_productid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
			  </div>
			  <div class="col-sm-7 m-b-xs">
				&nbsp;
			  </div>
			</div>
          </header>
          <section class="scrollable wrapper w-f">
            <!-- <p class="h4">Contents...</p>
            <div class="m-b-md">
              <h3 class="m-b-none">Basic Configuration</h3>
            </div> -->
            <div class="row">
				<div class="col-lg-12">
				  <!-- .breadcrumb -->
				  <ul class="breadcrumb">
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
"><i class="fa fa-list-ul"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a></li>
					<li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_productid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?></li>
				  </ul>
				  <!-- / .breadcrumb -->
				</div>
            </div>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value!='') {?>
			<div class="alert alert-danger">
			  <button type="button" class="close" data-dismiss="alert">x</button>
			  <i class="fa fa-ok-sign"></i><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

			</div>
			<?php }?>
			
			<form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>
<?php if ($_smarty_tpl->tpl_vars['fh_basicconfigid']->value!='') {?>?fh_basicconfigid=<?php echo $_smarty_tpl->tpl_vars['fh_basicconfigid']->value;?>
<?php }?>">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Parent</label>
                        <div class="col-sm-6">
                          <select class="form-control" name="coremenu" id="coremenu">
							<option value=""> = Root = </option>
							<?php echo $_smarty_tpl->tpl_vars['strukturmenu']->value;?>

						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Menu Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="name" name="fh_menu_name" value="<?php echo $_smarty_tpl->tpl_vars['fh_menu_name']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Menu Name (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="name" name="fh_menu_name_en" value="<?php echo $_smarty_tpl->tpl_vars['fh_menu_name_en']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Menu Type</label>
                        <div class="col-sm-6">
                          <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray_strukturparenttipe']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total']);
?>
							<label class="radio-inline i-checks">
							  <input type="radio" 
									name="fh_strukturparenttipe"
									id="fh_strukturtipeid<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['listing']['index'];?>
" 
									onClick="javascript:method_change('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['listing']['index'];?>
');" 
									value="<?php echo $_smarty_tpl->tpl_vars['optarray_strukturparenttipe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" 
									<?php if ($_smarty_tpl->tpl_vars['fh_strukturparenttipe']->value==$_smarty_tpl->tpl_vars['optarray_strukturparenttipe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> checked <?php }?>
							  /><i></i> <?php echo $_smarty_tpl->tpl_vars['optarray_strukturparenttipe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
 
							</label>
						   <?php endfor; endif; ?>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-8">
							<!-- <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray_menucat']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total']);
?>
								<label class="checkbox-inline i-checks">
								  <input name="fh_menu_cat[]" type="checkbox" value="<?php echo $_smarty_tpl->tpl_vars['optarray_menucat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['name'] = 'listing2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['fh_menu_catselected']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total']);
?>
									<?php if ($_smarty_tpl->tpl_vars['fh_menu_catselected']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing2']['index']]==$_smarty_tpl->tpl_vars['optarray_menucat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> checked<?php }?>
									<?php endfor; endif; ?>
								  /><i></i> <?php echo $_smarty_tpl->tpl_vars['optarray_menucat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>

								</label>
							<?php endfor; endif; ?> -->
							<select name="fh_menu_cat[]" style="width:100%" multiple class="chosen-select">
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray_menucat']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total']);
?>
							  <option value="<?php echo $_smarty_tpl->tpl_vars['optarray_menucat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['name'] = 'listing2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['fh_menu_catselected']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing2']['total']);
?>
								<?php if ($_smarty_tpl->tpl_vars['fh_menu_catselected']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing2']['index']]==$_smarty_tpl->tpl_vars['optarray_menucat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> selected<?php }?>
								<?php endfor; endif; ?>
								><?php echo $_smarty_tpl->tpl_vars['optarray_menucat']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</option>
							<?php endfor; endif; ?>
							</select>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row" id="statusmenu1" <?php if ($_smarty_tpl->tpl_vars['fh_strukturparenttipe']->value=='Parent') {?> style="display:none;"<?php }?>>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Content Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-2">
							<select class="form-control" name="fh_strukturstatus">
                             <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray_strukturcontentstatus']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total']);
?>
                                <option 
                                    value="<?php echo $_smarty_tpl->tpl_vars['optarray_strukturcontentstatus']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" 
                                    <?php if ($_smarty_tpl->tpl_vars['fh_strukturcontentstatus']->value==$_smarty_tpl->tpl_vars['optarray_strukturcontentstatus']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> selected <?php }?>
                                 ><?php echo $_smarty_tpl->tpl_vars['optarray_strukturcontentstatus']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</option>
                            <?php endfor; endif; ?>
                            </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Content Type</label>
                        <div class="col-sm-3">
							<select class="form-control" name="fh_strukturcontenttipe" onChange="javascript:method_change_content(this);">
                                <option value='' >-- Choose One --</option>
                                <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray_strukturcontenttipe']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total']);
?>
                                <option 
                                    id="fh_strukturcontenttipeid<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['listing']['index'];?>
" 
                                    value="<?php echo $_smarty_tpl->tpl_vars['optarray_strukturcontenttipe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" 
                                    <?php if ($_smarty_tpl->tpl_vars['fh_strukturcontenttipe']->value==$_smarty_tpl->tpl_vars['optarray_strukturcontenttipe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> selected <?php }?>
                                 ><?php echo $_smarty_tpl->tpl_vars['optarray_strukturcontenttipe']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</option>
                                <?php endfor; endif; ?>
                            </select>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row" id="statusmenu2"  <?php if (($_smarty_tpl->tpl_vars['fh_strukturparenttipe']->value=='Parent')||($_smarty_tpl->tpl_vars['fh_strukturcontenttipe']->value=='Module')||($_smarty_tpl->tpl_vars['fh_strukturcontenttipe']->value=='')) {?> style="display:none;" <?php }?>>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Page Static Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Page Header</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Page Header" name="fh_menu_pageheader" value="<?php echo $_smarty_tpl->tpl_vars['fh_menu_pageheader']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Page Header (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Page Header" name="fh_menu_pageheader_en" value="<?php echo $_smarty_tpl->tpl_vars['fh_menu_pageheader_en']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Meta Keyword <small>(optional)</small></label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="fh_menu_metakeyword" id="fh_menu_metakeyword" cols="50" rows="6" data-maxlength="255"><?php echo $_smarty_tpl->tpl_vars['fh_menu_metakeyword']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Meta Description (EN) <small>(optional)</small></label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="fh_menu_metadescription" id="fh_menu_metadescription" cols="50" rows="6" data-maxlength="255"><?php echo $_smarty_tpl->tpl_vars['fh_menu_metadescription']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="title" name="fh_content_title" value="<?php echo $_smarty_tpl->tpl_vars['fh_content_title']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="title" name="fh_content_title_en" value="<?php echo $_smarty_tpl->tpl_vars['fh_content_title_en']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Banner Image</label>
                        <div class="col-sm-10">
						  <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="fh_content_banner">
                          <br /><small>[Width : <?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px x <?php echo $_smarty_tpl->tpl_vars['height']->value;?>
px]</small><br />
						  <?php if ($_smarty_tpl->tpl_vars['fh_content_banner']->value!='') {?>
						  <div class="thumbnail m-t-xs">
							<a href="<?php echo $_smarty_tpl->tpl_vars['path_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['fh_content_banner']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['fh_content_banner']->value;?>
?<?php echo time();?>
" alt=""></a>
							<div class="caption">
							  <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delbanner" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Banner</button></p>
							</div>
						  </div>
						  <?php }?>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description" id="fh_content_description"><?php echo $_smarty_tpl->tpl_vars['fh_content_description']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description_en" id="fh_content_description_en"><?php echo $_smarty_tpl->tpl_vars['fh_content_description_en']->value;?>
</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row" id="statusmenu3" <?php if (($_smarty_tpl->tpl_vars['fh_strukturparenttipe']->value=='Parent')||($_smarty_tpl->tpl_vars['fh_strukturcontenttipe']->value=='Statis')||($_smarty_tpl->tpl_vars['fh_strukturcontenttipe']->value=='')) {?> style="display:none;" <?php }?>>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Module Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">File Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Custom link" name="fh_modulefilename" value="<?php echo $_smarty_tpl->tpl_vars['fh_modulefilename']->value;?>
" maxlength="255">
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Actions</strong> </header>
                    <div class="panel-body">
					  <div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
						  <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
						  <?php if ($_smarty_tpl->tpl_vars['flag1']->value=='insert') {?>
						  <button type="submit" class="btn btn-primary" name="insertmenu" value="Add"><i class="fa fa-floppy-o"></i> Submit</button>
						  <?php } else { ?>
						  <input type="hidden" name="fh_strukturid" value="<?php echo $_smarty_tpl->tpl_vars['fh_strukturid']->value;?>
">
						  <button type="submit" class="btn btn-primary" name="editmenu" value="edit"><i class="fa fa-floppy-o"></i> Save</button>
						  <?php }?>
						</div>
					  </div>
                    </div>
                  </section>
              </div>
            </div>
            </form>
			
          </section>
          <footer class="footer bg-white b-t b-light">
            <p>Copyright <?php echo smarty_modifier_date_format(time(),"%Y");?>
 - All rights reserved by faberhost.com</p>
          </footer>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
	  </section>
    </section>
  </section>
</section>
<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- include spesifik js disini -->
<script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/file-input/bootstrap-filestyle.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/ckeditor.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckfinder/ckfinder.js"></script>
<!-- custom script disini -->
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
include/js/localscript.js"></script>

<script type="text/javascript">
function method_change(index){
	var objMethod = document.getElementById('fh_strukturtipeid' + index);
	var objFaberHost1 = document.getElementById('statusmenu1'); 
	var objFaberHost2 = document.getElementById('statusmenu2');
	var objFaberHost3 = document.getElementById('statusmenu3');
	var method = objMethod.value;	

	if(method == 'Parent'){
		objFaberHost1.style.display	='none';
		objFaberHost2.style.display	='none';
		objFaberHost3.style.display	='none';
        window.document.form.fh_strukturcontenttipe.value = '';
    } else {
 		objFaberHost1.style.display	='';
    }
}

function method_change_content(index){
	
	//index = $("#"+indexxxx).val();
	//var objMethod = document.getElementById('fh_strukturcontenttipeid' + index);
	/// Modified By: Bambang (Support Chrome)
	var objFaberHost2 = document.getElementById('statusmenu2');
	var objFaberHost3 = document.getElementById('statusmenu3');
	var method = index.value;//objMethod.value;	

	if(method == 'Statis'){
		objFaberHost2.style.display	='';
		objFaberHost3.style.display	='none';
    } else {
		objFaberHost2.style.display	='none';
		objFaberHost3.style.display	='';
    }
}

function method_change_content_default(index){
	var objFaberHost2 = document.getElementById('statusmenu2');
	var objFaberHost3 = document.getElementById('statusmenu3');
	objFaberHost2.style.display	='none';
	objFaberHost3.style.display	='none';
}

</script>

</body>
</html><?php }} ?>
