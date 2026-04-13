<?php
/* Smarty version 3.1.31, created on 2017-10-04 12:58:53
  from "/home/upeje/public_html/fhadmin/module/b_home_link/templates/b_home_link_list.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d4789d5c0b47_82903784',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bb8eaaef1de7ac18824e908861f3087caa82e03' => 
    array (
      0 => '/home/upeje/public_html/fhadmin/module/b_home_link/templates/b_home_link_list.tpl',
      1 => 1507096730,
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
function content_59d4789d5c0b47_82903784 (Smarty_Internal_Template $_smarty_tpl) {
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
            <!-- Sub Sidebar -->
          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-white b-b clearfix">
                <div class="row m-t-sm">
				  <div class="col-md-5 col-sm-12 m-b-xs">
					<a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default hide"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
				    <b><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</b>
                    
				  </div>
                  
                </div>
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
                          
                          <th width="20" class="text-center">No.</th>
                          <th>Title ID /EN</th>
                          <th width="20%" class="text-center">Icon</th>
                          <th width="10%" class="text-center">Priority</th>
                          
                          <th width="10%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php echo smarty_function_math(array('equation'=>'(cc*y)-cc','cc'=>$_smarty_tpl->tpl_vars['conf']->value['page'],'y'=>$_smarty_tpl->tpl_vars['view']->value['page'],'assign'=>'ctr'),$_smarty_tpl);
echo smarty_function_counter(array('start'=>$_smarty_tpl->tpl_vars['ctr']->value,'print'=>false),$_smarty_tpl);?>

						<?php
$__section_listing_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_listing']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing'] : false;
$__section_listing_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['view']->value['data_homelink_id']) ? count($_loop) : max(0, (int) $_loop));
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = new Smarty_Variable(array('total' => $__section_listing_0_loop));
if ($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['total'] != 0) {
for ($__section_listing_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] = 0; $__section_listing_0_iteration <= $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['total']; $__section_listing_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_listing']->value['first'] = ($__section_listing_0_iteration == 1);
$_smarty_tpl->tpl_vars['__smarty_section_listing']->value['last'] = ($__section_listing_0_iteration == $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['total']);
?>
						<tr>
                          
                          <!-- <td><a href="#modal" data-toggle="modal"><i class="fa fa-search-plus text-muted"></i></a></td> -->
                          <td class="text-center"><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
.</td>
                          <td><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_homelink_id=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_id'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_title'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
 / <font color="red"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_title_en'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</font></a><br />
                              Link: <?php if ($_smarty_tpl->tpl_vars['view']->value['data_homelink_url'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]) {?><a href="<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_url'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_url'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</a><?php } else { ?>-<?php }?>
                          </td>
                          <td class="text-center"><?php if ($_smarty_tpl->tpl_vars['view']->value['data_homelink_pic'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)] != '') {?><a class="fancybox" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;
echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_pic'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;
echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_pic'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
?<?php echo time();?>
" style=" background: black;" alt="img" /></a><?php } else { ?>no image<?php }?></td>
                          <td class="text-center">
							<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['total']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['total'] : null) > 1) {?>
								<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['last'] : null) == false) {?>
									<a href="<?php echo $_SERVER['PHP_SELF'];?>?chorder=down&amp;homelink_id=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_id'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
">Down</a>
								<?php }?>
								<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['first'] : null) == false && (isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['last']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['last'] : null) == false) {?>|<?php }?>
								<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['first']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['first'] : null) == false) {?>
									<a href="<?php echo $_SERVER['PHP_SELF'];?>?chorder=up&amp;homelink_id=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_id'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
">Up</a>
								<?php }?>
							<?php }?>
						  </td>
                          
                          <td class="text-center"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_homelink_id=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_id'][(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
" class="btn btn-default btn-xs btn-rounded btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        <?php
}
}
if ($__section_listing_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = $__section_listing_0_saved;
}
?>
                      </tbody>
                      
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
<?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


</body>
</html><?php }
}
