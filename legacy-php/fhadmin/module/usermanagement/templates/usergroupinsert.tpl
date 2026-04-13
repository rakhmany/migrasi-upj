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
			  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 m-b-xs">
				<a href="{$smarty.server.PHP_SELF}" class="btn btn-sm btn-default m-r-xs" title="Back to main"><i class="fa fa-arrow-left"></i></a>
				<span class="h5">{if $data_productid neq ''}Edit{else}Insert{/if} {$title}</span>
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
					<li class="active"><i class="fa fa-pencil"></i> {if $data_productid neq ''}Edit{else}Insert{/if}</li>
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
			
			<form class="form-horizontal" data-validate="parsley" name="form" method="post" enctype="multipart/form-data" action="{$smarty.server.PHP_SELF}{if $data_fh_usergroupid neq ''}?data_fh_usergroupid={$data_fh_usergroupid}{/if}">
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Basic Information</strong> </header>
                    <div class="panel-body">
                      {if $data_fh_usergroupid neq ''}
					  <div class="form-group">
                        <label class="col-sm-2 control-label">ID</label>
                        <div class="col-sm-6">
                          <input type="hidden" name="data_fh_usergroupid" value="{$data_fh_usergroupid}">{$data_fh_usergroupid}
                        </div>
                      </div>
                      <div class="line line-dashed b-b line-lg pull-in"></div>
					  {/if}
                      <div class="form-group">
                        <label class="col-sm-2 control-label">User Group Name</label>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" data-required="true" placeholder="name" name="data_fh_usergroupname" value="{$data_fh_usergroupname}">
                        </div>
                      </div>
                    </div>
                  </section>
              </div>
            </div>
			
            <div class="row">
              <div class="col-sm-12">
                  <section class="panel panel-default">
                    <header class="panel-heading"> <strong>Access</strong> </header>
                    <div class="panel-body">
                      {section name=list loop=$list_kategorimenuid}
					  <div class="row row-sm">
						<section class="panel panel-default m-t-sm">
							<header class="panel-heading">{$list_kategorimenuname[list]}</header>
							<div class="panel-body">
								{section name=list1 loop=$list_menuid[list]}
								{assign var='thisID' value=$list_menuid[list][list1]}
								<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
									<section class="panel panel-default m-t-sm bg-dark">
										<header class="panel-heading">
											<input class="selectallsub" data-subcheckbox="subchk-{$list_menuid[list][list1]}" type="checkbox" name="optmenu[]" value="{$list_menuid[list][list1]}"
											  {section name=list2 loop=$optmenu}  
											  {if $optmenu[list2] eq $list_menuid[list][list1]}checked{/if}
											  {/section}
											/> {$list_menuname[list][list1]}
										</header>
										<div class="panel-body" id="{$thisID}">
											{section name=list3 loop=$list_aksestype[list][list1]} 
												<div class="col-xs-4 col-sm-4">
													<input class="subchk-{$list_menuid[list][list1]}" type="checkbox" name="opttype[{$thisID}][]" value="{$list_aksestype[list][list1][list3]}"
														  {section name=list4 loop=$opttype.$thisID}
														  {if $opttype.$thisID[list4] eq $list_aksestype[list][list1][list3]}checked{/if}
														  {/section}
													/> {if $list_aksestype[list][list1][list3] eq 'A'}Add{elseif $list_aksestype[list][list1][list3] eq 'E'}Edit{else}Delete{/if}
												</div>
											{/section}
										</div>
									</section>
								</div>
								{/section}
							</div>
						</section>
						<div class="clearfix visible-xs"></div>
					  </div>
					  {/section}
					  <!-- <div class="row row-sm">
						Note:<br />
						A = Add access<br />
						E = Edit access<br />
						D = Delete access<br />
					  </div> -->
					  
					  
					  <!-- <div class="form-group">
						{section name=list loop=$list_kategorimenuid}
						<div id="tabelaksesclear" style="clear:both;"><br><span class="bold">{$list_kategorimenuname[list]}</span></div>

							{section name=list1 loop=$list_menuid[list]}
								{assign var='thisID' value=$list_menuid[list][list1]}
								<div id="tabelaksesright" style="border:1px solid black; margin:5px; padding:5px;">
								<input onClick="javascript: SetAllSubCheckBoxes('form', this.checked, this.value)" type="checkbox" name="optmenu[]" value="{$list_menuid[list][list1]}"
									  {section name=list2 loop=$optmenu}  
									  {if $optmenu[list2] eq $list_menuid[list][list1]}checked{/if}
									  {/section}
								/>{$list_menuname[list][list1]}<br>
								<hr style="border:1px solid black; margin-left:5px; margin-right:5px;" />
									<span class="col-md-4" id="{$thisID}">
									{section name=list3 loop=$list_aksestype[list][list1]} 
									<input type="checkbox" name="opttype[{$thisID}][]" value="{$list_aksestype[list][list1][list3]}"
										  {section name=list4 loop=$opttype.$thisID}
										  {if $opttype.$thisID[list4] eq $list_aksestype[list][list1][list3]}checked{/if}
										  {/section}
									/> {$list_aksestype[list][list1][list3]}
									{/section}
									</span>
								</div>
							{/section}

						<div id="tabelaksesclear" style="clear:both;"></div>
						{/section}<br />
						<div id="tabelaksesclear" style="clear:both;"></div>
						Note:<br />
						A = Add access<br />
						E = Edit access<br />
						D = Delete access<br />
                      </div> -->
                      <div class="line line-dashed b-b line-lg pull-in"></div>
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
						  {if $data_fh_usergroupid eq ''}
						  <button type="submit" class="btn btn-primary" name="insert" value="Add"><i class="fa fa-floppy-o"></i> Submit</button>
						  {else}
						  <input type="hidden" name="data_fh_usergroupid" value="{$data_fh_usergroupid}">
						  <button type="submit" class="btn btn-primary" name="edit" value="edit"><i class="fa fa-floppy-o"></i> Save</button>
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
<!-- custom script disini -->
{literal}
<script type="text/javascript">

/*
// Old check all script
// sample =>
// onClick="javascript: SetAllSubCheckBoxes('form', this.checked, this.value)"
// 
function SetAllSubCheckBoxes(FormName, FieldName, ThisValue)
{	
	if ((FieldName)==true) {var CheckValue= true;}
  	else {var CheckValue= false;}
	if(!document.forms[FormName]){
		return;}
	var objCheckBoxes = document.getElementById(ThisValue).childNodes;
		//alert (objCheckBoxes);	
	if(!objCheckBoxes) {
		return;
	}
	var countCheckBoxes = objCheckBoxes.length;
	//alert (countCheckBoxes);	
	if(!countCheckBoxes){
		this.checked = CheckValue; 
		//alert (ThisValue);
	}
	else{
		// set the check value for all check boxes	
		for(var i = 0; i < countCheckBoxes; i++) {
			if (typeof objCheckBoxes[i].name == 'undefined') { 	}
			else { objCheckBoxes[i].checked = CheckValue; }
				
		}
	} /**/
}
*/
</script>
{/literal}
</body>
</html>