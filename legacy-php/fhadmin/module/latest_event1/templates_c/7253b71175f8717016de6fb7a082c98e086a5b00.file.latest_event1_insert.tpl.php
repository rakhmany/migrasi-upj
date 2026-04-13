<?php /* Smarty version Smarty-3.1.17, created on 2023-09-20 21:43:06
         compiled from "templates\latest_event1_insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12513650b4b4ac7c250-93476586%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7253b71175f8717016de6fb7a082c98e086a5b00' => 
    array (
      0 => 'templates\\latest_event1_insert.tpl',
      1 => 1692918962,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12513650b4b4ac7c250-93476586',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_eventid' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'data_eventdate' => 0,
    'optarray_status' => 0,
    'data_eventstatus' => 0,
    'data_eventtitle' => 0,
    'data_eventtitle_en' => 0,
    'data_eventshortdesc' => 0,
    'data_eventshortdesc_en' => 0,
    'data_eventdescription' => 0,
    'data_eventdescription_en' => 0,
    'data_metatag' => 0,
    'data_metadescription' => 0,
    'data_metakeyword' => 0,
    'width' => 0,
    'height' => 0,
    'data_eventmainimage' => 0,
    'path_image' => 0,
    'data_kataterkaitloop' => 0,
    'data_kataterkait' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_650b4b4adf11c6_08198761',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_650b4b4adf11c6_08198761')) {function content_650b4b4adf11c6_08198761($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\upjnew\\fhadmin\\lib\\smarty\\plugins\\modifier.date_format.php';
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
				<span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_eventid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
					<li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_eventid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?></li>
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
?data_eventid=<?php echo $_smarty_tpl->tpl_vars['data_eventid']->value;?>
">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-3">
                          <input class="datepicker-input form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_eventdate" value="<?php echo $_smarty_tpl->tpl_vars['data_eventdate']->value;?>
" size="16" data-date-format="dd-mm-yyyy">
                        </div>
                        <label class="col-sm-1 control-label">Status</label>
                        <div class="col-sm-3">
                          <select data-required="true" class="form-control" name="data_eventstatus">
						  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray_status']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
							<option value="<?php echo $_smarty_tpl->tpl_vars['optarray_status']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"<?php if ($_smarty_tpl->tpl_vars['data_eventstatus']->value==$_smarty_tpl->tpl_vars['optarray_status']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray_status']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</option>
						  <?php endfor; endif; ?>
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_eventtitle" value="<?php echo $_smarty_tpl->tpl_vars['data_eventtitle']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_eventtitle_en" value="<?php echo $_smarty_tpl->tpl_vars['data_eventtitle_en']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description</label>
                        <div class="col-sm-10">
                         <textarea class="form-control" data-minlength="6" data-maxlength="255" rows="5" cols="50" name="data_eventshortdesc" id="data_eventshortdesc"><?php echo $_smarty_tpl->tpl_vars['data_eventshortdesc']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description (EN)</label>
                        <div class="col-sm-10">
                         <textarea class="form-control" data-minlength="6" data-maxlength="255" rows="5" cols="50" name="data_eventshortdesc_en" id="data_eventshortdesc_en"><?php echo $_smarty_tpl->tpl_vars['data_eventshortdesc_en']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_eventdescription" id="data_eventdescription"><?php echo $_smarty_tpl->tpl_vars['data_eventdescription']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_eventdescription_en" id="data_eventdescription_en"><?php echo $_smarty_tpl->tpl_vars['data_eventdescription_en']->value;?>
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
						  <input type="file"<?php if ($_smarty_tpl->tpl_vars['data_eventid']->value=='') {?> data-required="true"<?php }?> class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_mainimage">
                          <br /><small>[Width : <?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px x <?php echo $_smarty_tpl->tpl_vars['height']->value;?>
px]</small><br />
						  <?php if ($_smarty_tpl->tpl_vars['data_eventmainimage']->value!='') {?>
						  <div class="thumbnail m-t-xs">
							<a href="<?php echo $_smarty_tpl->tpl_vars['path_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_eventmainimage']->value;?>
" target="_blank"><img src="<?php echo $_smarty_tpl->tpl_vars['path_image']->value;?>
thumb_<?php echo $_smarty_tpl->tpl_vars['data_eventmainimage']->value;?>
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
						<div class="col-sm-4 col-sm-offset-5">
						  <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
						  <?php if ($_smarty_tpl->tpl_vars['data_eventid']->value!='') {?>
						  <input type="hidden" name="data_eventid" value="<?php echo $_smarty_tpl->tpl_vars['data_eventid']->value;?>
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
<script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/sortable/jquery.sortable.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/ckeditor.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckfinder/ckfinder.js"></script>
<!-- custom script disini -->
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
include/js/localscript.js"></script>

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
