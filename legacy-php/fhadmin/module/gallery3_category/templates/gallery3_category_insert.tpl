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
				<span class="h5">{if $categoryid neq ''}Edit{else}Insert{/if} {$title}</span>
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
					<li class="active"><i class="fa fa-pencil"></i> {if $categoryid neq ''}Edit{else}Insert{/if}</li>
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
                      <div class="form-group">
                      <!---
                        <label class="col-sm-2 control-label">Category</label>
                        <div class="col-sm-6">
                          <select class="form-control" name="categoryparentid" id="categoryparentid">
							<option value=""> = Root = </option>
							{$strukturcategory}
						  </select>
                        </div>
                        
                        !--->
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-3">
                          <select data-required="true" class="form-control" name="categorystatus">
						  {section name=listing loop=$optarray_categorystatus}
							<option value="{$optarray_categorystatus[listing]}"{if $categorystatus eq $optarray_categorystatus[listing]} selected{/if}>{$optarray_categorystatus[listing]}</option>
						  {/section}
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Category name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="name" name="categoryname" value="{$categoryname}">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Category name (EN)</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="name" name="categoryname_en" value="{$categoryname_en}">
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
						  {if $flag1 neq 'insert'}
						  <input type="hidden" name="categoryid" value="{$categoryid}">
						  <button type="submit" class="btn btn-primary" name="editmenu" value="edit"><i class="fa fa-floppy-o"></i> Save</button>
						  {else}
						  <button type="submit" class="btn btn-primary" name="insertmenu" value="Add"><i class="fa fa-floppy-o"></i> Submit</button>
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