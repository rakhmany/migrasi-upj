<?php /* Smarty version Smarty-3.1.17, created on 2020-12-30 02:22:30
         compiled from "templates\content_related.tpl" */ ?>
<?php /*%%SmartyHeaderCode:276225febd6563e0015-69085469%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02f2ba051f346e689b5bbade21aaaf1f695a67f0' => 
    array (
      0 => 'templates\\content_related.tpl',
      1 => 1605740355,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '276225febd6563e0015-69085469',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'systemname' => 0,
    'baseurl_admin' => 0,
    'title' => 0,
    'data_primarykey' => 0,
    'errmsg' => 0,
    'option_subcat_val' => 0,
    'data_gallery_name' => 0,
    'option_subcat_name' => 0,
    'view' => 0,
    'gallery' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5febd6565fffc9_68000950',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5febd6565fffc9_68000950')) {function content_5febd6565fffc9_68000950($_smarty_tpl) {?><?php if (!is_callable('smarty_function_html_options')) include 'D:\\xampp\\htdocs\\abm\\fhadmin\\lib\\smarty\\plugins\\function.html_options.php';
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
              <p class="h4 font-thin pull-left m-r m-b-sm"><?php echo $_smarty_tpl->tpl_vars['systemname']->value;?>
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
			  
              <section class="scrollable wrapper w-f">
              		<div class="row">
						<div class="col-lg-12">
						  <!-- .breadcrumb -->
						  <ul class="breadcrumb">
							<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
"><i class="fa fa-home"></i> Home</a></li>
							<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
"><i class="fa fa-list-ul"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a></li>
							<li class="active"><i class="fa fa-pencil"></i> Gallery</li>
						  </ul>
						  <!-- / .breadcrumb -->
						</div>
		            </div>
                   
                 	<?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?>
                 	 
					<a href="?action=detail&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" class="btn btn-primary" >Edit</a>
					<a href="?action=gallery&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" class="btn btn-primary" >Gallery</a>
					<a href="?action=related&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" class="btn btn-primary" >Related</a>
					<a href="?action=holding&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" class="btn btn-primary" >Holding</a>
					 
					<?php }?>
			
			<form name=form method=post enctype="multipart/form-data"  action=<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo $_SERVER['PHP_SELF']; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?>?action=related&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
<?php }?>>
   					
				  <?php if ($_smarty_tpl->tpl_vars['errmsg']->value!='') {?>
					<div class="alert alert-info">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <i class="fa fa-ok-sign"></i><?php echo $_smarty_tpl->tpl_vars['errmsg']->value;?>

					</div>
					<?php }?>
				  		<div class="row">
			              <div class="col-sm-12">
			                  <section class="panel panel-default">
			                    <header class="panel-heading"> <strong>Subsidiary</strong> </header>
			                    
			                    <div class="panel-body">
				                     
				                      <div class="row"> 
				                      <div class="form-group">
				                        <label class="col-sm-2 control-label">Subsidiary</label>
				                        <div class="col-sm-6">
				                        <select  class="form-control"  name="data_gallery_name"   >
				                                 <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['option_subcat_val']->value,'selected'=>$_smarty_tpl->tpl_vars['data_gallery_name']->value,'output'=>$_smarty_tpl->tpl_vars['option_subcat_name']->value),$_smarty_tpl);?>
 
			                            </select> 
                        				</div>
				                      </div>
				                     </div>
			                    </div>
			                    <div class="panel-body">
								  <div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
									  <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
									  <?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?>
									  <input type=hidden name=data_primarykey value="<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" />
									  <button type="submit" class="btn btn-primary" name="submitnew" value="save"><i class="fa fa-floppy-o"></i> Submit</button>
									  <?php } else { ?>
									  <?php }?>
									</div>
								  </div>
			                    </div>
			                  </section>
			              </div>
			          </div> 
			           
			        </form>
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
                          <th  >Subsidiary Name</th> 
                          <th width="20%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['gallery']->value['gallery_gallery_id']) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
                          <td><?php echo $_smarty_tpl->tpl_vars['gallery']->value['gallery_gallery_name'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</td> 
                          <td class="text-center">
                          <a href="<?php echo $_smarty_tpl->tpl_vars['gallery']->value['gallery_delete_link'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" onclick="return confirm('Are you sure want to delete this record?');"><span class="label bg-danger">Delete</span></a>
                          </td>
                        </tr>
                        <?php endfor; endif; ?>
                      </tbody> 
                    </table>
                  </div>
                  </form>
				  </section>
				  
				  

			 
              </section> 
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
