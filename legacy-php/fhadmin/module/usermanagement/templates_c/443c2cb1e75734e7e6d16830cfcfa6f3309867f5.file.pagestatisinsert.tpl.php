<?php /* Smarty version Smarty-3.1.17, created on 2026-03-05 15:59:48
         compiled from "templates/pagestatisinsert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:158182227565277325d1c2e2-66509155%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '443c2cb1e75734e7e6d16830cfcfa6f3309867f5' => 
    array (
      0 => 'templates/pagestatisinsert.tpl',
      1 => 1772074796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '158182227565277325d1c2e2-66509155',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_65277325db40c1_74416547',
  'variables' => 
  array (
    'data_productid' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'fh_basicconfigid' => 0,
    'fh_menu_name' => 0,
    'fh_menu_name_en' => 0,
    'optarray_menucat' => 0,
    'fh_menu_catselected' => 0,
    'optarray_strukturcontentstatus' => 0,
    'fh_strukturcontentstatus' => 0,
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
    'optarray_kolomtype' => 0,
    'fh_coloumn_count' => 0,
    'fh_content_description' => 0,
    'fh_content_description_en' => 0,
    'fh_content_description2' => 0,
    'fh_content_description2_en' => 0,
    'fh_content_description3' => 0,
    'fh_content_description3_en' => 0,
    'data_kataterkaitloop' => 0,
    'data_kataterkait' => 0,
    'flag1' => 0,
    'fh_strukturid' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65277325db40c1_74416547')) {function content_65277325db40c1_74416547($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include '/home/website/upjupjac/fhadmin/lib/smarty/plugins/function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include '/home/website/upjupjac/fhadmin/lib/smarty/plugins/modifier.date_format.php';
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
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-8">
							
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
			
            <div class="row" id="statusmenu1">
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
                      
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row" id="statusmenu2">
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
                        <label class="col-sm-2 control-label">Coloumn Type</label>
                        <div class="col-sm-2">
                        	<select name="fh_coloumn_count" id="fh_coloumn_count" class="form-control" onchange="javascript: kolom_change(); " >
                          		<?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['optarray_kolomtype']->value,'selected'=>$_smarty_tpl->tpl_vars['fh_coloumn_count']->value),$_smarty_tpl);?>

                          	</select>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            
			
            <div class="row" id="kolom_satu">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Kolom 1</strong> </header>
                    <div class="panel-body"> 
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
            <div class="row" id="kolom_dua">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Kolom 2</strong> </header>
                    <div class="panel-body"> 
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description2" id="fh_content_description2"><?php echo $_smarty_tpl->tpl_vars['fh_content_description2']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description2_en" id="fh_content_description2_en"><?php echo $_smarty_tpl->tpl_vars['fh_content_description2_en']->value;?>
</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
            <div class="row" id="kolom_tiga">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Kolom 3</strong> </header>
                    <div class="panel-body"> 
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description3" id="fh_content_description3"><?php echo $_smarty_tpl->tpl_vars['fh_content_description3']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description3_en" id="fh_content_description3_en"><?php echo $_smarty_tpl->tpl_vars['fh_content_description3_en']->value;?>
</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
            
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Tags</strong> </header>
                    <div class="panel-body">
					  <div class="form-group">
						<label class="col-sm-2 control-label">Related tags<br /> <button id="addTags" type="button"><i class="fa fa-plus fa-fw"></i> Add tag</button></label>
						<div class="col-sm-10 scrollable wrapper">
						   <div class="">
							<ul class="list-group gutter list-group-lg list-group-sp sortable" id="tags-container">
							  <?php if ($_smarty_tpl->tpl_vars['data_kataterkaitloop']->value>0) {?>
							  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['data_kataterkait']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
							  <li class="list-group-item bg-warning" draggable="true" id="tag-<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['index'];?>
">
								<span class="pull-right">
								  <a href="#" onclick="javascript:deleteTag('<?php echo $_smarty_tpl->getVariable('smarty')->value['section']['list']['index'];?>
');"><i class="fa fa-times fa-fw m-l-sm"></i></a>                  
								</span>
								<span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> &nbsp;</span>
								<div class="clear text-black">
								  <input type="text" class="form-control" name="data_kataterkait[]" value="<?php echo $_smarty_tpl->tpl_vars['data_kataterkait']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']];?>
">
								</div>
							  </li>
							  <?php endfor; endif; ?>
							  <?php }?>
							</ul>
						  </div>
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

function kolom_change(){
	var objMethod = document.getElementById('fh_coloumn_count');
	var objFaberHost1 = document.getElementById('kolom_satu'); 
	var objFaberHost2 = document.getElementById('kolom_dua');
	var objFaberHost3 = document.getElementById('kolom_tiga');
	var method = objMethod.value;	
	
	objFaberHost1.style.display	='';
	objFaberHost2.style.display	='none';
	objFaberHost3.style.display	='none';
		
	if(method >= 1  ){ 
		objFaberHost2.style.display	='';
		 
    } 
    if(method >= 2  ){ 
		objFaberHost3.style.display	='';
		 
    }  
}
kolom_change();
</script>

<script>
	var index = <?php if ($_smarty_tpl->tpl_vars['data_kataterkaitloop']->value>0) {?><?php echo $_smarty_tpl->tpl_vars['data_kataterkaitloop']->value;?>
<?php } else { ?>0<?php }?>;
	$(document).ready(function(){
		$('#addTags').on('click', function(){
			var tpl = '<li class="list-group-item bg-warning" draggable="true" id="tag-'+index+'">'+
						'<span class="pull-right">'+
						'  <a href="#" onclick="javascript:deleteTag(\''+index+'\');"><i class="fa fa-times fa-fw m-l-sm"></i></a>'+            
						'</span>'+
						'<span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> &nbsp;</span>'+
						'<div class="clear text-black">'+
						'  <input class="form-control" type="text" name="data_kataterkait[]" size="30" value="">'+
						'</div>'+
					  '</li>';
			
			$('#tags-container').append(tpl).sortable('refresh');
			index++;
			return;
		});
	});
	
	function deleteTag(i){
		$('#tag-'+i).remove();
	}
</script>



</body>
</html><?php }} ?>
