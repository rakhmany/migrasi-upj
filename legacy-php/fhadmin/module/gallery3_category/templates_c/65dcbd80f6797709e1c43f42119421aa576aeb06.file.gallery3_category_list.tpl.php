<?php /* Smarty version Smarty-3.1.17, created on 2023-10-12 04:01:53
         compiled from "templates/gallery3_category_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1244155250651bd0b668dca2-89008252%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '65dcbd80f6797709e1c43f42119421aa576aeb06' => 
    array (
      0 => 'templates/gallery3_category_list.tpl',
      1 => 1697082803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1244155250651bd0b668dca2-89008252',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_651bd0b66cb6d2_22624323',
  'variables' => 
  array (
    'title' => 0,
    'msg' => 0,
    'view' => 0,
    'strukturcategory' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651bd0b66cb6d2_22624323')) {function content_651bd0b66cb6d2_22624323($_smarty_tpl) {?><!DOCTYPE html>
<html lang="en" class="app">
<head>
<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</head>
<body class="">
<section class="vbox">
  <?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <section>
    <section class="hbox stretch">
      <?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <section id="content">
        <section class="hbox stretch">
          <aside class="aside-md bg-light dker b-r hide" id="subNav">
            <!-- <div class="wrapper b-b header">Submenu Header</div>
            <ul class="nav">
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Phasellus at ultricies</a>
				<ul class="nav dk">
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Phasellus at ultricies</a>
				  </li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Malesuada augue</a></li>
				</ul>
			  </li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Malesuada augue</a></li>
            </ul> -->
          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-white b-b clearfix">
                <div class="row m-t-sm">
				  <div class="col-md-5 col-sm-12 m-b-xs">
				    <b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b>
                    <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a>
				  </div>
                  <div class="col-md-7 col-sm-12 text-center-xs">
					&nbsp;
                  </div>
                </div>
              </header>
              <section class="scrollable wrapper w-f">
                  <?php if ($_smarty_tpl->tpl_vars['msg']->value!='') {?>
				  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <i class="fa fa-ban-circle"></i><strong>Well Done!</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

				  </div>
				  <?php }?>
                <section class="panel panel-default">
				  <form name="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=<?php echo $_smarty_tpl->tpl_vars['view']->value['action'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['view']->value['page'];?>
&order=<?php echo $_smarty_tpl->tpl_vars['view']->value['order'];?>
&orderfield=<?php echo $_smarty_tpl->tpl_vars['view']->value['orderfield'];?>
&search=<?php echo $_smarty_tpl->tpl_vars['view']->value['search'];?>
&search1=<?php echo $_smarty_tpl->tpl_vars['view']->value['search1'];?>
&search2=<?php echo $_smarty_tpl->tpl_vars['view']->value['search2'];?>
">
				  <div class="table-responsive">
					<table class="table table-striped m-b-none">
                      <thead>
                        <tr>
                          <th width="5%" class="text-center">Up</th>
                          <th width="5%" class="text-center">Down</th>
                          <th width="10%" class="text-center">Edit</th>
                          <th width="10%" class="text-center">Delete</th>
                          <th>[Root]</th>
                          <th width="10%" class="text-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php echo $_smarty_tpl->tpl_vars['strukturcategory']->value;?>

                      </tbody>
                    </table>
                  </div>
                  </form>
                </section>
              </section>
              <footer class="footer bg-white b-t">
              </footer>
            </section>
          </aside>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
    </section>
  </section>
</section>
<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

</body>
</html><?php }} ?>
