<?php

// bissmillahirahmanirrahiim
// oleh sriyono01@gmail.com dengan rahmat dari allah yang maha mengetahui lagi maha bijaksana

ini_set('memory_limit', '512M');

require_once("../../config.inc.php");
require_once("../../back.config.inc.php");
 


//my config

$maintable = 'd_subsidiaries';
$primarykey = 'd_content_id';

$mainfieldname = 'd_content_title_id';
$mainfieldnamed = 'Company Name';
$systemname = 'Category';

$allowmainimage = true;
$requiremainimage = false;
$imagesize = 1950000;
$thumb_type = 'resize'; // resize || crop
$thumb_crop_type = 'default'; // full || center || default
$imagethumbsize_x = 300;
$imagethumbsize_y = 200;
$best_image_view = '<br />Best view: '.($imagethumbsize_x ).'px - '.($imagethumbsize_y ).'px';
$smarty->assign('best_image_view' ,  $best_image_view);

$imagethumbsize_x3 = 700;
$imagethumbsize_y3 = 800;
$best_image_view3 = '<br />Best view: '.($imagethumbsize_x3 ).'px - '.($imagethumbsize_y3 ).'px';
$smarty->assign('best_image_view3' ,  $best_image_view3);


$imagethumbsize_x4 = 700;
$imagethumbsize_y4 = 800;
$best_image_view4 = '<br />Best view: '.($imagethumbsize_x4 ).'px - '.($imagethumbsize_y4 ).'px';
$smarty->assign('best_image_view4' ,  $best_image_view4);



$tplfile = 'content';


function format_price_idr($price)
{
	return 'Rp. '.number_format($price);
}


function show_select_opt_parent($parent, $selected, $level)
{
	
	$maintable = 'f_category';
	$mainfieldname = 'product_category_name_id';
	
	if($level == '')
	{
		$ret .= '<option value="0">-select category-</option>';
	}
	$sql = 'SELECT * FROM '.$maintable.' WHERE product_category_parent=\''.intval($parent).'\'  ORDER BY priority ASC '; 
	$res = mysql_query($sql);
	$num = @mysql_num_rows($res); 
	if($num)
	{
		while($row = mysql_fetch_assoc($res))
		{
			$disabled = $row['flexmenu_type'] == 0 ? '' : ' disabled="disabled" ';
			$is_selected = $selected == $row['d_content_gallerytype'] ? ' selected="selected" ' : '';
			if($row['product_category_type'] == 0)
			{
				$ret .= '<option value="'.$row['d_content_gallerytype'].'" '.$is_selected.' '.$disabled.'>'. $level. ' ' . $row[$mainfieldname] .'</option>';
			}
			$ret .= show_select_opt_parent($row['d_content_gallerytype'], $selected, '---'.$level);
			 
		}
	} 
	return $ret;
}

$SQL = "SELECT 	".$primarykey."
FROM		".$maintable."     "; 
$RS =$db->Execute($SQL);
$total_jumlah_product = $RS->RecordCount(); 
 

//***************************** Security ACCESS LEVEL *************************/
$akses_level_page = access_level_page($fh_usergroupid, $db);

