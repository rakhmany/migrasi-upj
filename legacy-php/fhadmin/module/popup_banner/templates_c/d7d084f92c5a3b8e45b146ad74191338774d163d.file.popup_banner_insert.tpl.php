<?php /* Smarty version Smarty-3.1.17, created on 2023-10-13 07:33:52
         compiled from "templates/popup_banner_insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1377715691651a91ad6626f7-81526217%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd7d084f92c5a3b8e45b146ad74191338774d163d' => 
    array (
      0 => 'templates/popup_banner_insert.tpl',
      1 => 1697082803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1377715691651a91ad6626f7-81526217',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_651a91ad6c0809_10895765',
  'variables' => 
  array (
    'data_pbanner_id' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'data_pbanner_date' => 0,
    'data_pbanner_date_end' => 0,
    'optarray' => 0,
    'data_pbanner_status' => 0,
    'data_pbanner_title' => 0,
    'data_pbanner_title_en' => 0,
    'data_pbanner_url' => 0,
    'width' => 0,
    'height' => 0,
    'data_pbanner_pic' => 0,
    'path_file_image' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651a91ad6c0809_10895765')) {function content_651a91ad6c0809_10895765($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/upeje/public_html/fhadmin/lib/smarty/plugins/modifier.date_format.php';
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
				<span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_pbanner_id']->value!='') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
					<li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_pbanner_id']->value!='') {?>Edit<?php } else { ?>Insert<?php }?></li>
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
?data_pbanner_id=<?php echo $_smarty_tpl->tpl_vars['data_pbanner_id']->value;?>
">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-3">
                          <input class="datepicker-input form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_pbanner_date" value="<?php echo $_smarty_tpl->tpl_vars['data_pbanner_date']->value;?>
" size="16" data-date-format="dd-mm-yyyy">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">End Date</label>
                        <div class="col-sm-3">
                          <input class="datepicker-input form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_pbanner_date_end" value="<?php echo $_smarty_tpl->tpl_vars['data_pbanner_date_end']->value;?>
" size="16" data-date-format="dd-mm-yyyy">
                        </div>
                        <label class="col-sm-1 control-label">Status</label>
                        <div class="col-sm-3">
                          <select data-required="true" class="form-control" name="data_pbanner_status">
						  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
							<option value="<?php echo $_smarty_tpl->tpl_vars['optarray']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"<?php if ($_smarty_tpl->tpl_vars['data_pbanner_status']->value==$_smarty_tpl->tpl_vars['optarray']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</option>
						  <?php endfor; endif; ?>
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_pbanner_title" value="<?php echo $_smarty_tpl->tpl_vars['data_pbanner_title']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_pbanner_title_en" value="<?php echo $_smarty_tpl->tpl_vars['data_pbanner_title_en']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Link <small>(optional)</small></label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="http://" name="data_pbanner_url" value="<?php echo $_smarty_tpl->tpl_vars['data_pbanner_url']->value;?>
">
                        </div>
                      </div>
                      
                    </div>
                  </section>
              </div>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Image Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Main Image</label>
                        <div class="col-sm-10">
						  <input type="file"<?php if ($_smarty_tpl->tpl_vars['data_pbanner_id']->value=='') {?> data-required="true"<?php }?> class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_pbanner_pic">
                          <br /><small>[Width : <?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px x <?php echo $_smarty_tpl->tpl_vars['height']->value;?>
px]</small><br />
						  <?php if ($_smarty_tpl->tpl_vars['data_pbanner_pic']->value!='') {?>
						  <div class="thumbnail m-t-xs">
							<a href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_pbanner_pic']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_pbanner_pic']->value;?>
?<?php echo time();?>
" alt=""></a>
							<div class="caption">
							  <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delimage" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Image</button></p>
							</div>
						  </div>
						  <?php }?>
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
						  <?php if ($_smarty_tpl->tpl_vars['data_pbanner_id']->value!='') {?>
						  <input type="hidden" name="data_pbanner_id" value="<?php echo $_smarty_tpl->tpl_vars['data_pbanner_id']->value;?>
">
						  <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-floppy-o"></i> Save</button>
						  <?php } else { ?>
						  <button type="submit" class="btn btn-primary" name="insert"><i class="fa fa-floppy-o"></i> Submit</button>
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
<!-- custom script disini -->
</body>
</html><?php }} ?>
