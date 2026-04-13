<?php /* Smarty version Smarty-3.1.17, created on 2020-11-30 02:32:16
         compiled from "templates\banner_insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:66095fc449afbefcc2-59374097%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c0bc3d7f8148dba92423c45230b7072215d56e36' => 
    array (
      0 => 'templates\\banner_insert.tpl',
      1 => 1606699931,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '66095fc449afbefcc2-59374097',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5fc449afd83f24_36396340',
  'variables' => 
  array (
    'data_primarykey' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'mainfieldnamed' => 0,
    'data_mainfieldname' => 0,
    'data_d_slideshow_name_en' => 0,
    'data_d_slideshow_subtext_id' => 0,
    'data_d_slideshow_subtext_en' => 0,
    'data_d_slideshow_link' => 0,
    'data_d_slideshow_linktext_id' => 0,
    'data_d_slideshow_linktext_en' => 0,
    'best_image_view' => 0,
    'oldimage' => 0,
    'option_showhide_val' => 0,
    'data_d_slideshow_status' => 0,
    'option_showhide_name' => 0,
    'option_pos_val' => 0,
    'data_d_slideshow_pos' => 0,
    'option_pos_name' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fc449afd83f24_36396340')) {function content_5fc449afd83f24_36396340($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\abm\\fhadmin\\lib\\smarty\\plugins\\function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\abm\\fhadmin\\lib\\smarty\\plugins\\modifier.date_format.php';
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
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Title (EN)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_name_en" value="<?php echo $_smarty_tpl->tpl_vars['data_d_slideshow_name_en']->value;?>
" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Sub text (ID)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_subtext_id" value="<?php echo $_smarty_tpl->tpl_vars['data_d_slideshow_subtext_id']->value;?>
" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Sub text (EN)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_subtext_en" value="<?php echo $_smarty_tpl->tpl_vars['data_d_slideshow_subtext_en']->value;?>
" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Link (optional)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_link" value="<?php echo $_smarty_tpl->tpl_vars['data_d_slideshow_link']->value;?>
" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Link text (ID)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_linktext_id" value="<?php echo $_smarty_tpl->tpl_vars['data_d_slideshow_linktext_id']->value;?>
" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Link text (EN)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_linktext_en" value="<?php echo $_smarty_tpl->tpl_vars['data_d_slideshow_linktext_en']->value;?>
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
          <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Status</strong> </header>
                    <div class="panel-body">
                      <div class="row">
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Show/Hide</label>
	                        <div class="col-sm-6">
	                          	<select class="form-control" name="data_d_slideshow_status"  > 
	                                <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['option_showhide_val']->value,'selected'=>$_smarty_tpl->tpl_vars['data_d_slideshow_status']->value,'output'=>$_smarty_tpl->tpl_vars['option_showhide_name']->value),$_smarty_tpl);?>
 
	                            </select>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="row hidden">
	                    <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Text Position</label>
	                        <div class="col-sm-6">
	                          	<select class="form-control" name="data_d_slideshow_pos"  > 
	                                <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['option_pos_val']->value,'selected'=>$_smarty_tpl->tpl_vars['data_d_slideshow_pos']->value,'output'=>$_smarty_tpl->tpl_vars['option_pos_name']->value),$_smarty_tpl);?>
 
	                            </select>
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

<script type="text/javascript">
function change_icon()
{
	v = $("#icon_selection").val();
	$("#icon_preview").removeClass();
	if(v != '')
	{
		$("#icon_preview").addClass("fa");
		$("#icon_preview").addClass("fa-"+v);
	}
}
</script>

<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- include spesifik js disini -->
<script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/file-input/bootstrap-filestyle.min.js"></script>

 
</body>
</html>

<?php }} ?>
