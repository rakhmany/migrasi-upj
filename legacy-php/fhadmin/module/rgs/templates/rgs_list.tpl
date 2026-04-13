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

          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-white b-b clearfix">
                <form class="form" role="form" method="post" action="{$smarty.server.PHP_SELF}">
				<div class="row m-t-sm">
				  <div class="col-sm-3 m-b-xs">
				    <b>{$title}</b>
				  </div>
                  <div class="col-sm-4 col-md-3 m-b-xs">
						<div class="input-group">
						  <label class="sr-only" for="search2">Genre</label>
						  <select class="form-control" name="search2" style="width:100%;">
							<option value=""> = All = </option>
							{section name=listing loop=$optarray_jkel}
								<option value="{$optarray_jkel[listing]}" {if $search2 eq $optarray_jkel[listing]} selected {/if}>{$optarray_jkel[listing]}</option>
							{/section}
						  </select>
						</div>
                  </div>
                  <div class="col-sm-5 text-center-xs m-b-xs">
						<div class="input-group">
						  <input type="text" class="input-sm form-control" placeholder="Search {$mainfieldnamed}" name="search" value="{$search}">
						  <span class="input-group-btn">
							<button class="btn btn-sm btn-success" type="submit" value="search"><i class="fa fa-search"></i> Go!</button>
							
						  </span>
						</div>
                  </div>
                </div>
				</form>
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
                          <th class="th-sortable" width="10%" class="text-center">
							<a href="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={if $view.order eq 'asc'}desc{else}asc{/if}&orderfield=pmbdate&search={$view.search}&search1={$view.search1}&search2={$view.search2}">Date<span class="th-sort"> {if $view.orderfield eq 'pmbdate'} <i class="fa fa-sort-down text{if $view.order eq 'desc'}-active{/if}"></i> <i class="fa fa-sort-up text{if $view.order eq 'asc'}-active{/if}"></i>{/if} <i class="fa fa-sort"></i> </span></a>
						  </th>
                          <th class="th-sortable"><a href="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={if $view.order eq 'asc'}desc{else}asc{/if}&orderfield=pmbname&search={$view.search}&search1={$view.search1}&search2={$view.search2}">Name<span class="th-sort"> {if $view.orderfield eq 'pmbname'} <i class="fa fa-sort-down text{if $view.order eq 'desc'}-active{/if}"></i> <i class="fa fa-sort-up text{if $view.order eq 'asc'}-active{/if}"></i> {/if} <i class="fa fa-sort"></i></span></a> </th>
						  <th width="30%" class="text-center">Contact</th>
						  <!--<th width="20%" class="text-center">Photo</th>-->
                          <!--<th width="10%" class="text-center">Status</th>-->
                          <th width="10%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						{math equation='(cc*y)-cc' cc=$conf.page y=$view.page assign='ctr'}{counter start=$ctr print=false}
						{section name=listing loop=$view.data_pmbid}
						<tr>
                          <td><label class="checkbox m-n i-checks">
                              <input type="checkbox" name="delete[]" value="{$view.data_pmbid[listing]}">
                              <i></i></label></td>
                          <td class="text-center">{counter}.</td>
                          <td class="text-center">{$view.data_pmbdate[listing]}</td>
                          <td>
							<a href="{$smarty.server.PHP_SELF}?action=detail&data_pmbid={$view.data_pmbid[listing]}"><b>{$view.data_pmbname[listing]}</b></a>
						  </td>
                          <td>
							<b>Address</b>: <br />
							{$view.data_pmbaddress[listing]}<br />
							{$view.data_pmbposcode[listing]}<br />
							
							<b>Email Address:</b> <a href="mailto:{$view.data_pmbemail[listing]}">{$view.data_pmbemail[listing]}</a><br />
							<b>Phone Number:</b> {$view.data_pmbhp[listing]}<br /><br />
						  </td>
                          <td style="text-align:center">
                              <a href="{$smarty.server.PHP_SELF}?action=detail&data_pmbid={$view.data_pmbid[listing]}" class="btn btn-default btn-xs btn-info"><i class="fa fa-eye"></i> View</a>
                              <!--<a href="{$smarty.server.PHP_SELF}?action=data&data_pmbid={$view.data_pmbid[listing]}" class="btn btn-default btn-xs btn-warning"><i class="fa fa-download"></i></a>-->
                          </td>
                        </tr>
                        {/section}
                      </tbody>
                      <tfoot>
						<tr>
							<td colspan="5">
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
</body>
</html>