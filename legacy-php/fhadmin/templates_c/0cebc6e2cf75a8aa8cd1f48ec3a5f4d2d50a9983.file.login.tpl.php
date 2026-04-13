<?php /* Smarty version Smarty-3.1.17, created on 2020-04-12 17:56:31
         compiled from "templates\scale\login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3885e933a2fb25377-04346929%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '0cebc6e2cf75a8aa8cd1f48ec3a5f4d2d50a9983' => 
    array (
      0 => 'templates\\scale\\login.tpl',
      1 => 1415458516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3885e933a2fb25377-04346929',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl_admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5e933a2fd40964_28662376',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e933a2fd40964_28662376')) {function content_5e933a2fd40964_28662376($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\nutrients\\fhadmin\\lib\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en" class="app">
<head>
  <?php echo $_smarty_tpl->getSubTemplate ('scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body class="">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <a class="navbar-brand block" href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
">FaberCMS</a>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Sign in to get in touch</strong>
        </header>
        <form action="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
login.php" method="post">
		  <?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>

			if ($_SESSION['login_fail'] == '1') {
				echo '<div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ban-circle"></i><!-- <strong>Warning!</strong> --> Login Failed.... </div>';
				// echo "<font class=red style='font-size:14px;'><b>Login Failed...</b></font><br><br>";
				$_SESSION['login_fail'] = '0';
			}
			if ($_SESSION['tmp_msg'] != '') {
				echo '<div class="alert alert-danger">
                  <button type="button" class="close" data-dismiss="alert">×</button>
                  <i class="fa fa-ban-circle"></i><!-- <strong>Warning!</strong> --> '.$_SESSION['tmp_msg'].' </div>';
				// echo "<font class=red style='font-size:14px;'><b>".$_SESSION['tmp_msg']."</b></font><br><br>";
				$_SESSION['tmp_msg'] = '';
			}
		  <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>

          <div class="list-group">
            <div class="list-group-item">
              <label class="sr-only" for="username">Username</label>
			  <div class="input-group m-b">
			    <span class="input-group-addon"><i class="fa fa-user"></i></span>
				<input type="text" class="form-control" placeholder="Username" name="username" id="username">
			  </div>
            </div>
            <div class="list-group-item">
			  <label class="sr-only" for="passwd">Password</label>
			  <div class="input-group m-b">
			    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
				<input type="password" class="form-control" placeholder="Password" name="passwd" id="passwd">
			  </div>
            </div>
			<div class="list-group-item">
			  <label class="sr-only" for="security_code">Security Code</label>
			  <div class="input-group m-b">
			    <span class="input-group-addon" style="padding:0;"><img src="CaptchaSecurityImages.php?width=100&height=40&characters=5" /></span>
				<input type="text" placeholder="Security Code" class="form-control input-lg m-b" maxlength="7" size="8" name="security_code" id="security_code">
			  </div>
			</div>
          </div>
          <button type="submit" class="btn btn-lg btn-primary btn-block">Sign in</button>
          <div class="text-center m-t m-b"><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
forgetpass.php"><small>Forgot password?</small></a></div>
          <!-- <div class="line line-dashed"></div>
          <p class="text-muted text-center"><small>Do not have an account?</small></p>
          <a href="signup.html" class="btn btn-lg btn-default btn-block">Create an account</a> -->
        </form>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Copyright <?php echo smarty_modifier_date_format(time(),"%Y");?>
 - All rights reserved by faberhost.com</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  <?php echo $_smarty_tpl->getSubTemplate ('scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
