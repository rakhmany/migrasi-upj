<?php /* Smarty version Smarty-3.1.17, created on 2020-11-22 07:00:55
         compiled from "D:\xampp\htdocs\abm\fhadmin\templates\scale\header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114235fb9fe97f13cc3-43519741%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd70102a977031129b1f36f293b1349377d3bb0e0' => 
    array (
      0 => 'D:\\xampp\\htdocs\\abm\\fhadmin\\templates\\scale\\header.tpl',
      1 => 1415859818,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114235fb9fe97f13cc3-43519741',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'baseurl_admin' => 0,
    'themesurl_admin' => 0,
    'title_search' => 0,
    'fh_username' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5fb9fe98000078_67228066',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fb9fe98000078_67228066')) {function content_5fb9fe98000078_67228066($_smarty_tpl) {?>
    <header class="bg-primary header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
" class="navbar-brand">
          <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
logo_fabercms.png" class="m-r-sm" alt="scale">
          <!-- <span class="hidden-nav-xs">Scale</span> -->
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      <?php if (isset($_smarty_tpl->tpl_vars['title_search']->value)) {?>
	  <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search" action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon" name="submit"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border" placeholder="Search <?php echo $_smarty_tpl->tpl_vars['title_search']->value;?>
" name="search">            
          </div>
        </div>
      </form>
	  <?php }?>
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user"> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a0.png" alt="...">
            </span>
            <?php echo $_smarty_tpl->tpl_vars['fh_username']->value;?>
 <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <li>
              <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
profile.php">Profile</a>
            </li>
            <li>
              <a target="_blank" href="http://cms.faberhost.web.id/docs/">Help</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
locked.php">Lock</a>
            </li>
            <li>
              <a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
logout.php">Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
	<?php }} ?>
