<!DOCTYPE html>
<html lang="en" class="app">
<head>
{include file='../../../templates/scale/header_meta.tpl'}
<!-- include style disini -->
 
<style>
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
</style>
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
            <div class="row">
				<div class="col-lg-12">
				  <!-- .breadcrumb -->
				  <ul class="breadcrumb">
					<li><a href="{$baseurl_admin}"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="{$smarty.server.PHP_SELF}"><i class="fa fa-list-ul"></i> {$title}</a></li>
					<li class="active"><i class="fa fa-eye"></i> Detail</li>
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
			
			<div class="bd-example">
			<div class="table-responsive">
            	<table class="table table-bordered">
            	    
            		    <tr>
            			    <th>Post Date</th>
            			    <th>Name</th>
            			    <th>Place of Birth</th>
            			    <th>Date of Birth</th>
            			    <th>Identity Number</th>
            			    <th>Status</th>
            			    <th>Address</th>
            			    <th>Phone Number</th>
            			    <th>Email Address</th>
            			    <th>High School Name</th>
            			    <th>Graduation Year</th>
            			    <th>Name Parent</th>
    			            <th>Phone Number</th>
    			            <th>Address</th>
    			            <th>Education Background</th>
    			            <th>Employment</th>
    			            <th>Average Academic Score</th>
    			            <th>Average English Score</th>
    			            <th>Source Information about UPJ</th>
    			            <th>TOEFL or IELTS Certification</th>
            			 </tr>
            			 
            			 <tr>
            			    <td>{$data_pmbdate}</td>
            			    <td>{$data_pmbname}</td>
            			    <td>{$data_pmbplace}</td>
            			    <td>{$data_pmbbirth}</td>
            			    <td>{$data_pmbnik}</td>
            			    <td>{$data_pmbstatusnikah}</td>
            			    <td>{$data_pmbaddress}</td>
            			    <td>{$data_pmbhp}</td>
            			    <td>{$data_pmbemail}</td>
            			    <td>{$data_pmblulusan}</td>
            			    <td>{$data_pmbgraduateyear}</td>
            			    <td>{$data_pmbdadyname}</td>
    			            <td>{$data_pmbparenthp}</td>
    			            <td>{$data_pmbparentaddress}</td>
    			            <td>{$data_pmbdadylaststudy}</td>
    			            <td>{$data_pmbdadyjob}</td>
    			            <td>{$data_pmbacademicscore}</td>
    			            <td>{$data_pmbenglishscore}</td>
    			            <td>{$data_pmbknowwe}</td>
    			            <td>{$data_pmbphoto}</td>
            			 </tr>
            			 
            	    
            	</table>
			</div>
			</div>
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