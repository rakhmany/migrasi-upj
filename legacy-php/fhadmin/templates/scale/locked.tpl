<!DOCTYPE html>
<html lang="en" class="app">
<head>
  {include file='scale/header_meta.tpl'}
</head>
<body class="modal-over">
  <section id="content" class="m-t-lg wrapper-md animated fadeInUp">    
    <div class="container aside-xl">
      <span class="navbar-brand block text-white">FaberCMS</span>
      <section class="m-b-lg">
        <header class="wrapper text-center">
          <strong>Locked</strong>
        </header>
			<div class="modal-over">
			  <div class="animated fadeInUp text-center" style="width:200px; margin: auto;">
				<div class="thumb-md"><img src="{$themesurl_admin}images/a0.png" class="img-circle b-a b-light b-3x"></div>
				<p class="text-white h4 m-t m-b">{$fh_username}</p>
				<form action="{$baseurl_admin}locked.php" method="post">
				{if $errmsg neq ''}
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<i class="fa fa-ban-circle"></i>
					{$errmsg}
				</div>
				{/if}
				<div class="input-group">
				  <input type="password" class="form-control text-sm btn-rounded" placeholder="Enter password" name="passwd">
				  <span class="input-group-btn">
					<button class="btn btn-success btn-rounded" type="submit" name="unlock" value="submit"><i class="fa fa-arrow-right"></i></button>
				  </span>
				</div>
				</form>
			  </div>
			</div>
			
        <footer class="wrapper text-center">
          <strong>Not {$fh_username}? <a class="text-white" href="{$baseurl_admin}logout.php">Logout here</a></strong>
        </footer>
      </section>
    </div>
  </section>
  <!-- footer -->
  <footer id="footer">
    <div class="text-center padder">
      <p>
        <small>Copyright {$smarty.now|date_format:"%Y"} - All rights reserved by faberhost.com</small>
      </p>
    </div>
  </footer>
  <!-- / footer -->
  {include file='scale/footer.tpl'}
</body>
</html>