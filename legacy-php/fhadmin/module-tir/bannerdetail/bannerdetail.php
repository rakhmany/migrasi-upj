<?php

// bissmillahirahmanirrahiim
// oleh sriyono01@gmail.com dengan rahmat dari allah yang maha mengetahui lagi maha bijaksana

ini_set('memory_limit', '3048M');
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");
 


//my config

$maintable = 'd_bannerdetail';
$primarykey = 'd_slideshow_id';

$mainfieldname = 'd_slideshow_name_id';
$mainfieldnamed = 'Title (ID)';
$systemname = 'Home Banner';

$allowmainimage = true;
$requiremainimage = true;
$imagesize = 1950000;
$thumb_type = 'resize'; // resize || crop
$thumb_crop_type = 'default'; // full || center || default
$imagethumbsize_x = 1366;
$imagethumbsize_y = 600;
$best_image_view = '<br />Best view: '.($imagethumbsize_x ).'px - '.($imagethumbsize_y ).'px';
$smarty->assign('best_image_view' ,  $best_image_view);

$tplfile = 'banner';

//***************************** Security ACCESS LEVEL *************************/
$akses_level_page = access_level_page($fh_usergroupid, $db);

if ($fh_userid && $akses_level_page)
{	
	
	if(isset($_GET['up']) && isset($_GET['i']))
	{
		$sql =  'UPDATE '.$maintable.' SET	  list_priority='.intval($_GET['up']).'  WHERE list_priority=('.intval($_GET['up']).'-1) ';
		$db   -> Execute($sql);
		$sql =  "UPDATE ".$maintable." SET	  list_priority=(list_priority)-1  WHERE ".$primarykey." = ".intval($_GET['i']);
		$db   -> Execute($sql);
	}
	if(isset($_GET['down']) && isset($_GET['i']))
	{
		$sql =  "UPDATE ".$maintable." SET	  list_priority=".intval($_GET['down'])."  WHERE list_priority=(".intval($_GET['down'])."+1) ";
		$db   -> Execute($sql);
		$sql =  "UPDATE ".$maintable." SET	  list_priority=(list_priority)+1  WHERE ".$primarykey." = ".intval($_GET['i']);
		$db   -> Execute($sql);
	}
	
	/***************************** seting orderfield **************************/
	if (!(isset($_GET["orderfield"])))  $orderfield=$primarykey;
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!( (($orderfield==$mainfieldname))))
	  {
		  $orderfield=$primarykey;
	  }
	}
	$teks_parameter = "";
	
	$arr_bootstrap_icon = array('adjust' , 'anchor' , 'archive' , 'arrows' , 'arrows-h' , 'arrows-v' , 'asterisk' , 'ban' , 'bar-chart-o' , 'barcode' , 'bars' , 'beer' , 'bell' , 'bell-o' , 'bolt' , 'book' , 'bookmark' , 'bookmark-o' , 'briefcase' , 'bug' , 'building-o' , 'bullhorn' , 'bullseye' , 'calendar' , 'calendar-o' , 'camera' , 'camera-retro' , 'caret-square-o-down' , 'caret-square-o-left' , 'caret-square-o-right' , 'caret-square-o-up' , 'certificate' , 'check' , 'check-circle' , 'check-circle-o' , 'check-square' , 'check-square-o' , 'circle' , 'circle-o' , 'clock-o' , 'cloud' , 'cloud-download' , 'cloud-upload' , 'code' , 'code-fork' , 'coffee' , 'cog' , 'cogs' , 'comment' , 'comment-o' , 'comments' , 'comments-o' , 'compass' , 'credit-card' , 'crop' , 'crosshairs' , 'cutlery' , 'dashboard' , 'desktop' , 'dot-circle-o' , 'download' , 'edit' , 'ellipsis-h' , 'ellipsis-v' , 'envelope' , 'envelope-o' , 'eraser' , 'exchange' , 'exclamation' , 'exclamation-circle' , 'exclamation-triangle' , 'external-link' , 'external-link-square' , 'eye' , 'eye-slash' , 'female' , 'fighter-jet' , 'film' , 'filter' , 'fire' , 'fire-extinguisher' , 'flag' , 'flag-checkered' , 'flag-o' , 'flash' , 'flask' , 'folder' , 'folder-o' , 'folder-open' , 'folder-open-o' , 'frown-o' , 'gamepad' , 'gavel' , 'gear' , 'gears' , 'gift' , 'glass' , 'globe' , 'group' , 'hdd-o' , 'headphones' , 'heart' , 'heart-o' , 'home' , 'inbox' , 'info' , 'info-circle' , 'key' , 'keyboard-o' , 'laptop' , 'leaf' , 'legal' , 'lemon-o' , 'level-down' , 'level-up' , 'lightbulb-o' , 'location-arrow' , 'lock' , 'magic' , 'magnet' , 'mail-forward' , 'mail-reply' , 'mail-reply-all' , 'male' , 'map-marker' , 'meh-o' , 'microphone' , 'microphone-slash' , 'minus' , 'minus-circle' , 'minus-square' , 'minus-square-o' , 'mobile' , 'mobile-phone' , 'money' , 'moon-o' , 'music' , 'pencil' , 'pencil-square' , 'pencil-square-o' , 'phone' , 'phone-square' , 'picture-o' , 'plane' , 'plus' , 'plus-circle' , 'plus-square' , 'plus-square-o' , 'power-off' , 'print' , 'puzzle-piece' , 'qrcode' , 'question' , 'question-circle' , 'quote-left' , 'quote-right' , 'random' , 'refresh' , 'reply' , 'reply-all' , 'retweet' , 'road' , 'rocket' , 'rss' , 'rss-square' , 'search' , 'search-minus' , 'search-plus' , 'share' , 'share-square' , 'share-square-o' , 'shield' , 'shopping-cart' , 'sign-in' , 'sign-out' , 'signal' , 'sitemap' , 'smile-o' , 'sort' , 'sort-alpha-asc' , 'sort-alpha-desc' , 'sort-amount-asc' , 'sort-amount-desc' , 'sort-asc' , 'sort-desc' , 'sort-down' , 'sort-numeric-asc' , 'sort-numeric-desc' , 'sort-up' , 'spinner' , 'square' , 'square-o' , 'star' , 'star-half' , 'star-half-empty' , 'star-half-full' , 'star-half-o' , 'star-o' , 'subscript' , 'suitcase' , 'sun-o' , 'superscript' , 'tablet' , 'tachometer' , 'tag' , 'tags' , 'tasks' , 'terminal' , 'thumb-tack' , 'thumbs-down' , 'thumbs-o-down' , 'thumbs-o-up' , 'thumbs-up' , 'ticket' , 'times' , 'times-circle' , 'times-circle-o' , 'tint' , 'toggle-down' , 'toggle-left' , 'toggle-right' , 'toggle-up' , 'trash-o' , 'trophy' , 'truck' , 'umbrella' , 'unlock' , 'unlock-alt' , 'unsorted' , 'upload' , 'user' , 'users' , 'video-camera' , 'volume-down' , 'volume-off' , 'volume-up' , 'warning' , 'wheelchair' , 'wrench');
 	$smarty->assign('arr_bootstrap_icon' ,$arr_bootstrap_icon); 
 	
	$option_showhide_val = array(1, 0);
	$option_showhide_name = array( 'Show', 'Hide');
	$arr_showhide_name = array( 1=> 'Show', 0 => 'Hide');
	$smarty->assign('option_showhide_val' ,$option_showhide_val); 
	$smarty->assign('option_showhide_name' ,$option_showhide_name); 
	
	$option_pos_val = array(0, 1);
	$option_pos_name = array( 'Left', 'Right');
	$arr_pos_name = array( 0=> 'Left', 1 => 'Right');
	$smarty->assign('option_pos_val' ,$option_pos_val); 
	$smarty->assign('option_pos_name' ,$option_pos_name); 
	
	
	
	//****************************  Proses Insert ataupun Edit ***************//
	if ((isset($_POST["insert"])) || (isset($_POST["edit"])))
	{ 
		
	  if (isset($_POST["edit"]))
	  {
		  $data_primarykey = intval($_POST["data_primarykey"]);
	  }
	  $data_mainfieldname = $_POST["data_mainfieldname"];
	  if ($data_mainfieldname == "") { 
		  //$msg.="Please input ".$mainfieldnamed."<br>"; 
		  }
	   
	  
	  //** Ambil semua inputan user **/
	  $data_d_slideshow_name_en 		= trim($_POST["data_d_slideshow_name_en"]);
	  $data_d_slideshow_subtext_id 		= trim($_POST["data_d_slideshow_subtext_id"]);
	  $data_d_slideshow_subtext_en 		= trim($_POST["data_d_slideshow_subtext_en"]);
	  $data_d_slideshow_linktext_id 		= trim($_POST["data_d_slideshow_linktext_id"]);
	  $data_d_slideshow_linktext_en 		= trim($_POST["data_d_slideshow_linktext_en"]);
	  $data_d_slideshow_desc_en 		= trim($_POST["data_d_slideshow_desc_en"]);
	  $data_d_slideshow_link 		= trim($_POST["data_d_slideshow_link"]); 
	  $data_d_slideshow_status 		= trim($_POST["data_d_slideshow_status"]) == 1 ? 1 : 0;   
	  $data_d_slideshow_pos 		= trim($_POST["data_d_slideshow_pos"]) == 1 ? 1 : 0;   
	   
	  //** Validasi inputan user **// 
	  //** validasi image ++/
	  $data_mainimage 				= $_FILES["data_mainimage"];
	  $old_mainimagename 			= trim($_POST["old_mainimagename"]);
	  if ($data_mainimage['name'] == "" && $old_mainimagename == "" && $requiremainimage === true) { $msg.="Please input Image<br>";}
	   
	  
	  
	  //if $allowmainimage === true
	  if($allowmainimage === true && isset($data_mainimage["name"]) && $data_mainimage['name'] !='')
	  {
		  $handle = new Upload($data_mainimage);
		  if($handle->uploaded) {
			  if($handle->file_is_image)
			  {
				  
					  $handle->Process("../../../upload/");
					  if ($handle->processed) {
						  $mainimagename = $handle->file_dst_name;
						  $thumb_name = $handle->file_dst_name_body;
						  
						  $handle->image_resize = true;
						  $handle->file_overwrite = true;
						  $handle->image_x = $imagethumbsize_x;
						  $handle->image_y = $imagethumbsize_y;
						  $handle->file_new_name_body = 'thumb_'.$thumb_name;
						   
						  if($thumb_type == 'resize')
						  {
							  //$handle->image_ratio = false;
						  }
						  
						  $handle->Process("../../../upload/");
						  if (!$handle->processed) {
							  $msg .= $handle->error;
						  }
					  } else {
						  $msg .= $handle->error;
					  }
				   
			  } else {
				  $msg .= 'Invalid image type.';
			  }
			  $handle-> Clean();
		  } else {
	          $msg .= '  Error: ' . $handle->error . '';
	      }
	  }else
	  {
		  $mainimagename = isset($_POST["insert"]) ? $old_mainimagename : '';
	  }
	  
	  //** Kalau inputan valid do the process **//
	  if ($msg=="")
	  {
		  //$data_productdesc = htmlspecialchars(stripslashes($data_productdesc));
		 
		  
		   if (isset($_POST["insert"])) 
	  	   {
		  	   
// 		  	   $max = @mysql_fetch_assoc(mysql_query('SELECT MAX(list_priority)+1 as value FROM '.$maintable.' '));
// 		  	   $max['value'] = intval($max['value']) == 0 ? 1 : $max['value'];
				 $db->Execute("UPDATE ".$maintable."  SET list_priority=(list_priority)+1   ");
				 
		  	
			   $SQL1 =  "INSERT INTO 	".$maintable."  SET   
			   ".$mainfieldname."='".mysql_real_escape_string($data_mainfieldname)."',  
			   mainimagename='".mysql_real_escape_string($mainimagename)."',   
			   d_slideshow_name_en='".mysql_real_escape_string($data_d_slideshow_name_en)."',   
			   d_slideshow_subtext_id='".mysql_real_escape_string($data_d_slideshow_subtext_id)."',   
			   d_slideshow_subtext_en='".mysql_real_escape_string($data_d_slideshow_subtext_en)."',  
			   d_slideshow_linktext_id='".mysql_real_escape_string($data_d_slideshow_linktext_id)."',   
			   d_slideshow_linktext_en='".mysql_real_escape_string($data_d_slideshow_linktext_en)."',   
			   d_slideshow_link='".mysql_real_escape_string($data_d_slideshow_link)."',   
			   d_slideshow_status='".mysql_real_escape_string($data_d_slideshow_status)."', 
			   d_slideshow_pos='".mysql_real_escape_string($data_d_slideshow_pos)."', 
			   list_priority='1'    ";
			   $db   -> Execute($SQL1); 
			   
			   $logword = 'Add';
			}  else  { 
			    $SQL1 =  "UPDATE ".$maintable." SET	 
			    ".$mainfieldname."='".mysql_real_escape_string($data_mainfieldname)."',  
			   d_slideshow_name_en='".mysql_real_escape_string($data_d_slideshow_name_en)."',   
			   d_slideshow_subtext_id='".mysql_real_escape_string($data_d_slideshow_subtext_id)."',   
			   d_slideshow_subtext_en='".mysql_real_escape_string($data_d_slideshow_subtext_en)."',   
			   d_slideshow_linktext_id='".mysql_real_escape_string($data_d_slideshow_linktext_id)."',   
			   d_slideshow_linktext_en='".mysql_real_escape_string($data_d_slideshow_linktext_en)."',  
			   d_slideshow_link='".mysql_real_escape_string($data_d_slideshow_link)."',   
			   d_slideshow_status='".mysql_real_escape_string($data_d_slideshow_status)."' , 
			   d_slideshow_pos='".mysql_real_escape_string($data_d_slideshow_pos)."'  
			   WHERE ".$primarykey." = ".$data_primarykey;
				$db   -> Execute($SQL1);
		    
				
				if($allowmainimage === true && isset($mainimagename) && $mainimagename != '')
				{
			   		if(file_exists('../../../upload/'.$old_mainimagename)) { @unlink('../../../upload/'.$old_mainimagename);}
			   		if(file_exists('../../../upload/thumb_'.$old_mainimagename)) { @unlink('../../../upload/thumb_'.$old_mainimagename);}
			   		$db   -> Execute("UPDATE ".$maintable." SET mainimagename='".$mainimagename."' WHERE ".$primarykey." = ".$data_primarykey);
				}
				
				
		        $logword = 'Edit';
			}
			$db   -> Execute("INSERT INTO	fh_userlog (fh_userid, fh_usergroupid, fh_pagetitle, fh_action, fh_description, fh_date) VALUES	 (".$fh_userid." , ".$fh_usergroupid." , '".$systemname." System' , '".$logword."' , '".$logword." ".$systemname." : ".$data_mainfieldname."' , now())"); 
			$action="view";			  	  
	  } else { (isset($_POST["insert"])) ? $action="insert" : $action="detail"; }
	}
	
	//***************************************  Proses Delete *****************//
	if (isset($_POST["del"])) 
	{  $delete=$_POST["delete"];
	   for($i=0; $i<count($delete); $i++)
	   { 
		   $RS  = $db->Execute("SELECT * FROM ".$maintable." WHERE ".$primarykey." = ".$delete[$i]);
		   
		 	if ($RS->fields[$primarykey] != '')
			{ 
				 $db->Execute("INSERT INTO		fh_userlog (fh_userid, fh_usergroupid, fh_pagetitle, fh_action, fh_description, fh_date) VALUES (".$fh_userid." , ".$fh_usergroupid." , '".$systemname." System' , 'Delete' , 'Delete ".$systemname." : ".$RS->fields[$mainfieldname].", id : ".$RS->fields[$primarykey]."' , now())");
		         $db->Execute("DELETE FROM ".$maintable." WHERE ".$primarykey." = ".$delete[$i]);
		         $db->Execute("UPDATE ".$maintable."  SET list_priority=(list_priority)-1 WHERE list_priority >= ".$RS->fields['list_priority']."  ORDER BY list_priority ASC ");
			     if($allowmainimage === true && isset($RS->fields['mainimagename']) && $RS->fields['mainimagename'] != '')
				 {
			   		if(file_exists('../../../upload/'.$RS->fields['mainimagename'])) { @unlink('../../../upload/'.$RS->fields['mainimagename']);}
			   		if( file_exists('../../../upload/thumb_'.$RS->fields['mainimagename']) ) {@unlink('../../../upload/thumb_'.$RS->fields['mainimagename']);}
				 }
			}   
	   }
	}
	 
	//********************************* Seting Header ************************//
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('systemname' , $systemname);$smarty->assign('title' , $systemname); 
	$smarty->assign('mainfieldnamed' , $mainfieldnamed); 
	//$smarty->display('the_header.tpl');
	
	
	
	
	//****************************** MAIN CODE *******************************//
	switch ($action){
	case "view" :
	case "search" :
	 
	   $sql_cond = '';
	  if ($search!="") {
		  $sql_cond = " WHERE 	".$maintable.".d_slideshow_name_id like '%".$search."%' OR ".$maintable.".d_slideshow_name_en  like '%".$search."%'   ";
	  }
	
	  $SQL = "SELECT 	*
	  	   	  FROM		".$maintable." 
			  ".$sql_cond." ORDER BY	list_priority ASC";

	  $RS =$db->Execute($SQL);
	  if ($RS->fields[$primarykey] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=view&order=".$order."&orderfield=".$orderfield;
      	
		if ($page != 0 ) {
	      if ($page > $total_jumlah_page) $page=$total_jumlah_page; 
    	  $pagination = pagination($page, $total_jumlah_page, $teks_parameter);
   	  
	      $SQL = "SELECT 	*
	      	      FROM		".$maintable."  
			      ".$sql_cond." ORDER BY	list_priority ASC
			      LIMIT		" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
	      $RS = $db->Execute($SQL);
	  	
	      $i=0;
	      while (!$RS->EOF) {
		      $primarykey_temp[$i] = $RS->fields[$primarykey];
	  	      
		      $link_p = isset($_GET['page']) ? 'page='.$_GET['page'] : '';
		  	  $link_down = ($RS->fields['list_priority'] < $total_jumlah_record) ? ' <a href="?'.$link_p.'&amp;down='.$RS->fields['list_priority'].'&amp;i='.$RS->fields[$primarykey].'"><img src="../../images/arrow_down.png" alt="down" /></a> ' : '';
	  	      $link_up =  ($RS->fields['list_priority'] > 1) ? '  <a href="?'.$link_p.'&amp;up='.$RS->fields['list_priority'].'&amp;i='.$RS->fields[$primarykey].'"><img src="../../images/arrow_top.png" alt="up" /></a> ' : '';
	  	      $priority = $link_down.$link_up == '' ? 'N/A' : $link_down.' '.$link_up;
	  	      $priority_temp[$i] = $priority;
	  	      
	  	      $mainfieldname_temp[$i] = $RS->fields[$mainfieldname];
	  	      $d_slideshow_statname_temp[$i] = $arr_showhide_name[$RS->fields['d_slideshow_status']]; 
	  	      $d_slideshow_status_temp[$i] = $RS->fields['d_slideshow_status']; 
	  	      $i++;
	  	      $RS->MoveNext();
	  	  }
	    } else $msg = "Sorry, There is no record in our database<br>";
	  } else $msg = "Sorry, There is no record in our database<br>";
      
	  $smarty->assign('mainfieldnamed' 	, $mainfieldnamed);
	  $smarty->assign('mainfieldname' 	, $mainfieldname);
	  $smarty->assign('view', array(
	  	        'msg' 					=> $msg,
	  	        'page' 					=> $page,
	  	        'order' 				=> $order,
	  	        'orderfield' 			=> $orderfield,
	  	        'search' 				=> $search,
	  	        'action'				=> 'view',
	  	        'pagination' 			=> $pagination,
	  	  		'primarykey_temp' 			=> $primarykey_temp,
	  			'timestamp_temp' 			=> $timestamp_temp,
	  			'priority_temp' 			=> $priority_temp,
	  			'd_slideshow_statname_temp' 			=> $d_slideshow_statname_temp,
	  			'd_slideshow_status_temp' 			=> $d_slideshow_status_temp,
	  			'mainfieldname_temp'		=> $mainfieldname_temp));
	  $smarty->display($tplfile.'_list.tpl');
	break;
	 

	case "insert" :
	  
	  $smarty->assign('msg' , $msg);
	  if(isset($_POST))
	  {
		  foreach($_POST as $key => $val)
		  {
			   $smarty->assign($key , $val);
		  }
	  }
	  if($allowmainimage === true)
	  {
		  if($mainimagename != '')
		  {
		  	  if(file_exists("../../../upload/".$mainimagename) )
			  {
				  $oldimage = '<div class="row"> 
	                          <div class="form-group">
	                        <label class="col-sm-2 control-label">&nbsp;</label>
	                        <div class="col-sm-6"><BR />
	                        <a href="../../../upload/'.$mainimagename.'" target="_blank"><img width="200" src="../../../upload/thumb_'.$mainimagename.'"  alt="'.$mainimagename.'" title="'.$mainimagename.'"  /></a> <input type="hidden" name="old_mainimagename" value="'.$mainimagename.'" />
	                        </div> 
	                        </div></div>';
				   
			  }  
			  $smarty->assign('oldimage' 	, $oldimage);
	  	  } 
  	  } 
  	  
	  $smarty->assign('mainfieldnamed' 	, $mainfieldnamed); 
	  $smarty->display($tplfile.'_insert.tpl');
	break;

	case "detail" :
	  if ((isset($_GET["data_primarykey"])) ) 
	  {   
		  $data_primarykey= intval($_GET["data_primarykey"]);
		  $SQL = "SELECT * FROM ".$maintable." WHERE ".$primarykey." = ".$data_primarykey."   ";
	  	  $RS  = $db->Execute($SQL);	   	  
		  if ($RS->fields[$primarykey] == '') $msg = "There is no record in our database";
	  } else $msg = "There is no record in our database";

	 
	  $smarty->assign('msg' , $msg);
	  if(is_array($RS->fields) && sizeof($RS->fields)>0)
	  {
		  $smarty->assign('mainfieldnamed' 	, $mainfieldnamed);
		  $smarty->assign('data_mainfieldname' 	, $RS->fields[$mainfieldname]);
		  $smarty->assign('data_primarykey' 	, $data_primarykey);
		  $smarty->assign('timestamp' 	, date("d-m-Y G:i:s" , strtotime($RS->fields['timestamp'])) );
		  foreach($RS->fields as $key => $val)
		  {
			 $smarty->assign('data_'.$key , htmlspecialchars($val));
		  }
		  if($allowmainimage === true)
		  {
			   
			  if(isset($RS->fields["mainimagename"]) && $RS->fields["mainimagename"] != '' && file_exists("../../../upload/".$RS->fields["mainimagename"]) )
			  {
				 $oldimage = '<div class="row"> 
	                          <div class="form-group">
	                        <label class="col-sm-2 control-label">&nbsp;</label>
	                        <div class="col-sm-6"><BR />
	                        <a href="../../../upload/'.$RS->fields["mainimagename"].'" target="_blank"><img width="200" src="../../../upload/thumb_'.$RS->fields["mainimagename"].'"  alt="'.$RS->fields["mainimagename"].'" title="'.$RS->fields["mainimagename"].'"  /></a>  <input type="hidden" name="old_mainimagename" value="'.$RS->fields["mainimagename"].'" />
	                        <br />
	                        <a href="image.php?remove&i='.$RS->fields[$primarykey].'&p='.$primarykey.'&t='.$maintable.'&f='.basename(__FILE__).'" style="color: blue;"><span class="label bg-danger">Remove image</span></a>
	                        </div> 
	                        </div></div>'; 
			  } 
			  $smarty->assign('oldimage' 	, $oldimage);
	  	  } 
	  	  
  	  }
	   
	  $smarty->display($tplfile.'_insert.tpl');
	break;
	 
	
	}
}
?>