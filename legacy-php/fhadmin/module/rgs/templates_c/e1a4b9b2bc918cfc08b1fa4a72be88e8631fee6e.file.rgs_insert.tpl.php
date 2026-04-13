<?php /* Smarty version Smarty-3.1.17, created on 2023-10-12 07:47:30
         compiled from "templates/rgs_insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:682234245651be72e7d39b4-13984283%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e1a4b9b2bc918cfc08b1fa4a72be88e8631fee6e' => 
    array (
      0 => 'templates/rgs_insert.tpl',
      1 => 1697082803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '682234245651be72e7d39b4-13984283',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_651be72e86a883_12114228',
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
    'optarray_jkel' => 0,
    'data_pmbjkel' => 0,
    'data_pmbagama' => 0,
    'data_pmbdadyname' => 0,
    'data_pmbparenthp' => 0,
    'data_pmbparentaddress' => 0,
    'data_pmbdadylaststudy' => 0,
    'data_pmbdadyjob' => 0,
    'data_pmbacademicscore' => 0,
    'data_pmbenglishscore' => 0,
    'data_pmbknowwe' => 0,
    'data_pmbphoto' => 0,
    'path_file_image' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_651be72e86a883_12114228')) {function content_651be72e86a883_12114228($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/upeje/public_html/fhadmin/lib/smarty/plugins/modifier.date_format.php';
?><!DOCTYPE html>
<html lang="en" class="app">
<head>
<?php echo $_smarty_tpl->getSubTemplate ('../../../templates/scale/header_meta.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, null, array(), 0);?>

<!-- include style disini -->
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
            <!-- <p class="h4">Contents...</p>
            <div class="m-b-md">
              <h3 class="m-b-none">Basic Configuration</h3>
            </div> -->
            <div class="row">
				<div class="col-lg-12">
				  <!-- .breadcrumb -->
				  <ul class="breadcrumb">
					<li><a href="<?php echo $_smarty_tpl->tpl_vars['baseurl_admin']->value;?>
"><i class="fa fa-home"></i> Home</a></li>
					<li><a href="<?php echo $_SERVER['PHP_SELF'];?>
"><i class="fa fa-list-ul"></i> <?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</a></li>
					<li class="active"><i class="fa fa-pencil"></i> <?php if ($_smarty_tpl->tpl_vars['data_pmbid']->value!='') {?>Edit<?php } else { ?>Insert<?php }?></li>
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
			
			<form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'];?>
?data_pmbid=<?php echo $_smarty_tpl->tpl_vars['data_pmbid']->value;?>
">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Personal Information</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Post Date</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_pmbdate" value="<?php echo date('d F, Y',strtotime($_smarty_tpl->tpl_vars['data_pmbdate']->value));?>
" size="16" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" data-required="true" name="data_pmbname" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbname']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                         <label class="col-sm-2 control-label">Place of Birth</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbplace" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbplace']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Date of Birth</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbbirth" value="<?php echo date('d F, Y',strtotime($_smarty_tpl->tpl_vars['data_pmbbirth']->value));?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Identity Number</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbnik" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbnik']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbstatusnikah" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbstatusnikah']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
						  <textarea data-required="true" class="form-control" name="data_pmbaddress" rows="5" cols="55" readonly><?php echo $_smarty_tpl->tpl_vars['data_pmbaddress']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbhp" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbhp']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Email Address</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbemail" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbemail']->value;?>
" readonly>
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
                          <input type="text" class="form-control" data-required="true" name="data_pmblulusan" value="<?php echo $_smarty_tpl->tpl_vars['data_pmblulusan']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Graduation Year</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_pmbgraduateyear" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbgraduateyear']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Gender</label>
                        <div class="col-sm-3">
							<select class="form-control" name="data_pmbjkel" disabled>
								<?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray_jkel']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = true;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['max'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] = 1;
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'] > 0 ? 0 : $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop']-1;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']) {
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'];
    if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] == 0)
        $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show'] = false;
} else
    $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'] = 0;
if ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['show']):

            for ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['start'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] = 1;
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] <= $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total'];
                 $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] += $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'], $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration']++):
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['rownum'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_prev'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] - $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index_next'] = $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['index'] + $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['step'];
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['first']      = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == 1);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['last']       = ($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['iteration'] == $_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['total']);
?>
									<option value='<?php echo $_smarty_tpl->tpl_vars['optarray_jkel']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
' <?php if ($_smarty_tpl->tpl_vars['data_pmbjkel']->value==$_smarty_tpl->tpl_vars['optarray_jkel']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> selected <?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray_jkel']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</option>
								<?php endfor; endif; ?>
							</select>
                        </div>
                        <label class="col-sm-2 control-label">Religion</label>
                            <div class="col-sm-4">
                              <input type="text" class="form-control" data-required="true" name="data_pmbagama" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbagama']->value;?>
" readonly>
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
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadyname" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbdadyname']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Phone Number</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbparenthp" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbparenthp']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Address</label>
                        <div class="col-sm-10">
						  <textarea data-required="true" class="form-control" name="data_pmbparentaddress" rows="5" cols="55" readonly><?php echo $_smarty_tpl->tpl_vars['data_pmbparentaddress']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Education Background</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadylaststudy" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbdadylaststudy']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Employment</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadyjob" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbdadyjob']->value;?>
" readonly>
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
                          <input type="text" class="form-control" data-required="true" name="data_pmbacademicscore" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbacademicscore']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Average English Score</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbenglishscore" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbenglishscore']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Source Information about UPJ</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbknowwe" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbknowwe']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">TOEFL or IELTS Certification</label>
                        <div class="col-sm-3">
						  <?php if ($_smarty_tpl->tpl_vars['data_pmbphoto']->value!='') {?>
						  <div class="thumbnail m-t-xs">
							<a href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_pmbphoto']->value;?>
"><i class="fa fa-file"> </i> <?php echo $_smarty_tpl->tpl_vars['data_pmbphoto']->value;?>
</a>
						  </div>
						  <?php } else { ?>
						  <div class="thumbnail m-t-xs">
						  file not found
						  </div>
						  <?php }?>
                        </div>
                        
                      </div>
                    </div>
                  </section>
              </div>
            </div>
            </form>
			
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
