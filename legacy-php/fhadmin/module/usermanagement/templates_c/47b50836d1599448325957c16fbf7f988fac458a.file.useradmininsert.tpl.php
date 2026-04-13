<?php /* Smarty version Smarty-3.1.17, created on 2026-02-26 11:12:38
         compiled from "templates/useradmininsert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:175886471565279dd52a8602-45020881%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '47b50836d1599448325957c16fbf7f988fac458a' => 
    array (
      0 => 'templates/useradmininsert.tpl',
      1 => 1772074796,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '175886471565279dd52a8602-45020881',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_65279dd52fd437_35316243',
  'variables' => 
  array (
    'data_fh_userid' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'data_fh_username' => 0,
    'data_fh_password' => 0,
    'list_usergroupid' => 0,
    'data_fh_kategorimenuid' => 0,
    'list_usergroupname' => 0,
    'data_fh_name' => 0,
    'data_fh_address' => 0,
    'data_fh_phone' => 0,
    'data_fh_mobile' => 0,
    'data_fh_email' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65279dd52fd437_35316243')) {function content_65279dd52fd437_35316243($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/website/upjupjac/fhadmin/lib/smarty/plugins/modifier.date_format.php';
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
				<span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_fh_userid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
					<li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_fh_userid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?></li>
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
<?php if ($_smarty_tpl->tpl_vars['data_fh_userid']->value!='') {?>?data_fh_userid=<?php echo $_smarty_tpl->tpl_vars['data_fh_userid']->value;?>
<?php }?>">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Login Information</strong> </header>
                    <div class="panel-body">
                      <?php if ($_smarty_tpl->tpl_vars['data_fh_userid']->value!='') {?>
					  <div class="form-group">
                        <label class="col-sm-2 control-label">ID</label>
                        <div class="col-sm-6">
                          <input type="hidden" name="data_fh_userid" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_userid']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['data_fh_userid']->value;?>

                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-6">
                          <input type="hidden" name="data_fh_username" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_username']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['data_fh_username']->value;?>

                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
					  <?php } else { ?>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="Username" name="data_fh_username" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_username']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
					  <?php }?>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="Password" name="data_fh_password" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_password']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Usergroup</label>
                        <div class="col-sm-5">
                          <select class="form-control chosen-select" name="data_fh_usergroupid" style="width:100%">
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['list'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['list']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['name'] = 'list';
$_smarty_tpl->tpl_vars['smarty']->value['section']['list']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['list_usergroupid']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
								<option value="<?php echo $_smarty_tpl->tpl_vars['list_usergroupid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']];?>
"
								<?php if ($_smarty_tpl->tpl_vars['data_fh_kategorimenuid']->value==$_smarty_tpl->tpl_vars['list_usergroupid']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']]) {?>selected<?php }?>
								><?php echo $_smarty_tpl->tpl_vars['list_usergroupname']->value[$_smarty_tpl->getVariable('smarty')->value['section']['list']['index']];?>
</option>
							<?php endfor; endif; ?>
						  </select>
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
                          <input type="text" class="form-control" data-required="true" placeholder="Name" name="data_fh_name" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_name']->value;?>
" maxlength="255">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Address" name="data_fh_address" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_address']->value;?>
" maxlength="255">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Phone</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Phone" name="data_fh_phone" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_phone']->value;?>
" maxlength="20">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Mobile</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Mobile" name="data_fh_mobile" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_mobile']->value;?>
" maxlength="32">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-type="email" data-required="true" placeholder="Email" name="data_fh_email" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_email']->value;?>
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
						  <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
						  
						  <input type="hidden" name="data_fh_userid" value="<?php echo $_smarty_tpl->tpl_vars['data_fh_userid']->value;?>
">
						  
						  <?php if ($_smarty_tpl->tpl_vars['data_fh_userid']->value!='') {?>
						  <button type="submit" class="btn btn-primary" name="edit" value="save"><i class="fa fa-floppy-o"></i> Save</button>
						  <?php } else { ?>
						  <button type="submit" class="btn btn-primary" name="insert" value="submit"><i class="fa fa-floppy-o"></i> Save</button>
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
</body>
</html><?php }} ?>
