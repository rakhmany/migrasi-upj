<?php /* Smarty version Smarty-3.1.17, created on 2023-04-02 17:35:23
         compiled from "templates\content_gallery.tpl" */ ?>
<?php /*%%SmartyHeaderCode:264595fb87accabff87-25904455%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '45fd63ffbfb251b4cdb446a233a15111291fad76' => 
    array (
      0 => 'templates\\content_gallery.tpl',
      1 => 1680449716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '264595fb87accabff87-25904455',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5fb87accd08320_01249857',
  'variables' => 
  array (
    'systemname' => 0,
    'baseurl_admin' => 0,
    'title' => 0,
    'data_primarykey' => 0,
    'errmsg' => 0,
    'oldimage' => 0,
    'oldimage2' => 0,
    'data_gallery_name_id' => 0,
    'data_gallery_name_en' => 0,
    'edit_mode' => 0,
    'edit_id' => 0,
    'view' => 0,
    'gallery' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5fb87accd08320_01249857')) {function content_5fb87accd08320_01249857($_smarty_tpl) {?><!DOCTYPE html>
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
              <!---
              <form method="post" class="m-t-sm pull-right pull-none-xs input-s-lg m-b-sm" action="<?php echo $_SERVER['PHP_SELF'];?>
">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                      <button class="btn btn-sm btn-success" type="submit">Go!</button>
                    </span>
                </div>
              </form>
              !--->
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
							<li class="active"><i class="fa fa-pencil"></i> PDF</li>
						  </ul>
						  <!-- / .breadcrumb -->
						</div>
		            </div>
                   
                 	<?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?> 
			<a href="?action=detail&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" class="btn btn-primary" >Edit Info</a>
			<a href="?action=gallery&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
" class="btn btn-primary" >PDF FIle</a>	
			<br /><br />
			<?php }?> 
			
			<form name=form method=post enctype="multipart/form-data"  action=<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo $_SERVER['PHP_SELF']; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php if ($_smarty_tpl->tpl_vars['data_primarykey']->value!='') {?>?action=gallery&data_primarykey=<?php echo $_smarty_tpl->tpl_vars['data_primarykey']->value;?>
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
			                    <header class="panel-heading"> <strong>Title & PDF</strong> </header>
			                    
			                    <div class="panel-body">
				                    
				                     
				                     <div class="row">
				                      
				                      <div class="form-group">
				                        <label class="col-sm-2 control-label">PDF (EN)</label>
				                        <div class="col-sm-6">
				                          <input type="file" name="data_gallery_image"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
				                           
				                         </div>
				                        </div> 
				                      </div>
				                      <?php echo $_smarty_tpl->tpl_vars['oldimage']->value;?>

				                       <div class="row"> 
				                      <div class="line line-dashed b-b line-lg pull-in"></div>
				                      <div class="form-group">
				                        <label class="col-sm-2 control-label">PDF (ID)</label>
				                        <div class="col-sm-6">
				                          <input type="file" name="data_gallery_image2"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
				                           
				                         </div>
				                        </div> 
				                      </div>
				                      <?php echo $_smarty_tpl->tpl_vars['oldimage2']->value;?>

				                       <div class="row">
				                     <div class="line line-dashed b-b line-lg pull-in"></div>
				                      <div class="form-group">
				                        <label class="col-sm-2 control-label">Title (ID)</label>
				                        <div class="col-sm-6">
				                        <input   name="data_gallery_name_id" value="<?php echo $_smarty_tpl->tpl_vars['data_gallery_name_id']->value;?>
" type="text" class="form-control" data-required="true" >
                        				</div>
				                      </div>
				                     </div>
				                     <div class="row">
				                     <div class="line line-dashed b-b line-lg pull-in"></div>
				                      <div class="form-group">
				                        <label class="col-sm-2 control-label">Title (EN)</label>
				                        <div class="col-sm-6">
				                        <input   name="data_gallery_name_en" value="<?php echo $_smarty_tpl->tpl_vars['data_gallery_name_en']->value;?>
" type="text" class="form-control" data-required="true" >
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
									   <?php if ($_smarty_tpl->tpl_vars['edit_mode']->value=='1') {?>
									  		<input  type="hidden" name="edit_id" value="<?php echo $_smarty_tpl->tpl_vars['edit_id']->value;?>
" />
									  		<button type="submit" class="btn btn-primary" name="submitedit" value="save"><i class="fa fa-floppy-o"></i> Save</button>
									  	<?php } else { ?>
									  		<button type="submit" class="btn btn-primary" name="submitnew" value="save"><i class="fa fa-floppy-o"></i> Submit</button>
									  	<?php }?>
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
                          <th  >File Name</th>
                          <th  >File Title</th>
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
                          <td><?php echo $_smarty_tpl->tpl_vars['gallery']->value['gallery_gallery_pdf'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
   </td>
                          <td><?php echo $_smarty_tpl->tpl_vars['gallery']->value['gallery_gallery_name_id'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</td>
                          <td class="text-center">
                           <a href="<?php echo $_smarty_tpl->tpl_vars['gallery']->value['gallery_edit_link'][$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
" ><span class="label bg-warning">Edit</span></a>
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
