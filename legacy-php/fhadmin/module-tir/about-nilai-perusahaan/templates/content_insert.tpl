<!DOCTYPE html>
<html lang="en" class="app">
<head>
{include file='../../../templates/scale/header_meta.tpl'}
<!-- include style disini -->
<style>
.icon-picker-list {
	display: flex;
	flex-flow: row wrap;
	list-style: none;
	padding-left: 0;
}

.icon-picker-list li {
	display: flex;
	flex: 0 0 20%;
	float: left;
	width: 20%;
}

.icon-picker-list a {
	background-color: #f9f9f9;
	border: 1px solid #fff;
	color: black;
	display: block;
	flex: 1 1 auto;
	font-size: 12px;
	line-height: 1.4;
	min-height: 100px;
	padding: 10px;
	text-align: center;
	user-select: none;
}

.icon-picker-list a:hover,
.icon-picker-list a.active{
	background-color: #009E49;
	color: #fff;
	cursor: pointer;
	text-decoration: none;
}

.icon-picker-list .fa {
	font-size: 24px;
	margin-bottom: 10px;
	margin-top: 5px;
}

.icon-picker-list .name-class {
	display: block;
	text-align: center;
	word-wrap: break-word;
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
          <header class="header bg-info b-b clearfix">
			<div class="row m-t-sm">
			  <div class="col-sm-5 m-b-xs">
				<a href="{$smarty.server.PHP_SELF}" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
				<span class="h5">{if $data_primarykey neq ''}Edit{else}Insert{/if} {$title}</span>
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
					<li class="active"><i class="fa fa-pencil"></i> {if $data_primarykey neq ''}Edit{else}Insert{/if}</li>
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
			 
  <form name=form method=post enctype="multipart/form-data"  action={php}echo $_SERVER['PHP_SELF']; {/php}{if $data_primarykey neq ''}?data_primarykey={$data_primarykey}{/if}>
   			<div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic information</strong> </header>
                    <div class="panel-body">
	                   <div class="row hidden">
	                  
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Year</label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_year" value="{$data_d_content_year}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div> 
	                  <div class="row"> 
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Title (ID)</label>
	                        <div class="col-sm-6">
	                          <input   name="data_mainfieldname" value="{$data_mainfieldname}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div> 
	                  <div class="row">
	                  <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Title (EN)</label>
	                        <div class="col-sm-6">
	                          <input   name="data_d_content_title_en" value="{$data_d_content_title_en}" type="text" class="form-control" data-required="true" >
                        	</div>
	                      </div>
	                  </div>
	                  
                      <div class="row hidden">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Description (ID)</label>
		                        <div class="col-sm-10">
		                          <textarea class="form-control  " name="data_d_content_longdesc_id" id="data_d_content_longdesc_id">{$data_d_content_longdesc_id}</textarea>
		                        </div>
	                      </div>
                      </div>
                      <div class="row hidden">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Description (EN)</label>
		                        <div class="col-sm-10">
		                          <textarea class="form-control  " name="data_d_content_longdesc_en" id="data_d_content_longdesc_en">{$data_d_content_longdesc_en}</textarea>
		                        </div>
	                      </div>
                      </div> 
                       
                  </section>
              </div>
          </div> 
          <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Image </strong> </header>
                    
                    <div class="panel-body"> 
                      <div class="row   ">
						  <div class="form-group">
						    <label class="col-sm-2 control-label">Icon</label>
						    <div class="col-sm-6">
						      <div>
						        <input type="text" class="icon-class-input hidden" name="data_d_content_icon" value="{$data_d_content_icon}" />
						        <button type="button" class="btn btn-primary picker-button">Pick an Icon</button>
						        <span class="demo-icon"></span>
						      </div>
						    </div>
						  </div>
						</div>
                       <div class="row hidden "> 
                        <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Image</label>
	                        <div class="col-sm-6">
	                          <input type="file" name="data_mainimage"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
	                          <span style="color: red;">{$best_image_view}</span>
	                         </div>
	                        </div> 
	                      </div>
	                      {$oldimage}
                    </div>
                  </section>
              </div>
          </div>  
          <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Status</strong> </header>
                    <div class="panel-body">
	                    <div class="row">
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Show/Hide</label>
	                        <div class="col-sm-6">
	                          	<select class="form-control" name="data_d_content_status"  > 
	                                {html_options values=$option_showhide_val selected=$data_d_content_status output=$option_showhide_name} 
	                            </select>
	                        </div>
	                      </div>
                      </div>
                      {if $option_data_priority_stat eq '1'}
                          <div class="row hidden">
                          <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Priority</label>
	                        <div class="col-sm-6"> 
                                <select  class="form-control"  name="data_priority"   >
	                                 {html_options values=$option_data_priority selected=$data_priority output=$option_data_priority} 
                            </select>
                            <input  type="hidden" value="{$data_priority}" name="data_old_priority" />
	                        </div>
	                      </div>
	                     </div>
	                     {/if}
                      <div class="row hidden">
	                      <div class="line line-dashed b-b line-lg pull-in"></div>
	                      <div class="form-group">
	                        <label class="col-sm-2 control-label">Stock</label>
		                        <div class="col-sm-3">
		                          <input   name="data_d_content_stock" value="{$data_d_content_stock}" type="text" class="form-control" data-required="true" >
                        	</div>
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
						  {if $data_primarykey neq ''}
						  <input type=hidden name=data_primarykey value="{$data_primarykey}" />
						  <button type="submit" class="btn btn-primary" name="edit" value="save"><i class="fa fa-floppy-o"></i> Save</button>
						  {else}
						  <button type="submit" class="btn btn-primary" name="insert" value="submit"><i class="fa fa-floppy-o"></i> Submit</button>
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


<div id="iconPicker" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Icon Picker</h4>
			</div>
			<div class="modal-body">
				<div>
					<ul class="icon-picker-list">
						<li>
						{literal}
							<a data-class="{{item}} {{activeState}}" data-index="{{index}}">
								<span class="{{item}}"></span>
								<span class="name-class">{{item}}</span>
							</a>
							{/literal}
						</li>
					</ul>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" id="change-icon" class="btn btn-success">
					<span class="fa fa-check-circle-o"></span>
					Use Selected Icon
				</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
			</div>
		</div>
	</div>
</div>


{include file='../../../templates/scale/footer.tpl'}
<!-- include spesifik js disini -->
<!-- include spesifik js disini -->
<script src="{$themesurl_admin}js/datepicker/bootstrap-datepicker.js"></script>
<script src="{$themesurl_admin}js/file-input/bootstrap-filestyle.min.js"></script>
<script src="{$baseurl_admin}lib/ckeditor/ckeditor.js"></script>
<script src="{$baseurl_admin}lib/ckeditor/adapters/jquery.js"></script>
<script src="{$baseurl_admin}lib/ckfinder/ckfinder.js"></script>
<!-- custom script disini -->
<script src="{$baseurl_admin}include/js/localscript.js"></script>
{literal}  
 
 <script>
           
 var icons = [  { icon: 'fa fa-adjust' }, { icon: 'fa fa-adn' }, { icon: 'fa fa-align-center' }, { icon: 'fa fa-align-justify' }, { icon: 'fa fa-align-left' }, { icon: 'fa fa-align-right' }, { icon: 'fa fa-ambulance' }, { icon: 'fa fa-anchor' }, { icon: 'fa fa-android' }, { icon: 'fa fa-angle-double-down' }, { icon: 'fa fa-angle-double-left' }, { icon: 'fa fa-angle-double-right' }, { icon: 'fa fa-angle-double-up' }, { icon: 'fa fa-angle-down' }, { icon: 'fa fa-angle-left' }, { icon: 'fa fa-angle-right' }, { icon: 'fa fa-angle-up' }, { icon: 'fa fa-apple' }, { icon: 'fa fa-archive' }, { icon: 'fa fa-arrow-circle-down' }, { icon: 'fa fa-arrow-circle-left' }, { icon: 'fa fa-arrow-circle-o-down' }, { icon: 'fa fa-arrow-circle-o-left' }, { icon: 'fa fa-arrow-circle-o-right' }, { icon: 'fa fa-arrow-circle-o-up' }, { icon: 'fa fa-arrow-circle-right' }, { icon: 'fa fa-arrow-circle-up' }, { icon: 'fa fa-arrow-down' }, { icon: 'fa fa-arrow-left' }, { icon: 'fa fa-arrow-right' }, { icon: 'fa fa-arrow-up' }, { icon: 'fa fa-arrows' }, { icon: 'fa fa-arrows-alt' }, { icon: 'fa fa-arrows-h' }, { icon: 'fa fa-arrows-v' }, { icon: 'fa fa-asterisk' }, { icon: 'fa fa-backward' }, { icon: 'fa fa-ban' }, { icon: 'fa fa-bar-chart-o' }, { icon: 'fa fa-barcode' }, { icon: 'fa fa-bars' }, { icon: 'fa fa-beer' }, { icon: 'fa fa-bell' }, { icon: 'fa fa-bell-o' }, { icon: 'fa fa-bitbucket' }, { icon: 'fa fa-bitbucket-square' }, { icon: 'fa fa-bold' }, { icon: 'fa fa-bolt' }, { icon: 'fa fa-book' }, { icon: 'fa fa-bookmark' }, { icon: 'fa fa-bookmark-o' }, { icon: 'fa fa-briefcase' }, { icon: 'fa fa-btc' }, { icon: 'fa fa-bug' }, { icon: 'fa fa-building-o' }, { icon: 'fa fa-bullhorn' }, { icon: 'fa fa-bullseye' }, { icon: 'fa fa-calendar' }, { icon: 'fa fa-calendar-o' }, { icon: 'fa fa-camera' }, { icon: 'fa fa-camera-retro' }, { icon: 'fa fa-caret-down' }, { icon: 'fa fa-caret-left' }, { icon: 'fa fa-caret-right' }, { icon: 'fa fa-caret-square-o-down' }, { icon: 'fa fa-caret-square-o-left' }, { icon: 'fa fa-caret-square-o-right' }, { icon: 'fa fa-caret-square-o-up' }, { icon: 'fa fa-caret-up' }, { icon: 'fa fa-certificate' }, { icon: 'fa fa-chain-broken' }, { icon: 'fa fa-check' }, { icon: 'fa fa-check-circle' }, { icon: 'fa fa-check-circle-o' }, { icon: 'fa fa-check-square' }, { icon: 'fa fa-check-square-o' }, { icon: 'fa fa-chevron-circle-down' }, { icon: 'fa fa-chevron-circle-left' }, { icon: 'fa fa-chevron-circle-right' }, { icon: 'fa fa-chevron-circle-up' }, { icon: 'fa fa-chevron-down' }, { icon: 'fa fa-chevron-left' }, { icon: 'fa fa-chevron-right' }, { icon: 'fa fa-chevron-up' }, { icon: 'fa fa-circle' }, { icon: 'fa fa-circle-o' }, { icon: 'fa fa-clipboard' }, { icon: 'fa fa-clock-o' }, { icon: 'fa fa-cloud' }, { icon: 'fa fa-cloud-download' }, { icon: 'fa fa-cloud-upload' }, { icon: 'fa fa-code' }, { icon: 'fa fa-code-fork' }, { icon: 'fa fa-coffee' }, { icon: 'fa fa-cog' }, { icon: 'fa fa-cogs' }, { icon: 'fa fa-columns' }, { icon: 'fa fa-comment' }, { icon: 'fa fa-comment-o' }, { icon: 'fa fa-comments' }, { icon: 'fa fa-comments-o' }, { icon: 'fa fa-compass' }, { icon: 'fa fa-compress' }, { icon: 'fa fa-credit-card' }, { icon: 'fa fa-crop' }, { icon: 'fa fa-crosshairs' }, { icon: 'fa fa-css3' }, { icon: 'fa fa-cutlery' }, { icon: 'fa fa-desktop' }, { icon: 'fa fa-dot-circle-o' }, { icon: 'fa fa-download' }, { icon: 'fa fa-dribbble' }, { icon: 'fa fa-dropbox' }, { icon: 'fa fa-eject' }, { icon: 'fa fa-ellipsis-h' }, { icon: 'fa fa-ellipsis-v' }, { icon: 'fa fa-envelope' }, { icon: 'fa fa-envelope-o' }, { icon: 'fa fa-eraser' }, { icon: 'fa fa-eur' }, { icon: 'fa fa-exchange' }, { icon: 'fa fa-exclamation' }, { icon: 'fa fa-exclamation-circle' }, { icon: 'fa fa-exclamation-triangle' }, { icon: 'fa fa-expand' }, { icon: 'fa fa-external-link' }, { icon: 'fa fa-external-link-square' }, { icon: 'fa fa-eye' }, { icon: 'fa fa-eye-slash' }, { icon: 'fa fa-facebook' }, { icon: 'fa fa-facebook-square' }, { icon: 'fa fa-fast-backward' }, { icon: 'fa fa-fast-forward' }, { icon: 'fa fa-female' }, { icon: 'fa fa-fighter-jet' }, { icon: 'fa fa-file' }, { icon: 'fa fa-file-o' }, { icon: 'fa fa-file-text' }, { icon: 'fa fa-file-text-o' }, { icon: 'fa fa-files-o' }, { icon: 'fa fa-film' }, { icon: 'fa fa-filter' }, { icon: 'fa fa-fire' }, { icon: 'fa fa-fire-extinguisher' }, { icon: 'fa fa-flag' }, { icon: 'fa fa-flag-checkered' }, { icon: 'fa fa-flag-o' }, { icon: 'fa fa-flask' }, { icon: 'fa fa-flickr' }, { icon: 'fa fa-floppy-o' }, { icon: 'fa fa-folder' }, { icon: 'fa fa-folder-o' }, { icon: 'fa fa-folder-open' }, { icon: 'fa fa-folder-open-o' }, { icon: 'fa fa-font' }, { icon: 'fa fa-forward' }, { icon: 'fa fa-foursquare' }, { icon: 'fa fa-frown-o' }, { icon: 'fa fa-gamepad' }, { icon: 'fa fa-gavel' }, { icon: 'fa fa-gbp' }, { icon: 'fa fa-gift' }, { icon: 'fa fa-github' }, { icon: 'fa fa-github-alt' }, { icon: 'fa fa-github-square' }, { icon: 'fa fa-gittip' }, { icon: 'fa fa-glass' }, { icon: 'fa fa-globe' }, { icon: 'fa fa-google-plus' }, { icon: 'fa fa-google-plus-square' }, { icon: 'fa fa-h-square' }, { icon: 'fa fa-hand-o-down' }, { icon: 'fa fa-hand-o-left' }, { icon: 'fa fa-hand-o-right' }, { icon: 'fa fa-hand-o-up' }, { icon: 'fa fa-hdd-o' }, { icon: 'fa fa-headphones' }, { icon: 'fa fa-heart' }, { icon: 'fa fa-heart-o' }, { icon: 'fa fa-home' }, { icon: 'fa fa-hospital-o' }, { icon: 'fa fa-html5' }, { icon: 'fa fa-inbox' }, { icon: 'fa fa-indent' }, { icon: 'fa fa-info' }, { icon: 'fa fa-info-circle' }, { icon: 'fa fa-inr' }, { icon: 'fa fa-instagram' }, { icon: 'fa fa-italic' }, { icon: 'fa fa-jpy' }, { icon: 'fa fa-key' }, { icon: 'fa fa-keyboard-o' }, { icon: 'fa fa-krw' }, { icon: 'fa fa-laptop' }, { icon: 'fa fa-leaf' }, { icon: 'fa fa-lemon-o' }, { icon: 'fa fa-level-down' }, { icon: 'fa fa-level-up' }, { icon: 'fa fa-lightbulb-o' }, { icon: 'fa fa-link' }, { icon: 'fa fa-linkedin' }, { icon: 'fa fa-linkedin-square' }, { icon: 'fa fa-linux' }, { icon: 'fa fa-list' }, { icon: 'fa fa-list-alt' }, { icon: 'fa fa-list-ol' }, { icon: 'fa fa-list-ul' }, { icon: 'fa fa-location-arrow' }, { icon: 'fa fa-lock' }, { icon: 'fa fa-long-arrow-down' }, { icon: 'fa fa-long-arrow-left' }, { icon: 'fa fa-long-arrow-right' }, { icon: 'fa fa-long-arrow-up' }, { icon: 'fa fa-magic' }, { icon: 'fa fa-magnet' }, { icon: 'fa fa-mail-reply-all' }, { icon: 'fa fa-male' }, { icon: 'fa fa-map-marker' }, { icon: 'fa fa-maxcdn' }, { icon: 'fa fa-medkit' }, { icon: 'fa fa-meh-o' }, { icon: 'fa fa-microphone' }, { icon: 'fa fa-microphone-slash' }, { icon: 'fa fa-minus' }, { icon: 'fa fa-minus-circle' }, { icon: 'fa fa-minus-square' }, { icon: 'fa fa-minus-square-o' }, { icon: 'fa fa-mobile' }, { icon: 'fa fa-money' }, { icon: 'fa fa-moon-o' }, { icon: 'fa fa-music' }, { icon: 'fa fa-outdent' }, { icon: 'fa fa-pagelines' }, { icon: 'fa fa-paperclip' }, { icon: 'fa fa-pause' }, { icon: 'fa fa-pencil' }, { icon: 'fa fa-pencil-square' }, { icon: 'fa fa-pencil-square-o' }, { icon: 'fa fa-phone' }, { icon: 'fa fa-phone-square' }, { icon: 'fa fa-picture-o' }, { icon: 'fa fa-pinterest' }, { icon: 'fa fa-pinterest-square' }, { icon: 'fa fa-plane' }, { icon: 'fa fa-play' }, { icon: 'fa fa-play-circle' }, { icon: 'fa fa-play-circle-o' }, { icon: 'fa fa-plus' }, { icon: 'fa fa-plus-circle' }, { icon: 'fa fa-plus-square' }, { icon: 'fa fa-power-off' }, { icon: 'fa fa-print' }, { icon: 'fa fa-puzzle-piece' }, { icon: 'fa fa-qrcode' }, { icon: 'fa fa-question' }, { icon: 'fa fa-question-circle' }, { icon: 'fa fa-quote-left' }, { icon: 'fa fa-quote-right' }, { icon: 'fa fa-random' }, { icon: 'fa fa-refresh' }, { icon: 'fa fa-renren' }, { icon: 'fa fa-repeat' }, { icon: 'fa fa-reply' }, { icon: 'fa fa-reply-all' }, { icon: 'fa fa-retweet' }, { icon: 'fa fa-road' }, { icon: 'fa fa-rocket' }, { icon: 'fa fa-rss' }, { icon: 'fa fa-rss-square' }, { icon: 'fa fa-rub' }, { icon: 'fa fa-scissors' }, { icon: 'fa fa-search' }, { icon: 'fa fa-search-minus' }, { icon: 'fa fa-search-plus' }, { icon: 'fa fa-share' }, { icon: 'fa fa-share-square' }, { icon: 'fa fa-share-square-o' }, { icon: 'fa fa-shield' }, { icon: 'fa fa-shopping-cart' }, { icon: 'fa fa-sign-in' }, { icon: 'fa fa-sign-out' }, { icon: 'fa fa-signal' }, { icon: 'fa fa-sitemap' }, { icon: 'fa fa-skype' }, { icon: 'fa fa-smile-o' }, { icon: 'fa fa-sort' }, { icon: 'fa fa-sort-alpha-asc' }, { icon: 'fa fa-sort-alpha-desc' }, { icon: 'fa fa-sort-amount-asc' }, { icon: 'fa fa-sort-amount-desc' }, { icon: 'fa fa-sort-asc' }, { icon: 'fa fa-sort-desc' }, { icon: 'fa fa-sort-numeric-asc' }, { icon: 'fa fa-sort-numeric-desc' }, { icon: 'fa fa-spinner' }, { icon: 'fa fa-square' }, { icon: 'fa fa-square-o' }, { icon: 'fa fa-stack-exchange' }, { icon: 'fa fa-stack-overflow' }, { icon: 'fa fa-star' }, { icon: 'fa fa-star-half' }, { icon: 'fa fa-star-half-o' }, { icon: 'fa fa-star-o' }, { icon: 'fa fa-step-backward' }, { icon: 'fa fa-step-forward' }, { icon: 'fa fa-stethoscope' }, { icon: 'fa fa-stop' }, { icon: 'fa fa-strikethrough' }, { icon: 'fa fa-subscript' }, { icon: 'fa fa-suitcase' }, { icon: 'fa fa-sun-o' }, { icon: 'fa fa-superscript' }, { icon: 'fa fa-table' }, { icon: 'fa fa-tablet' }, { icon: 'fa fa-tachometer' }, { icon: 'fa fa-tag' }, { icon: 'fa fa-tags' }, { icon: 'fa fa-tasks' }, { icon: 'fa fa-terminal' }, { icon: 'fa fa-text-height' }, { icon: 'fa fa-text-width' }, { icon: 'fa fa-th' }, { icon: 'fa fa-th-large' }, { icon: 'fa fa-th-list' }, { icon: 'fa fa-thumb-tack' }, { icon: 'fa fa-thumbs-down' }, { icon: 'fa fa-thumbs-o-down' }, { icon: 'fa fa-thumbs-o-up' }, { icon: 'fa fa-thumbs-up' }, { icon: 'fa fa-ticket' }, { icon: 'fa fa-times' }, { icon: 'fa fa-times-circle' }, { icon: 'fa fa-times-circle-o' }, { icon: 'fa fa-tint' }, { icon: 'fa fa-trash-o' }, { icon: 'fa fa-trello' }, { icon: 'fa fa-trophy' }, { icon: 'fa fa-truck' }, { icon: 'fa fa-try' }, { icon: 'fa fa-tumblr' }, { icon: 'fa fa-tumblr-square' }, { icon: 'fa fa-twitter' }, { icon: 'fa fa-twitter-square' }, { icon: 'fa fa-umbrella' }, { icon: 'fa fa-underline' }, { icon: 'fa fa-undo' }, { icon: 'fa fa-unlock' }, { icon: 'fa fa-unlock-alt' }, { icon: 'fa fa-upload' }, { icon: 'fa fa-usd' }, { icon: 'fa fa-user' }, { icon: 'fa fa-user-md' }, { icon: 'fa fa-users' }, { icon: 'fa fa-video-camera' }, { icon: 'fa fa-vimeo-square' }, { icon: 'fa fa-vk' }, { icon: 'fa fa-volume-down' }, { icon: 'fa fa-volume-off' }, { icon: 'fa fa-volume-up' }, { icon: 'fa fa-weibo' }, { icon: 'fa fa-wheelchair' }, { icon: 'fa fa-windows' }, { icon: 'fa fa-wrench' }, { icon: 'fa fa-xing' }, { icon: 'fa fa-xing-square' }, { icon: 'fa fa-youtube' }, { icon: 'fa fa-youtube-play' }, { icon: 'fa fa-youtube-square'}];
 
var itemTemplate = $('.icon-picker-list').clone(true).html();

$('.icon-picker-list').html('');

// Loop through JSON and appends content to show icons
$(icons).each(function(index) {
	var itemtemp = itemTemplate;
	var item = icons[index].icon;

	if (index == selectedIcon) {
		var activeState = 'active'
	} else {
		var activeState = ''
	}

	itemtemp = itemtemp.replace(/{{item}}/g, item).replace(/{{index}}/g, index).replace(/{{activeState}}/g, activeState);
	
	$('.icon-picker-list').append(itemtemp);
});

// Variable that's passed around for active states of icons
var selectedIcon = null;

$('.icon-class-input').each(function() {
	if ($(this).val() != null) {
		$(this).siblings('.demo-icon').addClass($(this).val());
	}
});

// To be set to which input needs updating
var iconInput = null;

// Click function to set which input is being used
$('.picker-button').click(function() {
	// Sets var to which input is being updated
	iconInput = $(this).siblings('.icon-class-input');
	// Shows Bootstrap Modal
	$('#iconPicker').modal('show');
	// Sets active state by looping through the list with the previous class from the picker input
	selectedIcon = findInObject(icons, 'icon', $(this).siblings('.icon-class-input').val());
	// Removes any previous active class
	$('.icon-picker-list a').removeClass('active');
	// Sets active class
	$('.icon-picker-list a').eq(selectedIcon).addClass('active');
});

// Click function to select icon
$(document).on('click', '.icon-picker-list a', function() {
	// Sets selected icon
	selectedIcon = $(this).data('index');

	// Removes any previous active class
	$('.icon-picker-list a').removeClass('active');
	// Sets active class
	$('.icon-picker-list a').eq(selectedIcon).addClass('active');
});

// Update icon input
$('#change-icon').click(function() {
	iconInput.val(icons[selectedIcon].icon);
	iconInput.siblings('.demo-icon').attr('class', 'demo-icon');
	iconInput.siblings('.demo-icon').addClass(icons[selectedIcon].icon);
	$('#iconPicker').modal('hide');
	console.log(iconInput);
	console.log(icons[selectedIcon].icon);
});

function findInObject(object, property, value) {
	for (var i = 0; i < object.length; i += 1) {
		if (object[i][property] === value) {
			return i;
		}
	}
}
        </script>
{/literal}
</body>
</html>


