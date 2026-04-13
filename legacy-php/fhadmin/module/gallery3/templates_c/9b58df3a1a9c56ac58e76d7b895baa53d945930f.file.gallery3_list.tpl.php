<?php /* Smarty version Smarty-3.1.17, created on 2023-09-24 01:00:53
         compiled from "templates\gallery3_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:10724650f6e255e6f94-94449247%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b58df3a1a9c56ac58e76d7b895baa53d945930f' => 
    array (
      0 => 'templates\\gallery3_list.tpl',
      1 => 1692918967,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10724650f6e255e6f94-94449247',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'strukturcategory_search' => 0,
    'search' => 0,
    'mainfieldnamed' => 0,
    'view' => 0,
    'conf' => 0,
    'ctr' => 0,
    'path_file_image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_650f6e256b2ea6_97667268',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_650f6e256b2ea6_97667268')) {function content_650f6e256b2ea6_97667268($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'D:\\xampp\\htdocs\\upj2023\\fhadmin\\lib\\smarty\\plugins\\function.math.php';
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
           <!--  <div class="wrapper b-b header">Submenu Header</div>
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
            </ul> -->
          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-white b-b clearfix">
                <div class="row m-t-sm">
				<form class="text-center-xs" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
?action=search">
				  <div class="col-sm-4 m-b-xs">
					<a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default hide"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
				    <span class="h5 m-r-sm"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
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
				  </div>
                 <!--  <div class="col-md-8 col-sm-12 text-center-xs text-left">
					<form class="form-inline text-center-xs" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
						<div class="form-group">
						  <label class="sr-only" for="exampleInputPassword2">Category</label>
						  <select class="form-control chosen-select" name="search1" style="width:100%; text-align:left !important;">
							<option value="">== Category ==</option>
							<?php echo $_smarty_tpl->tpl_vars['strukturcategory_search']->value;?>

						  </select>
						</div>
						<input type="text" class="input-sm form-control" placeholder="Search" name="search" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">
						<button class="btn btn-sm btn-success" type="submit" value="search"><i class="fa fa-search"></i> Go!</button>
					</form>
                  </div> -->
                  <div class="col-sm-3 m-b-xs">
						<div class="input-group">
						  <label class="sr-only" for="exampleInputPassword2">Category</label>
						  <select class="form-control chosen-select" name="search1" style="width:100%;">
							<option value="">== Category ==</option>
							<?php echo $_smarty_tpl->tpl_vars['strukturcategory_search']->value;?>

						  </select>
						</div>
                  </div>
                  <div class="col-sm-5 text-center-xs m-b-xs">
						<div class="input-group">
						  <input type="text" class="input-sm form-control" placeholder="Search <?php echo $_smarty_tpl->tpl_vars['mainfieldnamed']->value;?>
" name="search" value="<?php echo $_smarty_tpl->tpl_vars['search']->value;?>
">
						  <span class="input-group-btn">
							<button class="btn btn-sm btn-success" type="submit" value="search"><i class="fa fa-search"></i> Go!</button>
							<a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a>
						  </span>
						</div>
                  </div>
				</form>
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
                          <th width="20"><label class="checkbox m-n i-checks"><input type="checkbox"><i></i></label></th>
                          <th width="20">No.</th>
                          <th class="th-sortable"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=<?php echo $_smarty_tpl->tpl_vars['view']->value['action'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['view']->value['page'];?>
&order=<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='asc') {?>desc<?php } else { ?>asc<?php }?>&orderfield=gallerydate&search=<?php echo $_smarty_tpl->tpl_vars['view']->value['search'];?>
&search1=<?php echo $_smarty_tpl->tpl_vars['view']->value['search1'];?>
&search2=<?php echo $_smarty_tpl->tpl_vars['view']->value['search2'];?>
">Date<span class="th-sort"> <i class="fa fa-sort-down text<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='desc') {?>-active<?php }?>"></i> <i class="fa fa-sort-up text<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='asc'||$_smarty_tpl->tpl_vars['view']->value['order']=='') {?>-active<?php }?>"></i> </span></a> </th>
                          <th class="th-sortable"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=<?php echo $_smarty_tpl->tpl_vars['view']->value['action'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['view']->value['page'];?>
&order=<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='asc') {?>desc<?php } else { ?>asc<?php }?>&orderfield=galleryname&search=<?php echo $_smarty_tpl->tpl_vars['view']->value['search'];?>
&search1=<?php echo $_smarty_tpl->tpl_vars['view']->value['search1'];?>
&search2=<?php echo $_smarty_tpl->tpl_vars['view']->value['search2'];?>
">Title<span class="th-sort"> <i class="fa fa-sort-down text<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='desc') {?>-active<?php }?>"></i> <i class="fa fa-sort-up text<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='asc'||$_smarty_tpl->tpl_vars['view']->value['order']=='') {?>-active<?php }?>"></i> </span></a> </th>
                          <th width="25%">File</th>
                          <th width="10%">Category</th>
                          <th width="10%">Priority</th>
                          <th class="th-sortable"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=<?php echo $_smarty_tpl->tpl_vars['view']->value['action'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['view']->value['page'];?>
&order=<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='asc') {?>desc<?php } else { ?>asc<?php }?>&orderfield=gallerystatus&search=<?php echo $_smarty_tpl->tpl_vars['view']->value['search'];?>
&search1=<?php echo $_smarty_tpl->tpl_vars['view']->value['search1'];?>
&search2=<?php echo $_smarty_tpl->tpl_vars['view']->value['search2'];?>
">Status<span class="th-sort"> <i class="fa fa-sort-down text<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='desc') {?>-active<?php }?>"></i> <i class="fa fa-sort-up text<?php if ($_smarty_tpl->tpl_vars['view']->value['order']=='asc'||$_smarty_tpl->tpl_vars['view']->value['order']=='') {?>-active<?php }?>"></i> </span></a> </th>
                          <th width="10%">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php echo smarty_function_math(array('equation'=>'(cc*y)-cc','cc'=>$_smarty_tpl->tpl_vars['conf']->value['page'],'y'=>$_smarty_tpl->tpl_vars['view']->value['page'],'assign'=>'ctr'),$_smarty_tpl);?>
<?php echo smarty_function_counter(array('start'=>$_smarty_tpl->tpl_vars['ctr']->value,'print'=>false),$_smarty_tpl);?>

						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['view']->value['data_galleryid']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                              <input type="checkbox" name="delete[]" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data_galleryid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
">
                              <i></i></label></td>
                          <!-- <td><a href="#modal" data-toggle="modal"><i class="fa fa-search-plus text-muted"></i></a></td> -->
                          <td><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
.</td>
                          <td><?php echo $_smarty_tpl->tpl_vars['view']->value['data_gallerydate'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</td>
                          <td><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_galleryid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_galleryid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_galleryname'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
 / <?php echo $_smarty_tpl->tpl_vars['view']->value['data_galleryname_en'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</a></td>
                          <td class="text-center"><?php if ($_smarty_tpl->tpl_vars['view']->value['data_galleryfilename'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]!='') {?><a class="fancybox" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['view']->value['data_galleryfilename'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
thumb_<?php echo $_smarty_tpl->tpl_vars['view']->value['data_galleryfilename'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
?<?php echo time();?>
" style="width:120px;" alt="img" /></a><?php } else { ?>no image<?php }?></td>
                          <td><?php echo $_smarty_tpl->tpl_vars['view']->value['data_gallerycategory'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</td>
                          <td>
							<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['listing']['total']>1) {?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['listing']['last']==false) {?>
									<a href="<?php echo $_SERVER['PHP_SELF'];?>
?chorder=down&amp;galleryid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_galleryid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
">Down</a>
								<?php }?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['listing']['first']==false&&$_smarty_tpl->getVariable('smarty')->value['section']['listing']['last']==false) {?>|<?php }?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['listing']['first']==false) {?>
									<a href="<?php echo $_SERVER['PHP_SELF'];?>
?chorder=up&amp;galleryid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_galleryid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
">Up</a>
								<?php }?>
							<?php }?>
						  </td>
                          <td><span class="label bg-<?php if ($_smarty_tpl->tpl_vars['view']->value['data_gallerystatus'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]=='Hidden') {?>danger<?php } else { ?>success<?php }?>"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_gallerystatus'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</span></td>
                          <td><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_galleryid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_galleryid'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" class="btn btn-default btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        <?php endfor; endif; ?>
                      </tbody>
                      <tfoot>
						<tr>
							<td colspan="9">
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
                  <div class="col-md-9 col-sm-12 text-right text-center-xs">
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

</body>
</html><?php }} ?>
