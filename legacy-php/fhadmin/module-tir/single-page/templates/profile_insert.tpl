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
          <header class="header bg-info b-b clearfix">
			<div class="row m-t-sm">
			  <div class="col-sm-5 m-b-xs">
				<a href="{$smarty.server.PHP_SELF}" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
				<span class="h5">{if $data_primarykey neq ''}Edit{else}Insert{/if} {$title}</span>
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
					<li class="active"><i class="fa fa-pencil"></i> {if $data_primarykey neq ''}Edit{else}Insert{/if}</li>
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
			{if $pesan_sukses neq ''}
			<div class="alert alert-success">
			  <button type="button" class="close" data-dismiss="alert">x</button>
			  <i class="fa fa-ok-sign"></i>{$pesan_sukses}
			</div>
			{/if}
  <form name=form method=post enctype="multipart/form-data"  action={php}echo $_SERVER['PHP_SELF']; {/php}{if $data_primarykey neq ''}?data_primarykey={$data_primarykey}{/if}>
   			<div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic information</strong> </header>
                    <div class="panel-body">
	                   
	                     <div class="row ">
	                     
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">{$mainfieldnamed}</label>
	                        <div class="col-sm-6">
	                          <input  name="data_mainfieldname" value="{$data_mainfieldname}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                      <div class="row">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Title (EN)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_content_title_en" value="{$data_content_title_en}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Expired Date</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_newsmain_date" value="{$data_d_newsmain_date}" type="text" class="form-control datepicker-input"  data-date-format="dd-mm-yyyy" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Description (ID)</label>
	                        <div class="col-sm-6">
	                        	<textarea class="form-control" name="data_content_short_id" id="data_content_short_id">{$data_content_short_id}</textarea>
	                        </div> 
	                      </div>
	                     </div>
	                     <div class="row ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Description (EN)</label>
	                        <div class="col-sm-6">
	                        	<textarea class="form-control" name="data_content_short_en" id="data_content_short_en">{$data_content_short_en}</textarea>
	                        </div>  
	                      </div>
	                     </div>
	                      <div class="row hidden ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Full description (EN)</label>
	                        <div class="col-sm-10">
	                          <textarea class="form-control jckeditor " name="data_content_long_en" id="data_content_long_en">{$data_content_long_en}</textarea>
	                        </div>
	                      </div>
	                     </div>  
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Full description (ID)</label>
	                        <div class="col-sm-10">
	                          <textarea class="form-control jckeditor " name="data_content_long_id" id="data_content_long_id">{$data_content_long_id}</textarea>
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row ">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Image Video</label>
	                        <div class="col-sm-6">
	                          <input type="file" name="data_mainimage"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
	                          <span style="color: red;">{$best_image_view}</span>
	                         </div>
	                        </div> 
	                      </div>
	                      {$oldimage}
	                      <div class="row ">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Youtube URL</label>
	                        <div class="col-sm-6">
	                          <input  name="data_content_link" value="{$data_content_link}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">MP4</label>
	                        <div class="col-sm-6">
	                          <input type="file" name="data_mainpdf"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
	                           
	                         </div>
	                        </div> 
	                      </div>
	                     <!---
	                      {$oldpdf}
	                      
	                      !--->
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
						  {if $data_primarykey neq ''}
						  <input type=hidden name=data_primarykey value="{$data_primarykey}" />
						  <button type="submit" class="btn btn-primary" name="edit" value="save"><i class="fa fa-floppy-o"></i> Save</button>
						  {else}
						  <button type="submit" class="btn btn-primary" name="insert" value="submit"><i class="fa fa-floppy-o"></i> Submit</button>
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
<!-- include spesifik js disini -->
<script src="{$themesurl_admin}js/datepicker/bootstrap-datepicker.js"></script>
<script src="{$themesurl_admin}js/file-input/bootstrap-filestyle.min.js"></script>
<script src="{$baseurl_admin}lib/ckeditor/ckeditor.js"></script>
<script src="{$baseurl_admin}lib/ckeditor/adapters/jquery.js"></script>
<script src="{$baseurl_admin}lib/ckfinder/ckfinder.js"></script>
<!-- custom script disini -->
<script src="{$baseurl_admin}include/js/localscript.js"></script>
{if $ckeditor_reloaded eq '1'}
	<script>
	location.reload();
	</script>
{/if}
</body>
</html>