<?php /* Smarty version Smarty-3.1.17, created on 2026-02-18 17:57:21
         compiled from "templates/logo_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:906072667651bdca70ac5c7-35913903%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a3a1982b3dfc09f98ff5be672cae55661cdd48cb' => 
    array (
      0 => 'templates/logo_list.tpl',
      1 => 1770009309,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '906072667651bdca70ac5c7-35913903',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_651bdca717aff4_94341970',
  'variables' => 
  array (
    'title' => 0,
    'search' => 0,
    'view' => 0,
    'conf' => 0,
    'ctr' => 0,
    'path_file_image' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651bdca717aff4_94341970')) {function content_651bdca717aff4_94341970($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include '/home/website/upjupjac/fhadmin/lib/smarty/plugins/function.math.php';
if (!is_callable('smarty_function_counter')) include '/home/website/upjupjac/fhadmin/lib/smarty/plugins/function.counter.php';
?><!DOCTYPE html>
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
            Sub Sidebar
          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-light lt b-b b-light">
              <p class="h4 font-thin pull-left m-r m-b-sm"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</p>
			  <a href="?action=insert" class="btn btn-sm btn-warning btn-rounded"><i class="fa fa-plus"></i> Add New</a>
              <form method="post" class="m-t-sm pull-right pull-none-xs input-s-lg m-b-sm" action="<?php echo $_SERVER['PHP_SELF'];?>
">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                      <button class="btn btn-sm btn-success" type="submit">Go!</button>
                    </span>
                </div>
              </form>
              </header>
			  <!-- <header class="header bg-white b-b clearfix">
                <div class="row m-t-sm">
				  <div class="col-md-5 col-sm-12 m-b-xs">
					<a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default hide"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
				    <b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b>
                    <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a>
				  </div>
                  <div class="m-t-sm pull-right pull-none-xs input-s-lg m-b-sm">
					<form class="form-inline text-right text-center-xs" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
						<input type="text" class="input-sm form-control" placeholder="Search" name="search" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">
						<button class="btn btn-sm btn-success" type="submit" value="search"><i class="fa fa-search"></i> Go!</button>
					</form>
                  </div>
                </div>
              </header> -->
              <section class="scrollable wrapper w-f">
                  <?php if ($_smarty_tpl->tpl_vars['view']->value['final_message']!='') {?>
				  <div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<i class="fa fa-ok-sign"></i><strong>Well done!</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['view']->value['final_message'];?>

				  </div>
				  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['view']->value['msg']!='') {?>
				  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <i class="fa fa-ban-circle"></i><strong>Warning!</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['view']->value['msg'];?>

				  </div>
				  <?php } else { ?>
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
							<td colspan="6">
								<button class="btn btn-sm btn-danger" type="submit" onclick="return konfirmasi();" name="del" value="delete"><i class="fa fa-trash-o"></i> Delete selected</button>
							</td>
                        </tr>
                        <tr>
                          <th width="20" class="text-center"><label class="checkbox m-n i-checks"><input type="checkbox"><i></i></label></th>
                          <th width="20" class="text-center">No.</th>
                          <th class="th-sortable"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=<?php echo $_smarty_tpl->tpl_vars['view']->value['action'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['view']->value['page'];?>
&order=<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='asc') {?>desc<?php } else { ?>asc<?php }?>&orderfield=logotitle&search=<?php echo $_smarty_tpl->tpl_vars['view']->value['search'];?>
&search1=<?php echo $_smarty_tpl->tpl_vars['view']->value['search1'];?>
&search2=<?php echo $_smarty_tpl->tpl_vars['view']->value['search2'];?>
">Title<span class="th-sort"> <i class="fa fa-sort-down text<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='desc') {?>-active<?php }?>"></i> <i class="fa fa-sort-up text<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='asc') {?>-active<?php }?>"></i> <i class="fa fa-sort"></i> </span></a> </th>
                          <th width="25%" class="text-center">Image</th>
                          <th width="10%" class="text-center">Status</th>
                          <th width="10%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php echo smarty_function_math(array('equation'=>'(cc*y)-cc','cc'=>$_smarty_tpl->tpl_vars['conf']->value['page'],'y'=>$_smarty_tpl->tpl_vars['view']->value['page'],'assign'=>'ctr'),$_smarty_tpl);?>
<?php echo smarty_function_counter(array('start'=>$_smarty_tpl->tpl_vars['ctr']->value,'print'=>false),$_smarty_tpl);?>

						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['view']->value['data_logoid']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total']);
?>
						<tr>
                          <td><label class="checkbox m-n i-checks">
                              <input type="checkbox" name="delete[]" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data_logoid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
">
                              <i></i></label></td>
                          <!-- <td><a href="#modal" data-toggle="modal"><i class="fa fa-search-plus text-muted"></i></a></td> -->
                          <td class="text-center"><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
.</td>
                          <td><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_logoid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_logoid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_logotitle'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</a></td>
                          <td class="text-center"><?php if ($_smarty_tpl->tpl_vars['view']->value['data_logofile'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]!='') {?><a class="fancybox" href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['view']->value['data_logofile'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['view']->value['data_logofile'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" style="width:120px;" alt="img" /></a><?php } else { ?>no image<?php }?></td>
                          <td class="text-center"><span><a class="label bg-<?php if ($_smarty_tpl->tpl_vars['view']->value['data_logostatus'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]=='Hidden') {?>danger<?php } else { ?>success<?php }?>" href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo $_SERVER['PHP_SELF']; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
?action=view&status=show&data_logoid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_logoid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" title="Hide / Show"><i class="fa fa-eye"></i> <?php echo $_smarty_tpl->tpl_vars['view']->value['data_logostatus'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</a></span></td>
                          <td class="text-center"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_logoid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_logoid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" class="btn btn-default btn-xs btn-rounded btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        <?php endfor; endif; ?>
                      </tbody>
                      <tfoot>
						<tr>
							<td colspan="5">
								<button class="btn btn-sm btn-danger" type="submit" onclick="return konfirmasi();" name="del" value="delete"><i class="fa fa-trash-o"></i> Delete selected</button>
							</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  </form>
				  <?php }?>
                </section>
              </section>
              <footer class="footer bg-white b-t">
                <div class="row text-center-xs">
                  <div class="col-md-3 m-t-xs">
					&nbsp;
                  </div>
                  <div class="col-md-3 hidden-sm">
                    <p class="text-muted m-t">&nbsp;<!-- Showing 20-30 of 50 --></p>
                  </div>
                  <div class="col-md-6 col-sm-12 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-sm m-b-none">
                      <?php echo $_smarty_tpl->tpl_vars['view']->value['pagination']['halaman_first'];?>

					  <?php echo $_smarty_tpl->tpl_vars['view']->value['pagination']['halaman_next'];?>

					  <?php echo $_smarty_tpl->tpl_vars['view']->value['pagination']['halaman_content'];?>

					  <?php echo $_smarty_tpl->tpl_vars['view']->value['pagination']['halaman_prev'];?>

					  <?php echo $_smarty_tpl->tpl_vars['view']->value['pagination']['halaman_last'];?>

                    </ul>
                  </div>
                </div>
              </footer>
            </section>
          </aside>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
    </section>
  </section>
</section>
<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Idrawfast 02/2013</h4>
      </div>
      <div class="modal-body">
        <p>This is a table in a modal, click the trash icon to remove the item</p>
        <section class="panel panel-default m-l-n-md m-r-n-md m-b-none">
          <header class="panel-heading"> <span class="label bg-danger pull-right">4 left</span> Tasks </header>
          <table class="table table-striped m-b-none text-sm">
            <thead>
              <tr>
                <th>Progress</th>
                <th>Item</th>
                <th width="20"></th>
              </tr>
            </thead>
            <tbody>
              <tr id="item-1">
                <td><div class="progress progress-sm progress-striped active m-t-xs m-b-none">
                    <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="80%" style="width: 80%"></div>
                  </div></td>
                <td>App prototype design</td>
                <td class="text-right"><a href="#item-1" data-dismiss="alert"><i class="fa fa-trash-o"></i></a></td>
              </tr>
              <tr id="item-2">
                <td><div class="progress progress-xs m-t-xs m-b-none">
                    <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="40%" style="width: 40%"></div>
                  </div></td>
                <td>Design documents</td>
                <td class="text-right"><a href="#item-2" data-dismiss="alert"><i class="fa fa-trash-o"></i></a></td>
              </tr>
              <tr id="item-3">
                <td><div class="progress progress-xs m-t-xs m-b-none">
                    <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-original-title="20%" style="width: 20%"></div>
                  </div></td>
                <td>UI toolkit</td>
                <td class="text-right"><a href="#item-3" data-dismiss="alert"><i class="fa fa-trash-o"></i></a></td>
              </tr>
              <tr id="item-4">
                <td><div class="progress progress-xs m-t-xs m-b-none">
                    <div class="progress-bar progress-bar-danger" data-toggle="tooltip" data-original-title="15%" style="width: 15%"></div>
                  </div></td>
                <td>Testing</td>
                <td class="text-right"><a href="#item-4" data-dismiss="alert"><i class="fa fa-trash-o"></i></a></td>
              </tr>
            </tbody>
          </table>
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info btn-rounded" data-loading-text="Updating...">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</body>
</html><?php }} ?>
