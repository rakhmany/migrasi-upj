<?php /* Smarty version Smarty-3.1.17, created on 2023-11-02 04:06:54
         compiled from "templates/pmb_insert.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5925868706543205eaebec5-40713934%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '02d41ff6de88498789826d1e7b237b6359b95287' => 
    array (
      0 => 'templates/pmb_insert.tpl',
      1 => 1697082803,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5925868706543205eaebec5-40713934',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'data_pmbid' => 0,
    'title' => 0,
    'baseurl_admin' => 0,
    'msg' => 0,
    'data_pmbdate' => 0,
    'data_pmbphoto' => 0,
    'path_file_image' => 0,
    'data_pmbname' => 0,
    'optarray' => 0,
    'data_pmbstatus' => 0,
    'optarray_jkel' => 0,
    'data_pmbjkel' => 0,
    'data_pmbbirth' => 0,
    'data_pmbagama' => 0,
    'data_pmbnik' => 0,
    'data_pmbstatusnikah' => 0,
    'data_pmbaddress' => 0,
    'data_pmbpostcode' => 0,
    'data_pmbhp' => 0,
    'data_pmbemail' => 0,
    'data_pmbdadyname' => 0,
    'data_pmbmammyname' => 0,
    'data_pmbparentaddress' => 0,
    'data_pmbparentpostcode' => 0,
    'data_pmbparenthp' => 0,
    'data_pmbdadystatus' => 0,
    'data_pmbmammystatus' => 0,
    'data_pmbdadylaststudy' => 0,
    'data_pmbmammylaststudy' => 0,
    'data_pmbdadyjob' => 0,
    'data_pmbmammyjob' => 0,
    'data_pmbdadysalary' => 0,
    'data_pmbmammysalary' => 0,
    'data_schname' => 0,
    'data_schgraduateyear' => 0,
    'data_schaddress' => 0,
    'data_schcity' => 0,
    'data_schpostcode' => 0,
    'data_pmblulusan' => 0,
    'data_pmbgraduateyear' => 0,
    'data_pmbwilayah' => 0,
    'data_pmbjurusan' => 0,
    'data_pmbbiaya' => 0,
    'data_pmbknowwe' => 0,
    'data_pmbnamerecomend' => 0,
    'data_pmbnimrecomend' => 0,
    'data_pmbnoperecomend' => 0,
    'data_refname' => 0,
    'data_refrelation' => 0,
    'data_refphone' => 0,
    'data_refhp' => 0,
    'data_pmbprogramstudy' => 0,
    'data_pmbprogramstudy2' => 0,
    'data_pmbgelombang' => 0,
    'themesurl_admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_6543205eb75ff5_16582486',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_6543205eb75ff5_16582486')) {function content_6543205eb75ff5_16582486($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include '/home/upeje/public_html/fhadmin/lib/smarty/plugins/modifier.date_format.php';
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
                    <header class="panel-heading"> <strong>Informasi Pribadi</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Posting</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_pmbdate" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbdate']->value;?>
" size="16" readonly>
                        </div>
                       <!--  <label class="col-sm-4 control-label">Photo</label>
                        <div class="col-sm-3">
						  <?php if ($_smarty_tpl->tpl_vars['data_pmbphoto']->value!='') {?>
						  <div class="thumbnail m-t-xs">
							<a href="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_pmbphoto']->value;?>
"><img src="<?php echo $_smarty_tpl->tpl_vars['path_file_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['data_pmbphoto']->value;?>
?<?php echo time();?>
" alt="Photos"></a>
							<div class="caption">
							  <p align="center" class="text-ellipsis m-b-none"><?php echo $_smarty_tpl->tpl_vars['data_pmbname']->value;?>
</p>
							</div>
						  </div>
						  <?php } else { ?>
						  No Photo
						  <?php }?>
                        </div> -->
                        <!-- <label class="col-sm-1 control-label">Status</label>
                        <div class="col-sm-2">
                          <select data-required="true" class="form-control" name="data_pmbstatus" readonly>
						  <?php if (isset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing'])) unset($_smarty_tpl->tpl_vars['smarty']->value['section']['listing']);
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['name'] = 'listing';
$_smarty_tpl->tpl_vars['smarty']->value['section']['listing']['loop'] = is_array($_loop=$_smarty_tpl->tpl_vars['optarray']->value) ? count($_loop) : max(0, (int) $_loop); unset($_loop);
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
							<option value="<?php echo $_smarty_tpl->tpl_vars['optarray']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
"<?php if ($_smarty_tpl->tpl_vars['data_pmbstatus']->value==$_smarty_tpl->tpl_vars['optarray']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']]) {?> selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['optarray']->value[$_smarty_tpl->getVariable('smarty')->value['section']['listing']['index']];?>
</option>
						  <?php endfor; endif; ?>
						  </select>
                        </div> -->
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" data-required="true" name="data_pmbname" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbname']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
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
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tempat & Tanggal Lahir</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbbirth" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbbirth']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Agama</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbagama" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbagama']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">NIK</label>
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
                        <label class="col-sm-2 control-label">Alamat Rumah</label>
                        <div class="col-sm-10">
						  <textarea data-required="true" class="form-control" name="data_pmbaddress" rows="5" cols="55" readonly><?php echo $_smarty_tpl->tpl_vars['data_pmbaddress']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Pos</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbpostcode" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbpostcode']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Handphone</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbhp" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbhp']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Email</label>
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
                    <header class="panel-heading"> <strong>Info Orang tua</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadyname" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbdadyname']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Nama Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammyname" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbmammyname']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
						  <textarea data-required="true" class="form-control" name="data_pmbparentaddress" rows="5" cols="55" readonly><?php echo $_smarty_tpl->tpl_vars['data_pmbparentaddress']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Pos</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbparentpostcode" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbparentpostcode']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">HP</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbparenthp" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbparenthp']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Status Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadystatus" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbdadystatus']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Status Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammystatus" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbmammystatus']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Pendidikan Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadylaststudy" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbdadylaststudy']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Pendidikan Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammylaststudy" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbmammylaststudy']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Pekerjaan Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadyjob" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbdadyjob']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Pekerjaan Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammyjob" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbmammyjob']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Penghasilan Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadysalary" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbdadysalary']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Penghasilan Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammysalary" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbmammysalary']->value;?>
" readonly>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
			  
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Informasi Sekolah Asal</strong> </header>
                    <div class="panel-body">
                      <!-- <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Sekolah</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" data-required="true" name="data_schname" value="<?php echo $_smarty_tpl->tpl_vars['data_schname']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Tahun Lulus</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_schgraduateyear" value="<?php echo $_smarty_tpl->tpl_vars['data_schgraduateyear']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat Sekolah</label>
                        <div class="col-sm-5">
                          <textarea class="form-control" rows="5" name="data_schaddress" id="data_schaddress" data-maxlength="255" readonly><?php echo $_smarty_tpl->tpl_vars['data_schaddress']->value;?>
</textarea>
                        </div>
                        <label class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_schcity" value="<?php echo $_smarty_tpl->tpl_vars['data_schcity']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Pos</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_schpostcode" value="<?php echo $_smarty_tpl->tpl_vars['data_schpostcode']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div> -->
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Asal Sekolah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmblulusan" value="<?php echo $_smarty_tpl->tpl_vars['data_pmblulusan']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Tahun Lulus</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_pmbgraduateyear" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbgraduateyear']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Wilayah Sekolah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbwilayah" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbwilayah']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Jurusan Sekolah</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_pmbjurusan" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbjurusan']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Dibiayai Oleh</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbbiaya" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbbiaya']->value;?>
" readonly>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Informasi Tambahan</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Mengetahui Kami</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" data-required="true" name="data_pmbknowwe" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbknowwe']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Perekomendasi</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbnamerecomend" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbnamerecomend']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">NIM / Unit</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbnimrecomend" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbnimrecomend']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">No. Handphone</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbnoperecomend" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbnoperecomend']->value;?>
" readonly>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
              <!-- <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Refferal</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Kenalan</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_refname" value="<?php echo $_smarty_tpl->tpl_vars['data_refname']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Hubungan</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_refrelation" value="<?php echo $_smarty_tpl->tpl_vars['data_refrelation']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_refphone" value="<?php echo $_smarty_tpl->tpl_vars['data_refphone']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-3 control-label">No. Handphone</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_refhp" value="<?php echo $_smarty_tpl->tpl_vars['data_refhp']->value;?>
" readonly>
                        </div>
                      </div>
                    </div>
                  </section>
              </div> -->
			  <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Peminatan</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Program Studi</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbprogramstudy" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbprogramstudy']->value;?>
" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Program Studi 2</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbprogramstudy2" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbprogramstudy2']->value;?>
" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Gelombang</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_pmbgelombang" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbgelombang']->value;?>
" readonly>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <!-- <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Actions</strong> </header>
                    <div class="panel-body">
					  <div class="form-group">
						<div class="col-sm-4 col-sm-offset-2">
						  <a href="<?php echo $_SERVER['PHP_SELF'];?>
" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
						  <?php if ($_smarty_tpl->tpl_vars['data_pmbid']->value!='') {?>
						  <input type="hidden" name="data_pmbid" value="<?php echo $_smarty_tpl->tpl_vars['data_pmbid']->value;?>
">
						  <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-floppy-o"></i> Save</button>
						  <?php } else { ?>
						  <button type="submit" class="btn btn-primary" name="insert"><i class="fa fa-floppy-o"></i> Submit</button>
						  <?php }?>
						</div>
					  </div>
                    </div>
                  </section>
              </div>
            </div> -->
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
