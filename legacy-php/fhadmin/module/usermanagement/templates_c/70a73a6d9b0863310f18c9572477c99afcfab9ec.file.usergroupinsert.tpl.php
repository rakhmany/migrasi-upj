<?php /* Smarty version Smarty-3.1.17, created on 2023-10-12 07:18:29
         compiled from "templates/usergroupinsert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:177547275265279dc543a682-65875167%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '70a73a6d9b0863310f18c9572477c99afcfab9ec' => 
    array (
      0 => 'templates/usergroupinsert.tpl',
      1 => 1697082803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '177547275265279dc543a682-65875167',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_productid' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'data_fh_usergroupid' => 0,
    'data_fh_usergroupname' => 0,
    'list_kategorimenuid' => 0,
    'list_kategorimenuname' => 0,
    'list_menuid' => 0,
    'optmenu' => 0,
    'list_menuname' => 0,
    'thisID' => 0,
    'list_aksestype' => 0,
    'opttype' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_65279dc54c8a83_99586546',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65279dc54c8a83_99586546')) {function content_65279dc54c8a83_99586546($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/upeje/public_html/fhadmin/lib/smarty/plugins/modifier.date_format.php';
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
          <header class="header bg-white b-b clearfix">
			<div class="row m-t-sm">
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-b-xs">
				<a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
				<span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_productid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
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
<?php if ($_smarty_tpl->tpl_vars['data_fh_usergroupid']->value!='') {?>?data_fh_usergroupid=<?php echo $_smarty_tpl->tpl_vars['data_fh_usergroupid']->value;?>
<?php }?>">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      <?php if ($_smarty_tpl->tpl_vars['data_fh_usergroupid']->value!='') {?>
					  <div class="form-group">
                        <label class="col-sm-2 control-label">ID</label>
                        <div class="col-sm-6">
                          <input type="hidden" name="data_fh_usergroupid" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_usergroupid']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['data_fh_usergroupid']->value;?>

                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
					  <?php }?>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">User Group Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="name" name="data_fh_usergroupname" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_usergroupname']->value;?>
">
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Access</strong> </header>
                    <div class="panel-body">
                      <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list_kategorimenuid']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
					  <div class="row row-sm">
						<section class="panel panel-default m-t-sm">
							<header class="panel-heading"><?php echo $_smarty_tpl->tpl_vars['list_kategorimenuname']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']];?>
</header>
							<div class="panel-body">
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['name'] = 'list1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total']);
?>
								<?php if (isset($_smarty_tpl->tpl_vars['thisID'])) {$_smarty_tpl->tpl_vars['thisID'] = clone $_smarty_tpl->tpl_vars['thisID'];
$_smarty_tpl->tpl_vars['thisID']->value = $_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']]; $_smarty_tpl->tpl_vars['thisID']->nocache = null; $_smarty_tpl->tpl_vars['thisID']->scope = 0;
} else $_smarty_tpl->tpl_vars['thisID'] = new Smarty_variable($_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']], null, 0);?>
								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
									<section class="panel panel-default m-t-sm bg-dark">
										<header class="panel-heading">
											<input class="selectallsub" data-subcheckbox="subchk-<?php echo $_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']];?>
" type="checkbox" name="optmenu[]" value="<?php echo $_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']];?>
"
											  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['name'] = 'list2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optmenu']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total']);
?>  
											  <?php if ($_smarty_tpl->tpl_vars['optmenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list2']['index']]==$_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']]) {?>checked<?php }?>
											  <?php endfor; endif; ?>
											/> <?php echo $_smarty_tpl->tpl_vars['list_menuname']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']];?>

										</header>
										<div class="panel-body" id="<?php echo $_smarty_tpl->tpl_vars['thisID']->value;?>
">
											<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list3'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['name'] = 'list3';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list_aksestype']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total']);
?> 
												<div class="col-xs-4 col-sm-4">
													<input class="subchk-<?php echo $_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']];?>
" type="checkbox" name="opttype[<?php echo $_smarty_tpl->tpl_vars['thisID']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['list_aksestype']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list3']['index']];?>
"
														  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list4'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['name'] = 'list4';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['opttype']->value[$_smarty_tpl->tpl_vars['thisID']->value]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total']);
?>
														  <?php if ($_smarty_tpl->tpl_vars['opttype']->value[$_smarty_tpl->tpl_vars['thisID']->value][$_smarty_tpl->getVariable('smarty')->value['section']['list4']['index']]==$_smarty_tpl->tpl_vars['list_aksestype']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list3']['index']]) {?>checked<?php }?>
														  <?php endfor; endif; ?>
													/> <?php if ($_smarty_tpl->tpl_vars['list_aksestype']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list3']['index']]=='A') {?>Add<?php } elseif ($_smarty_tpl->tpl_vars['list_aksestype']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list3']['index']]=='E') {?>Edit<?php } else { ?>Delete<?php }?>
												</div>
											<?php endfor; endif; ?>
										</div>
									</section>
								</div>
								<?php endfor; endif; ?>
							</div>
						</section>
						<div class="clearfix visible-xs"></div>
					  </div>
					  <?php endfor; endif; ?>
					  <!-- <div class="row row-sm">
						Note:<br />
						A = Add access<br />
						E = Edit access<br />
						D = Delete access<br />
					  </div> -->
					  
					  
					  <!-- <div class="form-group">
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list_kategorimenuid']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list']['total']);
?>
						<div id="tabelaksesclear" style="clear:both;"><br><span class="bold"><?php echo $_smarty_tpl->tpl_vars['list_kategorimenuname']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']];?>
</span></div>

							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list1'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['name'] = 'list1';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list1']['total']);
?>
								<?php if (isset($_smarty_tpl->tpl_vars['thisID'])) {$_smarty_tpl->tpl_vars['thisID'] = clone $_smarty_tpl->tpl_vars['thisID'];
$_smarty_tpl->tpl_vars['thisID']->value = $_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']]; $_smarty_tpl->tpl_vars['thisID']->nocache = null; $_smarty_tpl->tpl_vars['thisID']->scope = 0;
} else $_smarty_tpl->tpl_vars['thisID'] = new Smarty_variable($_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']], null, 0);?>
								<div id="tabelaksesright" style="border:1px solid black; margin:5px; padding:5px;">
								<input onClick="javascript: SetAllSubCheckBoxes('form', this.checked, this.value)" type="checkbox" name="optmenu[]" value="<?php echo $_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']];?>
"
									  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list2'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['name'] = 'list2';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optmenu']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list2']['total']);
?>  
									  <?php if ($_smarty_tpl->tpl_vars['optmenu']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list2']['index']]==$_smarty_tpl->tpl_vars['list_menuid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']]) {?>checked<?php }?>
									  <?php endfor; endif; ?>
								/><?php echo $_smarty_tpl->tpl_vars['list_menuname']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']];?>
<br>
								<hr style="border:1px solid black; margin-left:5px; margin-right:5px;" />
									<span class="col-md-4" id="<?php echo $_smarty_tpl->tpl_vars['thisID']->value;?>
">
									<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list3'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['name'] = 'list3';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list_aksestype']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list3']['total']);
?> 
									<input type="checkbox" name="opttype[<?php echo $_smarty_tpl->tpl_vars['thisID']->value;?>
][]" value="<?php echo $_smarty_tpl->tpl_vars['list_aksestype']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list3']['index']];?>
"
										  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list4'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['name'] = 'list4';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['opttype']->value[$_smarty_tpl->tpl_vars['thisID']->value]) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['list4']['total']);
?>
										  <?php if ($_smarty_tpl->tpl_vars['opttype']->value[$_smarty_tpl->tpl_vars['thisID']->value][$_smarty_tpl->getVariable('smarty')->value['section']['list4']['index']]==$_smarty_tpl->tpl_vars['list_aksestype']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list3']['index']]) {?>checked<?php }?>
										  <?php endfor; endif; ?>
									/> <?php echo $_smarty_tpl->tpl_vars['list_aksestype']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list1']['index']][$_smarty_tpl->getVariable('smarty')->value['section']['list3']['index']];?>

									<?php endfor; endif; ?>
									</span>
								</div>
							<?php endfor; endif; ?>

						<div id="tabelaksesclear" style="clear:both;"></div>
						<?php endfor; endif; ?><br />
						<div id="tabelaksesclear" style="clear:both;"></div>
						Note:<br />
						A = Add access<br />
						E = Edit access<br />
						D = Delete access<br />
                      </div> -->
                      <div class="line line-dashed b-b line-lg pull-in"></div>
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
						  <?php if ($_smarty_tpl->tpl_vars['data_fh_usergroupid']->value=='') {?>
						  <button type="submit" class="btn btn-primary" name="insert" value="Add"><i class="fa fa-floppy-o"></i> Submit</button>
						  <?php } else { ?>
						  <input type="hidden" name="data_fh_usergroupid" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_usergroupid']->value;?>
">
						  <button type="submit" class="btn btn-primary" name="edit" value="edit"><i class="fa fa-floppy-o"></i> Save</button>
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
<!-- custom script disini -->

<script type="text/javascript">

/*
// Old check all script
// sample =>
// onClick="javascript: SetAllSubCheckBoxes('form', this.checked, this.value)"
// 
function SetAllSubCheckBoxes(FormName, FieldName, ThisValue)
{	
	if ((FieldName)==true) {var CheckValue= true;}
  	else {var CheckValue= false;}
	if(!document.forms[FormName]){
		return;}
	var objCheckBoxes = document.getElementById(ThisValue).childNodes;
		//alert (objCheckBoxes);	
	if(!objCheckBoxes) {
		return;
	}
	var countCheckBoxes = objCheckBoxes.length;
	//alert (countCheckBoxes);	
	if(!countCheckBoxes){
		this.checked = CheckValue; 
		//alert (ThisValue);
	}
	else{
		// set the check value for all check boxes	
		for(var i = 0; i < countCheckBoxes; i++) {
			if (typeof objCheckBoxes[i].name == 'undefined') { 	}
			else { objCheckBoxes[i].checked = CheckValue; }
				
		}
	} /**/
}
*/
</script>

</body>
</html><?php }} ?>
