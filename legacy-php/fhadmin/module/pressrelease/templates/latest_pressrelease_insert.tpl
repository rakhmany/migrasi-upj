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
				<span class="h5">{if $data_newsid neq ''}Edit{else}Insert{/if} {$title}</span>
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
					<li class="active"><i class="fa fa-pencil"></i> {if $data_newsid neq ''}Edit{else}Insert{/if}</li>
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
			
			<form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="{$smarty.server.PHP_SELF}?data_newsid={$data_newsid}">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-3">
                          <input class="datepicker-input form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_newsdate" value="{$data_newsdate}" size="16" data-date-format="dd-mm-yyyy">
                        </div>
                        <label class="col-sm-1 control-label">Status</label>
                        <div class="col-sm-3">
                          <select data-required="true" class="form-control" name="data_newsstatus">
						  {section name=listing loop=$optarray_status}
							<option value="{$optarray_status[listing]}"{if $data_newsstatus eq $optarray_status[listing]} selected{/if}>{$optarray_status[listing]}</option>
						  {/section}
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">News Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_newstitle" value="{$data_newstitle}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">news Title (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_newstitle_en" value="{$data_newstitle_en}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description</label>
                        <div class="col-sm-10">
                         <textarea class="form-control" data-minlength="6" data-maxlength="255" rows="5" cols="50" name="data_newsshortdesc" id="data_newsshortdesc">{$data_newsshortdesc}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description (EN)</label>
                        <div class="col-sm-10">
                         <textarea class="form-control" data-minlength="6" data-maxlength="255" rows="5" cols="50" name="data_newsshortdesc_en" id="data_newsshortdesc_en">{$data_newsshortdesc_en}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_newsdescription" id="data_newsdescription">{$data_newsdescription}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_newsdescription_en" id="data_newsdescription_en">{$data_newsdescription_en}</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
              <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>SEO settings</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Meta Tags</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="3" name="data_metatag" id="data_metatag" maxlength="255">{$data_metatag}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Meta Description</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="5" name="data_metadescription" id="data_metadescription" data-maxlength="255">{$data_metadescription}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Meta Keywords</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="3" name="data_metakeyword" id="data_metakeyword" data-maxlength="255">{$data_metakeyword}</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
              <div class="col-sm-6">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Image Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Main Image</label>
                        <div class="col-sm-9">
						  <input type="file"{if $data_newsid eq ''} data-required="true"{/if} class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_mainimage">
                          <br /><small>[Width : {$width}px x {$height}px]</small><br />
						  {if $data_newsmainimage neq ''}
						  <div class="thumbnail m-t-xs">
							<a href="#"><img src="{$path_image}{$data_newsmainimage}" alt=""></a>
							<div class="caption">
							  <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delimage" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Main Image</button></p>
							</div>
						  </div>
						  {/if}
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row hidden">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Tags</strong> </header>
                    <div class="panel-body">
					  <div class="form-group">
						<label class="col-sm-2 control-label">Related tags<br /> <button id="addTags" type="button"><i class="fa fa-plus fa-fw"></i> Add tag</button></label>
						<div class="col-sm-10 scrollable wrapper">
						   <div class="">
							<ul class="list-group gutter list-group-lg list-group-sp sortable" id="tags-container">
							  {if $data_kataterkaitloop > 0}
							  {section name=list loop=$data_kataterkait}
							  <li class="list-group-item bg-warning" draggable="true" id="tag-{$smarty.section.list.index}">
								<span class="pull-right">
								  <a href="#" onclick="javascript:deleteTag('{$smarty.section.list.index}');"><i class="fa fa-times fa-fw m-l-sm"></i></a>                  
								</span>
								<span class="pull-left media-xs"><i class="fa fa-sort text-muted fa m-r-sm"></i> &nbsp;</span>
								<div class="clear text-black">
								  <input type="text" class="form-control" name="data_kataterkait[]" value="{$data_kataterkait[list]}">
								</div>
							  </li>
							  {/section}
							  {/if}
							</ul>
						  </div>
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
						  {if $data_newsid neq ''}
						  <input type="hidden" name="data_newsid" value="{$data_newsid}">
						  <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-floppy-o"></i> Save</button>
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