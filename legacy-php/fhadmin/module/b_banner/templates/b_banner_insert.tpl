<!DOCTYPE html>
<html lang="en" class="app">
<head>
    {include file='../../../templates/scale/header_meta.tpl'}
    <!-- include style disini -->
</head>
<body class="">
<section class="vbox">
    {include file='../../../templates/scale/header.tpl'}
    <section>
        <section class="hbox stretch">
            {include file='../../../templates/scale/sidebar.tpl'}
            <section id="content">
                <section class="vbox">
                    <header class="header bg-white b-b clearfix">
                        <div class="row m-t-sm">
                            <div class="col-sm-5 m-b-xs">
                                <a href="{$smarty.server.PHP_SELF}" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
                                <span class="h5">{if $data_bannerid neq ''}Edit{else}Insert{/if} {$title}</span>
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
                                    <li><a href="{$baseurl_admin}"><i class="fa fa-home"></i> Home</a></li>
                                    <li><a href="{$smarty.server.PHP_SELF}"><i class="fa fa-list-ul"></i> {$title}</a></li>
                                    <li class="active"><i class="fa fa-pencil"></i> {if $data_bannerid neq ''}Edit{else}Insert{/if}</li>
                                </ul>
                                <!-- / .breadcrumb -->
                            </div>
                        </div>
                        {if $msg neq ''}
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">x</button>
                                <i class="fa fa-ok-sign"></i>{$msg}
                            </div>
                        {/if}

                        <form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="{$smarty.server.PHP_SELF}?data_bannerid={$data_bannerid}">
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
                                                        {section name=listing loop=$optarray_type}
                                                            {if $optarray_type[listing] eq $default_size}
                                                                <option value="{$optarray_type[listing]}" {if $data_bannertype eq $optarray_type[listing]} selected {/if}>{$optarray_type[listing]}</option>
                                                            {/if}
                                                        {/section}
                                                    </select>
                                                    <p class="form-control-static"><b>Home Right Bottom</b></p>
                                                </div>
                                                <label class="col-sm-2 control-label">Expired Date</label>
                                                <div class="col-sm-2">
                                                    <input class="datepicker-input form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_bannerdate" value="{$data_bannerdate}" size="16" data-date-format="dd-mm-yyyy">
                                                </div>
                                                <label class="col-sm-1 control-label">Status</label>
                                                <div class="col-sm-2">
                                                    <select data-required="true" class="form-control" name="data_bannerstatus">
                                                        {section name=listing loop=$optarray_status}
                                                            <option value="{$optarray_status[listing]}"{if $data_bannerstatus eq $optarray_status[listing]} selected{/if}>{$optarray_status[listing]}</option>
                                                        {/section}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="line line-dashed b-b line-lg pull-in"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Title</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" data-required="true" placeholder="title" name="data_bannertitle" value="{$data_bannertitle}">
                                                </div>
                                            </div>
                                            <div class="line line-dashed b-b line-lg pull-in"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Title (EN)</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" data-required="true" placeholder="title" name="data_bannertitle_en" value="{$data_bannertitle_en}">
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
                                                    <input type="file"{if $data_bannerid eq ''} data-required="true"{/if} class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_bannerpic">
                                                    <br /><small id="type">[Width : {$width}px x {$height}px]</small>
                                                    <br />
                                                    {if $data_bannerpic neq ''}
                                                        <div class="thumbnail m-t-xs">
                                                            <a href="{$path_file_image}{$data_bannerpic}"><img src="{$path_file_image}{$data_bannerpic}" alt="Loading..."></a>
                                                            {*<div class="caption">
                                                                <!-- <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delimage" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Main Image</button></p> -->
                                                            </div>*}
                                                        </div>
                                                    {/if}
                                                </div>
                                            </div>
                                            <div class="line line-dashed b-b line-lg pull-in"></div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label">Banner Link</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" data-required="true" placeholder="http://" name="data_bannerurl" value="{$data_bannerurl}">
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
                                                    <a href="{$smarty.server.PHP_SELF}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
                                                    {if $data_bannerid neq ''}
                                                        <input type="hidden" name="data_bannerid" value="{$data_bannerid}">
                                                        <button type="submit" class="btn btn-primary" name="edit" value="1"><i class="fa fa-floppy-o"></i> Save</button>
                                                    {else}
                                                        <button type="submit" class="btn btn-primary" name="insert"><i class="fa fa-floppy-o"></i> Submit</button>
                                                    {/if}
                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </form>

                    </section>
                    <footer class="footer bg-white b-t b-light">
                        <p>Copyright {$smarty.now|date_format:"%Y"} - All rights reserved by faberhost.com</p>
                    </footer>
                </section>
                <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
            </section>
        </section>
    </section>
</section>
{include file='../../../templates/scale/footer.tpl'}
<!-- include spesifik js disini -->
<script src="{$themesurl_admin}js/datepicker/bootstrap-datepicker.js"></script>
<script src="{$themesurl_admin}js/file-input/bootstrap-filestyle.min.js"></script>
<script src="{$themesurl_admin}js/sortable/jquery.sortable.js"></script>
<script src="{$baseurl_admin}lib/ckeditor/ckeditor.js"></script>
<script src="{$baseurl_admin}lib/ckeditor/adapters/jquery.js"></script>
<script src="{$baseurl_admin}lib/ckfinder/ckfinder.js"></script>
<!-- custom script disini -->
<script src="{$baseurl_admin}include/js/localscript.js"></script>
{literal}
<script>
    var index = {/literal}{if $data_kataterkaitloop > 0}{$data_kataterkaitloop}{else}0{/if}{literal};
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
</script>
{/literal}
</body>
</html>