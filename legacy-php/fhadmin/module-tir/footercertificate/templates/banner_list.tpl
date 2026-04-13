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
			  <header class="header bg-light lt b-b b-light">
              <p class="h4 font-thin pull-left m-r m-b-sm">{$systemname}</p>
			  <a href="?action=insert" class="btn btn-sm btn-warning btn-rounded"><i class="fa fa-plus"></i> Add New</a>
              <form method="post" class="m-t-sm pull-right pull-none-xs input-s-lg m-b-sm" action="{$smarty.server.PHP_SELF}">
                <div class="input-group">
                    <input type="text" id="search" name="search" class="input-sm form-control" placeholder="Search">
                    <span class="input-group-btn">
                      <button class="btn btn-sm btn-success" type="submit">Go!</button>
                    </span>
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
							<td colspan="5">
								<button class="btn btn-sm btn-danger" type="submit" onclick="return konfirmasi();" name="del" value="delete"><i class="fa fa-trash-o"></i> Delete selected</button>
							</td>
                        </tr>
                        <tr>
                          <th width="20" class="text-center"><label class="checkbox m-n i-checks"><input type="checkbox"><i></i></label></th>
                          <th class="th-sortable">{$mainfieldnamed}</th>
                          <th width="10%" class="text-center">Priority</th>
                          <th width="10%" class="text-center">Status</th>
                          <th width="10%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						{math equation='(cc*y)-cc' cc=$conf.page y=$view.page assign='ctr'}{counter start=$ctr print=false}
						{section name=listing loop=$view.primarykey_temp}
						<tr>
                          <td><label class="checkbox m-n i-checks"><input type=checkbox name=delete[] value='{$view.primarykey_temp[listing]}'>
                              <i></i></label></td> 
                          <td>{$view.mainfieldname_temp[listing]}</td>
                          <td align="center">{$view.priority_temp[listing]}</td>
                          <td class="text-center"><input data-prdid="{$view.primarykey_temp[listing]}" {if $view.d_slideshow_status_temp[listing] eq '1'} checked {/if}  class="prd_status" data-size="mini" type="checkbox"> </td>
                          <td class="text-center"><a href="{$smarty.server.PHP_SELF}?action=detail&data_primarykey={$view.primarykey_temp[listing]}" class="btn btn-default btn-xs btn-rounded btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
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
				  </section> 

			{/if}
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
<link href="./css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="./js/bootstrap-toggle.min.js"></script>
<script>
$(function() {
    $('.prd_status').bootstrapToggle({
      on: 'Show',
      off: 'Hidden'
    });
    $('.prd_status').change(function() { 
        $.post("change_status.php", { i: ""+$(this).prop('checked')+"", e: ""+$(this).attr("data-prdid")+""   }, 
	    function(data){ 
	     	alert(data);
	    });
        
    })
});
</script>
</body>
</html>