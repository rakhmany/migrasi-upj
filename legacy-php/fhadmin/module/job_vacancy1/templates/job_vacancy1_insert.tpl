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
				<span class="h5">{if $data_jobvacancyid neq ''}Edit{else}Insert{/if} {$title}</span>
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
					<li class="active"><i class="fa fa-pencil"></i> {if $data_jobvacancyid neq ''}Edit{else}Insert{/if}</li>
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
			
			<form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="{$smarty.server.PHP_SELF}?data_jobvacancyid={$data_jobvacancyid}">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-6">
                          <select data-required="true" class="form-control" name="data_jobvacancycat">
						  {section name=listing loop=$optarray_jobvacancycat}
							<option value="{$optarray_jobvacancycat[listing]}"{if $data_jobvacancycat eq $optarray_jobvacancycat[listing]} selected{/if}>{$optarray_jobvacancycat[listing]}</option>
						  {/section}
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Date</label>
                        <div class="col-sm-2">
                          <input class="datepicker-input form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_jobvacancydatestart" value="{$data_jobvacancydatestart}" size="16" data-date-format="dd-mm-yyyy">
                        </div>
                        <label class="col-sm-1 control-label">To</label>
                        <div class="col-sm-2">
                          <input class="datepicker-input form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_jobvacancydateend" value="{$data_jobvacancydateend}" size="16" data-date-format="dd-mm-yyyy">
                        </div>
                        <label class="col-sm-1 control-label">Status</label>
                        <div class="col-sm-3">
                          <select data-required="true" class="form-control" name="data_jobvacancystatus">
						  {section name=listing loop=$optarray_status}
							<option value="{$optarray_status[listing]}"{if $data_jobvacancystatus eq $optarray_status[listing]} selected{/if}>{$optarray_status[listing]}</option>
						  {/section}
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_jobvacancytitle" value="{$data_jobvacancytitle}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_jobvacancytitle_en" value="{$data_jobvacancytitle_en}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_jobvacancydescription" id="data_jobvacancydescription">{$data_jobvacancydescription}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Description (EN)</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_jobvacancydescription_en" id="data_jobvacancydescription_en">{$data_jobvacancydescription_en}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Code</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="Code" name="data_jobvacancy_code" value="{$data_jobvacancy_code}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Salary range</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control"   placeholder="Salary range" name="data_jobvacancy_salary" value="{$data_jobvacancy_salary}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Work experience</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control"   placeholder="Work exp" name="data_jobvacancy_workexp" value="{$data_jobvacancy_workexp}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Part Time / Full Time</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control"   placeholder="Full/Part" name="data_jobvacancy_fullpart" value="{$data_jobvacancy_fullpart}">
                        </div>
                      </div>
					  <!-- 
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Qualifications</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_jobvacancyqualification" id="data_jobvacancyqualification">{$data_jobvacancydescription_en}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Qualifications (EN)</label>
                        <div class="col-sm-10">
                          <textarea data-required="true" class="form-control jckeditor" name="data_jobvacancyqualification_en" id="data_jobvacancyqualification_en">{$data_jobvacancydescription_en}</textarea>
                        </div>
                      </div>
					   -->
                    </div>
                  </section>
              </div>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>SEO settings</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Meta Tags</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="3" name="data_metatag" id="data_metatag" maxlength="255">{$data_metatag}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Meta Description</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="5" name="data_metadescription" id="data_metadescription" data-maxlength="255">{$data_metadescription}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Meta Keywords</label>
                        <div class="col-sm-9">
                          <textarea class="form-control" rows="3" name="data_metakeyword" id="data_metakeyword" data-maxlength="255">{$data_metakeyword}</textarea>
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
						  {if $data_jobvacancyid neq ''}
						  <input type="hidden" name="data_jobvacancyid" value="{$data_jobvacancyid}">
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
</body>
</html>