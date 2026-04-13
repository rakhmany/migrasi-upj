<?php /* Smarty version Smarty-3.1.17, created on 2024-04-23 03:12:24
         compiled from "templates/scale/locked.tpl" */ ?>
<?php /*%%SmartyHeaderCode:522365056627271843e936-44056162%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c2b57594b7901d2917b2361c522308546b883529' => 
    array (
      0 => 'templates/scale/locked.tpl',
      1 => 1697082803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '522365056627271843e936-44056162',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'themesurl_admin' => 0,
    'fh_username' => 0,
    'baseurl_admin' => 0,
    'errmsg' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_662727184ebcd8_60852173',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_662727184ebcd8_60852173')) {function content_662727184ebcd8_60852173($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/upeje/public_html/fhadmin/lib/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en" class="app">
<head>
  <?php echo $_smarty_tpl->getSubTemplate ('scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body class="modal-over">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <span class="navbar-brand block text-white">FaberCMS</span>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Locked</strong>
        </header>
			<div class="modal-over">
			  <div class="animated fadeInUp text-center" style="width:200px; margin: auto;">
				<div class="thumb-md"><img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a0.png" class="img-circle b-a b-light b-3x"></div>
				<p class="text-white h4 m-t m-b"><?php echo $_smarty_tpl->tpl_vars['fh_username']->value;?>
</p>
				<form action="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
locked.php" method="post">
				<?php if ($_smarty_tpl->tpl_vars['errmsg']->value!='') {?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<i class="fa fa-ban-circle"></i>
					<?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>

				</div>
				<?php }?>
				<div class="input-group">
				  <input type="password" class="form-control text-sm btn-rounded" placeholder="Enter password" name="passwd">
				  <span class="input-group-btn">
					<button class="btn btn-success btn-rounded" type="submit" name="unlock" value="submit"><i class="fa fa-arrow-right"></i></button>
				  </span>
				</div>
				</form>
			  </div>
			</div>
			
        <footer class="wrapper text-center">
          <strong>Not <?php echo $_smarty_tpl->tpl_vars['fh_username']->value;?>
? <a class="text-white" href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
logout.php">Logout here</a></strong>
        </footer>
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