if ($fh_userid && $akses_level_page)
{	
	
	if(isset($_GET['up']) && isset($_GET['i']) &&  isset($_GET['p']) )
	{
		$sql =  'UPDATE '.$maintable.' SET	  priority='.intval($_GET['up']).'  WHERE priority=('.intval($_GET['up']).'-1)   ';
		@mysql_query($sql);
		$sql =  "UPDATE ".$maintable." SET	  priority=(priority)-1  WHERE ".$primarykey." = ".intval($_GET['i'])."    ";
		@mysql_query($sql);
	}
	if(isset($_GET['down']) && isset($_GET['i']) &&  isset($_GET['p']))
	{
		$sql =  "UPDATE ".$maintable." SET	  priority=".intval($_GET['down'])."  WHERE priority=(".intval($_GET['down'])."+1)  ";
		@mysql_query($sql);
		$sql =  "UPDATE ".$maintable." SET	  priority=(priority)+1  WHERE ".$primarykey." = ".intval($_GET['i'])."   ";
		@mysql_query($sql);
	}
	
	
	/***************************** seting orderfield **************************/
	if (!(isset($_GET["orderfield"])))  $orderfield = 'priority';
	else 
	{
	  $orderfield=$_GET["orderfield"];
	  if ( empty($orderfield) )
	  {
		  $orderfield = 'priority';
	  }
	} 
	
	$teks_parameter = "";
	
	// CATEGORY
	
	 
     
	 
	$option_showhide_val = array(1, 0);
	$option_showhide_name = array( 'Show', 'Hide');
	$arr_showhide_name = array( 1=> 'Show', 0 => 'Hide');
	$smarty->assign('option_showhide_val' ,$option_showhide_val); 
	$smarty->assign('option_showhide_name' ,$option_showhide_name); 
	
	$option_ischild_val = array(0, 1); 
	$arr_ischild_name = array( 0=> 'No', 1 => 'Yes');
	$smarty->assign('option_ischild_val' ,$option_ischild_val); 
	$smarty->assign('arr_ischild_name' ,$arr_ischild_name); 
	
	$i=0; 
	$option_cat_val[$i] = 0;
	$option_cat_name[$i] = '';
	$option_cat_arr[0] = '';
	$i++;
	$sqlc = 'SELECT * FROM  '.$maintable.' WHERE d_content_ischild=0  ORDER BY `d_content_title` ASC;'; 
	$RS =$db->Execute($sqlc);
	if ($RS->fields[$primarykey] != "")
	{   
		while (!$RS->EOF) {
		    $option_cat_val[$i] = $RS->fields['d_content_id'];
			$option_cat_name[$i] = $RS->fields['d_content_title'];
			$option_cat_arr[$RS->fields['d_content_id']] = $RS->fields['d_content_title'];
			$i++;
		    $RS->MoveNext();
	  	  }
	} 
	$smarty->assign('option_cat_val' ,  $option_cat_val);
	$smarty->assign('option_cat_name' ,  $option_cat_name);
	
	
	$option_data_priority = array();
	$option_data_priority_stat = 0;
	if($total_jumlah_product > 0 )
	{
		for($i=0;$i<$total_jumlah_product;$i++)
		{
			$option_data_priority[$i] = $i+1; 
		}
		$option_data_priority_stat = 1;
	} 
	$smarty->assign('option_data_priority' ,$option_data_priority); 
	$smarty->assign('option_data_priority_stat' , $option_data_priority_stat); 
	
	
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
		$data_d_content_title_en = trim($_POST['data_d_content_title_en']);
		$data_d_content_fax = trim($_POST['data_d_content_fax']);
		$data_d_content_website = trim($_POST['data_d_content_website']);
		$data_d_content_address = trim($_POST['data_d_content_address']);
		$data_d_content_instagram = trim($_POST['data_d_content_instagram']);
		$data_d_content_fb = trim($_POST['data_d_content_fb']);
		$data_d_content_linkedin = trim($_POST['data_d_content_linkedin']);
		$data_d_content_youtube = trim($_POST['data_d_content_youtube']);
		$data_d_content_twitter = trim($_POST['data_d_content_twitter']);
		$data_d_content_shortdesc_id = trim($_POST['data_d_content_shortdesc_id']);
		$data_d_content_shortdesc_en = trim($_POST['data_d_content_shortdesc_en']);
		$data_d_content_longdesc_id = trim($_POST['data_d_content_longdesc_id']);
		$data_d_content_longdesc_en = trim($_POST['data_d_content_longdesc_en']);
	  	$data_d_content_footer_id = trim($_POST['data_d_content_footer_id']);
		$data_d_content_footer_en = trim($_POST['data_d_content_footer_en']);
	  	$data_d_content_status 			= trim($_POST["data_d_content_status"]) == 1 ? 1 : 0;   
	    $data_d_content_ischild 			= trim($_POST["data_d_content_ischild"]) == 1 ? 1 : 0;   
	    $data_d_content_parentcomp 			= intval($_POST["data_d_content_parentcomp"]);   
	   
	  
	  
	   
	  if($data_d_content_title_en == '')
	  {
		 //$msg.="Please input phone<br>";
	  }
	  if($data_d_content_address == '')
	  {
		  //$msg.="Please input address<br>";
	  }
	  
	  //** validasi image ++/
	  $data_mainimage 				= $_FILES["data_mainimage"];
	  $old_mainimagename 			= trim($_POST["old_mainimagename"]);
	  if ($data_mainimage['name'] == "" && $old_mainimagename == "" && $requiremainimage === true && $data_d_content_gallerytype == 0 ) { $msg.="Please input Image<br>";}
	     
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
	  
	  $data_mainimage2 				= $_FILES["data_mainimage2"];
	  $old_mainimagename2 			= trim($_POST["old_mainimagename2"]);
	  
	  //if ($data_mainimage2['name'] == "" && $old_mainimagename2 == "" && $data_d_content_ischild == 0   ) { $msg.="Please input Image Subsidiary<br>";}
	     
	  if($allowmainimage === true && isset($data_mainimage2["name"]) && $data_mainimage2['name'] !='')
	  {
		  $handle = new Upload($data_mainimage2);
		  if($handle->uploaded) {
			  if($handle->file_is_image)
			  {
				  
					  $handle->Process("../../../upload/");
					  if ($handle->processed) {
						  $mainimagename2 = $handle->file_dst_name;
						  $thumb_name = $handle->file_dst_name_body;
						  
						  $handle->image_resize = true;
						  $handle->file_overwrite = true;
						  $handle->image_x = $imagethumbsize_x3;
						  $handle->image_y = $imagethumbsize_y3;
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
		  $mainimagename2 = isset($_POST["insert"]) ? $old_mainimagename2 : '';
	  }
	  
	  
	  $data_mainimage3 				= $_FILES["data_mainimage3"];
	  $old_mainimagename3 			= trim($_POST["old_mainimagename3"]);
	  
	  //if ($data_mainimage3['name'] == "" && $old_mainimagename3 == "" && $data_d_content_ischild == 0   ) { $msg.="Please input Image Subsidiary<br>";}
	     
	  if($allowmainimage === true && isset($data_mainimage3["name"]) && $data_mainimage3['name'] !='')
	  {
		  $handle = new Upload($data_mainimage3);
		  if($handle->uploaded) {
			  if($handle->file_is_image)
			  {
				  
					  $handle->Process("../../../upload/");
					  if ($handle->processed) {
						  $mainimagename3 = $handle->file_dst_name;
						  $thumb_name = $handle->file_dst_name_body;
						  
						  $handle->image_resize = true;
						  $handle->file_overwrite = true;
						  $handle->image_x = $imagethumbsize_x3;
						  $handle->image_y = $imagethumbsize_y3;
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
		  $mainimagename3 = isset($_POST["insert"]) ? $old_mainimagename3 : '';
	  }
	  
	  
	  //** Kalau inputan valid do the process **//
	  if ($msg=="")
	  {
		  //$data_productdesc = htmlspecialchars(stripslashes($data_productdesc));
		 
		  $data_content_permalink = createPermaKey($maintable, $data_d_content_title_en);
		  
		   if (isset($_POST["insert"])) 
	  	   {
		  	   if($data_priority > 0)
		  	   {
			  	    $sql =  'UPDATE '.$maintable.' SET	  priority=(priority)+1  WHERE priority > '.intval($data_priority-1).'   ';
					@mysql_query($sql); 
					$priority['value'] = $data_priority;
					
		  	   }
		  	   else
		  	   {
			  	   $priority = @mysql_fetch_assoc(mysql_query('SELECT MAX(priority)+1 as value FROM '.$maintable.'   '));
				   $priority['value'] = intval($priority['value']) == 0 ? 1 : $priority['value'];
		  	   }
			   
			   $SQL1 =  'INSERT INTO 	'.$maintable.'  SET  
			   d_content_lastupdate = \''.date('Y-m-d H:i:s').'\',
			   mainimagename='.$db->qstr($mainimagename).',  
			   mainimagename2='.$db->qstr($mainimagename2).',  
			   mainimagename3='.$db->qstr($mainimagename3).',  
			   '.$mainfieldname.'='.$db->qstr($data_mainfieldname).',  
			   d_content_title_en= '.$db->qstr($data_d_content_title_en).',
			   content_permalink='.$db->qstr($data_content_permalink).', 
				d_content_website= '.$db->qstr($data_d_content_website).',
				d_content_address= '.$db->qstr($data_d_content_address).',
				d_content_instagram= '.$db->qstr($data_d_content_instagram).',
				d_content_fb= '.$db->qstr($data_d_content_fb).',
				d_content_linkedin= '.$db->qstr($data_d_content_linkedin).',
				d_content_youtube= '.$db->qstr($data_d_content_youtube).',
				d_content_twitter= '.$db->qstr($data_d_content_twitter).',
				d_content_shortdesc_id= \''.mysql_real_escape_string( $data_d_content_shortdesc_id).'\',
				d_content_shortdesc_en= \''.mysql_real_escape_string($data_d_content_shortdesc_en).'\',
				d_content_longdesc_id= \''.mysql_real_escape_string($data_d_content_longdesc_id).'\',
				d_content_longdesc_en= \''.mysql_real_escape_string($data_d_content_longdesc_en).'\',
				d_content_footer_id= \''.mysql_real_escape_string($data_d_content_footer_id).'\',
				d_content_footer_en= \''.mysql_real_escape_string($data_d_content_footer_en).'\',
			   d_content_status= '.$db->qstr($data_d_content_status).',
			   d_content_ischild= '.$db->qstr($data_d_content_ischild).',
			   d_content_parentcomp= '.$db->qstr($data_d_content_parentcomp).',
			   priority='.$priority['value'].'  ';
			   $db   -> Execute($SQL1); 
			   
			   $logword = 'Add';
			}  else  { 
			    $SQL1 =  'UPDATE '.$maintable.' SET	 
			   d_content_lastupdate = \''.date('Y-m-d H:i:s').'\',
			   '.$mainfieldname.'='.$db->qstr($data_mainfieldname).',  
			   d_content_title_en= '.$db->qstr($data_d_content_title_en).', 
				d_content_website= '.$db->qstr($data_d_content_website).',
				d_content_address= '.$db->qstr($data_d_content_address).',
				d_content_instagram= '.$db->qstr($data_d_content_instagram).',
				d_content_fb= '.$db->qstr($data_d_content_fb).',
				d_content_linkedin= '.$db->qstr($data_d_content_linkedin).',
				d_content_youtube= '.$db->qstr($data_d_content_youtube).',
				d_content_twitter= '.$db->qstr($data_d_content_twitter).',
				d_content_shortdesc_id= \''.mysql_real_escape_string( $data_d_content_shortdesc_id).'\',
				d_content_shortdesc_en= \''.mysql_real_escape_string($data_d_content_shortdesc_en).'\',
				d_content_longdesc_id= \''.mysql_real_escape_string($data_d_content_longdesc_id).'\',
				d_content_longdesc_en= \''.mysql_real_escape_string($data_d_content_longdesc_en).'\',
				d_content_footer_id= \''.mysql_real_escape_string($data_d_content_footer_id).'\',
				d_content_footer_en= \''.mysql_real_escape_string($data_d_content_footer_en).'\',
				d_content_ischild= '.$db->qstr($data_d_content_ischild).',
			    d_content_parentcomp= '.$db->qstr($data_d_content_parentcomp).',
			   d_content_status= '.$db->qstr($data_d_content_status).' 
			   WHERE '.$primarykey.' = '.$data_primarykey;
				$db   -> Execute($SQL1);
				
			  
		  	   
		    
				
				if($allowmainimage === true && isset($mainimagename) && $mainimagename != '')
				{
			   		if(file_exists('../../../upload/'.$old_mainimagename)) { @unlink('../../../upload/'.$old_mainimagename);}
			   		if(file_exists('../../../upload/thumb_'.$old_mainimagename)) { @unlink('../../../upload/thumb_'.$old_mainimagename);}
			   		$db   -> Execute("UPDATE ".$maintable." SET mainimagename='".$mainimagename."' WHERE ".$primarykey." = ".$data_primarykey);
				}
				if($allowmainimage === true && isset($mainimagename2) && $mainimagename2 != '')
				{
			   		if(file_exists('../../../upload/'.$old_mainimagename2)) { @unlink('../../../upload/'.$old_mainimagename2);}
			   		if(file_exists('../../../upload/thumb_'.$old_mainimagename2)) { @unlink('../../../upload/thumb_'.$old_mainimagename2);}
			   		$db   -> Execute("UPDATE ".$maintable." SET mainimagename2='".$mainimagename2."' WHERE ".$primarykey." = ".$data_primarykey);
				}
				if($allowmainimage === true && isset($mainimagename3) && $mainimagename3 != '')
				{
			   		if(file_exists('../../../upload/'.$old_mainimagename3)) { @unlink('../../../upload/'.$old_mainimagename3);}
			   		if(file_exists('../../../upload/thumb_'.$old_mainimagename3)) { @unlink('../../../upload/thumb_'.$old_mainimagename3);}
			   		$db   -> Execute("UPDATE ".$maintable." SET mainimagename3='".$mainimagename3."' WHERE ".$primarykey." = ".$data_primarykey);
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
		         $db->Execute("UPDATE ".$maintable."  SET priority=(priority)-1 WHERE priority >= ".$RS->fields['priority']."  ORDER BY priority ASC ");
			     if($allowmainimage === true && isset($RS->fields['mainimagename']) && $RS->fields['mainimagename'] != '')
				 {
			   		if(file_exists('../../../upload/'.$RS->fields['mainimagename'])) { @unlink('../../../upload/'.$RS->fields['mainimagename']);}
			   		if( file_exists('../../../upload/thumb_'.$RS->fields['mainimagename']) ) {@unlink('../../../upload/thumb_'.$RS->fields['mainimagename']);}
			   		@unlink('../../../upload/crop700-800_'.$RS->fields['mainimagename3']);
			   		@unlink('../../../upload/crop150-100_'.$RS->fields['mainimagename']); 
				 }
			}   
	   }
	   $search = '';
	   
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
	if($orderfield == 'priority')
	{
		$order = 'asc';
	}
	  $sql_cond = '';
	  if ($search!="") {
		  $sql_cond = " WHERE 	".$maintable.".".$mainfieldname." like '%".$search."%'   ";
	  }
	  
	  $SQL = "SELECT 	".$maintable.".* 
	  	   	  FROM		".$maintable." 
	  	   	  ".$sql_cond."
			  ORDER BY ".$orderfield." ".$order."  ";

	  $RS =$db->Execute($SQL);
	  if ($RS->fields[$primarykey] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=view&order=".$order."&search=".$search."&orderfield=".$orderfield;
      	
		if ($page != 0 ) {
	      if ($page > $total_jumlah_page) $page=$total_jumlah_page; 
    	  $pagination = pagination($page, $total_jumlah_page, $teks_parameter);
   	  
	      $SQL = "SELECT 	".$maintable.".* 
	  	   	  FROM		".$maintable." 
	  	   	  ".$sql_cond."
			      ORDER BY ".$orderfield." ".$order."
			      LIMIT		" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
	      $RS = $db->Execute($SQL);
	  	
	      $i=0;
	      $pembilang = $page > 0 ? $page : 1;
	      $pstart = ($pembilang-1)*$conf["page"];
	      while (!$RS->EOF) {
		    $link_down = ($RS->fields['priority'] < $total_jumlah_record) ? ' <a href="?'.$link_p.'&amp;down='.$RS->fields['priority'].'&amp;i='.$RS->fields[$primarykey].'&amp;p='.$parent.'"><img src="../../images/arrow_down.png" alt="down" /></a> ' : '';
	  	    $link_up =  ($RS->fields['priority'] > 1) ? '  <a href="?'.$link_p.'&amp;up='.$RS->fields['priority'].'&amp;i='.$RS->fields[$primarykey].'&amp;p='.$parent.'"><img src="../../images/arrow_top.png" alt="up" /></a> ' : '';
	  	       
			$this_priority = $link_down.$link_up == '' ? '--' : $link_down.' '.$link_up;
		      
		      $primarykey_temp[$i] = $RS->fields[$primarykey];
	  	      $mainfieldname_temp[$i] = $RS->fields[$mainfieldname];
	  	      $gennews_statname_temp[$i] = $arr_showhide_name[$RS->fields['d_content_status']]; 
	  	      $d_content_status_temp[$i] = $RS->fields['d_content_status']; 
	  	      $d_content_priority_temp[$i] = $RS->fields['priority']; 
	  	      $d_content_normalprice_temp[$i] =  $RS->fields['d_content_normalprice']; 
	  	      $d_content_discountprice_temp[$i] =  $RS->fields['d_content_discountprice']; 
	  	      $d_content_normalprice_f_temp[$i] = format_price_idr($RS->fields['d_content_normalprice']); 
	  	      $d_content_discountprice_f_temp[$i] = format_price_idr($RS->fields['d_content_discountprice']); 
	  	      $category_name_temp[$i] = $option_cat_arr[$RS->fields['d_content_gallerytype']];  
	  	      if($orderfield == 'priority')
			  {
				  $this_priority_temp[$i] = $this_priority;
				  //$temprs = $db->Execute("UPDATE   ".$maintable." SET priority=".($i+$pstart+1)." WHERE ".$primarykey." = ".$RS->fields[$primarykey]);
			  }
			  else
			  {
				  $this_priority_temp[$i] = 'N/A';
			  }
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
	  			'this_priority_temp' 			=> $this_priority_temp,
	  			'd_content_priority_temp' 			=> $d_content_priority_temp,
	  			'category_name_temp' 			=> $category_name_temp,
	  			'timestamp_temp' 			=> $timestamp_temp,
	  			'gennews_statname_temp' 			=> $gennews_statname_temp,
	  			'd_content_normalprice_temp' 			=> $d_content_normalprice_temp,
	  			'd_content_discountprice_temp' 			=> $d_content_discountprice_temp,
	  			'd_content_normalprice_f_temp' 			=> $d_content_normalprice_f_temp,
	  			'd_content_discountprice_f_temp' 			=> $d_content_discountprice_f_temp,
	  			'd_content_status_temp' 			=> $d_content_status_temp,
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
	                        <a href="../../../upload/'.$mainimagename.'" target="_blank"><img src="../../../upload/thumb_'.$mainimagename.'"  alt="'.$mainimagename.'" title="'.$mainimagename.'"  /></a> <input type="hidden" name="old_mainimagename" value="'.$mainimagename.'" />
	                        </div> 
	                        </div></div>';
				   
			  }  
			  $smarty->assign('oldimage' 	, $oldimage);
	  	  }
	  	  
	  	  if($mainimagename2 != '')
		  {
		  	  if(file_exists("../../../upload/".$mainimagename2) )
			  {
				  $oldimage2 = '<div class="row"> 
	                          <div class="form-group">
	                        <label class="col-sm-2 control-label">&nbsp;</label>
	                        <div class="col-sm-6"><BR />
	                        <a href="../../../upload/'.$mainimagename2.'" target="_blank"><img src="../../../upload/thumb_'.$mainimagename2.'"  alt="'.$mainimagename2.'" title="'.$mainimagename2.'"  /></a> <input type="hidden" name="old_mainimagename2" value="'.$mainimagename2.'" />
	                        </div> 
	                        </div></div>';
				   
			  }  
			  $smarty->assign('oldimage2' 	, $oldimage2);
	  	  } 
	  	  
	  	   if($mainimagename3 != '')
		  {
		  	  if(file_exists("../../../upload/".$mainimagename3) )
			  {
				  $oldimage3 = '<div class="row"> 
	                          <div class="form-group">
	                        <label class="col-sm-2 control-label">&nbsp;</label>
	                        <div class="col-sm-6"><BR />
	                        <a href="../../../upload/'.$mainimagename3.'" target="_blank"><img  width="300" src="../../../upload/thumb_'.$mainimagename3.'"  alt="'.$mainimagename3.'" title="'.$mainimagename3.'"  /></a> <input type="hidden" name="old_mainimagename3" value="'.$mainimagename3.'" />
	                        </div> 
	                        </div></div>';
				   
			  }  
			  $smarty->assign('oldimage3' 	, $oldimage3);
	  	  } 
	  	  
  	  } 
  	  
	  $smarty->assign('mainfieldnamed' 	, $mainfieldnamed);
	  $show_select_opt_parent = show_select_opt_parent(0, 0, '');
	  $smarty->assign('show_select_opt_parent' , $show_select_opt_parent);     
	  $smarty->assign('option_data_priority_stat' 	, 0);
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
		  foreach($RS->fields as $key => $val)
		  {
			 $smarty->assign('data_'.$key , $val);
		  }
		  $smarty->assign('data_gennews_date' 	, date("d-m-Y" , strtotime($RS->fields['gennews_date'])) );
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
			  
			  if(isset($RS->fields["mainimagename2"]) && $RS->fields["mainimagename2"] != '' && file_exists("../../../upload/".$RS->fields["mainimagename2"]) )
			  {
				 $oldimage2 = '<div class="row"> 
	                          <div class="form-group">
	                        <label class="col-sm-2 control-label">&nbsp;</label>
	                        <div class="col-sm-6"><BR />
	                        <a href="../../../upload/'.$RS->fields["mainimagename2"].'" target="_blank"><img src="../../../upload/thumb_'.$RS->fields["mainimagename2"].'"  alt="'.$RS->fields["mainimagename2"].'" title="'.$RS->fields["mainimagename2"].'"  /></a>  <input type="hidden" name="old_mainimagename2" value="'.$RS->fields["mainimagename2"].'" />
	                        <br />
	                        <a href="image.php?remove2&i='.$RS->fields[$primarykey].'&p='.$primarykey.'&t='.$maintable.'&f='.basename(__FILE__).'" style="color: blue;"><span class="label bg-danger">Remove image</span></a>
	                        </div> 
	                        </div></div>'; 
			  } 
			  $smarty->assign('oldimage2' 	, $oldimage2);
			  
			  
			  if(isset($RS->fields["mainimagename3"]) && $RS->fields["mainimagename3"] != '' && file_exists("../../../upload/".$RS->fields["mainimagename3"]) )
			  {
				 $oldimage3 = '<div class="row"> 
	                          <div class="form-group">
	                        <label class="col-sm-2 control-label">&nbsp;</label>
	                        <div class="col-sm-6"><BR />
	                        <a href="../../../upload/'.$RS->fields["mainimagename3"].'" target="_blank"><img src="../../../upload/thumb_'.$RS->fields["mainimagename3"].'"  width="300" alt="'.$RS->fields["mainimagename3"].'" title="'.$RS->fields["mainimagename3"].'"  /></a>  <input type="hidden" name="old_mainimagename3" value="'.$RS->fields["mainimagename3"].'" />
	                        <br />
	                        <a href="image.php?remove3&i='.$RS->fields[$primarykey].'&p='.$primarykey.'&t='.$maintable.'&f='.basename(__FILE__).'" style="color: blue;"><span class="label bg-danger">Remove image</span></a>
	                        </div> 
	                        </div></div>'; 
			  } 
			  $smarty->assign('oldimage3' 	, $oldimage3);
			  
	  	  }
	  	  
	  	  $show_select_opt_parent = show_select_opt_parent(0, $RS->fields["d_content_gallerytype"], '');
		  $smarty->assign('show_select_opt_parent' , $show_select_opt_parent); 
	  	  
  	  }
	   
	  $smarty->display($tplfile.'_insert.tpl');
	break;
	
	
	case "gallery" :
	
	$imagethumbsize_x = 795;
	$imagethumbsize_y = 530;
	$best_image_view = '<br />Best view: '.($imagethumbsize_x ).'px - '.($imagethumbsize_y ).'px';
	$smarty->assign('best_image_view' ,  $best_image_view);

	  if ((isset($_GET["data_primarykey"])) ) 
	  {   
		  $data_primarykey= intval($_GET["data_primarykey"]);
		  $SQL = "SELECT * FROM ".$maintable." WHERE ".$primarykey." = ".$data_primarykey."   ";
	  	  $RS  = $db->Execute($SQL);	   	  
		  if ($RS->fields[$primarykey] == '')
		  {
			  $msg = "There is no record in our database";
		  }
		  else
		  {
			  if(is_array($RS->fields) && sizeof($RS->fields)>0)
			  {
				  $smarty->assign('mainfieldnamed' 	, $mainfieldnamed);
				  $smarty->assign('data_mainfieldname' 	, $RS->fields[$mainfieldname]);
				  $smarty->assign('data_primarykey' 	, $data_primarykey);
				  foreach($RS->fields as $key => $val)
				  {
					 $smarty->assign('data_'.$key , $val);
				  }
				  if(isset($_POST['submitnew']))
				  {   $data_gallery_image = $_FILES['data_gallery_image'];
					  $data_gallery_name = $_POST['data_gallery_name'];
					  
					  if($data_gallery_image["name"] == '' )
					  { $errmsg.="Please input Gallery Image<br>"; }
					  if($data_gallery_name == '' )
					  { $errmsg.="Please input Gallery title<br>"; }
						  
					  if( isset($data_gallery_image["name"]) && $data_gallery_image['name'] !='')
					  {   $handle = new Upload($data_gallery_image);
		                     
						  if($handle->uploaded) {
							  if($handle->file_is_image)
							  {        
		                                $handle->Process("../../../upload/");
		                                if ($handle->processed) 
		                                {   $mainimagename = $handle->file_dst_name;
		                                    $thumb_name = $handle->file_dst_name_body;
										  
		                                    $handle->image_resize = true;
		                                    $handle->file_overwrite = true;
		                                    $handle->image_x = $imagethumbsize_x;
		                                    $handle->image_y = $imagethumbsize_y;
		                                    $handle->file_new_name_body = 'thumb_'.$thumb_name; 
		                                    $handle->Process("../../../upload/");
		                                    if (!$handle->processed) {  $msg .= $handle->error;  }
		
									    } else { $errmsg .= $handle->error; } 
							  } else { $errmsg .= 'Invalid image type.'; }
							  $handle-> Clean();
						  } else { $errmsg .= '  Error: ' . $handle->error . ''; }
					  }
					  
					  if($errmsg == '')
					  {  $sql = 'INSERT INTO  `d_subsidiaries_gallery` SET `'.$primarykey.'`=\''.$data_primarykey.'\', `gallery_image`=\''.$mainimagename.'\',  `gallery_name`=\''.$data_gallery_name.'\' ;';
						  if(@mysql_query($sql)) {  $errmsg .= 'New Gallery has been inserted'; }
						  else {  $errmsg .= 'New Gallery cant been inserted.'; }
					  }
					  $smarty->assign('errmsg' ,  $errmsg); 
				  }
				  
				  //*** Hapus Gallery
				  if(isset($_GET['delete_img']))
			  	  {  $old_mainimage = $_GET['old_mainimage'];
				  	  if(is_file("../../../upload/".$old_mainimage)) { @unlink("../../../upload/".$old_mainimage); }
				  	  if(is_file("../../../upload/thumb_".$old_mainimage)) { @unlink("../../../upload/thumb_".$old_mainimage); }
				  	  $sql = 'DELETE FROM `d_subsidiaries_gallery`  WHERE gallery_id=\''.intval($_GET['delete_img']).'\' ;';
					  if(@mysql_query($sql)) { $errdelete .= 'Gallery has been deleted.'; }
					  $smarty->assign('errdelete' ,  $errdelete); 
			  	  }
			  	  
			  	  if(isset($_GET['setmain_img']))
			  	  {
				  	  $sql = 'UPDATE `d_subsidiaries_gallery`  SET gallery_ismain=0 WHERE `'.$primarykey.'` =\''.$data_primarykey.'\'   ;';
					  if(@mysql_query($sql)) { 
						  	$sql = 'UPDATE `d_subsidiaries_gallery`  SET gallery_ismain=1 WHERE `'.$primarykey.'` =\''.$data_primarykey.'\'  and gallery_id=\''.intval($_GET['setmain_img']).'\' ;';
					  		if(@mysql_query($sql)) { $errdelete .= 'Gallery has been set to main.'; }
					  }
				  	  
					  $smarty->assign('errdelete' ,  $errdelete); 
			  	  }
				  
			  	  //*** View Gallery
			  	  $sql = 'SELECT * FROM `d_subsidiaries_gallery` WHERE `'.$primarykey.'` =\''.$data_primarykey.'\'   ORDER BY gallery_id ASC ';
			  	  $res = mysql_query($sql);
			  	  $num = @mysql_num_rows($res);
			  	  if($num)
			  	  {  $i=0;
				  	  while($row = mysql_fetch_assoc($res))
				  	  {   $gallery_gallery_image[$i] = is_file('../../../upload/thumb_'.$row['gallery_image']) ? '<img src="../../../upload/thumb_'.$row['gallery_image'].'" alt="'.$row['gallery_image'].'"  width="150"  />' : '&nbsp;';
					  	  $gallery_gallery_id[$i] = $row['gallery_id'];
					  	  $gallery_gallery_name[$i] = $row['gallery_name'];
					  	  $gallery_gallery_ismain[$i] = $row['gallery_ismain'] == 1 ? '<span class="label bg-primary">Main Image</span>' : 'N/A'; 
					  	  $gallery_delete_link[$i] = basename(__FILE__).'?action=gallery&data_primarykey='.$data_primarykey.'&delete_img='.$row['gallery_id'].'&old_mainimage='.$row['gallery_image'].'';
					  	  $gallery_edit_link[$i] = basename(__FILE__).'?action=gallery&data_primarykey='.$data_primarykey.'&setmain_img='.$row['gallery_id'].'';
					  	  $i++;
				  	  }
				  	  $smarty->assign('gallery', array(
				  	   'gallery_gallery_image' =>  $gallery_gallery_image,
				  	   'gallery_gallery_id' =>  $gallery_gallery_id,
				  	   'gallery_gallery_ismain' =>  $gallery_gallery_ismain,
				  	   'gallery_delete_link' =>  $gallery_delete_link,
				  	   'gallery_edit_link' =>  $gallery_edit_link,
				  	   'gallery_gallery_name' =>  $gallery_gallery_name));
			  	  }
			  	  $smarty->assign('data_gallery_exists' ,  $num); 
					  	  
		  	  } 
		  }
	  } else $msg = "There is no record in our database";

	 
	  $smarty->assign('msg' , $msg); 
	  $smarty->display($tplfile.'_gallery.tpl');
	break;
	
	
	case "related" :
	
		$i=0; 
		$option_subcat_val[$i] = 0;
		$option_subcat_name[$i] = '';
		$option_subcat_arr[0] = '';
		$i++;
		$sqlc = 'SELECT * FROM  '.$maintable.' WHERE d_content_id !='.intval($_GET["data_primarykey"]).'  ORDER BY `d_content_title` ASC;'; 
		$RS =$db->Execute($sqlc);
		if ($RS->fields[$primarykey] != "")
		{   
			while (!$RS->EOF) {
			    $option_subcat_val[$i] = $RS->fields['d_content_id'];
				$option_subcat_name[$i] = $RS->fields['d_content_title'];
				$option_subcat_arr[$RS->fields['d_content_id']] = $RS->fields['d_content_title'];
				$i++;
			    $RS->MoveNext();
		  	  }
		} 
		$smarty->assign('option_subcat_val' ,  $option_subcat_val);
		$smarty->assign('option_subcat_name' ,  $option_subcat_name);	
	  if ((isset($_GET["data_primarykey"])) ) 
	  {   
		  $data_primarykey= intval($_GET["data_primarykey"]);
		  $SQL = "SELECT * FROM ".$maintable." WHERE ".$primarykey." = ".$data_primarykey."   ";
	  	  $RS  = $db->Execute($SQL);	   	  
		  if ($RS->fields[$primarykey] == '')
		  {
			  $msg = "There is no record in our database";
		  }
		  else
		  { 
			  if(is_array($RS->fields) && sizeof($RS->fields)>0)
			  {
				  $smarty->assign('mainfieldnamed' 	, $mainfieldnamed);
				  $smarty->assign('data_mainfieldname' 	, $RS->fields[$mainfieldname]);
				  $smarty->assign('data_primarykey' 	, $data_primarykey);
				  foreach($RS->fields as $key => $val)
				  {
					 $smarty->assign('data_'.$key , $val);
				  }
				  if(isset($_POST['submitnew']))
				  {    
					  $data_gallery_name = intval($_POST['data_gallery_name']);
					  
					   
					  if($data_primarykey == $data_gallery_name  )
					  { $errmsg.="Please input valid subsidiary<br>"; }
					  if($data_gallery_name == '' )
					  { $errmsg.="Please input subsidiary<br>"; }
					  else
					  {
						  $sqdv = "SELECT * FROM d_subsidiaries_related WHERE gallery_name= ".$data_gallery_name." AND ".$primarykey."='".$data_primarykey."'  ";
					  	  $rsdv  = $db->Execute($sqdv);	   	  
						  if ($rsdv->fields['gallery_name'] != '')
						  {
							  $errmsg = "Subsidiary already in the list";
						  }
					  }		   
					  if($errmsg == '')
					  {   $sql = 'INSERT INTO  `d_subsidiaries_related` SET `'.$primarykey.'`=\''.$data_primarykey.'\',  `gallery_name`=\''.$data_gallery_name.'\' ;';
						  if(@mysql_query($sql)) {  $errmsg .= 'New subsidiary has been inserted'; }
						  else {  $errmsg .= 'New subsidiary cant been inserted.'; }
					  }
					  $smarty->assign('errmsg' ,  $errmsg); 
				  }
				  
				  //*** Hapus Gallery
				  if(isset($_GET['delete_img']))
			  	  {  $old_mainimage = $_GET['old_mainimage'];
				  	  $sql = 'DELETE FROM `d_subsidiaries_related`  WHERE gallery_id=\''.intval($_GET['delete_img']).'\' ;';
					  if(@mysql_query($sql)) { $errdelete .= 'Gallery has been deleted.'; }
					  $smarty->assign('errdelete' ,  $errdelete); 
			  	  }
			  	  
			  	   
				  
			  	  //*** View Gallery
			  	  $sql = 'SELECT * FROM `d_subsidiaries_related` WHERE `'.$primarykey.'` =\''.$data_primarykey.'\'   ORDER BY gallery_id ASC ';
			  	  $res = mysql_query($sql);
			  	  $num = @mysql_num_rows($res);
			  	  if($num)
			  	  {  $i=0;
				  	  while($row = mysql_fetch_assoc($res))
				  	  {   $gallery_gallery_image[$i] = is_file('../../../upload/thumb_'.$row['gallery_image']) ? '<img src="../../../upload/thumb_'.$row['gallery_image'].'" alt="'.$row['gallery_image'].'"  width="150"  />' : '&nbsp;';
					  	  $gallery_gallery_id[$i] = $row['gallery_id'];
					  	  $gallery_gallery_name[$i] = $option_cat_arr[$row['gallery_name']];
					  	  $gallery_gallery_ismain[$i] = $row['gallery_ismain'] == 1 ? '<span class="label bg-primary">Main Image</span>' : 'N/A'; 
					  	  $gallery_delete_link[$i] = basename(__FILE__).'?action=related&data_primarykey='.$data_primarykey.'&delete_img='.$row['gallery_id'].'&old_mainimage='.$row['gallery_image'].'';
					  	  $gallery_edit_link[$i] = basename(__FILE__).'?action=related&data_primarykey='.$data_primarykey.'&setmain_img='.$row['gallery_id'].'';
					  	  $i++;
				  	  }
				  	  $smarty->assign('gallery', array(
				  	   'gallery_gallery_image' =>  $gallery_gallery_image,
				  	   'gallery_gallery_id' =>  $gallery_gallery_id,
				  	   'gallery_gallery_ismain' =>  $gallery_gallery_ismain,
				  	   'gallery_delete_link' =>  $gallery_delete_link,
				  	   'gallery_edit_link' =>  $gallery_edit_link,
				  	   'gallery_gallery_name' =>  $gallery_gallery_name));
			  	  }
			  	  $smarty->assign('data_gallery_exists' ,  $num); 
					  	  
		  	  } 
		  }
	  } else $msg = "There is no record in our database";

	 
	  $smarty->assign('msg' , $msg); 
	  $smarty->display($tplfile.'_related.tpl');
	break;
	
	
	case "holding" :
	
	 

	  if ((isset($_GET["data_primarykey"])) ) 
	  {   
		  $data_primarykey= intval($_GET["data_primarykey"]);
		  $SQL = "SELECT * FROM ".$maintable." WHERE ".$primarykey." = ".$data_primarykey."   ";
	  	  $RS  = $db->Execute($SQL);	   	  
		  if ($RS->fields[$primarykey] == '')
		  {
			  $msg = "There is no record in our database";
		  }
		  else
		  {
			  if(is_array($RS->fields) && sizeof($RS->fields)>0)
			  {
				  $smarty->assign('mainfieldnamed' 	, $mainfieldnamed);
				  $smarty->assign('data_mainfieldname' 	, $RS->fields[$mainfieldname]);
				  $smarty->assign('data_primarykey' 	, $data_primarykey);
				  foreach($RS->fields as $key => $val)
				  {
					 $smarty->assign('data_'.$key , $val);
				  }
				  if(isset($_POST['submitnew']))
				  {   $data_gallery_image = $_POST['data_gallery_image'];
					  $data_gallery_name = $_POST['data_gallery_name'];
					  
					  if($data_gallery_image == '' )
					  { $errmsg.="Please input Percentage<br>"; }
					  if($data_gallery_name == '' )
					  { $errmsg.="Please input Gallery title<br>"; }
						   
					  if($errmsg == '')
					  {  $sql = 'INSERT INTO  `d_subsidiaries_holding` SET `'.$primarykey.'`=\''.$data_primarykey.'\', `gallery_image`=\''.$data_gallery_image.'\',  `gallery_name`=\''.$data_gallery_name.'\' ;';
						  if(@mysql_query($sql)) {  $errmsg .= 'New holding has been inserted'; }
						  else {  $errmsg .= 'New holding cant been inserted.'; }
					  }
					  $smarty->assign('errmsg' ,  $errmsg); 
				  }
				  
				  //*** Hapus Gallery
				  if(isset($_GET['delete_img']))
			  	  {   
				  	  $sql = 'DELETE FROM `d_subsidiaries_holding`  WHERE gallery_id=\''.intval($_GET['delete_img']).'\' ;';
					  if(@mysql_query($sql)) { $errdelete .= 'Holding has been deleted.'; }
					  $smarty->assign('errdelete' ,  $errdelete); 
			  	  }
			  	  
			  	  if(isset($_GET['setmain_img']))
			  	  {
				  	  $sql = 'UPDATE `d_subsidiaries_holding`  SET gallery_ismain=0 WHERE `'.$primarykey.'` =\''.$data_primarykey.'\'   ;';
					  if(@mysql_query($sql)) { 
						  	$sql = 'UPDATE `d_subsidiaries_holding`  SET gallery_ismain=1 WHERE `'.$primarykey.'` =\''.$data_primarykey.'\'  and gallery_id=\''.intval($_GET['setmain_img']).'\' ;';
					  		if(@mysql_query($sql)) { $errdelete .= 'Gallery has been set to main.'; }
					  }
				  	  
					  $smarty->assign('errdelete' ,  $errdelete); 
			  	  }
				  
			  	  //*** View Gallery
			  	  $sql = 'SELECT * FROM `d_subsidiaries_holding` WHERE `'.$primarykey.'` =\''.$data_primarykey.'\'   ORDER BY gallery_id ASC ';
			  	  $res = mysql_query($sql);
			  	  $num = @mysql_num_rows($res);
			  	  if($num)
			  	  {  $i=0;
				  	  while($row = mysql_fetch_assoc($res))
				  	  {   $gallery_gallery_image[$i] =  $row['gallery_image'] ;
					  	  $gallery_gallery_id[$i] = $row['gallery_id'];
					  	  $gallery_gallery_name[$i] = $row['gallery_name'];
					  	  $gallery_gallery_ismain[$i] = $row['gallery_ismain'] == 1 ? '<span class="label bg-primary">Main Image</span>' : 'N/A'; 
					  	  $gallery_delete_link[$i] = basename(__FILE__).'?action=holding&data_primarykey='.$data_primarykey.'&delete_img='.$row['gallery_id'].'&old_mainimage='.$row['gallery_image'].'';
					  	  $gallery_edit_link[$i] = basename(__FILE__).'?action=holding&data_primarykey='.$data_primarykey.'&setmain_img='.$row['gallery_id'].'';
					  	  $i++;
				  	  }
				  	  $smarty->assign('gallery', array(
				  	   'gallery_gallery_image' =>  $gallery_gallery_image,
				  	   'gallery_gallery_id' =>  $gallery_gallery_id,
				  	   'gallery_gallery_ismain' =>  $gallery_gallery_ismain,
				  	   'gallery_delete_link' =>  $gallery_delete_link,
				  	   'gallery_edit_link' =>  $gallery_edit_link,
				  	   'gallery_gallery_name' =>  $gallery_gallery_name));
			  	  }
			  	  $smarty->assign('data_gallery_exists' ,  $num); 
					  	  
		  	  } 
		  }
	  } else $msg = "There is no record in our database";

	 
	  $smarty->assign('msg' , $msg); 
	  $smarty->display($tplfile.'_holding.tpl');
	break;
	
	
	
	  
	
	 
	
	 
	}
}
?>