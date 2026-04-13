<?php /* Smarty version Smarty-3.1.17, created on 2023-10-04 00:55:20
         compiled from "templates\rgs_data.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3597651c98a153b510-65103856%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '51f5f9893bf60420cba7be239a0df577adce52ef' => 
    array (
      0 => 'templates\\rgs_data.tpl',
      1 => 1696373716,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3597651c98a153b510-65103856',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_651c98a1619e82_60937233',
  'variables' => 
  array (
    'data_pmbid' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'data_pmbdate' => 0,
    'data_pmbname' => 0,
    'data_pmbplace' => 0,
    'data_pmbbirth' => 0,
    'data_pmbnik' => 0,
    'data_pmbstatusnikah' => 0,
    'data_pmbaddress' => 0,
    'data_pmbhp' => 0,
    'data_pmbemail' => 0,
    'data_pmblulusan' => 0,
    'data_pmbgraduateyear' => 0,
    'data_pmbdadyname' => 0,
    'data_pmbparenthp' => 0,
    'data_pmbparentaddress' => 0,
    'data_pmbdadylaststudy' => 0,
    'data_pmbdadyjob' => 0,
    'data_pmbacademicscore' => 0,
    'data_pmbenglishscore' => 0,
    'data_pmbknowwe' => 0,
    'data_pmbphoto' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651c98a1619e82_60937233')) {function content_651c98a1619e82_60937233($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\upj2023\\fhadmin\\lib\\smarty\\plugins\\modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en" class="app">
<head>
<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

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
  <?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

  <section>
    <section class="hbox stretch">
      <?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

      <section id="content">
        <section class="vbox">
          <header class="header bg-white b-b clearfix">
			<div class="row m-t-sm">
			  <div class="col-sm-5 m-b-xs">
				<a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
				<span class="h5"><?php if ($_smarty_tpl->tpl_vars['data_pmbid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</span>
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
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
"><i class="fa fa-list-ul"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a></li>
					<li class="active"><i class="fa fa-eye"></i> Detail</li>
				  </ul>
				  <!-- / .breadcrumb -->
				</div>
            </div>
			<?php if ($_smarty_tpl->tpl_vars['msg']->value!='') {?>
			<div class="alert alert-danger">
			  <button type="button" class="close" data-dismiss="alert">x</button>
			  <i class="fa fa-ok-sign"></i><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

			</div>
			<?php }?>
			
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
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbdate']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbname']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbplace']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbbirth']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbnik']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbstatusnikah']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbaddress']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbhp']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbemail']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmblulusan']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbgraduateyear']->value;?>
</td>
            			    <td><?php echo $_smarty_tpl->tpl_vars['data_pmbdadyname']->value;?>
</td>
    			            <td><?php echo $_smarty_tpl->tpl_vars['data_pmbparenthp']->value;?>
</td>
    			            <td><?php echo $_smarty_tpl->tpl_vars['data_pmbparentaddress']->value;?>
</td>
    			            <td><?php echo $_smarty_tpl->tpl_vars['data_pmbdadylaststudy']->value;?>
</td>
    			            <td><?php echo $_smarty_tpl->tpl_vars['data_pmbdadyjob']->value;?>
</td>
    			            <td><?php echo $_smarty_tpl->tpl_vars['data_pmbacademicscore']->value;?>
</td>
    			            <td><?php echo $_smarty_tpl->tpl_vars['data_pmbenglishscore']->value;?>
</td>
    			            <td><?php echo $_smarty_tpl->tpl_vars['data_pmbknowwe']->value;?>
</td>
    			            <td><?php echo $_smarty_tpl->tpl_vars['data_pmbphoto']->value;?>
</td>
            			 </tr>
            			 
            	    
            	</table>
			</div>
			</div>
          </section>
          <footer class="footer bg-white b-t b-light">
            <p>Copyright <?php echo smarty_modifier_date_format(time(),"%Y");?>
 - All rights reserved by faberhost.com</p>
          </footer>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
	  </section>
    </section>
  </section>
</section>
<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- include spesifik js disini -->
<script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/file-input/bootstrap-filestyle.min.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['themesurl_admin']->value;?>
js/sortable/jquery.sortable.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/ckeditor.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckeditor/adapters/jquery.js"></script>
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
lib/ckfinder/ckfinder.js"></script>
<!-- custom script disini -->
<script src="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
include/js/localscript.js"></script>
</body>
</html><?php }} ?>
