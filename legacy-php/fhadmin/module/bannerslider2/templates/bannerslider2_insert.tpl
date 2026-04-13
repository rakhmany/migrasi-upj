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
						  {section name=listing loop=$optarray}
							<option value="{$optarray[listing]}"{if $data_newsstatus eq $optarray[listing]} selected{/if}>{$optarray[listing]}</option>
						  {/section}
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_newstitle" value="{$data_newstitle}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Title (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="title" name="data_newstitle_en" value="{$data_newstitle_en}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Link <small>(optional)</small></label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" placeholder="http://" name="data_newsurl" value="{$data_newsurl}">
                        </div>
                      </div>
                      {*<div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description <small>(optional)</small></label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="data_newsshortdesc" id="data_newsshortdesc" cols="50" rows="6" data-maxlength="255">{$data_newsshortdesc}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Short Description (EN) <small>(optional)</small></label>
                        <div class="col-sm-10">
                          <textarea class="form-control jckeditor" name="data_newsshortdesc_en" id="data_newsshortdesc_en" cols="50" rows="6" data-maxlength="255">{$data_newsshortdesc_en}</textarea>
                        </div>
                      </div>*}
                    </div>
                  </section>
              </div>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Image Options</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Slider Image</label>
                        <div class="col-sm-10">
						  <input type="file"{if $data_newsid eq ''} data-required="true"{/if} class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_newsbg">
                          <br /><small>[Dimesions :  {$width}px x {$height}px]</small><br />
						  {if $data_newsbg neq ''}
						  <div class="thumbnail m-t-xs">
							<a href="{$path_file_image}{$data_newsbg}"><img src="{$path_file_image}{$data_newsbg}?{$smarty.now}" alt=""></a>
							<div class="caption">
							  <!-- <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delimage" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Image</button></p> -->
							</div>
						  </div>
						  {/if}
                        </div>
                      </div>
                      {*<div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Main Image</label>
                        <div class="col-sm-10">
						  <input type="file"{if $data_newsid eq ''} data-required="true"{/if} class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="data_newspic">
                          <br /><small>[Best dimensions : {$width}px x {$height}px]</small><br />
						  {if $data_newspic neq ''}
						  <div class="thumbnail m-t-xs">
							<a href="{$path_file_image}{$data_newspic}"><img src="{$path_file_image}{$data_newspic}?{$smarty.now}" alt=""></a>
							<div class="caption">
							  <!-- <p align="center" class="text-ellipsis m-b-none"><button type="submit" name="delimage" value="delete" onclick="return konfirmasi();" class="btn btn-sm btn-danger btn-s-xs"><i class="fa fa-trash"></i>  Delete Image</button></p> -->
							</div>
						  </div>
						  {/if}
                        </div>
                      </div>*}
                    </div>
                  </section>
              </div>
              {*<div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Position Settings (Leave blank if not sure)</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Top title height</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control"{if $data_newsid neq ''} data-required="true"{/if} placeholder="10" name="data_toptitle" value="{$data_toptitle}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Bottom Text height</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control"{if $data_newsid neq ''} data-required="true"{/if} placeholder="24" name="data_bottomtext" value="{$data_bottomtext}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Bottom Links height</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control"{if $data_newsid neq ''} data-required="true"{/if} placeholder="10" name="data_bottomlinks" value="{$data_bottomlinks}">
                        </div>
                      </div>
                    </div>
                  </section>
              </div>*}
            </div>
			
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Actions</strong> </header>
                    <div class="panel-body">
					  <div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
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
<script src="{$baseurl_admin}lib/ckeditor/ckeditor.js"></script>
<script src="{$baseurl_admin}lib/ckeditor/adapters/jquery.js"></script>
<script src="{$baseurl_admin}lib/ckfinder/ckfinder.js"></script>
<!-- custom script disini -->
<script src="{$baseurl_admin}include/js/localscript.js"></script>
</body>
</html>