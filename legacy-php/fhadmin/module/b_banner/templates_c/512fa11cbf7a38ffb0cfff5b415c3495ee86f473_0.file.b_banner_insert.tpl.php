<?php
/* Smarty version 3.1.31, created on 2017-10-03 14:19:27
  from "/home/upeje/public_html/fhadmin/module/b_banner/templates/b_banner_insert.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.31',
  'unifunc' => 'content_59d339ffa1d741_75356066',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '512fa11cbf7a38ffb0cfff5b415c3495ee86f473' => 
    array (
      0 => '/home/upeje/public_html/fhadmin/module/b_banner/templates/b_banner_insert.tpl',
      1 => 1504670615,
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
function content_59d339ffa1d741_75356066 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_bannerid']->value != '') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
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
                                    <li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_bannerid']->value != '') {?>Edit<?php } else { ?>Insert<?php }?></li>
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
?data_bannerid=<?php echo $_smarty_tpl->tpl_vars['data_bannerid']->value;?>
">
                            <div class="row">
                                <div class="col-sm-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> <strong>Basic Configuration</strong> </header>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Type</label>
                                                <div class="col-sm-3">
                                                    <select class="form-control" name="data_bannertype" id="data_bannertype" style="display: none;">
                                                        <option value=""> == Select type == </option>
                                                        <?php
$__section_listing_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_listing']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing'] : false;
$__section_listing_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['optarray_type']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_listing_0_total = $__section_listing_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = new Smarty_Variable(array());
if ($__section_listing_0_total != 0) {
for ($__section_listing_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] = 0; $__section_listing_0_iteration <= $__section_listing_0_total; $__section_listing_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']++){
?>
                                                            <?php if ($_smarty_tpl->tpl_vars['optarray_type']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)] == $_smarty_tpl->tpl_vars['default_size']->value) {?>
                                                                <option value="<?php echo $_smarty_tpl->tpl_vars['optarray_type']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
" <?php if ($_smarty_tpl->tpl_vars['data_bannertype']->value == $_smarty_tpl->tpl_vars['optarray_type']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray_type']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</option>
                                                            <?php }?>
                                                        <?php
}
}
if ($__section_listing_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = $__section_listing_0_saved;
}
?>
                                                    </select>
                                                    <p class="form-control-static"><b>Home Right Bottom</b></p>
                                                </div>
                                                <label class="col-sm-2 control-label">Expired Date</label>
                                                <div class="col-sm-2">
                                                    <input class="datepicker-input form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_bannerdate" value="<?php echo $_smarty_tpl->tpl_vars['data_bannerdate']->value;?>
" size="16" data-date-format="dd-mm-yyyy">
                                                </div>
                                                <label class="col-sm-1 control-label">Status</label>
                                                <div class="col-sm-2">
                                                    <select data-required="true" class="form-control" name="data_bannerstatus">
                                                        <?php
$__section_listing_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_listing']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing'] : false;
$__section_listing_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['optarray_status']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_listing_1_total = $__section_listing_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = new Smarty_Variable(array());
if ($__section_listing_1_total != 0) {
for ($__section_listing_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] = 0; $__section_listing_1_iteration <= $__section_listing_1_total; $__section_listing_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']++){
?>
                                                            <option value="<?php echo $_smarty_tpl->tpl_vars['optarray_status']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
"<?php if ($_smarty_tpl->tpl_vars['data_bannerstatus']->value == $_smarty_tpl->tpl_vars['optarray_status']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray_status']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_listing']->value['index'] : null)];?>
</option>
                                                        <?php
}
}
if ($__section_listing_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_listing'] = $__section_listing_1_saved;
}
?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="line line-dashed b-b line-lg pull-in"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" data-required="true" placeholder="title" name="data_bannertitle" value="<?php echo $_smarty_tpl->tpl_vars['data_bannertitle']->value;?>
">
                                                </div>
                                            </div>
                                            <div class="line line-dashed b-b line-lg pull-in"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Title (EN)</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" data-required="true" placeholder="title" name="data_bannertitle_en" value="<?php echo $_smarty_tpl->tpl_vars['data_bannertitle_en']->value;?>
">
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                                <div class="col-sm-12">
                                    <section class="panel panel-default">
                                        <header class="panel-heading"> <strong>Image & Link Configuration</strong> </header>
                                        <div class="panel-body">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Banner Image</label>
                                                <div class="col-md-6 col-sm-9">
                                                    <input type="file"<?php if ($_smarty_tpl->tpl_vars['data_bannerid']->value == '') {?> data-required="true"<?php }?> class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_bannerpic">
                                                    <br /><small id="type">[Width : <?php echo $_smarty_tpl->tpl_vars['width']->value;?>
px x <?php echo $_smarty_tpl->tpl_vars['height']->value;?>
px]</small>
                                                    <br />
                                                    <?php if ($_smarty_tpl->tpl_vars['data_bannerpic']->value != '') {?>
                                                        <div class="thumbnail m-t-xs">
                                                            <a href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;
echo $_smarty_tpl->tpl_vars['data_bannerpic']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;
echo $_smarty_tpl->tpl_vars['data_bannerpic']->value;?>
" alt="Loading..."></a>
                                                            
                                                        </div>
                                                    <?php }?>
                                                </div>
                                            </div>
                                            <div class="line line-dashed b-b line-lg pull-in"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Banner Link</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" data-required="true" placeholder="http://" name="data_bannerurl" value="<?php echo $_smarty_tpl->tpl_vars['data_bannerurl']->value;?>
">
                                                    <br />
                                                    <font color="red">Note: Please Use 'http://' for eksternal link</font>
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
                                                <div class="col-sm-4 col-sm-offset-5">
                                                    <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
                                                    <?php if ($_smarty_tpl->tpl_vars['data_bannerid']->value != '') {?>
                                                        <input type="hidden" name="data_bannerid" value="<?php echo $_smarty_tpl->tpl_vars['data_bannerid']->value;?>
">
                                                        <button type="submit" class="btn btn-primary" name="edit" value="1"><i class="fa fa-floppy-o"></i> Save</button>
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
 src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/sortable/jquery.sortable.js"><?php echo '</script'; ?>
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

<?php echo '<script'; ?>
>
    var index = <?php if ($_smarty_tpl->tpl_vars['data_kataterkaitloop']->value > 0) {
echo $_smarty_tpl->tpl_vars['data_kataterkaitloop']->value;
} else { ?>0<?php }?>;
    $(document).ready(function(){
        $('#addTags').on('click', function(){
            var tpl = '<li class="list-group-item bg-warning" draggable="true" id="tag-'+index+'">'+
                '<span class="pull-right">'+
                '  <a href="#" onclick="javascript:deleteTag(\''+index+'\');"><i class="fa fa-times fa-fw m-l-sm"></i></a>'+
                '</span>'+
                '<span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> &nbsp;</span>'+
                '<div class="clear text-black">'+
                '  <input class="form-control" type="text" name="data_kataterkait[]" size="30" value="">'+
                '</div>'+
                '</li>';

            $('#tags-container').append(tpl).sortable('refresh');
            index++;
            return;
        });
    });

    function deleteTag(i){
        $('#tag-'+i).remove();
    }
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
