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
				<span class="h5">{if $data_productid neq ''}Edit{else}Insert{/if} {$title}</span>
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
					<li class="active"><i class="fa fa-pencil"></i> {if $data_productid neq ''}Edit{else}Insert{/if}</li>
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
			
			<form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="{$smarty.server.PHP_SELF}{if $fh_basicconfigid neq ''}?fh_basicconfigid={$fh_basicconfigid}{/if}">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      {*<div class="form-group">
                        <label class="col-sm-2 control-label">Parent</label>
                        <div class="col-sm-6">
                          <select class="form-control" name="coremenu" id="coremenu">
							<option value=""> = Root = </option>
							{$strukturmenu}
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>*}
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Menu Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="name" name="fh_menu_name" value="{$fh_menu_name}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Menu Name (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="name" name="fh_menu_name_en" value="{$fh_menu_name_en}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      {*<div class="form-group">
                        <label class="col-sm-2 control-label">Menu Type</label>
                        <div class="col-sm-6">
                          {section name=listing loop=$optarray_strukturparenttipe}
							<label class="radio-inline i-checks">
							  <input type="radio" 
									name="fh_strukturparenttipe"
									id="fh_strukturtipeid{$smarty.section.listing.index}" 
									onClick="javascript:method_change('{$smarty.section.listing.index}');" 
									value="{$optarray_strukturparenttipe[listing]}" 
									{if $fh_strukturparenttipe eq $optarray_strukturparenttipe[listing]} checked {/if}
							  /><i></i> {$optarray_strukturparenttipe[listing]} 
							</label>
						   {/section}
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>*}
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-8">
							{*<!-- {section name=listing loop=$optarray_menucat}
								<label class="checkbox-inline i-checks">
								  <input name="fh_menu_cat[]" type="checkbox" value="{$optarray_menucat[listing]}"
									{section name=listing2 loop=$fh_menu_catselected}
									{if $fh_menu_catselected[listing2] eq $optarray_menucat[listing]} checked{/if}
									{/section}
								  /><i></i> {$optarray_menucat[listing]}
								</label>
							{/section} -->*}
							<select name="fh_menu_cat[]" style="width:100%" multiple class="chosen-select">
							{section name=listing loop=$optarray_menucat}
							  <option value="{$optarray_menucat[listing]}"
								{section name=listing2 loop=$fh_menu_catselected}
								{if $fh_menu_catselected[listing2] eq $optarray_menucat[listing]} selected{/if}
								{/section}
								>{$optarray_menucat[listing]}</option>
							{/section}
							</select>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row" id="statusmenu1">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Content Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-2">
							<select class="form-control" name="fh_strukturstatus">
                             {section name=listing loop=$optarray_strukturcontentstatus}
                                <option 
                                    value="{$optarray_strukturcontentstatus[listing]}" 
                                    {if $fh_strukturcontentstatus eq $optarray_strukturcontentstatus[listing]} selected {/if}
                                 >{$optarray_strukturcontentstatus[listing]}</option>
                            {/section}
                            </select>
                        </div>
                      </div>
                      {*<div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Content Type</label>
                        <div class="col-sm-3">
							<select class="form-control" name="fh_strukturcontenttipe" onChange="javascript:method_change_content(this);">
                                <option value='' >-- Choose One --</option>
                                {section name=listing loop=$optarray_strukturcontenttipe}
                                <option 
                                    id="fh_strukturcontenttipeid{$smarty.section.listing.index}" 
                                    value="{$optarray_strukturcontenttipe[listing]}" 
                                    {if $fh_strukturcontenttipe eq $optarray_strukturcontenttipe[listing]} selected {/if}
                                 >{$optarray_strukturcontenttipe[listing]}</option>
                                {/section}
                            </select>
                        </div>
                      </div>*}
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row" id="statusmenu2">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Page Static Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Page Header</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Page Header" name="fh_menu_pageheader" value="{$fh_menu_pageheader}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Page Header (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Page Header" name="fh_menu_pageheader_en" value="{$fh_menu_pageheader_en}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Meta Keyword <small>(optional)</small></label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="fh_menu_metakeyword" id="fh_menu_metakeyword" cols="50" rows="6" data-maxlength="255">{$fh_menu_metakeyword}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Meta Description (EN) <small>(optional)</small></label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="fh_menu_metadescription" id="fh_menu_metadescription" cols="50" rows="6" data-maxlength="255">{$fh_menu_metadescription}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="title" name="fh_content_title" value="{$fh_content_title}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="title" name="fh_content_title_en" value="{$fh_content_title_en}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Banner Image</label>
                        <div class="col-sm-10">
						  <input type="file" class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="fh_content_banner">
                          <br /><small>[Width : {$width}px x {$height}px]</small><br />
						  {if $fh_content_banner neq ''}
						  <div class="thumbnail m-t-xs">
							<a href="{$path_image}{$fh_content_banner}"><img src="{$path_image}{$fh_content_banner}?{$smarty.now}" alt=""></a>
							<div class="caption">
							  <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delbanner" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Banner</button></p>
							</div>
						  </div>
						  {/if}
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Coloumn Type</label>
                        <div class="col-sm-2">
                        	<select name="fh_coloumn_count" id="fh_coloumn_count" class="form-control" onchange="javascript: kolom_change(); " >
                          		{html_options  options=$optarray_kolomtype selected=$fh_coloumn_count}
                          	</select>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            {*<div class="row" id="statusmenu3" {if ($fh_strukturparenttipe eq 'Parent') || ($fh_strukturcontenttipe eq 'Statis') || ($fh_strukturcontenttipe eq '') } style="display:none;" {/if}>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Module Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">File Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="Custom link" name="fh_modulefilename" value="{$fh_modulefilename}" maxlength="255">
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>*}
			
            <div class="row" id="kolom_satu">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Kolom 1</strong> </header>
                    <div class="panel-body"> 
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description" id="fh_content_description">{$fh_content_description}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description_en" id="fh_content_description_en">{$fh_content_description_en}</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
            <div class="row" id="kolom_dua">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Kolom 2</strong> </header>
                    <div class="panel-body"> 
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description2" id="fh_content_description2">{$fh_content_description2}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description2_en" id="fh_content_description2_en">{$fh_content_description2_en}</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
            <div class="row" id="kolom_tiga">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Kolom 3</strong> </header>
                    <div class="panel-body"> 
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description3" id="fh_content_description3">{$fh_content_description3}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="fh_content_description3_en" id="fh_content_description3_en">{$fh_content_description3_en}</textarea>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
            
            <div class="row">
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
						<div class="col-sm-4 col-sm-offset-2">
						  <a href="{$smarty.server.PHP_SELF}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
						  {if $flag1 eq 'insert'}
						  <button type="submit" class="btn btn-primary" name="insertmenu" value="Add"><i class="fa fa-floppy-o"></i> Submit</button>
						  {else}
						  <input type="hidden" name="fh_strukturid" value="{$fh_strukturid}">
						  <button type="submit" class="btn btn-primary" name="editmenu" value="edit"><i class="fa fa-floppy-o"></i> Save</button>
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
<script src="{$baseurl_admin}lib/ckeditor/ckeditor.js"></script>
<script src="{$baseurl_admin}lib/ckeditor/adapters/jquery.js"></script>
<script src="{$baseurl_admin}lib/ckfinder/ckfinder.js"></script>
<!-- custom script disini -->
<script src="{$baseurl_admin}include/js/localscript.js"></script>
{literal}
<script type="text/javascript">
function method_change(index){
	var objMethod = document.getElementById('fh_strukturtipeid' + index);
	var objFaberHost1 = document.getElementById('statusmenu1'); 
	var objFaberHost2 = document.getElementById('statusmenu2');
	var objFaberHost3 = document.getElementById('statusmenu3');
	var method = objMethod.value;	

	if(method == 'Parent'){
		objFaberHost1.style.display	='none';
		objFaberHost2.style.display	='none';
		objFaberHost3.style.display	='none';
        window.document.form.fh_strukturcontenttipe.value = '';
    } else {
 		objFaberHost1.style.display	='';
    }
}

