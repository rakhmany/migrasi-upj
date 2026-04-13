<?php /* Smarty version Smarty-3.1.17, created on 2026-02-26 11:11:11
         compiled from "templates/scale/login.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20107032726519950f1456f5-37138166%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f0df4eebcb7bbaad383c66003245bb57496a4082' => 
    array (
      0 => 'templates/scale/login.tpl',
      1 => 1772074771,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20107032726519950f1456f5-37138166',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6519950f190766_51384689',
  'variables' => 
  array (
    'baseurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6519950f190766_51384689')) {function content_6519950f190766_51384689($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/website/upjupjac/fhadmin/lib/smarty/plugins/modifier.date_format.php';
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

				<input type="text" class="form-control" placeholder="Username" name="username" id="username" 
				       pattern="[A-Za-z0-9._-]+" 
				       title="Username hanya boleh mengandung huruf, angka, titik, underscore, dan dash"
				       value="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8') : '';<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
"
				       oninput="validateUsername(this)">

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

          <button type="submit" class="btn btn-lg btn-primary btn-block" id="submitBtn">Sign in</button>

          <script>
          function filterUsername(value) {
            // Hanya izinkan huruf, angka, titik, underscore, dan dash
            return value.replace(/[^A-Za-z0-9._-]/g, '');
          }
          
          function validateUsername(input) {
            var cleanValue = filterUsername(input.value);
            if (input.value !== cleanValue) {
              input.value = cleanValue;
            }
            
            var submitBtn = document.getElementById('submitBtn');
            if (cleanValue.length > 0) {
              input.style.borderColor = '';
              input.style.backgroundColor = '';
              input.setCustomValidity('');
              submitBtn.disabled = false;
              submitBtn.style.backgroundColor = '';
            } else {
              input.style.borderColor = '';
              input.style.backgroundColor = '';
              input.setCustomValidity('');
              submitBtn.disabled = false;
              submitBtn.style.backgroundColor = '';
            }
          }
          
          // Block dangerous characters on keypress
          document.getElementById('username').addEventListener('keypress', function(e) {
            var char = String.fromCharCode(e.which);
            if (!/[A-Za-z0-9._-]/.test(char)) {
              e.preventDefault();
              return false;
            }
          });
          
          // Block dangerous characters on input
          document.getElementById('username').addEventListener('input', function(e) {
            validateUsername(e.target);
          });
          
          // Filter paste content
          document.getElementById('username').addEventListener('paste', function(e) {
            e.preventDefault();
            var paste = (e.clipboardData || window.clipboardData).getData('text');
            var cleanPaste = filterUsername(paste);
            
            var start = e.target.selectionStart;
            var end = e.target.selectionEnd;
            var currentValue = e.target.value;
            
            e.target.value = currentValue.substring(0, start) + cleanPaste + currentValue.substring(end);
            e.target.setSelectionRange(start + cleanPaste.length, start + cleanPaste.length);
            
            validateUsername(e.target);
          });
          
          // Block drag and drop
          document.getElementById('username').addEventListener('drop', function(e) {
            e.preventDefault();
          });
          
          document.getElementById('username').addEventListener('dragover', function(e) {
            e.preventDefault();
          });
          </script>

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
