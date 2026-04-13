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
              		<div class="row">
						<div class="col-lg-12">
						  <!-- .breadcrumb -->
						  <ul class="breadcrumb">
							<li><a href="{$baseurl_admin}"><i class="fa fa-home"></i> Home</a></li>
							<li><a href="{$smarty.server.PHP_SELF}"><i class="fa fa-list-ul"></i> {$title}</a></li>
							<li class="active"><i class="fa fa-pencil"></i> Gallery</li>
						  </ul>
						  <!-- / .breadcrumb -->
						</div>
		            </div>
                   
                 	{if $data_primarykey neq ''}
                 	 
					<a href="?action=detail&data_primarykey={$data_primarykey}" class="btn btn-primary" >Edit</a>
					<a href="?action=gallery&data_primarykey={$data_primarykey}" class="btn btn-primary" >Gallery</a>
					<a href="?action=related&data_primarykey={$data_primarykey}" class="btn btn-primary" >Related</a>
					<a href="?action=holding&data_primarykey={$data_primarykey}" class="btn btn-primary" >Holding</a>
					 
					{/if}
			
			<form name=form method=post enctype="multipart/form-data"  action={php}echo $_SERVER['PHP_SELF']; {/php}{if $data_primarykey neq ''}?action=gallery&data_primarykey={$data_primarykey}{/if}>
   					
				  {if $errmsg neq ''}
					<div class="alert alert-info">
					  <button type="button" class="close" data-dismiss="alert">x</button>
					  <i class="fa fa-ok-sign"></i>{$errmsg}
					</div>
					{/if}
				  		<div class="row">
			              <div class="col-sm-12">
			                  <section class="panel panel-default">
			                    <header class="panel-heading"> <strong>Title & Image</strong> </header>
			                    
			                    <div class="panel-body">
				                    
				                     
				                     <div class="row">
				                      
				                      <div class="form-group">
				                        <label class="col-sm-2 control-label">Image</label>
				                        <div class="col-sm-6">
				                          <input type="file" name="data_gallery_image"   class="filestyle" data-icon="false" data-classButton="btn btn-default" data-classInput="form-control inline v-middle input-s" />
				                          <span style="color: red;">{$best_image_view}</span>
				                         </div>
				                        </div> 
				                      </div>
				                      {$oldimage}
				                      <div class="row">
				                      <div class="line line-dashed b-b line-lg pull-in"></div>
				                      <div class="form-group">
				                        <label class="col-sm-2 control-label">Title</label>
				                        <div class="col-sm-6">
				                        <input   name="data_gallery_name" value="{$data_gallery_name}" type="text" class="form-control" data-required="true" >
                        				</div>
				                      </div>
				                     </div>
			                    </div>
			                    <div class="panel-body">
								  <div class="form-group">
									<div class="col-sm-4 col-sm-offset-2">
									  <a href="{$smarty.server.PHP_SELF}" class="btn btn-default"><i class="fa fa-arrow-circle-left"></i> Cancel</a>
									  {if $data_primarykey neq ''}
									  <input type=hidden name=data_primarykey value="{$data_primarykey}" />
									  <button type="submit" class="btn btn-primary" name="submitnew" value="save"><i class="fa fa-floppy-o"></i> Submit</button>
									  {else}
									  {/if}
									</div>
								  </div>
			                    </div>
			                  </section>
			              </div>
			          </div> 
			           
			        </form>
				  <section class="panel panel-default">
				  
				  
			
				  <form name="form" method="post" action="{$smarty.server.PHP_SELF}?action={$view.action}&page={$view.page}&order={$view.order}&orderfield={$view.orderfield}&search={$view.search}&search1={$view.search1}&search2={$view.search2}">
				  <div class="table-responsive">
					<table class="table table-striped m-b-none">
                      <thead> 
                        <tr>
                          <th  >Gallery</th>
                          <th  >Is Main Image</th>
                          <th width="20%" class="text-center">Actions</th>
                        </tr>
                      </thead>
                      <tbody>
						{section name=listing loop=$gallery.gallery_gallery_id}
						<tr> 
                          <td>{$gallery.gallery_gallery_image[listing]} <br /> {$gallery.gallery_gallery_name[listing]}</td>
                          <td>{$gallery.gallery_gallery_ismain[listing]}</td>
                          <td class="text-center">
                          <a href="{$gallery.gallery_edit_link[listing]}" ><span class="label bg-warning">Set as main</span></a>
                          <a href="{$gallery.gallery_delete_link[listing]}" onclick="return confirm('Are you sure want to delete this record?');"><span class="label bg-danger">Delete</span></a>
                          </td>
                        </tr>
                        {/section}
                      </tbody> 
                    </table>
                  </div>
                  </form>
				  </section>
				  
				  

			 
              </section> 
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