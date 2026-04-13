<?php
/* Smarty version 3.1.31, created on 2017-10-03 16:23:47
  from "/home/upeje/public_html/fhadmin/module/kerjasama/templates/kerjasama_cat_insert.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d35723af73c5_71990086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '54e317007a0d2b0d62cfc4febee297f492da466d' => 
    array (
      0 => '/home/upeje/public_html/fhadmin/module/kerjasama/templates/kerjasama_cat_insert.tpl',
      1 => 1502339526,
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
function content_59d35723af73c5_71990086 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_date_format')) require_once '/home/upeje/public_html/vendor/smarty/smarty/libs/plugins/modifier.date_format.php';
?>
<!DOCTYPE html>
<html lang="en" class="app">
<head>
    <?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- include style disini -->
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
                <section class="vbox">
                    <header class="header bg-white b-b clearfix">
                        <div class="row m-t-sm">
                            <div class="col-sm-5 m-b-xs">
                                <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
                                <span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_cat_id']->value != '') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
                            </div>
                            <div class="col-sm-7 m-b-xs">
                                &nbsp;
                            </div>
                        </div>
                    </header>
                    <section class="scrollable wrapper w-f">
                        <!-- <p class="h4">Contents...</p>
                        <div class="m-b-md">
                          <h3 class="m-b-none">Basic Configuration</h3>
                        </div> -->
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- .breadcrumb -->
                                <ul class="breadcrumb">
                                    <li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
"><i class="fa fa-home"></i> Home</a></li>
                                    <li><a href="<?php echo $_SERVER['PHP_SELF'];?>
"><i class="fa fa-list-ul"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a></li>
                                    <li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_cat_id']->value != '') {?>Edit<?php } else { ?>Insert<?php }?></li>
                                </ul>
                                <!-- / .breadcrumb -->
                            </div>
                        </div>
                        <?php if ($_smarty_tpl->tpl_vars['msg']->value != '') {?>
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <i class="fa fa-ok-sign"></i><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

                            </div>
                        <?php }?>

                        <form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>
?data_cat_id=<?php echo $_smarty_tpl->tpl_vars['data_cat_id']->value;?>
">
                            <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> <strong>Basic Information</strong> </header>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Status</label>
                                                <div class="col-sm-3">
                                                    <select data-required="true" class="form-control" name="data_cat_status">
                                                        <?php
$__section_listing_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_listing']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing'] : false;
$__section_listing_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['optarray']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_listing_0_total = $__section_listing_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = new Smarty_Variable(array());
if ($__section_listing_0_total != 0) {
for ($__section_listing_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] = 0; $__section_listing_0_iteration <= $__section_listing_0_total; $__section_listing_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']++){
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['optarray']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
"<?php if ($_smarty_tpl->tpl_vars['data_cat_status']->value == $_smarty_tpl->tpl_vars['optarray']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
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
                                            <div class="line line-dashed b-b line-lg pull-in"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" data-required="true" placeholder="title" name="data_cat_title" value="<?php echo $_smarty_tpl->tpl_vars['data_cat_title']->value;?>
">
                                                </div>
                                            </div>
                                            <div class="line line-dashed b-b line-lg pull-in"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Title (EN)</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" data-required="true" placeholder="title" name="data_cat_title_en" value="<?php echo $_smarty_tpl->tpl_vars['data_cat_title_en']->value;?>
">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> <strong>Actions</strong> </header>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <div class="col-sm-4 col-sm-offset-2">
                                                    <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
                                                    <?php if ($_smarty_tpl->tpl_vars['data_cat_id']->value != '') {?>
                                                        <input type="hidden" name="data_cat_id" value="<?php echo $_smarty_tpl->tpl_vars['data_cat_id']->value;?>
">
                                                        <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-floppy-o"></i> Save</button>
                                                    <?php } else { ?>
                                                        <button type="submit" class="btn btn-primary" name="insert"><i class="fa fa-floppy-o"></i> Submit</button>
                                                    <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>

                        </form>

                    </section>
                    <footer class="footer bg-white b-t b-light">
                        <p>Copyright <?php echo smarty_modifier_date_format(time(),"%Y");?>
 - All rights reserved by faberhost.com</p>
                    </footer>
                </section>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
            </section>
        </section>
    </section>
</section>
<?php $_smarty_tpl->_subTemplateRender('file:../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- include spesifik js disini -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/datepicker/bootstrap-datepicker.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/file-input/bootstrap-filestyle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/ckeditor.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/adapters/jquery.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckfinder/ckfinder.js"><?php echo '</script'; ?>
>
<!-- custom script disini -->
<?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
include/js/localscript.js"><?php echo '</script'; ?>
>
</body>
</html><?php }
}
