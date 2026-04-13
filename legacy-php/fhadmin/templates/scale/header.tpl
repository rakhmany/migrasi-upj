
    <header class="bg-primary header header-md navbar navbar-fixed-top-xs box-shadow">
      <div class="navbar-header aside-md dk">
        <a class="btn btn-link visible-xs" data-toggle="class:nav-off-screen" data-target="#nav">
          <i class="fa fa-bars"></i>
        </a>
        <a href="{$baseurl_admin}" class="navbar-brand">
          <img src="{$themesurl_admin}logo_fabercms.png" class="m-r-sm" alt="scale">
          <!-- <span class="hidden-nav-xs">Scale</span> -->
        </a>
        <a class="btn btn-link visible-xs" data-toggle="dropdown" data-target=".user">
          <i class="fa fa-cog"></i>
        </a>
      </div>
      {if isset($title_search)}
	  <form class="navbar-form navbar-left input-s-lg m-t m-l-n-xs hidden-xs" role="search" action="{$smarty.server.PHP_SELF}" method="post">
        <div class="form-group">
          <div class="input-group">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-sm bg-white b-white btn-icon" name="submit"><i class="fa fa-search"></i></button>
            </span>
            <input type="text" class="form-control input-sm no-border" placeholder="Search {$title_search}" name="search">            
          </div>
        </div>
      </form>
	  {/if}
      <ul class="nav navbar-nav navbar-right m-n hidden-xs nav-user user"> 
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <span class="thumb-sm avatar pull-left">
              <img src="{$themesurl_admin}images/a0.png" alt="...">
            </span>
            {$fh_username} <b class="caret"></b>
          </a>
          <ul class="dropdown-menu animated fadeInRight">
            <li>
              <a href="{$baseurl_admin}profile.php">Profile</a>
            </li>
            <li>
              <a target="_blank" href="http://cms.faberhost.web.id/docs/">Help</a>
            </li>
            <li class="divider"></li>
            <li>
              <a href="{$baseurl_admin}locked.php">Lock</a>
            </li>
            <li>
              <a href="{$baseurl_admin}logout.php">Logout</a>
            </li>
          </ul>
        </li>
      </ul>      
    </header>
	