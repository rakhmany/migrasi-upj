<?php /* Smarty version Smarty-3.1.17, created on 2023-09-23 15:39:20
         compiled from "templates\latest_highlights_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10636650eea88493911-30067148%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b36ab845111b48fa112a36bb5316249030dbb183' => 
    array (
      0 => 'templates\\latest_highlights_list.tpl',
      1 => 1692918966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10636650eea88493911-30067148',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'optarray_status' => 0,
    'search1' => 0,
    'search' => 0,
    'view' => 0,
    'conf' => 0,
    'ctr' => 0,
    'path_file_image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_650eea886f1f77_09474590',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_650eea886f1f77_09474590')) {function content_650eea886f1f77_09474590($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'D:\\xampp\\htdocs\\upj2023\\fhadmin\\lib\\smarty\\plugins\\function.math.php';
if (!is_callable('smarty_function_counter')) include 'D:\\xampp\\htdocs\\upj2023\\fhadmin\\lib\\smarty\\plugins\\function.counter.php';
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
            <div class="wrapper b-b header">Submenu Header</div>
            <ul class="nav">
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Phasellus at ultricies</a>
				<ul class="nav dk">
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Phasellus at ultricies</a>
				  </li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Malesuada augue</a></li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Donec eleifend</a></li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Dapibus porta</a></li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Dacus eu neque</a></li>
				</ul>
			  </li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Malesuada augue</a></li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Donec eleifend</a></li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Dapibus porta</a></li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Dacus eu neque</a></li>
            </ul>
          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-white b-b clearfix">
                <div class="row m-t-sm">
				  <div class="col-md-5 col-sm-12 m-b-xs">
					<a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default hide"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
				    <b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b>
                    <!-- <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button>
                      <button type="submit" class="btn btn-sm btn-default" title="Remove" name="submit"><i class="fa fa-trash-o"></i></button>
                      <button type="button" class="btn btn-sm btn-default" title="Filter" data-toggle="dropdown"><i class="fa fa-filter"></i> <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div> -->
                    <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a>
				  </div>
                  <div class="col-md-7 col-sm-12 text-center-xs">
					<form class="form-inline text-right text-center-xs" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
						<div class="form-group">
						  <label class="sr-only" for="exampleInputEmail2">Status</label>
						  <select class="input-sm form-control input-s-sm inline v-middle" name="search1">
							<option value="">== Status ==</option>
							<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray_status']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
								<option value="<?php echo $_smarty_tpl->tpl_vars['optarray_status']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"  <?php if ($_smarty_tpl->tpl_vars['search1']->value==$_smarty_tpl->tpl_vars['optarray_status']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> selected <?php }?> ><?php echo $_smarty_tpl->tpl_vars['optarray_status']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</option>
							<?php endfor; endif; ?>
						  </select>
						</div>
						<input type="text" class="input-sm form-control" placeholder="Search" name="search" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">
						<button class="btn btn-sm btn-success" type="submit" value="search"><i class="fa fa-search"></i> Go!</button>
					</form>
                  </div>
                </div>
              </header>
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
                          <th width="10%" class="text-center">Date</th>
                          <th class="th-sortable"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=<?php echo $_smarty_tpl->tpl_vars['view']->value['action'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['view']->value['page'];?>
&order=<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='asc') {?>desc<?php } else { ?>asc<?php }?>&orderfield=newstitle&search=<?php echo $_smarty_tpl->tpl_vars['view']->value['search'];?>
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
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['view']->value['data_newsid']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                              <input type="checkbox" name="delete[]" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data_newsid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
">
                              <i></i></label></td>
                          <!-- <td><a href="#modal" data-toggle="modal"><i class="fa fa-search-plus text-muted"></i></a></td> -->
                          <td class="text-center"><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
.</td>
                          <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_newsdate'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</td>
                          <td><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_newsid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_newsid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_newstitle'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</a></td>
                          <td class="text-center"><?php if ($_smarty_tpl->tpl_vars['view']->value['data_newsmainimage'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]!='') {?><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_newsid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_newsid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['view']->value['data_newsmainimage'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" style="width:120px;" alt="img" /></a><?php } else { ?>no image<?php }?></td>
                          <td class="text-center"><span class="label bg-<?php if ($_smarty_tpl->tpl_vars['view']->value['data_newsstatus'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]=='Hidden') {?>danger<?php } else { ?>success<?php }?>"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_newsstatus'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</span></td>
                          <td class="text-center"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_newsid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_newsid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" class="btn btn-default btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        <?php endfor; endif; ?>
                      </tbody>
                      <tfoot>
						<tr>
							<td colspan="6">
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
                    <!-- <div class="btn-group m-t-xs">
                      <button type="button" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button>
                      <button type="submit" class="btn btn-sm btn-default" title="Remove" name="submit"><i class="fa fa-trash-o"></i></button>
                      <button type="button" class="btn btn-sm btn-default" title="Filter" data-toggle="dropdown"><i class="fa fa-filter"></i> <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div> -->
                  </div>
                  <div class="col-md-3 hidden-sm">
                    <p class="text-muted m-t">Showing 20-30 of 50</p>
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
