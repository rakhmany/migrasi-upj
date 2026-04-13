<!DOCTYPE HTML>
<html lang="en-US">
	<head>
        {$meta_tag}
        <meta http-equiv="x-ua-compatible" content="IE=edge">
        <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-touch-fullscreen" content="yes">
		<link rel="stylesheet" href="templates/jquery/themes/base/jquery-ui.min.css">
		<link rel="stylesheet" href="include/js/sidrmenu/stylesheets/jquery.sidr.light.css">
        <link rel="stylesheet" type="text/css" href="include/js/snapmenu/snap.css">
        <link rel="stylesheet" type="text/css" href="include/js/snapmenu/demo/assets/demo.css">
        <!-- <link rel="stylesheet" type="text/css" href="include/js/snapmenu/ratchet.css">
		<script type="text/javascript" src="include/js/snapmenu/ratchet.js"></script> -->
    </head>
    <body class="">
        <div class="snap-drawers">
            <div class="snap-drawer snap-drawer-left">
				<h4 style="height:40px">Welcome, {$fh_username}</h4>
				<div id="accordion">
					{section name=listing loop=$fh_menu.fh_kategorimenuid}
					<h4>{$fh_menu.fh_name[listing]}</h4>
					<div>						
						<ul class="list">
							{section name=listing2 loop=$fh_menu.menulist[listing].fh_menuid}
							<li><a target="main" href="module/{$fh_menu.menulist[listing].fh_url[listing2]}">{$fh_menu.menulist[listing].fh_name[listing2]}</a></li>
							{/section}
						</ul>
					</div>
					{/section}
				</div>
				<div>
				<ul class="list">
					<li><a target="main" href="profile.php" class="ui-accordion ui-accordion-header">Profile</a></li>
					<li><a href="logout.php" target="_top" class="ui-accordion ui-accordion-header">Logout</a></li>
				</ul>
				</div>
            </div>
            <div class="snap-drawer snap-drawer-right"></div>
        </div>
        
        <div id="content" class="snap-content" style="">
            <div id="toolbar">
                <a href="javascript:void(0);" id="open-left" onCLick="openCloseSnap();"></a>
				<h1><img src="images/bannerlogo.jpg" /></h1>
            </div>
            <div id="no-drag" data-snap-ignore="true" style="width: 100%; height: 100%; top: 65px; left: 0px;">
  				<iframe id="main" src="index_blank.php" name="main" frameborder="0" border="0" framespacing="0" width="100%" height="100%" style="position:absolute;top:0;left:0;bottom:-20px;width:100% !important; height:100% !important;" marginheight="7" marginwidth="7" scrolling="auto"></iframe>
    		</div>
		</div>
        
		<script src="templates/jquery/jquery-1.10.2.js"></script>
		<script src="templates/jquery/ui/jquery-ui.custom.min.js"></script>
		<script type="text/javascript" src="include/js/snapmenu/snap.min.js"></script>
        {literal}<script type="text/javascript">
            var snapper = new Snap({
                element: document.getElementById('content'),
				disable: 'right'
            });
			
			function openCloseSnap(){
				$("#open-left").on('click', function(){

					if( snapper.state().state=="left" ){
						snapper.close();
					} else {
						snapper.open('left');
					}

				});
			}
			
			$(function() {
				$( "#accordion" ).accordion({
					heightStyle: "content",
					collapsible:true,
					minPosition:-160,
					maxPosition:160
				});
			});
			
			$(".snap-drawer li a").on("click",function(){
				$(".snap-drawer li a").removeClass("link-active");
				$(this).addClass("link-active");
			});
        </script>{/literal}
        <script type="text/javascript" src="include/js/snapmenu/demo/assets/demo.js"></script>

	</body>
</html>