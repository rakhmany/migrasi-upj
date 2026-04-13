<?php
/* Smarty version 3.1.31, created on 2017-09-20 15:03:58
  from "/home/upeje/public_html/fhadmin/module/pmb/templates/pmb_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59c220ee645647_44313473',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '934c67136c98a2a06f61c93ab5063b252f787796' => 
    array (
      0 => '/home/upeje/public_html/fhadmin/module/pmb/templates/pmb_list.tpl',
      1 => 1502368987,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../../../templates/scale/header_meta.tpl' => 1,
    'file:../../../templates/scale/header.tpl' => 1,
    'file:../../../templates/scale/sidebar.tpl' => 1,
    'file:../../../templates/scale/footer.tpl' => 1,
  ),
),false)) {
function content_59c220ee645647_44313473 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_math')) require_once '/home/upeje/public_html/vendor/smarty/smarty/libs/plugins/function.math.php';
if (!is_callable('smarty_function_counter')) require_once '/home/upeje/public_html/vendor/smarty/smarty/libs/plugins/function.counter.php';
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
<?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</head>
<body class="">
<section class="vbox">
  <?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

  <section>
    <section class="hbox stretch">
      <?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

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
                <form class="form" role="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>
">
				<div class="row m-t-sm">
				  <div class="col-sm-3 m-b-xs">
				    <b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b>
                    
				  </div>
                  <div class="col-sm-4 col-md-3 m-b-xs">
						<div class="input-group">
						  <label class="sr-only" for="search2">Genre</label>
						  <select class="form-control" name="search2" style="width:100%;">
							<option value=""> = All = </option>
							<?php
$__section_listing_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_listing']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing'] : false;
$__section_listing_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['optarray_jkel']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_listing_0_total = $__section_listing_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = new Smarty_Variable(array());
if ($__section_listing_0_total != 0) {
for ($__section_listing_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] = 0; $__section_listing_0_iteration <= $__section_listing_0_total; $__section_listing_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']++){
?>
								<option value="<?php echo $_smarty_tpl->tpl_vars['optarray_jkel']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
" <?php if ($_smarty_tpl->tpl_vars['search2']->value == $_smarty_tpl->tpl_vars['optarray_jkel']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray_jkel']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</option>
							<?php
}
}
if ($__section_listing_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = $__section_listing_0_saved;
}
?>
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
							<!-- <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a> -->
						  </span>
						</div>
                  </div>
                </div>
				</form>
              </header>
              <section class="scrollable wrapper w-f">
                  <?php if ($_smarty_tpl->tpl_vars['view']->value['final_message'] != '') {?>
				  <div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<i class="fa fa-ok-sign"></i><strong>Well done!</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['view']->value['final_message'];?>

				  </div>
				  <?php }?>
                  <?php if ($_smarty_tpl->tpl_vars['view']->value['msg'] != '') {?>
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
                          <th class="th-sortable" width="10%" class="text-center">
							<a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=<?php echo $_smarty_tpl->tpl_vars['view']->value['action'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['view']->value['page'];?>
&order=<?php if ($_smarty_tpl->tpl_vars['view']->value['order'] == 'asc') {?>desc<?php } else { ?>asc<?php }?>&orderfield=pmbdate&search=<?php echo $_smarty_tpl->tpl_vars['view']->value['search'];?>
&search1=<?php echo $_smarty_tpl->tpl_vars['view']->value['search1'];?>
&search2=<?php echo $_smarty_tpl->tpl_vars['view']->value['search2'];?>
">Date<span class="th-sort"> <?php if ($_smarty_tpl->tpl_vars['view']->value['orderfield'] == 'pmbdate') {?> <i class="fa fa-sort-down text<?php if ($_smarty_tpl->tpl_vars['view']->value['order'] == 'desc') {?>-active<?php }?>"></i> <i class="fa fa-sort-up text<?php if ($_smarty_tpl->tpl_vars['view']->value['order'] == 'asc') {?>-active<?php }?>"></i><?php }?> <i class="fa fa-sort"></i> </span></a>
						  </th>
                          <th class="th-sortable"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=<?php echo $_smarty_tpl->tpl_vars['view']->value['action'];?>
&page=<?php echo $_smarty_tpl->tpl_vars['view']->value['page'];?>
&order=<?php if ($_smarty_tpl->tpl_vars['view']->value['order'] == 'asc') {?>desc<?php } else { ?>asc<?php }?>&orderfield=pmbname&search=<?php echo $_smarty_tpl->tpl_vars['view']->value['search'];?>
&search1=<?php echo $_smarty_tpl->tpl_vars['view']->value['search1'];?>
&search2=<?php echo $_smarty_tpl->tpl_vars['view']->value['search2'];?>
">Nama<span class="th-sort"> <?php if ($_smarty_tpl->tpl_vars['view']->value['orderfield'] == 'pmbname') {?> <i class="fa fa-sort-down text<?php if ($_smarty_tpl->tpl_vars['view']->value['order'] == 'desc') {?>-active<?php }?>"></i> <i class="fa fa-sort-up text<?php if ($_smarty_tpl->tpl_vars['view']->value['order'] == 'asc') {?>-active<?php }?>"></i> <?php }?> <i class="fa fa-sort"></i></span></a> </th>
						  <th width="30%" class="text-center">Contact</th>
						  <!-- <th width="20%" class="text-center">Photo</th> -->
                          <!-- <th width="10%" class="text-center">Status</th> -->
                          <th width="10%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php echo smarty_function_math(array('equation'=>'(cc*y)-cc','cc'=>$_smarty_tpl->tpl_vars['conf']->value['page'],'y'=>$_smarty_tpl->tpl_vars['view']->value['page'],'assign'=>'ctr'),$_smarty_tpl);
echo smarty_function_counter(array('start'=>$_smarty_tpl->tpl_vars['ctr']->value,'print'=>false),$_smarty_tpl);?>

						<?php
$__section_listing_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_listing']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing'] : false;
$__section_listing_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['view']->value['data_pmbid']) ? count($_loop) : max(0, (int) $_loop));
$__section_listing_1_total = $__section_listing_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = new Smarty_Variable(array());
if ($__section_listing_1_total != 0) {
for ($__section_listing_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] = 0; $__section_listing_1_iteration <= $__section_listing_1_total; $__section_listing_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']++){
?>
						<tr>
                          <td><label class="checkbox m-n i-checks">
                              <input type="checkbox" name="delete[]" value="<?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbid'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
">
                              <i></i></label></td>
                          <!-- <td><a href="#modal" data-toggle="modal"><i class="fa fa-search-plus text-muted"></i></a></td> -->
                          <td class="text-center"><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
.</td>
                          <td class="text-center"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbdate'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</td>
                          <td>
							<a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_pmbid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbid'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
"><b><?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbname'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</b></a>
						
						  </td>
                          <td>
							<b>Alamat</b>: <br />
							<?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbaddress'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
<br />
							<?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbposcode'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
<br />
							
							<b>Email:</b> <a href="mailto:<?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbemail'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbemail'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</a><br />
							<b>HP:</b> <?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbhp'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
<br /><br />
						
						  </td>
                          <!-- <td class="text-center"><?php if ($_smarty_tpl->tpl_vars['view']->value['data_pmbphoto'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)] != '') {?><a href="<?php echo $_smarty_tpl->tpl_vars['view']->value['path_file_image'];
echo $_smarty_tpl->tpl_vars['view']->value['data_pmbphoto'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
" target="_blank"><img width="100" src="<?php echo $_smarty_tpl->tpl_vars['view']->value['path_file_image'];
echo $_smarty_tpl->tpl_vars['view']->value['data_pmbphoto'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
"></a><?php } else { ?>NO PHOTO<?php }?></td> -->
                          <!-- <td class="text-center"><span class="label bg-<?php if ($_smarty_tpl->tpl_vars['view']->value['data_pmbstatus'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)] == 'Hidden') {?>danger<?php } else { ?>success<?php }?>"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbstatus'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</span></td> -->
                          <td class="text-center"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_pmbid=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_pmbid'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
" class="btn btn-default btn-xs btn-info"><i class="fa fa-pencil"></i> View</a></td>
                        </tr>
                        <?php
}
}
if ($__section_listing_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = $__section_listing_1_saved;
}
?>
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
                   <!--  <p class="text-muted m-t">Showing 20-30 of 50</p> -->
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
<?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

</body>
</html><?php }
}
