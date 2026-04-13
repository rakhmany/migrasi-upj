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
                    <header class="panel-heading"> <strong>Informasi Pribadi</strong> </header>
                    <div class="panel-body">
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tanggal Posting</label>
                        <div class="col-sm-2">
                          <input class="form-control" type="text" data-required="true" placeholder="dd-mm-yyyy" name="data_pmbdate" value="{$data_pmbdate}" size="16" readonly>
                        </div>
                       <!--  <label class="col-sm-4 control-label">Photo</label>
                        <div class="col-sm-3">
						  {if $data_pmbphoto neq ''}
						  <div class="thumbnail m-t-xs">
							<a href="{$path_file_image}{$data_pmbphoto}"><img src="{$path_file_image}{$data_pmbphoto}?{$smarty.now}" alt="Photos"></a>
							<div class="caption">
							  <p align="center" class="text-ellipsis m-b-none">{$data_pmbname}</p>
							</div>
						  </div>
						  {else}
						  No Photo
						  {/if}
                        </div> -->
                        <!-- <label class="col-sm-1 control-label">Status</label>
                        <div class="col-sm-2">
                          <select data-required="true" class="form-control" name="data_pmbstatus" readonly>
						  {section name=listing loop=$optarray}
							<option value="{$optarray[listing]}"{if $data_pmbstatus eq $optarray[listing]} selected{/if}>{$optarray[listing]}</option>
						  {/section}
						  </select>
                        </div> -->
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-5">
                          <input type="text" class="form-control" data-required="true" name="data_pmbname" value="{$data_pmbname}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-3">
							<select class="form-control" name="data_pmbjkel" disabled>
								{section name=listing loop=$optarray_jkel}
									<option value='{$optarray_jkel[listing]}' {if $data_pmbjkel eq $optarray_jkel[listing]} selected {/if}>{$optarray_jkel[listing]}</option>
								{/section}
							</select>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Tempat & Tanggal Lahir</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbbirth" value="{$data_pmbbirth}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Agama</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbagama" value="{$data_pmbagama}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">NIK</label>
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
                        <label class="col-sm-2 control-label">Alamat Rumah</label>
                        <div class="col-sm-10">
						  <textarea data-required="true" class="form-control" name="data_pmbaddress" rows="5" cols="55" readonly>{$data_pmbaddress}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Pos</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbpostcode" value="{$data_pmbpostcode}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Handphone</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbhp" value="{$data_pmbhp}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbemail" value="{$data_pmbemail}" readonly>
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
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadyname" value="{$data_pmbdadyname}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Nama Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammyname" value="{$data_pmbmammyname}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
						  <textarea data-required="true" class="form-control" name="data_pmbparentaddress" rows="5" cols="55" readonly>{$data_pmbparentaddress}</textarea>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Pos</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbparentpostcode" value="{$data_pmbparentpostcode}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">HP</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbparenthp" value="{$data_pmbparenthp}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Status Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadystatus" value="{$data_pmbdadystatus}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Status Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammystatus" value="{$data_pmbmammystatus}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Pendidikan Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadylaststudy" value="{$data_pmbdadylaststudy}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Pendidikan Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammylaststudy" value="{$data_pmbmammylaststudy}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Pekerjaan Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadyjob" value="{$data_pmbdadyjob}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Pekerjaan Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammyjob" value="{$data_pmbmammyjob}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Penghasilan Ayah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbdadysalary" value="{$data_pmbdadysalary}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Penghasilan Ibu</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbmammysalary" value="{$data_pmbmammysalary}" readonly>
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
                          <input type="text" class="form-control" data-required="true" name="data_schname" value="{$data_schname}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Tahun Lulus</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_schgraduateyear" value="{$data_schgraduateyear}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Alamat Sekolah</label>
                        <div class="col-sm-5">
                          <textarea class="form-control" rows="5" name="data_schaddress" id="data_schaddress" data-maxlength="255" readonly>{$data_schaddress}</textarea>
                        </div>
                        <label class="col-sm-2 control-label">Kota</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_schcity" value="{$data_schcity}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Kode Pos</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_schpostcode" value="{$data_schpostcode}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div> -->
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Asal Sekolah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmblulusan" value="{$data_pmblulusan}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Tahun Lulus</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_pmbgraduateyear" value="{$data_pmbgraduateyear}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Wilayah Sekolah</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbwilayah" value="{$data_pmbwilayah}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Jurusan Sekolah</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_pmbjurusan" value="{$data_pmbjurusan}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Dibiayai Oleh</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbbiaya" value="{$data_pmbbiaya}" readonly>
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
                          <input type="text" class="form-control" data-required="true" name="data_pmbknowwe" value="{$data_pmbknowwe}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Nama Perekomendasi</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbnamerecomend" value="{$data_pmbnamerecomend}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">NIM / Unit</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbnimrecomend" value="{$data_pmbnimrecomend}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">No. Handphone</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbnoperecomend" value="{$data_pmbnoperecomend}" readonly>
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
                          <input type="text" class="form-control" data-required="true" name="data_refname" value="{$data_refname}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Hubungan</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_refrelation" value="{$data_refrelation}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_refphone" value="{$data_refphone}" readonly>
                        </div>
                        <label class="col-sm-3 control-label">No. Handphone</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_refhp" value="{$data_refhp}" readonly>
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
                          <input type="text" class="form-control" data-required="true" name="data_pmbprogramstudy" value="{$data_pmbprogramstudy}" readonly>
                        </div>
                        <label class="col-sm-2 control-label">Program Studi 2</label>
                        <div class="col-sm-4">
                          <input type="text" class="form-control" data-required="true" name="data_pmbprogramstudy2" value="{$data_pmbprogramstudy2}" readonly>
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
                      <div class="form-group">
                        <label class="col-sm-2 control-label">Gelombang</label>
                        <div class="col-sm-3">
                          <input type="text" class="form-control" data-required="true" name="data_pmbgelombang" value="{$data_pmbgelombang}" readonly>
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
						  <a href="{$smarty.server.PHP_SELF}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
						  {if $data_pmbid neq ''}
						  <input type="hidden" name="data_pmbid" value="{$data_pmbid}">
						  <button type="submit" class="btn btn-primary" name="edit"><i class="fa fa-floppy-o"></i> Save</button>
						  {else}
						  <button type="submit" class="btn btn-primary" name="insert"><i class="fa fa-floppy-o"></i> Submit</button>
						  {/if}
						</div>
					  </div>
                    </div>
                  </section>
              </div>
            </div> -->
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