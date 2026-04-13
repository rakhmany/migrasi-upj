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
			
			
  <form name=form method=post enctype="multipart/form-data"  action={php}echo $_SERVER['PHP_SELF']; {/php}{if $data_primarykey neq ''}?data_primarykey={$data_primarykey}{/if}>
   			<div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic information</strong> </header>
                    
                    <div class="panel-body">
	                    <div class="row">
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">{$mainfieldnamed}</label>
	                        <div class="col-sm-6">
	                          <input  name="data_mainfieldname" value="{$data_mainfieldname}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">ISO Desc</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_name_en" value="{$data_d_slideshow_name_en}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">ISO Desc (ID)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_subtext_id" value="{$data_d_slideshow_subtext_id}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">ISO Desc (EN)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_subtext_en" value="{$data_d_slideshow_subtext_en}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Link (optional)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_link" value="{$data_d_slideshow_link}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Link text (ID)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_linktext_id" value="{$data_d_slideshow_linktext_id}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     <div class="row hidden">
	                     <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Link text (EN)</label>
	                        <div class="col-sm-6">
	                          <input  name="data_d_slideshow_linktext_en" value="{$data_d_slideshow_linktext_en}" type="text" class="form-control" >
	                        </div>
	                      </div>
	                     </div>
	                     
	                      
	                     <div class="row">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Image</label>
	                        <div class="col-sm-6">
	                          <input type="file" name="data_mainimage"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
	                          <span style="color: red;">{$best_image_view}</span>
	                         </div>
	                        </div> 
	                      </div>
	                      {$oldimage}
                    </div>
                  </section>
              </div>
          </div>  
          <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Status</strong> </header>
                    <div class="panel-body">
                      <div class="row">
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Show/Hide</label>
	                        <div class="col-sm-6">
	                          	<select class="form-control" name="data_d_slideshow_status"  > 
	                                {html_options values=$option_showhide_val selected=$data_d_slideshow_status output=$option_showhide_name} 
	                            </select>
	                        </div>
	                      </div>
	                    </div>
	                    <div class="row hidden">
	                    <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Text Position</label>
	                        <div class="col-sm-6">
	                          	<select class="form-control" name="data_d_slideshow_pos"  > 
	                                {html_options values=$option_pos_val selected=$data_d_slideshow_pos output=$option_pos_name} 
	                            </select>
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
{literal}
<script type="text/javascript">
function change_icon()
{
	v = $("#icon_selection").val();
	$("#icon_preview").removeClass();
	if(v != '')
	{
		$("#icon_preview").addClass("fa");
		$("#icon_preview").addClass("fa-"+v);
	}
}
</script>
{/literal}
{include file='../../../templates/scale/footer.tpl'}
<!-- include spesifik js disini -->
<script src="{$themesurl_admin}js/file-input/bootstrap-filestyle.min.js"></script>

 
</body>
</html>

