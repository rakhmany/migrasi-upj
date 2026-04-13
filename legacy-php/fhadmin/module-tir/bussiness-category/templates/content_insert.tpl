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
	                        <label class="col-sm-2 control-label">Category Name (ID)</label>
	                        <div class="col-sm-6">
	                          <input   name="data_mainfieldname" value="{$data_mainfieldname}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div> 
	                  <div class="row  ">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Category Name (EN)</label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_title_en" value="{$data_d_content_title_en}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div>
	                   <div class="row hidden">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Fax </label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_fax" value="{$data_d_content_fax}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div>
	                   
	                   <div class="row hidden">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Address </label>
	                        <div class="col-sm-6">
	                        	<textarea class="form-control  " name="data_d_content_address" id="data_d_content_address">{$data_d_content_address}</textarea> 
                        	</div>
	                      </div>
	                  </div>
	                   <div class="row hidden">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Instagram </label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_instagram" value="{$data_d_content_instagram}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div>
	                   <div class="row hidden">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Facebook </label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_fb" value="{$data_d_content_fb}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div>
	                  <div class="row hidden">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Linkedin </label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_linkedin" value="{$data_d_content_linkedin}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div>
	                  <div class="row hidden">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Youtube </label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_youtube" value="{$data_d_content_youtube}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div>
	                  <div class="row hidden">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Twitter </label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_twitter" value="{$data_d_content_twitter}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div>
	                 <div class="row  ">
		                      <div class="line line-dashed b-b line-lg pull-in"></div>
		                      <div class="form-group">
		                        <label class="col-sm-2 control-label">Home Description (ID)</label>
			                        <div class="col-sm-10">
			                          <textarea class="form-control  " name="data_d_content_shortdesc_id" id="data_d_content_shortdesc_id">{$data_d_content_shortdesc_id}</textarea>
			                        </div>
		                      </div>
	                      </div>
	                      <div class="row  ">
		                      <div class="line line-dashed b-b line-lg pull-in"></div>
		                      <div class="form-group">
		                        <label class="col-sm-2 control-label">Home Description (EN)</label>
			                        <div class="col-sm-10">
			                          <textarea class="form-control  " name="data_d_content_shortdesc_en" id="data_d_content_shortdesc_en">{$data_d_content_shortdesc_en}</textarea>
			                        </div>
		                      </div>
	                      </div> 
	                 
                      <div class="row">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Top Description (ID)</label>
		                        <div class="col-sm-10">
		                          <textarea class="form-control jckeditor" name="data_d_content_longdesc_id" id="data_d_content_longdesc_id">{$data_d_content_longdesc_id}</textarea>
		                        </div>
	                      </div>
                      </div>
                      <div class="row">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Top Description (EN)</label>
		                        <div class="col-sm-10">
		                          <textarea class="form-control jckeditor" name="data_d_content_longdesc_en" id="data_d_content_longdesc_en">{$data_d_content_longdesc_en}</textarea>
		                        </div>
	                      </div>
                      </div>
                      <div class="row">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Bottom Description (ID)</label>
		                        <div class="col-sm-10">
		                          <textarea class="form-control jckeditor" name="data_d_content_footer_id" id="data_d_content_footer_id">{$data_d_content_footer_id}</textarea>
		                        </div>
	                      </div>
                      </div>
                      <div class="row">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Bottom Description (EN)</label>
		                        <div class="col-sm-10">
		                          <textarea class="form-control jckeditor" name="data_d_content_footer_en" id="data_d_content_footer_en">{$data_d_content_footer_en}</textarea>
		                        </div>
	                      </div>
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
	                          	<select class="form-control" name="data_d_content_status"  > 
	                                {html_options values=$option_showhide_val selected=$data_d_content_status output=$option_showhide_name} 
	                            </select>
	                        </div>
	                      </div>
                      </div>
                      <div class="row hidden">
                          <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Is Child Subsidiary</label>
	                        <div class="col-sm-6"> 
                                <select  class="form-control"  name="data_d_content_ischild"   id="data_d_content_ischild"  onchange="change_type();"  >
	                                 {html_options values=$option_ischild_val selected=$data_d_content_ischild output=$arr_ischild_name} 
                            </select> 
	                        </div>
	                      </div>
	                     </div>
	                   <div class="row hidden for_child">
                          <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Parent Subsidiary</label>
	                        <div class="col-sm-6"> 
                                <select  class="form-control"  name="data_d_content_parentcomp"   >
	                                 {html_options values=$option_cat_val selected=$data_d_content_parentcomp output=$option_cat_name} 
                            </select> 
	                        </div>
	                      </div>
	                     </div>
	                     
	                     
                      
                      {if $option_data_priority_stat eq '1'}
                          <div class="row hidden">
                          <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Priority</label>
	                        <div class="col-sm-6"> 
                                <select  class="form-control"  name="data_priority"   >
	                                 {html_options values=$option_data_priority selected=$data_priority output=$option_data_priority} 
                            </select>
                            <input  type="hidden" value="{$data_priority}" name="data_old_priority" />
	                        </div>
	                      </div>
	                     </div>
	                     {/if}
                      <div class="row hidden">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Stock</label>
		                        <div class="col-sm-3">
		                          <input   name="data_d_content_stock" value="{$data_d_content_stock}" type="text" class="form-control" data-required="true" >
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
                    <header class="panel-heading"> <strong>Logo </strong> </header>
                    
                    <div class="panel-body"> 
                      
                         <div class="row  "> 
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Logo</label>
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
	                        <label class="col-sm-2 control-label">Image Home</label>
	                        <div class="col-sm-6">
	                          <input type="file" name="data_mainimage3"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
	                          <span style="color: red;">{$best_image_view3}</span>
	                         </div>
	                        </div> 
	                      </div>
	                      {$oldimage3}
	                      <div class="row">
			                  <div class="line line-dashed b-b line-lg pull-in"></div>
			                      <div class="form-group">
			                        <label class="col-sm-2 control-label">Website </label>
			                        <div class="col-sm-6">
			                          <input   name="data_d_content_website" value="{$data_d_content_website}" type="text" class="form-control" data-required="true" >
		                        	</div>
			                      </div>
			                  </div>
	                      <!---
	                      <div class="row   hidden"> 
	                       <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Image Subsidiary</label>
	                        <div class="col-sm-6">
	                          <input type="file" name="data_mainimage2"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
	                          <span style="color: red;">{$best_image_view3}</span>
	                         </div>
	                        </div> 
	                      </div>
	                      {$oldimage2}
	                      
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
{literal}
 <script>
 
 function change_type()
 {
 	 $(".for_child").hide();
 	 $(".for_parent").hide();
	 var t = $("#data_d_content_ischild").val();
	 if(t == 1)
	 {
	 	$(".for_child").show();
	 }
	 else
	 {
	 	$(".for_parent").show();
	 } 
 }
 change_type();
 </script>
{/literal}
</body>
</html>


