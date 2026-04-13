<?php
/* Smarty version 3.1.31, created on 2017-09-25 11:39:03
  from "/home/upeje/public_html/fhadmin/templates/scale/footer.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59c88867d03083_34745038',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4fd37edb89a755be46c19663c5b9ef20132d3225' => 
    array (
      0 => '/home/upeje/public_html/fhadmin/templates/scale/footer.tpl',
      1 => 1506050083,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c88867d03083_34745038 (Smarty_Internal_Template $_smarty_tpl) {
?>

  <!-- Jquery -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/jquery-1.10.2.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/jquery-migrate-1.2.1.min.js"><?php echo '</script'; ?>
>
  <!-- Bootstrap -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/bootstrap.js"><?php echo '</script'; ?>
>
  <!-- App -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/app.js"><?php echo '</script'; ?>
>  
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/slimscroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/chosen/chosen.jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/select2/select2.min.js"><?php echo '</script'; ?>
>
  <!-- parsley -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/parsley/parsley.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/parsley/parsley.extend.js"><?php echo '</script'; ?>
>
  <!-- parsley -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/spinner/jquery.bootstrap-touchspin.min.js"><?php echo '</script'; ?>
>
  <!-- general js -->
  <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/app.plugin.js"><?php echo '</script'; ?>
>
  
  <?php echo '<script'; ?>
>
      window.addEventListener('message', function(event) {

          // IMPORTANT: Check the origin of the data!
          if (~event.origin.indexOf('http://custom.<?php echo $_SERVER['HTTP_HOST'];?>
') ||~event.origin.indexOf('http://localhost') ) {
              // The data has been sent from your site

              // The data sent with postMessage is stored in event.data
              console.log(event.data);
              if(event.data.command == 'reload') {
                  window.location.reload();
              }
          } else {
              // The data hasn't been sent from your site!
              // Be careful! Do not use it.
              return;
          }
      });
  <?php echo '</script'; ?>
>
  
  <?php }
}
