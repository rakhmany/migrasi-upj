<?php /* Smarty version Smarty-3.1.17, created on 2023-09-26 00:48:08
         compiled from "templates\category_list.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2529165120e2829aba6-48371593%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b7b578fe2e4179ebc821d60bbec715e9e5aa6e83' => 
    array (
      0 => 'templates\\category_list.tpl',
      1 => 1604846897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2529165120e2829aba6-48371593',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'systemname' => 0,
    'error_delete' => 0,
    'view' => 0,
    'mainfieldnamed' => 0,
    'show_listing_menu' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_65120e282ce3a8_66335743',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_65120e282ce3a8_66335743')) {function content_65120e282ce3a8_66335743($_smarty_tpl) {?><!DOCTYPE html>
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
              <p class="h4 font-thin pull-left m-r m-b-sm"><?php echo $_smarty_tpl->tpl_vars['systemname']->value;?>
</p>
			  <a href="?action=insert" class="btn btn-sm btn-warning btn-rounded"><i class="fa fa-plus"></i> Add New</a>
               
              </header>
			  
              <section class="scrollable wrapper w-f">
                  <?php if ($_smarty_tpl->tpl_vars['error_delete']->value!='') {?>
				  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <i class="fa fa-ban-circle"></i><strong>Message!</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['error_delete']->value;?>

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
                          <th  ><?php echo $_smarty_tpl->tpl_vars['mainfieldnamed']->value;?>
</th>  
                          <th width="10%" class="text-center">Priority</th>
                          <th width="10%" class="text-center">Edit</th>
                          <th width="10%" class="text-center">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php echo $_smarty_tpl->tpl_vars['show_listing_menu']->value;?>

                      </tbody> 
                      
                    </table>
                  </div>
                  </form>
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
