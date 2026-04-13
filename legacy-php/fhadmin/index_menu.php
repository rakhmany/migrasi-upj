<?php
require_once "config.inc.php";
require_once $conf['lib'] . "treemenu/TreeMenu.php";

if ($fh_userid) {

//*** deklarasi icon yang dipakai **/
$menu_base = 'base.gif';
$menu_icon = 'folder.gif';
$menu_expandedIcon = 'folder-expanded.gif';
$menu_page = 'page.gif';
$menu_editprofile	= 'user.gif';
$menu_logout = 'logout.png';

$menu  	 = new HTML_TreeMenu();

//*** Flow Security Menu  **/
//*** Deklarasi Base Menu **/
$node1   = new HTML_TreeNode(array('text' => "FaberCMS",
			   	   				   'icon' => $menu_base,
								   'expandedIcon' => $menu_base,
								   'expanded' => true));

/** Ambil semua data di Kategori Menu **/
$SQL = "SELECT 		*
	    FROM		fh_menu_kategori order by fh_kategorimenuid asc";
$RS  = $db->Execute($SQL);

if ($RS->fields["fh_kategorimenuid"] != "") {
  $i=0;

  while (!$RS->EOF) {
     /** Ambil data Menu dari Kategori Menu tertentu **/
	 $SQL = "SELECT		*
  	 	  	 FROM		fh_menu
  	 	  	 WHERE		fh_kategorimenuid = ? ";
  	 $RS2 = $db->Execute($SQL,array($RS->fields["fh_kategorimenuid"]));

  	 if($RS2->fields["fh_menuid"] != "") {
  	   $j=0;
  	   $cek1=0;

	   while (!$RS2->EOF) {
  	     /** Cocokkan dengan AKSES RIGHT GROUP dengan AKSES ke MENU **/
		 $SQL = "SELECT 	*
  	     	  	 FROM 		fh_menu_akses
  	     	  	 WHERE		fh_groupid = ? and fh_menuid = ?";
  	     $RS3 = $db->Execute($SQL,array($fh_usergroupid , $RS2->fields["fh_menuid"]));
		 if ($RS3->fields["fh_menuid"] != "")
  	 	 { if ($cek1==0) {
  	 	      $tvar = 'node1_' . $i;
			  $$tvar = &$node1->addItem(new HTML_TreeNode(array(
			  			   			'text' => $RS->fields["fh_name"],
									'icon' => $menu_icon,
									'expandedIcon' => $menu_expandedIcon)));
			  $cek1=1;
		   }

           $tvar2 = $tvar1 . '_' . $j;
    	   $$tvar2 = $$tvar->addItem(new HTML_TreeNode(array(
		   				  			'text' => $RS2->fields["fh_name"],
			   	 					'link' => 'module/'.$RS2->fields["fh_url"],
									'linkTarget' => "main",
									'icon' => $menu_page,
									'expandedIcon' => $expandedIcon)));
  	       $j++;
         }
  	     $RS2->MoveNext();
  	   }
  	   if ($cek1==1) { $i++; $cek1=0;}
  	 }
  	 $i++;
  	 $RS->MoveNext();
  }

  /** Menambahkan link standard diluar database **/
  $i++;
  $$tvar = &$node1->addItem(new HTML_TreeNode(array(
  		   	 					  'text' => " Edit Profile",
								  'link' => "profile.php",
								  'linkTarget' => "main",
								  'icon' => $menu_editprofile,
								  'expandedIcon' => $expandedIcon)));

  $i++;
  $$tvar = &$node1->addItem(new HTML_TreeNode(array(
  			   					  'text' => " Log Out",
								  'link' => "logout.php",
								  'linkTarget' => "_parent",
								  'icon' => $menu_logout,
								  'expandedIcon' => $expandedIcon)));

  $i++;
  $$tvar = &$node1->addItem(new HTML_TreeNode(array(
  			   					  'text' => " Skin V2",
								  'link' => "index_new.php",
								  'linkTarget' => "_blank",
								  'icon' => $menu_base,
								  'expandedIcon' => $expandedIcon)));

  $i++;
  $$tvar = &$node1->addItem(new HTML_TreeNode(array(
  			   					  'text' => " Skin V3",
								  'link' => "index_new_whm.php",
								  'linkTarget' => "_blank",
								  'icon' => $menu_base,
								  'expandedIcon' => $expandedIcon)));

}

//main class
$menu->addItem($node1);

// Create the presentation class
$treeMenu = &new HTML_TreeMenu_DHTML($menu, array('images' => 'images', 'defaultClass' => 'treeMenuDefault'));


?>
<html>
<head><title><?php echo $conf["site_title"]. " - " .$conf["project_name"]; ?></title>
<link rel="stylesheet" href="css.css" type="text/css">
<script src="lib/treemenu/TreeMenu.js" language="JavaScript" type="text/javascript"></script>
</head>
<body>

<div id=menucontent>
<b>Welcome, <?php echo $fh_username; ?></b>

<br><br>
<?php $treeMenu->printMenu()?><br /><br />

</div>

</body>
</html>

<?php
} 
?>