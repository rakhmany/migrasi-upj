<!DOCTYPE html>
<html lang="en" class="app">
<head>
{include file='../../../templates/scale/header_meta.tpl'}
</head>
<body class="">
<section class="vbox">
  {include file='../../../templates/scale/header.tpl'}
  <section>
    <section class="hbox stretch">
      {include file='../../../templates/scale/sidebar.tpl'}
      <section id="content">
        <section class="hbox stretch">
          <aside class="aside-md bg-light dker b-r hide" id="subNav">
            <div class="wrapper b-b header">Submenu Header</div>
            <ul class="nav">
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Phasellus at ultricies</a>
				<ul class="nav dk">
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Phasellus at ultricies</a>
				  </li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Malesuada augue</a></li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Donec eleifend</a></li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Dapibus porta</a></li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Dacus eu neque</a></li>
				</ul>
			  </li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Malesuada augue</a></li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Donec eleifend</a></li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Dapibus porta</a></li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Dacus eu neque</a></li>
            </ul>
          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-white b-b clearfix">
                <div class="row m-t-sm">
				  <div class="col-md-5 col-sm-12 m-b-xs">
					<a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default hide"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
				    <b>{$title}</b>
                    <!-- <div class="btn-group">
                      <button type="button" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button>
                      <button type="submit" class="btn btn-sm btn-default" title="Remove" name="submit"><i class="fa fa-trash-o"></i></button>
                      <button type="button" class="btn btn-sm btn-default" title="Filter" data-toggle="dropdown"><i class="fa fa-filter"></i> <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div> -->
                    <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a>
				  </div>
                  <div class="col-md-7 col-sm-12 text-center-xs">
					<form class="form-inline text-right text-center-xs" role="form" method="post" action="{$smarty.server.PHP_SELF}">
						<div class="form-group">
						  <label class="sr-only" for="exampleInputEmail2">Status</label>
						  <select class="input-sm form-control input-s-sm inline v-middle" name="search1">
							<option value="">== Status ==</option>
							{section name=listing loop=$optarray_status}
								<option value="{$optarray_status[listing]}"  {if $search1 eq $optarray_status[listing]} selected {/if} >{$optarray_status[listing]}</option>
							{/section}
						  </select>
						</div>
						<input type="text" class="input-sm form-control" placeholder="Search" name="search" value="{$search}">
						<button class="btn btn-sm btn-success" type="submit" value="search"><i class="fa fa-search"></i> Go!</button>
					</form>
                  </div>
                </div>
              </header>
              <section class="scrollable wrapper w-f">
                  {if $view.final_message neq ''}
				  <div class="alert alert-success">
					<button type="button" class="close" data-dismiss="alert">x</button>
					<i class="fa fa-ok-sign"></i><strong>Well done!</strong><br />
					{$view.final_message}
				  </div>
				  {/if}
                  {if $view.msg neq ''}
				  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <i class="fa fa-ban-circle"></i><strong>Warning!</strong><br />
					{$view.msg}
				  </div>
				  {else}
                <section class="panel panel-default">
				  <form name="form" method="post" action="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={$view.order}&orderfield={$view.orderfield}&search={$view.search}&search1={$view.search1}&search2={$view.search2}">
				  <div class="table-responsive">
					<table class="table table-striped m-b-none">
                      <thead>
						<tr>
							<td colspan="6">
								<button class="btn btn-sm btn-danger" type="submit" onclick="return konfirmasi();" name="del" value="delete"><i class="fa fa-trash-o"></i> Delete selected</button>
							</td>
                        </tr>
                        <tr>
                          <th width="20" class="text-center"><label class="checkbox m-n i-checks"><input type="checkbox"><i></i></label></th>
                          <th width="20" class="text-center">No.</th>
                          <th width="10%" class="text-center">Date</th>
                          <th class="th-sortable"><a href="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={if $view.order eq 'asc'}desc{else}asc{/if}&orderfield=eventtitle&search={$view.search}&search1={$view.search1}&search2={$view.search2}">Title<span class="th-sort"> <i class="fa fa-sort-down text{if $view.order eq 'desc'}-active{/if}"></i> <i class="fa fa-sort-up text{if $view.order eq 'asc'}-active{/if}"></i> <i class="fa fa-sort"></i> </span></a> </th>
                          <th width="25%" class="text-center">Image</th>
                          <th   class="text-center">Tag</th>
                          <th width="10%" class="text-center">Status</th>
                          <th width="10%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						{math equation='(cc*y)-cc' cc=$conf.page y=$view.page assign='ctr'}{counter start=$ctr print=false}
						{section name=listing loop=$view.data_eventid}
						<tr>
                          <td><label class="checkbox m-n i-checks">
                              <input type="checkbox" name="delete[]" value="{$view.data_eventid[listing]}">
                              <i></i></label></td>
                          <!-- <td><a href="#modal" data-toggle="modal"><i class="fa fa-search-plus text-muted"></i></a></td> -->
                          <td class="text-center">{counter}.</td>
                          <td class="text-center">{$view.data_eventdate[listing]}</td>
                          <td><a href="{$smarty.server.PHP_SELF}?action=detail&data_eventid={$view.data_eventid[listing]}">{$view.data_eventtitle[listing]}</a></td>
                          <td class="text-center">{if $view.data_eventmainimage[listing] neq ''}<a href="{$smarty.server.PHP_SELF}?action=detail&data_eventid={$view.data_eventid[listing]}"><img src="{$path_file_image}thumb_{$view.data_eventmainimage[listing]}" style="width:120px;" alt="img" /></a>{else}no image{/if}</td>
                          <td  >{$view.list_kataterkait_list[listing]}</td>
                          <td class="text-center"><span class="label bg-{if $view.data_eventstatus[listing] eq 'Hidden'}danger{else}success{/if}">{$view.data_eventstatus[listing]}</span></td>
                          <td class="text-center"><a href="{$smarty.server.PHP_SELF}?action=detail&data_eventid={$view.data_eventid[listing]}" class="btn btn-default btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        {/section}
                      </tbody>
                      <tfoot>
						<tr>
							<td colspan="6">
								<button class="btn btn-sm btn-danger" type="submit" onclick="return konfirmasi();" name="del" value="delete"><i class="fa fa-trash-o"></i> Delete selected</button>
							</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  </form>
				  {/if}
                </section>
              </section>
              <footer class="footer bg-white b-t">
                <div class="row text-center-xs">
                  <div class="col-md-3 m-t-xs">
                    <!-- <div class="btn-group m-t-xs">
                      <button type="button" class="btn btn-sm btn-default" title="Refresh"><i class="fa fa-refresh"></i></button>
                      <button type="submit" class="btn btn-sm btn-default" title="Remove" name="submit"><i class="fa fa-trash-o"></i></button>
                      <button type="button" class="btn btn-sm btn-default" title="Filter" data-toggle="dropdown"><i class="fa fa-filter"></i> <span class="caret"></span></button>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                    </div> -->
                  </div>
                  <div class="col-md-3 hidden-sm">
                    <p class="text-muted m-t">Showing 20-30 of 50</p>
                  </div>
                  <div class="col-md-6 col-sm-12 text-right text-center-xs">
                    <ul class="pagination pagination-sm m-t-sm m-b-none">
                      {$view.pagination.halaman_first}
					  {$view.pagination.halaman_next}
					  {$view.pagination.halaman_content}
					  {$view.pagination.halaman_prev}
					  {$view.pagination.halaman_last}
                    </ul>
                  </div>
                </div>
              </footer>
            </section>
          </aside>
        </section>
        <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a> </section>
    </section>
  </section>
