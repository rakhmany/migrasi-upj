<?php /* Smarty version Smarty-3.1.17, created on 2026-03-31 11:16:15
         compiled from "templates/b_progstudi_insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1321265179651d150c755fe0-52456133%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '93dde2622ee0cedba92746e9ea4c103a1e1616a5' => 
    array (
      0 => 'templates/b_progstudi_insert.tpl',
      1 => 1772074786,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1321265179651d150c755fe0-52456133',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_651d150c8fe4f5_64790475',
  'variables' => 
  array (
    'data_progid' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'optarray' => 0,
    'data_progstatus' => 0,
    'data_progdate' => 0,
    'data_progtitle' => 0,
    'data_progtitle_en' => 0,
    'data_progtujuan' => 0,
    'data_progtujuan_en' => 0,
    'data_progvisi' => 0,
    'data_progvisi_en' => 0,
    'data_progmisi' => 0,
    'data_progmisi_en' => 0,
    'data_progurl' => 0,
    'width' => 0,
    'height' => 0,
    'data_progpic' => 0,
    'path_file_image' => 0,
    'width2' => 0,
    'height2' => 0,
    'data_progpic2' => 0,
    'array_levels' => 0,
    'data_level' => 0,
    'array_interests' => 0,
    'data_interest' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651d150c8fe4f5_64790475')) {function content_651d150c8fe4f5_64790475($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_checkboxes')) include '/home/website/upjupjac/fhadmin/lib/smarty/plugins/function.html_checkboxes.php';
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
				<span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_progid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
					<li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_progid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?></li>
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
?data_progid=<?php echo $_smarty_tpl->tpl_vars['data_progid']->value;?>
">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-3">
                          <select data-required="true" class="form-control" name="data_progstatus">
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
"<?php if ($_smarty_tpl->tpl_vars['data_progstatus']->value==$_smarty_tpl->tpl_vars['optarray']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</option>
						  <?php endfor; endif; ?>
						  </select>
						  <input type="hidden" name="data_progdate" value="<?php echo $_smarty_tpl->tpl_vars['data_progdate']->value;?>
" />
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" name="data_progtitle" value="<?php echo $_smarty_tpl->tpl_vars['data_progtitle']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" name="data_progtitle_en" value="<?php echo $_smarty_tpl->tpl_vars['data_progtitle_en']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tujuan</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_progtujuan" id="data_progtujuan"><?php echo $_smarty_tpl->tpl_vars['data_progtujuan']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tujuan (EN)</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_progtujuan_en" id="data_progtujuan_en"><?php echo $_smarty_tpl->tpl_vars['data_progtujuan_en']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Visi</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_progvisi" id="data_progvisi"><?php echo $_smarty_tpl->tpl_vars['data_progvisi']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Visi (EN)</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_progvisi_en" id="data_progvisi_en"><?php echo $_smarty_tpl->tpl_vars['data_progvisi_en']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Misi</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_progmisi" id="data_progmisi"><?php echo $_smarty_tpl->tpl_vars['data_progmisi']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Misi (EN)</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_progmisi_en" id="data_progmisi_en"><?php echo $_smarty_tpl->tpl_vars['data_progmisi_en']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Link</label>
                        <div class="col-sm-6">
                          <input type="text" data-required="true" class="form-control" placeholder="http://" name="data_progurl" value="<?php echo $_smarty_tpl->tpl_vars['data_progurl']->value;?>
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
                        <label class="col-sm-2 control-label">Main Logo</label>
                        <div class="col-sm-10">
						  <input type="file"<?php if ($_smarty_tpl->tpl_vars['data_progid']->value=='') {?> data-required="true"<?php }?> class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_progpic">
                          <br /><small>[Width : <?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px x <?php echo $_smarty_tpl->tpl_vars['height']->value;?>
px]</small><br />
						  <?php if ($_smarty_tpl->tpl_vars['data_progpic']->value!='') {?>
						  <div class="thumbnail m-t-xs">
							<a href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_progpic']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_progpic']->value;?>
?<?php echo time();?>
" alt=""></a>
							<div class="caption">
							  <!-- <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delimage" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Image</button></p> -->
							</div>
						  </div>
						  <?php }?>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Top Banner</label>
                        <div class="col-sm-10">
						  <input type="file"<?php if ($_smarty_tpl->tpl_vars['data_progid']->value=='') {?> data-required="true"<?php }?> class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_progpic2">
                          <br /><small>[Width : <?php echo $_smarty_tpl->tpl_vars['width2']->value;?>
px x <?php echo $_smarty_tpl->tpl_vars['height2']->value;?>
px]</small><br />
						  <?php if ($_smarty_tpl->tpl_vars['data_progpic2']->value!='') {?>
						  <div class="thumbnail m-t-xs">
							<a href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_progpic2']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_progpic2']->value;?>
?<?php echo time();?>
" alt=""></a>
							<div class="caption">
							  <!-- <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delimage" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Image</button></p> -->
							</div>
						  </div>
						  <?php }?>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
            
            
            <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Filtering</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Level</label>
                        <div class="col-sm-10">
						   	<?php echo smarty_function_html_checkboxes(array('name'=>'data_level','options'=>$_smarty_tpl->tpl_vars['array_levels']->value,'selected'=>$_smarty_tpl->tpl_vars['data_level']->value,'separator'=>'<br />'),$_smarty_tpl);?>

                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Interests</label>
                        <div class="col-sm-10">
						    <?php echo smarty_function_html_checkboxes(array('name'=>'data_interest','options'=>$_smarty_tpl->tpl_vars['array_interests']->value,'selected'=>$_smarty_tpl->tpl_vars['data_interest']->value,'separator'=>'<br />'),$_smarty_tpl);?>

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
						  <?php if ($_smarty_tpl->tpl_vars['data_progid']->value!='') {?>
						  <input type="hidden" name="data_progid" value="<?php echo $_smarty_tpl->tpl_vars['data_progid']->value;?>
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
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/ckeditor.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckfinder/ckfinder.js"></script>
<!-- custom script disini -->
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
include/js/localscript.js"></script>
</body>
</html><?php }} ?>
