<?php
/* Smarty version 3.1.31, created on 2017-09-22 13:32:32
  from "/home/upeje/public_html/fhadmin/templates/scale/header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59c4ae8092fd91_46114091',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fd42f03bfcb71c7338f65da3fc5b3c1ad830f44' => 
    array (
      0 => '/home/upeje/public_html/fhadmin/templates/scale/header.tpl',
      1 => 1506050083,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59c4ae8092fd91_46114091 (Smarty_Internal_Template $_smarty_tpl) {
?>

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
        <!-- <li class="hidden-xs">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="i i-chat3"></i>
            <span class="badge badge-sm up bg-danger count">2</span>
          </a>
          <section class="dropdown-menu aside-xl animated flipInY">
            <section class="panel bg-white">
              <div class="panel-heading b-light bg-light">
                <strong>You have <span class="count">2</span> notifications</strong>
              </div>
              <div class="list-group list-group-alt">
                <a href="#" class="media list-group-item">
                  <span class="pull-left thumb-sm">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a0.png" alt="..." class="img-circle">
                  </span>
                  <span class="media-body block m-b-none">
                    Use awesome animate.css<br>
                    <small class="text-muted">10 minutes ago</small>
                  </span>
                </a>
                <a href="#" class="media list-group-item">
                  <span class="media-body block m-b-none">
                    1.0 initial released<br>
                    <small class="text-muted">1 hour ago</small>
                  </span>
                </a>
              </div>
              <div class="panel-footer text-sm">
                <a href="#" class="pull-right"><i class="fa fa-cog"></i></a>
                <a href="#notes" data-toggle="class:show animated fadeInRight">See all the notifications</a>
              </div>
            </section>
          </section>
        </li> -->
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
	<?php }
}
