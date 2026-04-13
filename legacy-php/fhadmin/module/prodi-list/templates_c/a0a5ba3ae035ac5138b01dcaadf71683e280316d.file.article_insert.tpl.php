<?php /* Smarty version Smarty-3.1.17, created on 2026-03-31 11:16:39
         compiled from "templates/article_insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:189801900065233aab2555d6-94105948%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a0a5ba3ae035ac5138b01dcaadf71683e280316d' => 
    array (
      0 => 'templates/article_insert.tpl',
      1 => 1772074795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '189801900065233aab2555d6-94105948',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_65233aab2b32e5_66723075',
  'variables' => 
  array (
    'data_primarykey' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'mainfieldnamed' => 0,
    'data_mainfieldname' => 0,
    'data_content_title_en' => 0,
    'data_d_newsmain_date' => 0,
    'data_content_short_id' => 0,
    'data_content_short_en' => 0,
    'data_content_testi_id' => 0,
    'data_content_testi_en' => 0,
    'data_content_long_id' => 0,
    'data_content_long_en' => 0,
    'data_content_url' => 0,
    'best_image_view' => 0,
    'oldimage' => 0,
    'option_level_val' => 0,
    'option_level_name' => 0,
    'data_level' => 0,
    'option_interest_val' => 0,
    'option_interest_name' => 0,
    'data_interest' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65233aab2b32e5_66723075')) {function content_65233aab2b32e5_66723075($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_checkboxes')) include '/home/website/upjupjac/fhadmin/lib/smarty/plugins/function.html_checkboxes.php';
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
          <header class="header bg-info b-b clearfix">
			<div class="row m-t-sm">
			  <div class="col-sm-5 m-b-xs">
				<a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
				<span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
					<li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?>Edit<?php } else { ?>Insert<?php }?></li>
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
			
			
  <form name=form method=post enctype="multipart/form-data"  action=<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo $_SERVER['PHP_SELF']; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?>?data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
<?php }?>>
   			<div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic information</strong> </header>
                    
                    <div class="panel-body">
	                    <div class="row">
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label"><?php echo $_smarty_tpl->tpl_vars['mainfieldnamed']->value;?>
</label>
	                        <div class="col-sm-6">
	                          <input  name="data_mainfieldname" value="<?php echo $_smarty_tpl->tpl_vars['data_mainfieldname']->value;?>
" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Title (EN)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_content_title_en" value="<?php echo $_smarty_tpl->tpl_vars['data_content_title_en']->value;?>
" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Date</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_newsmain_date" value="<?php echo $_smarty_tpl->tpl_vars['data_d_newsmain_date']->value;?>
" type="text" class="form-control datepicker-input"  data-date-format="dd-mm-yyyy" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row  hidden ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Job/Position (ID)</label>
	                        <div class="col-sm-6">
	                        	<input  name="data_content_short_id" value="<?php echo $_smarty_tpl->tpl_vars['data_content_short_id']->value;?>
" type="text" class="form-control" >
	                        </div> 
	                      </div>
	                     </div>
	                     <div class="row hidden  ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Job/Position  (EN)</label>
	                        <div class="col-sm-6">
	                        	<input  name="data_content_short_en" value="<?php echo $_smarty_tpl->tpl_vars['data_content_short_en']->value;?>
" type="text" class="form-control" >
	                        </div>  
	                      </div>
	                     </div>
	                     <div class="row hidden  ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Testimonial/Story (ID)</label>
	                        <div class="col-sm-6">
	                          <textarea  name="data_content_testi_id"  class="form-control" ><?php echo $_smarty_tpl->tpl_vars['data_content_testi_id']->value;?>
</textarea>
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row  hidden ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Testimonial/Story (EN)</label>
	                        <div class="col-sm-6">
	                          <textarea  name="data_content_testi_en"  class="form-control" ><?php echo $_smarty_tpl->tpl_vars['data_content_testi_en']->value;?>
</textarea>
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row  hidden ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Full description (ID)</label>
	                        <div class="col-sm-10">
	                          <textarea class="form-control jckeditor" name="data_content_long_id" id="data_content_long_id"><?php echo $_smarty_tpl->tpl_vars['data_content_long_id']->value;?>
</textarea>
	                        </div>
	                      </div>
	                     </div>
	                      <div class="row hidden  ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Full description (EN)</label>
	                        <div class="col-sm-10">
	                          <textarea class="form-control jckeditor" name="data_content_long_en" id="data_content_long_id"><?php echo $_smarty_tpl->tpl_vars['data_content_long_en']->value;?>
</textarea>
	                        </div>
	                      </div>
	                     </div>  
	                     <div class="row  ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Link URL</label>
	                        <div class="col-sm-6">
	                        	<input  name="data_content_url" value="<?php echo $_smarty_tpl->tpl_vars['data_content_url']->value;?>
" type="text" class="form-control" >
	                        </div> 
	                      </div>
	                     </div>
	                     <div class="row">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Image</label>
	                        <div class="col-sm-6">
	                          <input type="file" name="data_mainimage"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
	                          <span style="color: red;"><?php echo $_smarty_tpl->tpl_vars['best_image_view']->value;?>
</span>
	                         </div>
	                        </div> 
	                      </div>
	                      <?php echo $_smarty_tpl->tpl_vars['oldimage']->value;?>

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
						   	<?php echo smarty_function_html_checkboxes(array('name'=>'data_level','values'=>$_smarty_tpl->tpl_vars['option_level_val']->value,'output'=>$_smarty_tpl->tpl_vars['option_level_name']->value,'selected'=>$_smarty_tpl->tpl_vars['data_level']->value,'separator'=>'<br />'),$_smarty_tpl);?>

                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Interests</label>
                        <div class="col-sm-10">
						    <?php echo smarty_function_html_checkboxes(array('name'=>'data_interest','values'=>$_smarty_tpl->tpl_vars['option_interest_val']->value,'output'=>$_smarty_tpl->tpl_vars['option_interest_name']->value,'selected'=>$_smarty_tpl->tpl_vars['data_interest']->value,'separator'=>'<br />'),$_smarty_tpl);?>

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
						  <?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?>
						  <input type=hidden name=data_primarykey value="<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" />
						  <button type="submit" class="btn btn-primary" name="edit" value="save"><i class="fa fa-floppy-o"></i> Save</button>
						  <?php } else { ?>
						  <button type="submit" class="btn btn-primary" name="insert" value="submit"><i class="fa fa-floppy-o"></i> Submit</button>
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
</html>



<?php }} ?>
