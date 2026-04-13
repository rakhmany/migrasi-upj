<?php /* Smarty version Smarty-3.1.17, created on 2023-09-02 18:47:02
         compiled from "templates\strukturmenulist.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2629664f36706c05aa6-58113393%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '634b33e3cdedd7bce1fd8a36b7d66248af966339' => 
    array (
      0 => 'templates\\strukturmenulist.tpl',
      1 => 1415460646,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2629664f36706c05aa6-58113393',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'title' => 0,
    'msg' => 0,
    'strukturmenu' => 0,
    'view' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_64f36706cb9281_90959331',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_64f36706cb9281_90959331')) {function content_64f36706cb9281_90959331($_smarty_tpl) {?><!DOCTYPE html>
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
				</ul>
			  </li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Malesuada augue</a></li>
            </ul>
          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-white b-b clearfix">
                <div class="row m-t-sm">
				  <div class="col-md-5 col-sm-12 m-b-xs">
				    <span class="h5 m-r-sm"><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
                    <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a>
				  </div>
                  <div class="col-md-7 col-sm-12 text-center-xs">
					&nbsp;
                  </div>
                </div>
              </header>
              <section class="scrollable wrapper w-f">
                  <?php if ($_smarty_tpl->tpl_vars['msg']->value!='') {?>
				  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <i class="fa fa-ban-circle"></i><strong>Well Done!</strong><br />
					<?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

				  </div>
				  <?php }?>
                <section class="panel panel-default">
				  <div class="table-responsive">
					<table class="table table-striped m-b-none">
                      <thead>
                        <tr>
                          <th>[Root]</th>
                          <th width="15%" class="text-center">MENU TYPE</th>
                          <th width="15%" class="text-center">CATEGORY</th>
                          <th width="5%" class="text-center">UP</th>
                          <th width="5%" class="text-center">DOWN</th>
                          <th width="10%" class="text-center">Edit</th>
                          <th width="10%" class="text-center">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
						<?php echo $_smarty_tpl->tpl_vars['strukturmenu']->value;?>

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
