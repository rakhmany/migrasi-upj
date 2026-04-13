<?php /* Smarty version Smarty-3.1.17, created on 2020-04-10 03:47:59
         compiled from "templates\scale\index.tpl" */ ?>
<?php /*%%SmartyHeaderCode:300895e8fd04f988024-83896798%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '8697c6f2a833cd56f29864b66f7edfededb70bd7' => 
    array (
      0 => 'templates\\scale\\index.tpl',
      1 => 1415458516,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '300895e8fd04f988024-83896798',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'fh_username' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5e8fd04f9ebe44_14594754',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5e8fd04f9ebe44_14594754')) {function content_5e8fd04f9ebe44_14594754($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\nutrients\\fhadmin\\lib\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en" class="app">
<head>  
  <?php echo $_smarty_tpl->getSubTemplate ('scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- include custom style disini -->
</head>
<body class="">
  <section class="vbox">
    <?php echo $_smarty_tpl->getSubTemplate ('scale/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

    <section>
      <section class="hbox stretch">
        <?php echo $_smarty_tpl->getSubTemplate ('scale/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

        <section id="content">
          <section class="hbox stretch">
            <section>
              <section class="vbox">
                <section class="scrollable padder">              
                  <section class="row m-b-md">
                    <div class="col-sm-6">
                      <h3 class="m-b-xs text-black">FaberCMS v.2.01</h3>
                      <small><?php echo smarty_modifier_date_format(time(),"%A, %d-%B-%Y");?>
</small>
                    </div>
                    <!-- <div class="col-sm-6 text-right text-left-xs m-t-md">
                      <div class="btn-group">
                        <a class="btn btn-rounded btn-default b-2x dropdown-toggle" data-toggle="dropdown">Widgets <span class="caret"></span></a>
                        <ul class="dropdown-menu text-left pull-right">
                          <li><a href="#">Notification</a></li>
                          <li><a href="#">Messages</a></li>
                          <li><a href="#">Analysis</a></li>
                          <li class="divider"></li>
                          <li><a href="#">More settings</a></li>
                        </ul>
                      </div>
                      <a href="#" class="btn btn-icon b-2x btn-default btn-rounded hover"><i class="i i-bars3 hover-rotate"></i></a>
                      <a href="#nav, #sidebar" class="btn btn-icon b-2x btn-info btn-rounded" data-toggle="class:nav-xs, show"><i class="fa fa-bars"></i></a>
                    </div> -->
                  </section>
                  <div class="row">
                    <div class="col-md-12">
                      <section class="panel b-a">
                        <div class="panel-heading b-b">
                          <h4>Welcome, <?php echo $_smarty_tpl->tpl_vars['fh_username']->value;?>
</h4>
                        </div>
                        <div class="panel-body">
                          <p>
							<i>Please don't forget to logout after finish your work. Thanks... :)</i>
						  </p>
                        </div>
                      </section>
                    </div>
                    <!-- <div class="col-md-4">
                      <section class="panel b-a">
                        <div class="panel-heading b-b">
                          <span class="badge pull-right">12</span>
                          <span class="label bg-success">New</span> 
                          <a href="#" class="font-bold">HTML Courses</a>
                        </div>
                        <div class="panel-body">
                          <a href="#" class="block h4 font-bold m-b text-black">Get started with Bootstrap</a>                          
                          <div class="r b bg-warning-ltest wrapper m-b">
                            There are a few easy ways to quickly get started with Bootstrap...
                          </div>
                          <div class="m-b">
                            <a href="#" class="avatar thumb-sm">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a0.png" alt="...">
                              <i class="on b-white"></i>
                            </a>
                            <a href="#" class="avatar thumb-sm">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a1.png" alt="...">
                              <i class="busy b-white"></i>
                            </a>
                            <a href="#" class="avatar thumb-sm">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a2.png" alt="...">
                              <i class="away b-white"></i>
                            </a>
                            <a href="#" class="avatar thumb-sm">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a3.png" alt="...">
                              <i class="off b-white"></i>
                            </a>
                            <a href="#" class="btn btn-info btn-rounded font-bold">
                              +152
                            </a>
                          </div>
                          <p class="text-sm">Start at 2:00 PM, 12/5/2016</p>
                          <a href="#" class="btn btn-default btn-sm btn-rounded m-b-xs"><i class="fa fa-plus"></i> Take me in</a>
                        </div>
                        <div class="clearfix panel-footer">
                          <small class="text-muted pull-right">5m ago</small>
                          <a href="#" class="thumb-sm pull-left m-r">
                            <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a0.png" alt="..." class="img-circle">
                          </a>
                          <div class="clear">
                            <a href="#"><strong>Jonathan Omish</strong></a>
                            <small class="block text-muted">San Francisco, USA</small>
                          </div>
                        </div>
                      </section>
                    </div>
                    <div class="col-md-4">
                      <section class="panel b-a">
                        <div class="panel-heading b-b">
                          <span class="badge bg-warning pull-right">10</span>
                          <a href="#" class="font-bold">Messages</a>
                        </div>
                        <ul class="list-group list-group-lg no-bg auto">                          
                          <a href="#" class="list-group-item clearfix">
                            <span class="pull-left thumb-sm avatar m-r">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a4.png" alt="...">
                              <i class="on b-white bottom"></i>
                            </span>
                            <span class="clear">
                              <span>Chris Fox</span>
                              <small class="text-muted clear text-ellipsis">What's up, buddy</small>
                            </span>
                          </a>
                          <a href="#" class="list-group-item clearfix">
                            <span class="pull-left thumb-sm avatar m-r">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a5.png" alt="...">
                              <i class="on b-white bottom"></i>
                            </span>
                            <span class="clear">
                              <span>Amanda Conlan</span>
                              <small class="text-muted clear text-ellipsis">Come online and we need talk about the plans that we have discussed</small>
                            </span>
                          </a>
                          <a href="#" class="list-group-item clearfix">
                            <span class="pull-left thumb-sm avatar m-r">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a6.png" alt="...">
                              <i class="busy b-white bottom"></i>
                            </span>
                            <span class="clear">
                              <span>Dan Doorack</span>
                              <small class="text-muted clear text-ellipsis">Hey, Some good news</small>
                            </span>
                          </a>
                          <a href="#" class="list-group-item clearfix">
                            <span class="pull-left thumb-sm avatar m-r">
                              <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a7.png" alt="...">
                              <i class="away b-white bottom"></i>
                            </span>
                            <span class="clear">
                              <span>Lauren Taylor</span>
                              <small class="text-muted clear text-ellipsis">Nice to talk with you.</small>
                            </span>
                          </a>
                        </ul>
                        <div class="clearfix panel-footer">
                          <div class="input-group">
                            <input type="text" class="form-control input-sm btn-rounded" placeholder="Search">
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-default btn-sm btn-rounded"><i class="fa fa-search"></i></button>
                            </span>
                          </div>
                        </div>
                      </section>
                    </div>
                    <div class="col-md-12">
                      <section class="panel b-light">
                        <header class="panel-heading"><strong>Calendar</strong></header>
                        <div id="calendar" class="bg-light dker m-l-n-xxs m-r-n-xxs"></div>
                        <div class="list-group">
                          <a href="#" class="list-group-item text-ellipsis">
                            <span class="badge bg-warning">7:30</span> 
                            Meet a friend
                          </a>
                          <a href="#" class="list-group-item text-ellipsis"> 
                            <span class="badge bg-success">9:30</span> 
                            Have a kick off meeting with .inc company
                          </a>
                        </div>
                      </section>                  
                    </div> -->
                  </div>
                </section>
              </section>
            </section>
            <!-- side content -->
            <!-- <aside class="aside-md bg-black hide" id="sidebar">
              <section class="vbox animated fadeInRight">
                <section class="scrollable">
                  <div class="wrapper"><strong>Live feed</strong></div>
                  <ul class="list-group no-bg no-borders auto">
                    <li class="list-group-item">
                      <span class="fa-stack pull-left m-r-sm">
                        <i class="fa fa-circle fa-stack-2x text-success"></i>
                        <i class="fa fa-reply fa-stack-1x text-white"></i>
                      </span>
                      <span class="clear">
                        <a href="#">Goody@gmail.com</a> sent your email
                        <small class="icon-muted">13 minutes ago</small>
                      </span>
                    </li>
                    <li class="list-group-item">
                      <span class="fa-stack pull-left m-r-sm">
                        <i class="fa fa-circle fa-stack-2x text-danger"></i>
                        <i class="fa fa-file-o fa-stack-1x text-white"></i>
                      </span>
                      <span class="clear">
                        <a href="#">Mide@live.com</a> invite you to join a meeting
                        <small class="icon-muted">20 minutes ago</small>
                      </span>
                    </li>
                    <li class="list-group-item">
                      <span class="fa-stack pull-left m-r-sm">
                        <i class="fa fa-circle fa-stack-2x text-info"></i>
                        <i class="fa fa-map-marker fa-stack-1x text-white"></i>
                      </span>
                      <span class="clear">
                        <a href="#">Geoge@yahoo.com</a> is online
                        <small class="icon-muted">1 hour ago</small>
                      </span>
                    </li>
                    <li class="list-group-item">
                      <span class="fa-stack pull-left m-r-sm">
                        <i class="fa fa-circle fa-stack-2x text-primary"></i>
                        <i class="fa fa-info fa-stack-1x text-white"></i>
                      </span>
                      <span class="clear">
                        <a href="#"><strong>Admin</strong></a> post a info
                        <small class="icon-muted">1 day ago</small>
                      </span>
                    </li>
                  </ul>
                  <div class="wrapper"><strong>Friends</strong></div>
                  <ul class="list-group no-bg no-borders auto">
                    <li class="list-group-item">
                      <div class="media">
                        <span class="pull-left thumb-sm avatar">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a3.png" alt="..." class="img-circle">
                          <i class="on b-black bottom"></i>
                        </span>
                        <div class="media-body">
                          <div><a href="#">Chris Fox</a></div>
                          <small class="text-muted">about 2 minutes ago</small>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <span class="pull-left thumb-sm avatar">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a2.png" alt="...">
                          <i class="on b-black bottom"></i>
                        </span>
                        <div class="media-body">
                          <div><a href="#">Amanda Conlan</a></div>
                          <small class="text-muted">about 2 hours ago</small>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <span class="pull-left thumb-sm avatar">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a1.png" alt="...">
                          <i class="busy b-black bottom"></i>
                        </span>
                        <div class="media-body">
                          <div><a href="#">Dan Doorack</a></div>
                          <small class="text-muted">3 days ago</small>
                        </div>
                      </div>
                    </li>
                    <li class="list-group-item">
                      <div class="media">
                        <span class="pull-left thumb-sm avatar">
                          <img src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
images/a0.png" alt="...">
                          <i class="away b-black bottom"></i>
                        </span>
                        <div class="media-body">
                          <div><a href="#">Lauren Taylor</a></div>
                          <small class="text-muted">about 2 minutes ago</small>
                        </div>
                      </div>
                    </li>
                  </ul>
                </section>
              </section>              
            </aside> -->
            <!-- / side content -->
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
      </section>
    </section>
  </section>
  <?php echo $_smarty_tpl->getSubTemplate ('scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <!-- <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/charts/easypiechart/jquery.easy-pie-chart.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/charts/sparkline/jquery.sparkline.min.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/charts/flot/jquery.flot.min.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/charts/flot/jquery.flot.tooltip.min.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/charts/flot/jquery.flot.spline.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/charts/flot/jquery.flot.pie.min.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/charts/flot/jquery.flot.resize.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/charts/flot/jquery.flot.grow.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/charts/flot/demo.js"></script> -->

  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/calendar/bootstrap_calendar.js"></script>
  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/calendar/demo.js"></script>

  <script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/sortable/jquery.sortable.js"></script>
</body>
</html><?php }} ?>
