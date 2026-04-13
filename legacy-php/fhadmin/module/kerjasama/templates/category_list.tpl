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
               
              </header>
			  
              <section class="scrollable wrapper w-f">
                  {if $error_delete neq ''}
				  <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <i class="fa fa-ban-circle"></i><strong>Message!</strong><br />
					{$error_delete}
				  </div>
				  {/if}
				  <section class="panel panel-default">
				  <form name="form" method="post" action="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={$view.order}&orderfield={$view.orderfield}&search={$view.search}&search1={$view.search1}&search2={$view.search2}">
				  <div class="table-responsive">
					<table class="table table-striped m-b-none">
                      <thead>
						
                        <tr> 
                          <th  >{$mainfieldnamed}</th>  
                          <th width="10%" class="text-center">Priority</th>
                          <th width="10%" class="text-center">Edit</th>
                          <th width="10%" class="text-center">Delete</th>
                        </tr>
                      </thead>
                      <tbody>
						{$show_listing_menu}
                      </tbody> 
                      
                    </table>
                  </div>
                  </form>
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