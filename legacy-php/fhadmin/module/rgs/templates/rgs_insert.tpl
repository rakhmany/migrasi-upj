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
				<span class="h5">{if $data_pmbid neq ''}Edit{else}Insert{/if} {$title}</span>
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
					<li class="active"><i class="fa fa-pencil"></i> {if $data_pmbid neq ''}Edit{else}Insert{/if}</li>
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
			
			<form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="{$smarty.server.PHP_SELF}?data_pmbid={$data_pmbid}">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Personal Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Post Date</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_pmbdate" value="{date('d F, Y', strtotime($data_pmbdate))}" size="16" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" data-required="true" name="data_pmbname" value="{$data_pmbname}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                         <label class="col-sm-2 control-label">Place of Birth</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbplace" value="{$data_pmbplace}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Date of Birth</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbbirth" value="{date('d F, Y', strtotime($data_pmbbirth))}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Identity Number</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbnik" value="{$data_pmbnik}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbstatusnikah" value="{$data_pmbstatusnikah}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
						  <textarea data-required="true" class="form-control" name="data_pmbaddress" rows="5" cols="55" readonly>{$data_pmbaddress}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbhp" value="{$data_pmbhp}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Email Address</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbemail" value="{$data_pmbemail}" readonly>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
              
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>School Background of Prospective Students Data</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">High School Name</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmblulusan" value="{$data_pmblulusan}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Graduation Year</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_pmbgraduateyear" value="{$data_pmbgraduateyear}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-3">
							<select class="form-control" name="data_pmbjkel" disabled>
								{section name=listing loop=$optarray_jkel}
									<option value='{$optarray_jkel[listing]}' {if $data_pmbjkel eq $optarray_jkel[listing]} selected {/if}>{$optarray_jkel[listing]}</option>
								{/section}
							</select>
                        </div>
                        <label class="col-sm-2 control-label">Religion</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" data-required="true" name="data_pmbagama" value="{$data_pmbagama}" readonly>
                            </div>
                      </div>
                    </div>
                  </section>
              </div>
			  
			  <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Parent Data (Father or Mother)</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadyname" value="{$data_pmbdadyname}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbparenthp" value="{$data_pmbparenthp}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
						  <textarea data-required="true" class="form-control" name="data_pmbparentaddress" rows="5" cols="55" readonly>{$data_pmbparentaddress}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Education Background</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadylaststudy" value="{$data_pmbdadylaststudy}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Employment</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadyjob" value="{$data_pmbdadyjob}" readonly>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
              
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Requirement</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Average Academic Score</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbacademicscore" value="{$data_pmbacademicscore}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Average English Score</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbenglishscore" value="{$data_pmbenglishscore}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Source Information about UPJ</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbknowwe" value="{$data_pmbknowwe}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">TOEFL or IELTS Certification</label>
                        <div class="col-sm-3">
						  {if $data_pmbphoto neq ''}
						  <div class="thumbnail m-t-xs">
							<a href="{$path_file_image}{$data_pmbphoto}"><i class="fa fa-file"> </i> {$data_pmbphoto}</a>
						  </div>
						  {else}
						  <div class="thumbnail m-t-xs">
						  file not found
						  </div>
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