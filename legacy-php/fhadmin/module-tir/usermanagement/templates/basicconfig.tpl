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

          <header class="header bg-white b-b b-light">

            <b>Basic Configuration</b>

			<p></p>

          </header>

          <section class="scrollable wrapper w-f">

            <!-- <p class="h4">Contents...</p> -->

            <div class="m-b-md">

              <h3 class="m-b-none">Basic Configuration</h3>

            </div>

			  

			  {if $msg neq ''}

			  <div class="alert alert-danger">

			  <button type="button" class="close" data-dismiss="alert">×</button>

			  <i class="fa fa-ok-sign"></i>{$msg}

			  </div>

			  {/if}

			  

			<form class="form" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="{php}echo $_SERVER['PHP_SELF']; {/php}{if $fh_basicconfigid neq ''}?fh_basicconfigid={$fh_basicconfigid}{/if}">

            <div class="row">

              <div class="col-sm-12">

                  <section class="panel panel-default">

                    <header class="panel-heading"> <span class="h4">Company Information</span> </header>

                    <div class="panel-body">

					  

					  <!-- <p class="text-muted">Please fill the information to continue</p> -->

                      <div class="form-group">

                        <label>Company Name</label>

						<input type="text" class="form-control" name="fh_companyname" maxlength="255" size="60" value="{$fh_companyname}" data-required="true">

                      </div>

                      <div class="form-group">

                        <label>Address</label>

						<textarea class="form-control" data-required="true" name="fh_companyaddress" rows="5" cols="40">{$fh_companyaddress}</textarea>

                      </div>

                      <div class="form-group">

                        <label>Phone</label>

						<input type="text" class="form-control" name="fh_companyphone" maxlength=50 size=50 value="{$fh_companyphone}" placeholder="(XXX) XXXX XXX">

                      </div>

                      <div class="form-group">

                        <label>Fax</label>

						<input type="text" class="form-control" name="fh_companyfax" maxlength=50 size=50 value="{$fh_companyfax}" placeholder="(XXX) XXXX XXX">

                      </div>

                      <div class="form-group">

                        <label>Email</label>

						<input type="text" class="form-control" data-type="email" name="fh_companyemail" maxlength=255 size=50 value="{$fh_companyemail}" data-required="true">

                      </div>

                      <div class="form-group hidden">

                        <label>WBS Email</label>

						<input type="text" class="form-control" data-type="email" name="fh_notifemail" maxlength=255 size=50 value="{$fh_notifemail}" data-required="true">

                      </div>

                      <div class="form-group">

                        <label>Website</label>

                        <input type="text" data-type="url" data-required="true" class="form-control" placeholder="http://faberhost.com" maxlength=255 name="fh_companyweb" value="{$fh_companyweb}">

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

                          <input type="text" class="form-control" placeholder="Yahoo Mesenger ID" name="fh_company_ym1" maxlength=255 value="{$fh_company_ym1}">

                        </div>

                        <div class="col-sm-6">

                          <label>YM 2</label>

                          <input type="text" class="form-control" placeholder="Yahoo Mesenger ID" name="fh_company_ym2" maxlength=255 value="{$fh_company_ym2}">

                        </div>

                      </div> -->

                      <div class="form-group">

                        <label>Facebook Link</label>

                        <input type="text" data-type="url" class="form-control" placeholder="http://www.facebook.com/faberhost.co.id" maxlength=255 name="fh_social_fb" value="{$fh_social_fb}">

                      </div>

                      <div class="form-group">

                        <label>Twitter Link</label>

                        <input type="text" data-type="url" class="form-control" placeholder="https://twitter.com/faberhost" maxlength=255 name="fh_social_twt" value="{$fh_social_twt}">

                      </div>

                    <div class="form-group">

                        <label>Instagram</label>

                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_gplus" value="{$fh_social_gplus}">

                      </div>

                        <!-- 

                      <div class="form-group">

                        <label>Blogger Link</label>

                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_blogger" value="{$fh_social_blogger}">

                      </div>

                      

                      !-->

                      <div class="form-group">

                        <label>Linkedin Link</label>

                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_linkedin" value="{$fh_social_linkedin}">

                      </div>

                      

                      <!---

                      <div class="form-group">

                        <label>Youtube Link</label>

                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_youtube" value="{$fh_social_youtube}">

                      </div>

                      <div class="form-group">

                        <label>Vimeo Link</label>

                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_vimeo" value="{$fh_social_vimeo}">

                      </div> 

                      <div class="form-group">

                        <label>RSS Link</label>

                        <input type="text" data-type="url" class="form-control" maxlength=255 name="fh_social_rss" value="{$fh_social_rss}">

                      </div>

                      -->

                      <div class="form-group">

                        <label>Google Map</label>

                        <textarea class="form-control" rows="6" data-minwords="6" name="fh_googlemap">{$fh_googlemap}</textarea>

                      </div>

                     <!--  <div class="form-group">

                        <label>Facebook Likebox Script</label>

                        <textarea class="form-control" rows="6" data-minwords="6" name="fh_fbbox">{$fh_fbbox}</textarea>

                      </div>

                      <div class="form-group">

                        <label>Twitter Box Script</label>

                        <textarea class="form-control" rows="6" data-minwords="6" name="fh_twtbox">{$fh_twtbox}</textarea>

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

						  <textarea class="form-control" cols="50" rows="3" name="fh_index_title" data-required="true">{$fh_index_title}</textarea>

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Header Tagline (ID)</label>

                        <div class="col-sm-9">

						  <textarea class="form-control" cols="50" rows="3" name="fh_index_title_en" data-required="true">{$fh_index_title_en}</textarea>

                        </div>

                      </div>

                      <!-- <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Home Description (EN)</label>

                        <div class="col-sm-9">

                          <textarea class="jckeditor" name="fh_index_description" id="fh_index_description">{$fh_index_description}</textarea>

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Home Description (ID)</label>

                        <div class="col-sm-9">

                          <textarea class="jckeditor" name="fh_index_description_en" id="fh_index_description_en">{$fh_index_description_en}</textarea>

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

                          <input type="text" class="form-control" data-required="true" name="fh_general_pageheader" maxlength=160 value="{$fh_general_pageheader}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">General Page Header (ID)</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" data-required="true" name="fh_general_pageheader_en" maxlength=160 value="{$fh_general_pageheader_en}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">General Meta Keyword</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" data-required="true" name="fh_general_metakeyword" maxlength=255 value="{$fh_general_metakeyword}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">General Meta Description</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" data-required="true" name="fh_general_metadescription" maxlength=160 value="{$fh_general_metadescription}">

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

                          {if $fh_general_banner neq ''}

							<img src='{$path_image}{$fh_general_banner}' style='width:400px;'><br>

							<input type='submit'  value=' Delete General Banner ' name='delbanner' onclick='return konfirmasi()';><br><br>

						  {/if}

						  <input type="file" class="filestyle" data-icon="true" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" name="fh_general_banner">

						  <br><font color=red><b>Resize Image => Width : {$fh_widthgeneralbanner} px &nbsp;&nbsp;&nbsp; Height : {$fh_heightgeneralbanner} px</b></font>

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">General Banner Size</label>

                        <div class="col-sm-3">

                          <label>width</label>

						  <div class="input-group m-b">

							<input type="text" data-type="number" class="form-control" data-required="true" name="fh_widthgeneralbanner" value="{$fh_widthgeneralbanner}">

							<span class="input-group-addon"> pixel</span>

						  </div>

                        </div>

                        <div class="col-sm-3">

                          <label>height</label>

						  <div class="input-group m-b">

							<input type="text" data-type="number" class="form-control" data-required="true" name="fh_heightgeneralbanner" value="{$fh_heightgeneralbanner}">

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

							<input type="text" data-type="number" class="form-control" data-required="true" name="fh_widthstatisbanner" value="{$fh_widthstatisbanner}">

							<span class="input-group-addon"> pixel</span>

						  </div>

                        </div>

                        <div class="col-sm-3">

                          <label>height</label>

						  <div class="input-group m-b">

							<input type="text" data-type="number" class="form-control" data-required="true" name="fh_heightstatisbanner" value="{$fh_heightstatisbanner}">

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

                          <input type="text" class="form-control" data-required="true" name="fh_sitetitle" maxlength=255 value="{$fh_sitetitle}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Project Name</label>

                        <div class="col-sm-6">

                          <input type="text" class="form-control" data-required="true" name="fh_projectname" maxlength=255 value="{$fh_projectname}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Email Admin</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" data-required="true" data-type="email" name="fh_emailadmin" maxlength=255 value="{$fh_emailadmin}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Project URL</label>

                        <div class="col-sm-9">

                          <input type="text" class="form-control" data-required="true" data-type="url" name="fh_projecturl" maxlength=255 value="{$fh_projecturl}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Maximum Log</label>

                        <div class="col-sm-3">

                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_maxuserlog" maxlength=10 value="{$fh_maxuserlog}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Maximum File Size</label>

                        <div class="col-sm-3">

                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_maxfilesize" maxlength=10 value="{$fh_maxfilesize}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Listing / Page [Frontend]</label>

                        <div class="col-sm-3">

                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_frontend_page" maxlength=10 value="{$fh_frontend_page}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Listing / Page [Backend]</label>

                        <div class="col-sm-3">

                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_backend_page" maxlength=10 value="{$fh_backend_page}">

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Shipping Rate</label>

                        <div class="col-sm-3">

                          <input type="text" class="form-control" data-required="true" data-type="number" name="fh_shipping_rate" maxlength=10 value="{$fh_shipping_rate}">

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

							<option value="Published" {if $fh_webstatus eq 'Published'}selected{/if}>Published</option>

							<option value="On Progress" {if $fh_webstatus eq 'On Progress'}selected{/if}>On Progress</option>

						  </select>

                        </div>

                      </div>

                      <div class="line line-dashed b-b line-lg pull-in"></div>

                      <div class="form-group">

                        <label class="col-sm-3 control-label">Keyword for Progress</label>

                        <div class="col-sm-3">

							<input type="text" class="form-control" data-required="true" name="fh_webstatuskey" value="{$fh_webstatuskey}">

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

						  <input type="hidden" name="fh_basicconfigid" value="{$fh_basicconfigid}">
						  {php}echo csrf_hidden_field();{/php}
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

<script src="{$baseurl_admin}lib/ckeditor/ckeditor.js"></script>

<script src="{$baseurl_admin}lib/ckeditor/adapters/jquery.js"></script>

<script src="{$baseurl_admin}lib/ckfinder/ckfinder.js"></script>

<!-- custom script disini -->

<script src="{$baseurl_admin}include/js/localscript.js"></script>

</body>

</html>