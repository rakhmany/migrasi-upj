<?php /* Smarty version Smarty-3.1.17, created on 2023-04-02 19:06:36
         compiled from "templates\basicconfig.tpl" */ ?>
<?php /*%%SmartyHeaderCode:241765ed316302fc6c6-15525991%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7b9ebe420a18278f42c64cb3cbffc97ce81fc846' => 
    array (
      0 => 'templates\\basicconfig.tpl',
      1 => 1680455190,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '241765ed316302fc6c6-15525991',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.17',
  'unifunc' => 'content_5ed31630540366_55413327',
  'variables' => 
  array (
    'msg' => 0,
    'fh_basicconfigid' => 0,
    'fh_companyname' => 0,
    'fh_companyaddress' => 0,
    'fh_companyphone' => 0,
    'fh_companyfax' => 0,
    'fh_companyemail' => 0,
    'fh_notifemail' => 0,
    'fh_companyweb' => 0,
    'fh_company_ym1' => 0,
    'fh_company_ym2' => 0,
    'fh_social_fb' => 0,
    'fh_social_twt' => 0,
    'fh_social_gplus' => 0,
    'fh_social_blogger' => 0,
    'fh_social_linkedin' => 0,
    'fh_social_youtube' => 0,
    'fh_social_vimeo' => 0,
    'fh_social_rss' => 0,
    'fh_googlemap' => 0,
    'fh_fbbox' => 0,
    'fh_twtbox' => 0,
    'fh_index_title' => 0,
    'fh_index_title_en' => 0,
    'fh_index_description' => 0,
    'fh_index_description_en' => 0,
    'fh_general_pageheader' => 0,
    'fh_general_pageheader_en' => 0,
    'fh_general_metakeyword' => 0,
    'fh_general_metadescription' => 0,
    'fh_general_banner' => 0,
    'path_image' => 0,
    'fh_widthgeneralbanner' => 0,
    'fh_heightgeneralbanner' => 0,
    'fh_widthstatisbanner' => 0,
    'fh_heightstatisbanner' => 0,
    'fh_sitetitle' => 0,
    'fh_projectname' => 0,
    'fh_emailadmin' => 0,
    'fh_projecturl' => 0,
    'fh_maxuserlog' => 0,
    'fh_maxfilesize' => 0,
    'fh_frontend_page' => 0,
    'fh_backend_page' => 0,
    'fh_shipping_rate' => 0,
    'fh_webstatus' => 0,
    'fh_webstatuskey' => 0,
    'baseurl_admin' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5ed31630540366_55413327')) {function content_5ed31630540366_55413327($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\xampp\\htdocs\\tira\\fhadmin\\lib\\smarty\\plugins\\modifier.date_format.php';
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
          <header class="header bg-white b-b b-light">
            <b>Basic Configuration</b>
			<p></p>
          </header>
          <section class="scrollable wrapper w-f">
            <!-- <p class="h4">Contents...</p> -->
            <div class="m-b-md">
              <h3 class="m-b-none">Basic Configuration</h3>
            </div>
			  
			  <?php if ($_smarty_tpl->tpl_vars['msg']->value!='') {?>
			  <div class="alert alert-danger">
			  <button type="button" class="close" data-dismiss="alert">×</button>
			  <i class="fa fa-ok-sign"></i><?php echo $_smarty_tpl->tpl_vars['msg']->value;?>

			  </div>
			  <?php }?>
			  
			<form class="form" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="<?php $_smarty_tpl->smarty->_tag_stack[] = array('php', array()); $_block_repeat=true; echo smarty_php_tag(array(), null, $_smarty_tpl, $_block_repeat);while ($_block_repeat) { ob_start();?>
echo $_SERVER['PHP_SELF']; <?php $_block_content = ob_get_clean(); $_block_repeat=false; echo smarty_php_tag(array(), $_block_content, $_smarty_tpl, $_block_repeat); } array_pop($_smarty_tpl->smarty->_tag_stack);?>
<?php if ($_smarty_tpl->tpl_vars['fh_basicconfigid']->value!='') {?>?fh_basicconfigid=<?php echo $_smarty_tpl->tpl_vars['fh_basicconfigid']->value;?>
<?php }?>">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <span class="h4">Company Information</span> </header>
                    <div class="panel-body">
					  
					  <!-- <p class="text-muted">Please fill the information to continue</p> -->
                      <div class="form-group">
                        <label>Company Name</label>
						<input type="text" class="form-control" name="fh_companyname" maxlength="255" size="60" value="<?php echo $_smarty_tpl->tpl_vars['fh_companyname']->value;?>
" data-required="true">
                      </div>
                      <div class="form-group">
                        <label>Address</label>
						<textarea class="form-control" data-required="true" name="fh_companyaddress" rows="5" cols="40"><?php echo $_smarty_tpl->tpl_vars['fh_companyaddress']->value;?>
</textarea>
                      </div>
                      <div class="form-group">
                        <label>Phone</label>
						<input type="text" class="form-control" name="fh_companyphone" maxlength=50 size=50 value="<?php echo $_smarty_tpl->tpl_vars['fh_companyphone']->value;?>
" placeholder="(XXX) XXXX XXX">
                      </div>
                      <div class="form-group">
                        <label>Fax</label>
						<input type="text" class="form-control" name="fh_companyfax" maxlength=50 size=50 value="<?php echo $_smarty_tpl->tpl_vars['fh_companyfax']->value;?>
" placeholder="(XXX) XXXX XXX">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
						<input type="text" class="form-control" data-type="email" name="fh_companyemail" maxlength=255 size=50 value="<?php echo $_smarty_tpl->tpl_vars['fh_companyemail']->value;?>
" data-required="true">
                      </div>
                      <div class="form-group hidden">
                        <label>WBS Email</label>
						<input type="text" class="form-control" data-type="email" name="fh_notifemail" maxlength=255 size=50 value="<?php echo $_smarty_tpl->tpl_vars['fh_notifemail']->value;?>
" data-required="true">
                      </div>
                      <div class="form-group">
                        <label>Website</label>
                        <input type="text" data-type="url" data-required="true" class="form-control" placeholder="http://faberhost.com" maxlength=255 name="fh_companyweb" value="<?php echo $_smarty_tpl->tpl_vars['fh_companyweb']->value;?>
">
                      </div>
                    </div>
                  </section>
              </div>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <span class="h4">Social Network </span> </header>
                    <div class="panel-body">
                      <!-- <p class="text-muted">Need support? please fill the fields below.</p> -->
                      <!-- <div class="form-group pull-in clearfix">
                        <div class="col-sm-6">
                          <label>YM 1</label>
                          <input type="text" class="form-control" placeholder="Yahoo Mesenger ID" name="fh_company_ym1" maxlength=255 value="<?php echo $_smarty_tpl->tpl_vars['fh_company_ym1']->value;?>
">
                        </div>
                        <div class="col-sm-6">
                          <label>YM 2</label>
                          <input type="text" class="form-control" placeholder="Yahoo Mesenger ID" name="fh_company_ym2" maxlength=255 value="<?php echo $_smarty_tpl->tpl_vars['fh_company_ym2']->value;?>
">
                        </div>
                      </div> -->
                      <div class="form-group">
                        <label>Facebook Link</label>
                        <input type="text" data-type="url" class="form-control" placeholder="http://www.facebook.com/faberhost.co.id" maxlength=255 name="fh_social_fb" value="<?php echo $_smarty_tpl->tpl_vars['fh_social_fb']->value;?>
">
                      </div>
                      <div class="form-group">
                        <label>Twitter Link</label>
                        <input type="text" data-type="url" class="form-control" placeholder="https://twitter.com/faberhost" maxlength=255 name="fh_social_twt" value="<?php echo $_smarty_tpl->tpl_vars['fh_social_twt']->value;?>
">
                      </div>
                    <div class="form-group">
                        <label>Instagram</label>
                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_gplus" value="<?php echo $_smarty_tpl->tpl_vars['fh_social_gplus']->value;?>
">
                      </div>
                        <!-- 
                      <div class="form-group">
                        <label>Blogger Link</label>
                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_blogger" value="<?php echo $_smarty_tpl->tpl_vars['fh_social_blogger']->value;?>
">
                      </div>
                      
                      !-->
                      <div class="form-group">
                        <label>Linkedin Link</label>
                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_linkedin" value="<?php echo $_smarty_tpl->tpl_vars['fh_social_linkedin']->value;?>
">
                      </div>
                      
                      <!---
                      <div class="form-group">
                        <label>Youtube Link</label>
                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_youtube" value="<?php echo $_smarty_tpl->tpl_vars['fh_social_youtube']->value;?>
">
                      </div>
                      <div class="form-group">
                        <label>Vimeo Link</label>
                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_vimeo" value="<?php echo $_smarty_tpl->tpl_vars['fh_social_vimeo']->value;?>
">
                      </div> 
                      <div class="form-group">
                        <label>RSS Link</label>
                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_rss" value="<?php echo $_smarty_tpl->tpl_vars['fh_social_rss']->value;?>
">
                      </div>
                      -->
                      <div class="form-group">
                        <label>Google Map</label>
                        <textarea class="form-control" rows="6" data-minwords="6" name="fh_googlemap"><?php echo $_smarty_tpl->tpl_vars['fh_googlemap']->value;?>
</textarea>
                      </div>
                     <!--  <div class="form-group">
                        <label>Facebook Likebox Script</label>
                        <textarea class="form-control" rows="6" data-minwords="6" name="fh_fbbox"><?php echo $_smarty_tpl->tpl_vars['fh_fbbox']->value;?>
</textarea>
                      </div>
                      <div class="form-group">
                        <label>Twitter Box Script</label>
                        <textarea class="form-control" rows="6" data-minwords="6" name="fh_twtbox"><?php echo $_smarty_tpl->tpl_vars['fh_twtbox']->value;?>
</textarea>
                      </div> -->
                    </div>
                  </section>
              </div>
            </div>
            <div class="row form-horizontal" >
              <div class="col-sm-12"  style="display: none;">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>General Front Settings</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Header Tagline (EN)</label>
                        <div class="col-sm-9">
						  <textarea class="form-control" cols="50" rows="3" name="fh_index_title" data-required="true"><?php echo $_smarty_tpl->tpl_vars['fh_index_title']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Header Tagline (ID)</label>
                        <div class="col-sm-9">
						  <textarea class="form-control" cols="50" rows="3" name="fh_index_title_en" data-required="true"><?php echo $_smarty_tpl->tpl_vars['fh_index_title_en']->value;?>
</textarea>
                        </div>
                      </div>
                      <!-- <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Home Description (EN)</label>
                        <div class="col-sm-9">
                          <textarea class="jckeditor" name="fh_index_description" id="fh_index_description"><?php echo $_smarty_tpl->tpl_vars['fh_index_description']->value;?>
</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Home Description (ID)</label>
                        <div class="col-sm-9">
                          <textarea class="jckeditor" name="fh_index_description_en" id="fh_index_description_en"><?php echo $_smarty_tpl->tpl_vars['fh_index_description_en']->value;?>
</textarea>
                        </div>
                      </div> -->
                    </div>
                  </section>
              </div>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>SEO settings</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">General Page Header (EN)</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" data-required="true" name="fh_general_pageheader" maxlength=160 value="<?php echo $_smarty_tpl->tpl_vars['fh_general_pageheader']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">General Page Header (ID)</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" data-required="true" name="fh_general_pageheader_en" maxlength=160 value="<?php echo $_smarty_tpl->tpl_vars['fh_general_pageheader_en']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">General Meta Keyword</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" data-required="true" name="fh_general_metakeyword" maxlength=255 value="<?php echo $_smarty_tpl->tpl_vars['fh_general_metakeyword']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">General Meta Description</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" data-required="true" name="fh_general_metadescription" maxlength=160 value="<?php echo $_smarty_tpl->tpl_vars['fh_general_metadescription']->value;?>
">
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
            <div class="row form-horizontal" >
              <div class="col-sm-12" style="display: none;">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Banner Settings</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">General Banner</label>
                        <div class="col-sm-9">
                          <?php if ($_smarty_tpl->tpl_vars['fh_general_banner']->value!='') {?>
							<img src='<?php echo $_smarty_tpl->tpl_vars['path_image']->value;?>
<?php echo $_smarty_tpl->tpl_vars['fh_general_banner']->value;?>
' style='width:400px;'><br>
							<input type='submit'  value=' Delete General Banner ' name='delbanner' onclick='return konfirmasi()';><br><br>
						  <?php }?>
						  <input type="file" class="filestyle" data-icon="true" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="fh_general_banner">
						  <br><font color=red><b>Resize Image => Width : <?php echo $_smarty_tpl->tpl_vars['fh_widthgeneralbanner']->value;?>
 px &nbsp;&nbsp;&nbsp; Height : <?php echo $_smarty_tpl->tpl_vars['fh_heightgeneralbanner']->value;?>
 px</b></font>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">General Banner Size</label>
                        <div class="col-sm-3">
                          <label>width</label>
						  <div class="input-group m-b">
							<input type="text" data-type="number" class="form-control" data-required="true" name="fh_widthgeneralbanner" value="<?php echo $_smarty_tpl->tpl_vars['fh_widthgeneralbanner']->value;?>
">
							<span class="input-group-addon"> pixel</span>
						  </div>
                        </div>
                        <div class="col-sm-3">
                          <label>height</label>
						  <div class="input-group m-b">
							<input type="text" data-type="number" class="form-control" data-required="true" name="fh_heightgeneralbanner" value="<?php echo $_smarty_tpl->tpl_vars['fh_heightgeneralbanner']->value;?>
">
							<span class="input-group-addon"> pixel</span>
						  </div>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Statis Banner Size</label>
                        <div class="col-sm-3">
                          <label>width</label>
						  <div class="input-group m-b">
							<input type="text" data-type="number" class="form-control" data-required="true" name="fh_widthstatisbanner" value="<?php echo $_smarty_tpl->tpl_vars['fh_widthstatisbanner']->value;?>
">
							<span class="input-group-addon"> pixel</span>
						  </div>
                        </div>
                        <div class="col-sm-3">
                          <label>height</label>
						  <div class="input-group m-b">
							<input type="text" data-type="number" class="form-control" data-required="true" name="fh_heightstatisbanner" value="<?php echo $_smarty_tpl->tpl_vars['fh_heightstatisbanner']->value;?>
">
							<span class="input-group-addon"> pixel</span>
						  </div>
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Admin & System settings</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Site Title</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" name="fh_sitetitle" maxlength=255 value="<?php echo $_smarty_tpl->tpl_vars['fh_sitetitle']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Project Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" name="fh_projectname" maxlength=255 value="<?php echo $_smarty_tpl->tpl_vars['fh_projectname']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Email Admin</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" data-required="true" data-type="email" name="fh_emailadmin" maxlength=255 value="<?php echo $_smarty_tpl->tpl_vars['fh_emailadmin']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Project URL</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" data-required="true" data-type="url" name="fh_projecturl" maxlength=255 value="<?php echo $_smarty_tpl->tpl_vars['fh_projecturl']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Maximum Log</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_maxuserlog" maxlength=10 value="<?php echo $_smarty_tpl->tpl_vars['fh_maxuserlog']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Maximum File Size</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_maxfilesize" maxlength=10 value="<?php echo $_smarty_tpl->tpl_vars['fh_maxfilesize']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Listing / Page [Frontend]</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_frontend_page" maxlength=10 value="<?php echo $_smarty_tpl->tpl_vars['fh_frontend_page']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Listing / Page [Backend]</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_backend_page" maxlength=10 value="<?php echo $_smarty_tpl->tpl_vars['fh_backend_page']->value;?>
">
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Shipping Rate</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_shipping_rate" maxlength=10 value="<?php echo $_smarty_tpl->tpl_vars['fh_shipping_rate']->value;?>
">
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
            <div class="row form-horizontal">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Other Settings</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Web Status</label>
                        <div class="col-sm-9">
                          <select name="fh_webstatus" class="chosen-select" style="width:150px;">
							<option value="Published" <?php if ($_smarty_tpl->tpl_vars['fh_webstatus']->value=='Published') {?>selected<?php }?>>Published</option>
							<option value="On Progress" <?php if ($_smarty_tpl->tpl_vars['fh_webstatus']->value=='On Progress') {?>selected<?php }?>>On Progress</option>
						  </select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-3 control-label">Keyword for Progress</label>
                        <div class="col-sm-3">
							<input type="text" class="form-control" data-required="true" name="fh_webstatuskey" value="<?php echo $_smarty_tpl->tpl_vars['fh_webstatuskey']->value;?>
">
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <div class="panel-body">
					  <div class="form-group">
						<div class="col-sm-4 col-sm-offset-3">
						  <input type="hidden" name="fh_basicconfigid" value="<?php echo $_smarty_tpl->tpl_vars['fh_basicconfigid']->value;?>
">
						  <button type="submit" class="btn btn-primary" name="edit">Save changes</button>
						  <!-- <button type="submit" class="btn btn-default">Cancel</button> -->
						  <input type="reset" class="btn btn-primary" value="reset">
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
