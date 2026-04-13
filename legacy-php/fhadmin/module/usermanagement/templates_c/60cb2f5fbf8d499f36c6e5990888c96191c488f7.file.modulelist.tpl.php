<?php /* Smarty version Smarty-3.1.17, created on 2023-10-12 04:01:25
         compiled from "templates/modulelist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:130243861965276f95080451-26036367%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '60cb2f5fbf8d499f36c6e5990888c96191c488f7' => 
    array (
      0 => 'templates/modulelist.tpl',
      1 => 1697082803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '130243861965276f95080451-26036367',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'final_message' => 0,
    'nama_module' => 0,
    'status_install' => 0,
    'status_remove' => 0,
    'view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_65276f950b78f9_20051960',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65276f950b78f9_20051960')) {function content_65276f950b78f9_20051960($_smarty_tpl) {?><!DOCTYPE html>
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
				    <span class="h5 m-r-sm"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
                    <!-- <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a> -->
				  </div>
                  <div class="col-md-7 col-sm-12 text-center-xs">
					&nbsp;
                  </div>
                </div>
              </header>
              <section class="scrollable wrapper w-f">
                  <?php if ($_smarty_tpl->tpl_vars['final_message']->value!='') {?>
				  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <i class="fa fa-ban-circle"></i><strong>Well Done!</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['final_message']->value;?>

				  </div>
				  <?php }?>
                <section class="panel panel-default">
				  <div class="table-responsive">
					<table class="table table-striped m-b-none">
                      <thead>
                        <tr>
                          <th>Listing Module</th>
                          <th width="15%" class="text-center">Install</th>
                          <th width="15%" class="text-center">Remove</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['nama_module']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
						  <td><?php echo $_smarty_tpl->tpl_vars['nama_module']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</td>
						  <td align=center><?php echo $_smarty_tpl->tpl_vars['status_install']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</td>
						  <td align=center><?php echo $_smarty_tpl->tpl_vars['status_remove']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</td>
						</tr>
						<?php endfor; endif; ?>
                      </tbody>
                    </table>
                  </div>
                </section>
              </section>
              <footer class="footer bg-white b-t">
                <!-- <div class="row text-center-xs">
                  <div class="col-md-3 m-t-xs">
					&nbsp;
                  </div>
                  <div class="col-md-3 hidden-sm">
					&nbsp;
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
                </div> -->
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
