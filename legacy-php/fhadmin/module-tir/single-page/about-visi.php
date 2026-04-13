<?php

// bissmillahirahmanirrahiim
// oleh sriyono01@gmail.com dengan rahmat dari allah yang maha mengetahui lagi maha bijaksana


require_once("../../config.inc.php");
require_once("../../back.config.inc.php");
 


//my config

$maintable = 'd_singlepage';
$primarykey = 'content_id';

$mainfieldname = 'content_title_id';
$mainfieldnamed = 'Title (ID)';
$systemname = 'Home Profile';

$allowmainimage = true;
$requiremainimage = false;
$imagesize = 1950000;
$thumb_type = 'resize'; // resize || crop
$thumb_crop_type = 'default'; // full || center || default
$imagethumbsize_x = 530;
$imagethumbsize_y = 431;
$best_image_view = '<br />Best view: '.($imagethumbsize_x ).'px - '.($imagethumbsize_y ).'px';
$smarty->assign('best_image_view' ,  $best_image_view);

$tplfile = 'visi';

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
	
	
	
	//****************************  Proses Insert ataupun Edit ***************//
	if ((isset($_POST["insert"])) || (isset($_POST["edit"])))
	{ 
		
	  if (isset($_POST["edit"]))
	  {
		  $data_primarykey = intval($_POST["data_primarykey"]);
	  }
	  $data_mainfieldname = $_POST["data_mainfieldname"];
	  //if ($data_mainfieldname == "") { $msg.="Please input ".$mainfieldnamed."<br>"; }
	   
	  
	  //** Ambil semua inputan user **/
	  $data_content_long_id  = trim($_POST['data_content_long_id']);
	  $data_content_short_id = trim($_POST['data_content_short_id']);
	  $data_content_title_en  = trim($_POST['data_content_title_en']);
	  $data_content_short_en = trim($_POST['data_content_short_en']);
	  $data_content_long_en  = trim($_POST['data_content_long_en']);
	  $data_d_newsmain_date 		= trim($_POST["data_d_newsmain_date"]);  
	  $data_content_link  = trim($_POST['data_content_link']);
	  
	   
	  //** Validasi inputan user **// 
	  $data_d_newsmain_date_sql =   date('Y-m-d 00:00:00', strtotime($data_d_newsmain_date));
	  if ($data_content_short_id == '') {
	         //$msg .= 'Please input short description (ID)<br />';
	    }
	    if ($data_content_long_id == '') {
	        //$msg .= 'Please input long description (ID)<br />';
	    }
	    
	    if ($data_content_title_en == '') {
	        $msg .= 'Please input title (EN)<br />';
	    }
	    if ($data_content_short_en == '') {
	       //$msg .= 'Please input short description (EN)<br />';
	    }
	    if ($data_content_long_en == '') {
	        //$msg .= 'Please input long description (EN)<br />';
	    }
	  
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
		  	   
		  	   $max = @mysql_fetch_assoc(mysql_query('SELECT MAX(list_priority)+1 as value FROM '.$maintable.' '));
		  	   $max['value'] = intval($max['value']) == 0 ? 1 : $max['value'];
		  	
			   $SQL1 =  "INSERT INTO 	".$maintable."  SET   
			   content_time='".$data_d_newsmain_date_sql."',  
			   ".$mainfieldname."='".mysql_real_escape_string($data_mainfieldname)."',  
			   mainimagename='".mysql_real_escape_string($mainimagename)."',   
			   content_title_en='".mysql_real_escape_string($data_content_title_en)."',  
			   content_short_en='".mysql_real_escape_string($data_content_short_en)."',  
			   content_short_id='".mysql_real_escape_string($data_content_short_id)."',  
			   content_long_id='".mysql_real_escape_string($data_content_long_id)."',  
			   content_long_en='".mysql_real_escape_string($data_content_long_en)."',  
			   content_link='".mysql_real_escape_string($data_content_link)."'   ";
			   $db   -> Execute($SQL1); 
			   
			   $logword = 'Add';
			}  else  { 
			    $SQL1 =  "UPDATE ".$maintable." SET	  
			    content_time='".$data_d_newsmain_date_sql."',  
			   ".$mainfieldname."='".mysql_real_escape_string($data_mainfieldname)."',  
			   content_title_en='".mysql_real_escape_string($data_content_title_en)."',  
			   content_short_en='".mysql_real_escape_string($data_content_short_en)."',  
			   content_short_id='".mysql_real_escape_string($data_content_short_id)."',  
			   content_long_id='".mysql_real_escape_string($data_content_long_id)."',  
			   content_long_en='".mysql_real_escape_string($data_content_long_en)."',  
			   content_link='".mysql_real_escape_string($data_content_link)."'   
			   WHERE ".$primarykey." = ".$data_primarykey;
				$db   -> Execute($SQL1);
		    	
				$smarty->assign('pesan_sukses' ,  'Data has been saved'); 
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
	else
	{
		if(isset($_SESSION['ckeditor_reloaded']) && $_SESSION['ckeditor_reloaded'] == 1)
		{
			unset($_SESSION['ckeditor_reloaded']);
		}
		else
		{
			$_SESSION['ckeditor_reloaded'] = 1;
		}
	}
	$smarty->assign('ckeditor_reloaded' , $_SESSION['ckeditor_reloaded']); 
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
	case "insert" : 
	case "detail" :
	$_GET["data_primarykey"] = 8;
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
		  $RS->fields['d_newsmain_date'] =  date("d-m-Y" , strtotime($RS->fields['content_time']) )   ;
		  foreach($RS->fields as $key => $val)
		  {
			 $smarty->assign('data_'.$key , $val);
		  }
		  if($allowmainimage === true)
		  {
			   
			  if(isset($RS->fields["mainimagename"]) && $RS->fields["mainimagename"] != '' && file_exists("../../../upload/".$RS->fields["mainimagename"]) )
			  {
				 $oldimage = '<div class="row"> 
	                          <div class="form-group">
	                        <label class="col-sm-2 control-label">&nbsp;</label>
	                        <div class="col-sm-6"><BR />
	                        <a href="../../../upload/'.$RS->fields["mainimagename"].'" target="_blank"><img src="../../../upload/thumb_'.$RS->fields["mainimagename"].'"  alt="'.$RS->fields["mainimagename"].'" title="'.$RS->fields["mainimagename"].'"  /></a>  <input type="hidden" name="old_mainimagename" value="'.$RS->fields["mainimagename"].'" />
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