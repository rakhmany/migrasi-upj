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
            Sub Sidebar
          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-white b-b clearfix">
                <div class="row m-t-sm">
				  <div class="col-md-5 col-sm-12 m-b-xs">
					<a href="#subNav" data-toggle="class:hide" class="btn btn-sm btn-default hide"><i class="fa fa-caret-right text fa-lg"></i><i class="fa fa-caret-left text-active fa-lg"></i></a>
				    <span class="h5 m-r-sm">{$title}</span>
                    <!-- <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a> -->
				  </div>
                  <div class="col-md-7 col-sm-12 text-center-xs">
					<form class="form-inline text-right text-center-xs" role="form" method="post" action="{$smarty.server.PHP_SELF}">
						<div class="form-group">
						  <label class="sr-only" for="exampleInputEmail2">Status</label>
						  <select class="input-sm form-control input-s-sm inline v-middle" name="search1">
							<option value="">== All ==</option>
							{section name=listing loop=$search_fh_kategorimenuid}
								<option value="{$search_fh_kategorimenuid[listing]}"  {if $search1 eq $search_fh_kategorimenuid[listing]} selected {/if} >{$search_fh_name[listing]}</option>
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
                          <th class="th-sortable"><a href="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={if $view.order eq 'asc'}desc{else}asc{/if}&orderfield=fh_name&search={$view.search}&search1={$view.search1}&search2={$view.search2}">Menu Name<span class="th-sort"> <i class="fa fa-sort-down text{if $view.order eq 'desc'}-active{/if}"></i> <i class="fa fa-sort-up text{if $view.order eq 'asc'}-active{/if}"></i> </span></a> </th>
                          <th class="th-sortable"><a href="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={if $view.order eq 'asc'}desc{else}asc{/if}&orderfield=fh_kategorimenuid&search={$view.search}&search1={$view.search1}&search2={$view.search2}">Category<span class="th-sort"> <i class="fa fa-sort-down text{if $view.order eq 'desc'}-active{/if}"></i> <i class="fa fa-sort-up text{if $view.order eq 'asc'}-active{/if}"></i> </span></a> </th>
                          <th class="th-sortable"><a href="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={if $view.order eq 'asc'}desc{else}asc{/if}&orderfield=fh_url&search={$view.search}&search1={$view.search1}&search2={$view.search2}">URL<span class="th-sort"> <i class="fa fa-sort-down text{if $view.order eq 'desc'}-active{/if}"></i> <i class="fa fa-sort-up text{if $view.order eq 'asc'}-active{/if}"></i> </span></a> </th>
                          <th width="10%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						{math equation='(cc*y)-cc' cc=$conf.page y=$view.page assign='ctr'}{counter start=$ctr print=false}
						{section name=listing loop=$view.fh_menuid_temp}
						<tr>
                          <td><label class="checkbox m-n i-checks">
                              <input type="checkbox" name="delete[]" value="{$view.fh_menuid_temp[listing]}">
                              <i></i></label></td>
                          <td class="text-center">{counter}.</td>
                          <td><a href="{$smarty.server.PHP_SELF}?action=detail&data_fh_menuid={$view.fh_menuid_temp[listing]}">{$view.fh_name_temp[listing]}</a></td>
                          <td>{$view.fh_kategoriname_temp[listing]}</td>
                          <td>{$view.fh_url_temp[listing]}</td>
                          <td class="text-center"><a href="{$smarty.server.PHP_SELF}?action=detail&data_fh_menuid={$view.fh_menuid_temp[listing]}" class="btn btn-default btn-xs btn-rounded btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                        </tr>
                        {/section}
                      </tbody>
                      <tfoot>
						<tr>
							<td colspan="4">
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
					&nbsp;
                  </div>
                  <div class="col-md-3 hidden-sm">
                    <p class="text-muted m-t">&nbsp;<!-- Showing 20-30 of 50 --></p>
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
</body>
</html>