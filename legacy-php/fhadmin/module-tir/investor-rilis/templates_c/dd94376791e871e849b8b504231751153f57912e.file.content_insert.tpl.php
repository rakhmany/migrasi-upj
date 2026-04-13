<?php /* Smarty version Smarty-3.1.17, created on 2023-04-02 19:07:50
         compiled from "templates\content_insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:318955fb87a8669fa94-62735957%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'dd94376791e871e849b8b504231751153f57912e' => 
    array (
      0 => 'templates\\content_insert.tpl',
      1 => 1679888234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '318955fb87a8669fa94-62735957',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5fb87a867560e9_48733319',
  'variables' => 
  array (
    'data_primarykey' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'data_d_content_year' => 0,
    'data_mainfieldname' => 0,
    'data_d_content_title_en' => 0,
    'option_showhide_val' => 0,
    'data_d_content_status' => 0,
    'option_showhide_name' => 0,
    'option_upcoming_val' => 0,
    'data_d_content_upcoming' => 0,
    'arr_upcoming_name' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fb87a867560e9_48733319')) {function content_5fb87a867560e9_48733319($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\tira\\fhadmin\\lib\\smarty\\plugins\\function.html_options.php';
if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\tira\\fhadmin\\lib\\smarty\\plugins\\modifier.date_format.php';
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
			
			
			
			<?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?> 
			<a href="?action=detail&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" class="btn btn-primary" >Edit Info</a>
			<a href="?action=gallery&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" class="btn btn-primary" >PDF FIle</a>	
			<br /><br />
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
	                   <div class="row hidden">
	                  
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Year</label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_year" value="<?php echo $_smarty_tpl->tpl_vars['data_d_content_year']->value;?>
" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div> 
	                  <div class="row"> 
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Title (ID)</label>
	                        <div class="col-sm-6">
	                          <input   name="data_mainfieldname" value="<?php echo $_smarty_tpl->tpl_vars['data_mainfieldname']->value;?>
" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div> 
	                  <div class="row">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Title (EN)</label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_title_en" value="<?php echo $_smarty_tpl->tpl_vars['data_d_content_title_en']->value;?>
" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
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
	                        <label class="col-sm-2 control-label">Show Hide</label>
	                        <div class="col-sm-6">
	                          	<select class="form-control" name="data_d_content_status"  > 
	                                <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['option_showhide_val']->value,'selected'=>$_smarty_tpl->tpl_vars['data_d_content_status']->value,'output'=>$_smarty_tpl->tpl_vars['option_showhide_name']->value),$_smarty_tpl);?>
 
	                            </select>
	                        </div>
	                      </div>
	                    </div> 
	                    <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Is Upcoming</label>
	                        <div class="col-sm-6">
	                          	<select class="form-control" name="data_d_content_upcoming"  > 
	                                <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['option_upcoming_val']->value,'selected'=>$_smarty_tpl->tpl_vars['data_d_content_upcoming']->value,'output'=>$_smarty_tpl->tpl_vars['arr_upcoming_name']->value),$_smarty_tpl);?>
 
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
