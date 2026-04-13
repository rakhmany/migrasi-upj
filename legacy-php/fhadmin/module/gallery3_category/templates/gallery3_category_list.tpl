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
            <!-- <div class="wrapper b-b header">Submenu Header</div>
            <ul class="nav">
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Phasellus at ultricies</a>
				<ul class="nav dk">
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Phasellus at ultricies</a>
				  </li>
				  <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Malesuada augue</a></li>
				</ul>
			  </li>
              <li class="b-b "><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Malesuada augue</a></li>
            </ul> -->
          </aside>
          <aside>
            <section class="vbox">
			  <header class="header bg-white b-b clearfix">
                <div class="row m-t-sm">
				  <div class="col-md-5 col-sm-12 m-b-xs">
				    <b>{$title}</b>
                    <a href="?action=insert" class="btn btn-sm btn-warning"><i class="fa fa-plus"></i> Add New</a>
				  </div>
                  <div class="col-md-7 col-sm-12 text-center-xs">
					&nbsp;
                  </div>
                </div>
              </header>
              <section class="scrollable wrapper w-f">
                  {if $msg neq ''}
				  <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert">x</button>
                    <i class="fa fa-ban-circle"></i><strong>Well Done!</strong><br />
					{$msg}
				  </div>
				  {/if}
                <section class="panel panel-default">
				  <form name="form" method="post" action="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={$view.order}&orderfield={$view.orderfield}&search={$view.search}&search1={$view.search1}&search2={$view.search2}">
				  <div class="table-responsive">
					<table class="table table-striped m-b-none">
                      <thead>
                        <tr>
                          <th width="5%" class="text-center">Up</th>
                          <th width="5%" class="text-center">Down</th>
                          <th width="10%" class="text-center">Edit</th>
                          <th width="10%" class="text-center">Delete</th>
                          <th>[Root]</th>
                          <th width="10%" class="text-center">Status</th>
                        </tr>
                      </thead>
                      <tbody>
						{$strukturcategory}
                      </tbody>
                    </table>
                  </div>
                  </form>
                </section>
              </section>
              <footer class="footer bg-white b-t">
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