function method_change_content(index){
	
	//index = $("#"+indexxxx).val();
	//var objMethod = document.getElementById('fh_strukturcontenttipeid' + index);
	/// Modified By: Bambang (Support Chrome)
	var objFaberHost2 = document.getElementById('statusmenu2');
	var objFaberHost3 = document.getElementById('statusmenu3');
	var method = index.value;//objMethod.value;	

	if(method == 'Statis'){
		objFaberHost2.style.display	='';
		objFaberHost3.style.display	='none';
    } else {
		objFaberHost2.style.display	='none';
		objFaberHost3.style.display	='';
    }
}

function method_change_content_default(index){
	var objFaberHost2 = document.getElementById('statusmenu2');
	var objFaberHost3 = document.getElementById('statusmenu3');
	objFaberHost2.style.display	='none';
	objFaberHost3.style.display	='none';
}

function kolom_change(){
	var objMethod = document.getElementById('fh_coloumn_count');
	var objFaberHost1 = document.getElementById('kolom_satu'); 
	var objFaberHost2 = document.getElementById('kolom_dua');
	var objFaberHost3 = document.getElementById('kolom_tiga');
	var method = objMethod.value;	
	
	objFaberHost1.style.display	='';
	objFaberHost2.style.display	='none';
	objFaberHost3.style.display	='none';
		
	if(method >= 1  ){ 
		objFaberHost2.style.display	='';
		 
    } 
    if(method >= 2  ){ 
		objFaberHost3.style.display	='';
		 
    }  
}
kolom_change();
</script>

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