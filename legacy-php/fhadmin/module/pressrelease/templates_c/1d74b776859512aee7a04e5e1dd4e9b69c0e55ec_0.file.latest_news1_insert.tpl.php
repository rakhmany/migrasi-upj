<?php
/* Smarty version 3.1.31, created on 2017-10-05 13:40:31
  from "/home/upeje/public_html/fhadmin/module/latest_news1/templates/latest_news1_insert.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d5d3df8a0670_48148070',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d74b776859512aee7a04e5e1dd4e9b69c0e55ec' => 
    array (
      0 => '/home/upeje/public_html/fhadmin/module/latest_news1/templates/latest_news1_insert.tpl',
      1 => 1502368988,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../../templates/scale/header_meta.tpl' => 1,
    'file:../../../templates/scale/header.tpl' => 1,
    'file:../../../templates/scale/sidebar.tpl' => 1,
    'file:../../../templates/scale/footer.tpl' => 1,
  ),
),false)) {
function content_59d5d3df8a0670_48148070 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/upeje/public_html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- include style disini -->
</head>
<body class="">
<section class="vbox">
  <?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <section>
    <section class="hbox stretch">
      <?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

      <section id="content">
        <section class="vbox">
          <header class="header bg-white b-b clearfix">
			<div class="row m-t-sm">
			  <div class="col-sm-5 m-b-xs">
				<a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
				<span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_newsid']->value != '') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
					<li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_newsid']->value != '') {?>Edit<?php } else { ?>Insert<?php }?></li>
				  </ul>
				  <!-- / .breadcrumb -->
				</div>
            </div>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
			<div class="alert alert-danger">
			  <button type="button" class="close" data-dismiss="alert">x</button>
			  <i class="fa fa-ok-sign"></i><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

			</div>
			<?php }?>
			
			<form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>
?data_newsid=<?php echo $_smarty_tpl->tpl_vars['data_newsid']->value;?>
">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-3">
                          <input class="datepicker-input form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_newsdate" value="<?php echo $_smarty_tpl->tpl_vars['data_newsdate']->value;?>
" size="16" data-date-format="dd-mm-yyyy">
                        </div>
                        <label class="col-sm-1 control-label">Status</label>
                        <div class="col-sm-3">
                          <select data-required="true" class="form-control" name="data_newsstatus">
						  <?php
$__section_listing_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_listing']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing'] : false;
$__section_listing_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['optarray_status']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_listing_0_total = $__section_listing_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = new Smarty_Variable(array());
if ($__section_listing_0_total != 0) {
for ($__section_listing_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] = 0; $__section_listing_0_iteration <= $__section_listing_0_total; $__section_listing_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']++){
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['optarray_status']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
"<?php if ($_smarty_tpl->tpl_vars['data_newsstatus']->value == $_smarty_tpl->tpl_vars['optarray_status']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray_status']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</option>
						  <?php
}
}
if ($__section_listing_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = $__section_listing_0_saved;
}
?>
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">News Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_newstitle" value="<?php echo $_smarty_tpl->tpl_vars['data_newstitle']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">news Title (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_newstitle_en" value="<?php echo $_smarty_tpl->tpl_vars['data_newstitle_en']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description</label>
                        <div class="col-sm-10">
                         <textarea class="form-control" data-minlength="6" data-maxlength="255" rows="5" cols="50" name="data_newsshortdesc" id="data_newsshortdesc"><?php echo $_smarty_tpl->tpl_vars['data_newsshortdesc']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description (EN)</label>
                        <div class="col-sm-10">
                         <textarea class="form-control" data-minlength="6" data-maxlength="255" rows="5" cols="50" name="data_newsshortdesc_en" id="data_newsshortdesc_en"><?php echo $_smarty_tpl->tpl_vars['data_newsshortdesc_en']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_newsdescription" id="data_newsdescription"><?php echo $_smarty_tpl->tpl_vars['data_newsdescription']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_newsdescription_en" id="data_newsdescription_en"><?php echo $_smarty_tpl->tpl_vars['data_newsdescription_en']->value;?>
</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
              <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>SEO settings</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Meta Tags</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="3" name="data_metatag" id="data_metatag" maxlength="255"><?php echo $_smarty_tpl->tpl_vars['data_metatag']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Meta Description</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="5" name="data_metadescription" id="data_metadescription" data-maxlength="255"><?php echo $_smarty_tpl->tpl_vars['data_metadescription']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Meta Keywords</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="3" name="data_metakeyword" id="data_metakeyword" data-maxlength="255"><?php echo $_smarty_tpl->tpl_vars['data_metakeyword']->value;?>
</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
              <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Image Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Main Image</label>
                        <div class="col-sm-9">
						  <input type="file"<?php if ($_smarty_tpl->tpl_vars['data_newsid']->value == '') {?> data-required="true"<?php }?> class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_mainimage">
                          <br /><small>[Width : <?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px x <?php echo $_smarty_tpl->tpl_vars['height']->value;?>
px]</small><br />
						  <?php if ($_smarty_tpl->tpl_vars['data_newsmainimage']->value != '') {?>
						  <div class="thumbnail m-t-xs">
							<a href="#"><img src="<?php echo $_smarty_tpl->tpl_vars['path_image']->value;
echo $_smarty_tpl->tpl_vars['data_newsmainimage']->value;?>
" alt=""></a>
							<div class="caption">
							  <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delimage" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Main Image</button></p>
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
                    <header class="panel-heading"> <strong>Tags</strong> </header>
                    <div class="panel-body">
					  <div class="form-group">
						<label class="col-sm-2 control-label">Related tags<br /> <button id="addTags" type="button"><i class="fa fa-plus fa-fw"></i> Add tag</button></label>
						<div class="col-sm-10 scrollable wrapper">
						   <div class="">
							<ul class="list-group gutter list-group-lg list-group-sp sortable" id="tags-container">
							  <?php if ($_smarty_tpl->tpl_vars['data_kataterkaitloop']->value > 0) {?>
							  <?php
$__section_list_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_list']) ? $_smarty_tpl->tpl_vars['__smarty_section_list'] : false;
$__section_list_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['data_kataterkait']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_list_1_total = $__section_list_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_list'] = new Smarty_Variable(array());
if ($__section_list_1_total != 0) {
for ($__section_list_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] = 0; $__section_list_1_iteration <= $__section_list_1_total; $__section_list_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']++){
?>
							  <li class="list-group-item bg-warning" draggable="true" id="tag-<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null);?>
">
								<span class="pull-right">
								  <a href="#" onclick="javascript:deleteTag('<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null);?>
');"><i class="fa fa-times fa-fw m-l-sm"></i></a>                  
								</span>
								<span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> &nbsp;</span>
								<div class="clear text-black">
								  <input type="text" class="form-control" name="data_kataterkait[]" value="<?php echo $_smarty_tpl->tpl_vars['data_kataterkait']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_list']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_list']->value['index'] : null)];?>
">
								</div>
							  </li>
							  <?php
}
}
if ($__section_list_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_list'] = $__section_list_1_saved;
}
?>
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
						<div class="col-sm-4 col-sm-offset-5">
						  <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
						  <?php if ($_smarty_tpl->tpl_vars['data_newsid']->value != '') {?>
						  <input type="hidden" name="data_newsid" value="<?php echo $_smarty_tpl->tpl_vars['data_newsid']->value;?>
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
<?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- include spesifik js disini -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/datepicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/file-input/bootstrap-filestyle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/sortable/jquery.sortable.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/adapters/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckfinder/ckfinder.js"><?php echo '</script'; ?>
>
<!-- custom script disini -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
include/js/localscript.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
>
	var index = <?php if ($_smarty_tpl->tpl_vars['data_kataterkaitloop']->value > 0) {
echo $_smarty_tpl->tpl_vars['data_kataterkaitloop']->value;
} else { ?>0<?php }?>;
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
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
