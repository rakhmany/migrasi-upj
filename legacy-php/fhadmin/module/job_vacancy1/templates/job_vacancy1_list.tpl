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
                        {*<!-- <div class="wrapper b-b header">Submenu Header</div>
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
                        </ul> -->*}
                    </aside>
                    <aside>
                        <section class="vbox">
                            <header class="header bg-white b-b clearfix">
                                <div class="row m-t-sm">
                                    <div class="col-sm-5 m-b-xs">
                                        <b>{$title}</b>
                                        <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a>
                                    </div>
                                    <div class="col-md-7 col-sm-12 text-center-xs">
                                        <form class="form-inline text-right text-center-xs" role="form" method="post" action="{$smarty.server.PHP_SELF}">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Status</label>
                                                <select class="form-control input-sm input-s-sm inline v-middle" name="search3">
                                                    <option value="">== Status ==</option>
                                                    {section name=listing loop=$optarray_status}
                                                        <option value="{$optarray_status[listing]}"  {if $search3 eq $optarray_status[listing]} selected {/if} >{$optarray_status[listing]}</option>
                                                    {/section}
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Category</label>
                                                {*<select class="form-control chosen-select" name="search1" style="width:100%; text-align:left !important;">
                                                    {$strukturcategory_search}
                                                </select>*}
                                                <select class="form-control input-sm" name="search1">
                                                    <option value="">== Category ==</option>
                                                    {foreach $optarray_jobvacancycat as $cat}
                                                        <option value="{$cat}"{if $search1 eq $cat} selected{/if}>{$cat}</option>
                                                    {/foreach}
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
                                                    <th width="20" class="text-center">Category</th>
                                                    <th class="th-sortable" width="10%" class="text-center"><a href="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={if $view.order eq 'asc'}desc{else}asc{/if}&orderfield=jobvacancydatestart&search={$view.search}&search1={$view.search1}&search2={$view.search2}">Start Date<span class="th-sort"> {if $view.orderfield eq 'jobvacancydatestart'} <i class="fa fa-sort-down text{if $view.order eq 'desc'}-active{/if}"></i> <i class="fa fa-sort-up text{if $view.order eq 'asc'}-active{/if}"></i>{/if} <i class="fa fa-sort"></i> </span></a></th>
                                                    <th class="th-sortable" width="10%" class="text-center"><a href="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={if $view.order eq 'asc'}desc{else}asc{/if}&orderfield=jobvacancydateend&search={$view.search}&search1={$view.search1}&search2={$view.search2}">End Date<span class="th-sort"> {if $view.orderfield eq 'jobvacancydateend'} <i class="fa fa-sort-down text{if $view.order eq 'desc'}-active{/if}"></i> <i class="fa fa-sort-up text{if $view.order eq 'asc'}-active{/if}"></i>{/if} <i class="fa fa-sort"></i> </span></a></th>
                                                    <th class="th-sortable"><a href="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={if $view.order eq 'asc'}desc{else}asc{/if}&orderfield=jobvacancytitle&search={$view.search}&search1={$view.search1}&search2={$view.search2}">Title<span class="th-sort"> {if $view.orderfield eq 'jobvacancytitle'} <i class="fa fa-sort-down text{if $view.order eq 'desc'}-active{/if}"></i> <i class="fa fa-sort-up text{if $view.order eq 'asc'}-active{/if}"></i> {/if} <i class="fa fa-sort"></i></span></a> </th>
                                                    <th width="10%" class="text-center">Status</th>
                                                    <th width="10%" class="text-center">Actions</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                {math equation='(cc*y)-cc' cc=$conf.page y=$view.page assign='ctr'}{counter start=$ctr print=false}
                                                {section name=listing loop=$view.data_jobvacancyid}
                                                    <tr>
                                                        <td><label class="checkbox m-n i-checks">
                                                                <input type="checkbox" name="delete[]" value="{$view.data_jobvacancyid[listing]}">
                                                                <i></i></label></td>
                                                        <!-- <td><a href="#modal" data-toggle="modal"><i class="fa fa-search-plus text-muted"></i></a></td> -->
                                                        <td class="text-center">{counter}.</td>
                                                        <td class="text-center">{$view.data_jobvacancycat[listing]}</td>
                                                        <td class="text-center">{$view.data_jobvacancydatestart[listing]}</td>
                                                        <td class="text-center">{$view.data_jobvacancydateend[listing]}</td>
                                                        <td><a href="{$smarty.server.PHP_SELF}?action=detail&data_jobvacancyid={$view.data_jobvacancyid[listing]}">{$view.data_jobvacancytitle[listing]} / {$view.data_jobvacancytitle_en[listing]}</a></td>
                                                        <td class="text-center"><span class="label bg-{if $view.data_jobvacancystatus[listing] eq 'Hidden'}danger{else}success{/if}">{$view.data_jobvacancystatus[listing]}</span></td>
                                                        <td class="text-center"><a href="{$smarty.server.PHP_SELF}?action=detail&data_jobvacancyid={$view.data_jobvacancyid[listing]}" class="btn btn-default btn-xs btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
                                                    </tr>
                                                {/section}
                                                </tbody>
                                                <tfoot>
                                                <tr>
                                                    <td colspan="7">
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
</body>
</html>