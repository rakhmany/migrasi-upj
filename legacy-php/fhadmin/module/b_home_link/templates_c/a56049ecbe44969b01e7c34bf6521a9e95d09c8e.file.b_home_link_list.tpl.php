<?php /* Smarty version Smarty-3.1.17, created on 2023-09-06 21:01:57
         compiled from "templates\b_home_link_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2247464f8cca5707195-21233449%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a56049ecbe44969b01e7c34bf6521a9e95d09c8e' => 
    array (
      0 => 'templates\\b_home_link_list.tpl',
      1 => 1692918970,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2247464f8cca5707195-21233449',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'view' => 0,
    'conf' => 0,
    'ctr' => 0,
    'path_file_image' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_64f8cca59a0de5_87492438',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64f8cca59a0de5_87492438')) {function content_64f8cca59a0de5_87492438($_smarty_tpl) {?><?php if (!is_callable('smarty_function_math')) include 'D:\\xampp\\htdocs\\upjnew\\fhadmin\\lib\\smarty\\plugins\\function.math.php';
if (!is_callable('smarty_function_counter')) include 'D:\\xampp\\htdocs\\upjnew\\fhadmin\\lib\\smarty\\plugins\\function.counter.php';
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
                          
                          <th width="20" class="text-center">No.</th>
                          <th>Title ID /EN</th>
                          <th width="20%" class="text-center">Icon</th>
                          <th width="10%" class="text-center">Priority</th>
                          
                          <th width="10%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php echo smarty_function_math(array('equation'=>'(cc*y)-cc','cc'=>$_smarty_tpl->tpl_vars['conf']->value['page'],'y'=>$_smarty_tpl->tpl_vars['view']->value['page'],'assign'=>'ctr'),$_smarty_tpl);?>
<?php echo smarty_function_counter(array('start'=>$_smarty_tpl->tpl_vars['ctr']->value,'print'=>false),$_smarty_tpl);?>

						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['view']->value['data_homelink_id']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                          
                          <!-- <td><a href="#modal" data-toggle="modal"><i class="fa fa-search-plus text-muted"></i></a></td> -->
                          <td class="text-center"><?php echo smarty_function_counter(array(),$_smarty_tpl);?>
.</td>
                          <td><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_homelink_id=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_id'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_title'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
 / <font color="red"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_title_en'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</font></a><br />
                              Link: <?php if ($_smarty_tpl->tpl_vars['view']->value['data_homelink_url'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?><a href="<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_url'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" target="_blank"><?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_url'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</a><?php } else { ?>-<?php }?>
                          </td>
                          <td class="text-center"><?php if ($_smarty_tpl->tpl_vars['view']->value['data_homelink_pic'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]!='') {?><a class="fancybox" target="_blank" href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_pic'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_pic'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
?<?php echo time();?>
" style=" background: black;" alt="img" /></a><?php } else { ?>no image<?php }?></td>
                          <td class="text-center">
							<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['listing']['total']>1) {?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['listing']['last']==false) {?>
									<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo $_SERVER['PHP_SELF'];<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
?chorder=down&amp;homelink_id=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_id'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
">Down</a>
								<?php }?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['listing']['first']==false&&$_smarty_tpl->getVariable('smarty')->value['section']['listing']['last']==false) {?>|<?php }?>
								<?php if ($_smarty_tpl->getVariable('smarty')->value['section']['listing']['first']==false) {?>
									<a href="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo $_SERVER['PHP_SELF'];<?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
?chorder=up&amp;homelink_id=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_id'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
">Up</a>
								<?php }?>
							<?php }?>
						  </td>
                          
                          <td class="text-center"><a href="<?php echo $_SERVER['PHP_SELF'];?>
?action=detail&data_homelink_id=<?php echo $_smarty_tpl->tpl_vars['view']->value['data_homelink_id'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" class="btn btn-default btn-xs btn-rounded btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        <?php endfor; endif; ?>
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
<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>


</body>
</html><?php }} ?>