</section>
{include file='../../../templates/scale/footer.tpl'}
<div class="modal fade" id="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Idrawfast 02/2013</h4>
      </div>
      <div class="modal-body">
        <p>This is a table in a modal, click the trash icon to remove the item</p>
        <section class="panel panel-default m-l-n-md m-r-n-md m-b-none">
          <header class="panel-heading"> <span class="label bg-danger pull-right">4 left</span> Tasks </header>
          <table class="table table-striped m-b-none text-sm">
            <thead>
              <tr>
                <th>Progress</th>
                <th>Item</th>
                <th width="20"></th>
              </tr>
            </thead>
            <tbody>
              <tr id="item-1">
                <td><div class="progress progress-sm progress-striped active m-t-xs m-b-none">
                    <div class="progress-bar progress-bar-success" data-toggle="tooltip" data-original-title="80%" style="width: 80%"></div>
                  </div></td>
                <td>App prototype design</td>
                <td class="text-right"><a href="#item-1" data-dismiss="alert"><i class="fa fa-trash-o"></i></a></td>
              </tr>
              <tr id="item-2">
                <td><div class="progress progress-xs m-t-xs m-b-none">
                    <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="40%" style="width: 40%"></div>
                  </div></td>
                <td>Design documents</td>
                <td class="text-right"><a href="#item-2" data-dismiss="alert"><i class="fa fa-trash-o"></i></a></td>
              </tr>
              <tr id="item-3">
                <td><div class="progress progress-xs m-t-xs m-b-none">
                    <div class="progress-bar progress-bar-warning" data-toggle="tooltip" data-original-title="20%" style="width: 20%"></div>
                  </div></td>
                <td>UI toolkit</td>
                <td class="text-right"><a href="#item-3" data-dismiss="alert"><i class="fa fa-trash-o"></i></a></td>
              </tr>
              <tr id="item-4">
                <td><div class="progress progress-xs m-t-xs m-b-none">
                    <div class="progress-bar progress-bar-danger" data-toggle="tooltip" data-original-title="15%" style="width: 15%"></div>
                  </div></td>
                <td>Testing</td>
                <td class="text-right"><a href="#item-4" data-dismiss="alert"><i class="fa fa-trash-o"></i></a></td>
              </tr>
            </tbody>
          </table>
        </section>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default btn-rounded" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-info btn-rounded" data-loading-text="Updating...">Save changes</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
</body>
</html>