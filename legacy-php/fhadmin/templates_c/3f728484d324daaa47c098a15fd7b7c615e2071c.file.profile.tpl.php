<?php /* Smarty version Smarty-3.1.17, created on 2024-01-20 01:13:56
         compiled from "templates/scale/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:123982101865ab1e549f5172-98761324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3f728484d324daaa47c098a15fd7b7c615e2071c' => 
    array (
      0 => 'templates/scale/profile.tpl',
      1 => 1697082803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '123982101865ab1e549f5172-98761324',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'fh_usergroupname' => 0,
    'fh_userid' => 0,
    'fh_username' => 0,
    'fh_password' => 0,
    'fh_name' => 0,
    'fh_address' => 0,
    'fh_phone' => 0,
    'fh_mobile' => 0,
    'fh_email' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_65ab1e54a80a14_73126290',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65ab1e54a80a14_73126290')) {function content_65ab1e54a80a14_73126290($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/upeje/public_html/fhadmin/lib/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en" class="app">
<head>
<?php echo $_smarty_tpl->getSubTemplate ('scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- include style disini -->
</head>
<body class="">
<section class="vbox">
  <?php echo $_smarty_tpl->getSubTemplate ('scale/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <section>
    <section class="hbox stretch">
      <?php echo $_smarty_tpl->getSubTemplate ('scale/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <section id="content">
        <section class="vbox">
          <header class="header bg-info b-b clearfix">
			<div class="row m-t-sm">
			  <div class="col-sm-5 m-b-xs">
				<!-- <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a> -->
				<span class="h5"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
					<li class="active"><i class="fa fa-user"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</li>
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
			
			<form data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>
">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Login Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Usergroup</label>
                        <div class="col-sm-5">
							<?php echo $_smarty_tpl->tpl_vars['fh_usergroupname']->value;?>

                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-6">
                          <input type="hidden" name="fh_userid" value="<?php echo $_smarty_tpl->tpl_vars['fh_userid']->value;?>
">
						  <input type="hidden" name="fh_username" value="<?php echo $_smarty_tpl->tpl_vars['fh_username']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['fh_username']->value;?>

                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="Password" name="fh_password" value="<?php echo $_smarty_tpl->tpl_vars['fh_password']->value;?>
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
                    <header class="panel-heading"> <strong>Personal Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="Name" name="fh_name" value="<?php echo $_smarty_tpl->tpl_vars['fh_name']->value;?>
" maxlength="255">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Address" name="fh_address" value="<?php echo $_smarty_tpl->tpl_vars['fh_address']->value;?>
" maxlength="255">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Phone" name="fh_phone" value="<?php echo $_smarty_tpl->tpl_vars['fh_phone']->value;?>
" maxlength="20">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Mobile" name="fh_mobile" value="<?php echo $_smarty_tpl->tpl_vars['fh_mobile']->value;?>
" maxlength="32">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-type="email" data-required="true" placeholder="Email" name="fh_email" value="<?php echo $_smarty_tpl->tpl_vars['fh_email']->value;?>
" maxlength="100">
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
						  <button type="submit" class="btn btn-primary" name="edit" value="save"><i class="fa fa-floppy-o"></i> Save</button>
						  <button type="reset" class="btn btn-primary" value="reset"><i class="fa fa-rotate-right"></i> Reset</button>
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
<?php echo $_smarty_tpl->getSubTemplate ('scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- include spesifik js disini -->
</body>
</html><?php }} ?>
