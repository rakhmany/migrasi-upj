<?php

// bissmillahirahmanirrahiim
// oleh sriyono01@gmail.com dengan rahmat dari allah yang maha mengetahui lagi maha bijaksana

ini_set('memory_limit', '512M');

require_once("../../config.inc.php");
require_once("../../back.config.inc.php");
 


//my config

$maintable = 'd_rilismain';
$primarykey = 'd_content_id';

$mainfieldname = 'd_content_title_id';
$mainfieldnamed = 'Title';
$systemname = 'Rilis Perusahaan';

$allowmainimage = false;
$requiremainimage = false;
$imagesize = 1950000;
$thumb_type = 'resize'; // resize || crop
$thumb_crop_type = 'default'; // full || center || default
$imagethumbsize_x = 150;
$imagethumbsize_y = 80;
$best_image_view = '<br />Best view: '.($imagethumbsize_x ).'px - '.($imagethumbsize_y ).'px';
$smarty->assign('best_image_view' ,  $best_image_view);

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
	
	$option_upcoming_val = array(0, 1); 
	$arr_upcoming_name = array( 0=> 'No', 1 => 'Ucoming');
	$smarty->assign('option_upcoming_val' ,$option_upcoming_val); 
	$smarty->assign('arr_upcoming_name' ,$arr_upcoming_name); 
	
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
	  if ($data_mainfieldname == "") { $msg.="Please input ".$mainfieldnamed."<br>"; }
	   
	  
	  //** Ambil semua inputan user **/  
	  $data_d_content_shortdesc_id 		= trim($_POST["data_d_content_shortdesc_id"]);
	  $data_d_content_shortdesc_en 		= trim($_POST["data_d_content_shortdesc_en"]);
	  $data_d_content_longdesc_id 			= trim($_POST["data_d_content_longdesc_id"]);
	  $data_d_content_title_en 				= trim($_POST["data_d_content_title_en"]);
	  $data_d_content_normalprice 			= intval($_POST["data_d_content_normalprice"]); 
	  $data_d_content_discountprice 			= intval($_POST["data_d_content_discountprice"]); 
	  $data_d_content_gallerytype 		= intval($_POST["data_d_content_gallerytype"]); 
	  $data_d_content_longdesc_en 		= trim($_POST["data_d_content_longdesc_en"]); 
	  $data_d_content_status 			= trim($_POST["data_d_content_status"]) == 1 ? 1 : 0;   
	  $data_d_content_stock 			= trim($_POST["data_d_content_stock"]);   
	  
	  $data_d_content_weight 			= trim($_POST["data_d_content_weight"]);   
	  $data_d_content_lebar 			= trim($_POST["data_d_content_lebar"]);   
	  $data_d_content_panjang 			= trim($_POST["data_d_content_panjang"]);   
	  $data_d_content_tinggi 			= trim($_POST["data_d_content_tinggi"]);   
	  $data_d_content_material 			= trim($_POST["data_d_content_material"]);   
	  $data_d_content_color 			= trim($_POST["data_d_content_color"]);   
	  $data_d_content_perbox 			= trim($_POST["data_d_content_perbox"]);   
	  $data_d_content_application 			= trim($_POST["data_d_content_application"]);   
	  $data_priority 					= intval($_POST["data_priority"]);   
	  
	  $data_d_content_year 			= trim($_POST["data_d_content_year"]); 
	  $data_d_content_upcoming	= trim($_POST["data_d_content_upcoming"]) == 1 ? 1 : 0;   
	  
	   
	  if($data_d_content_normalprice < 1)
	  {
		 // $msg.="Please input normal price<br>";
	  }
	  if($data_d_content_discountprice < 1)
	  {
		  //$msg.="Please input member price<br>";
	  }
	  if($data_d_content_gallerytype != 0 && $data_d_content_gallerytype != 1)
	  {
		  $msg.="Please input gallery type<br>";
	  }
	  if($data_d_content_weight < 1)
	  {
		  //$msg.="Please input weight<br>";
	  }
	  //** validasi image ++/
	  $data_mainimage 				= $_FILES["data_mainimage"];
	  $old_mainimagename 			= trim($_POST["old_mainimagename"]);
	  if ($data_mainimage['name'] == "" && $old_mainimagename == "" && $requiremainimage === true && $data_d_content_gallerytype == 0 ) { $msg.="Please input Image<br>";}
	    
	  if($data_d_content_gallerytype == 1 && empty($data_d_content_video) )
	  {
		  $msg.="Please input video url<br>";
		  
	  }
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
		  	   $sql =  'UPDATE '.$maintable.' SET	  priority=(priority)+1    ';
			   @mysql_query($sql); 
			   
			   $SQL1 =  "INSERT INTO 	".$maintable."  SET  
			   d_content_lastupdate = '".date('Y-m-d H:i:s')."',
			   d_content_year='".mysql_real_escape_string($data_d_content_year)."',  
			   ".$mainfieldname."='".mysql_real_escape_string($data_mainfieldname)."',  
			   d_content_title_en='".mysql_real_escape_string($data_d_content_title_en)."',    
			   mainimagename='".mysql_real_escape_string($mainimagename)."',   
			   d_content_status='".mysql_real_escape_string($data_d_content_status)."',   
			   d_content_upcoming='".mysql_real_escape_string($data_d_content_upcoming)."',   
			   priority=1  ";
			   $db   -> Execute($SQL1); 
			   
			   $logword = 'Add';
			}  else  { 
			    $SQL1 =  "UPDATE ".$maintable." SET	 
			   d_content_lastupdate = '".date('Y-m-d H:i:s')."',
			   d_content_year='".mysql_real_escape_string($data_d_content_year)."',  
			    ".$mainfieldname."='".mysql_real_escape_string($data_mainfieldname)."', 
			   d_content_status='".mysql_real_escape_string($data_d_content_status)."',   
			   d_content_upcoming='".mysql_real_escape_string($data_d_content_upcoming)."',   
			   d_content_title_en='".mysql_real_escape_string($data_d_content_title_en)."' 
			   WHERE ".$primarykey." = ".$data_primarykey;
				$db   -> Execute($SQL1);
				
			   if($data_priority != $_POST['data_old_priority'] )
		  	   {
			  	    $data_old_priority = intval($_POST['data_old_priority']);
			  	    $sql =  'UPDATE '.$maintable.' SET	  priority=(priority)-1  WHERE priority > '.intval($data_old_priority).'   ';
					@mysql_query($sql); 
					$sql =  'UPDATE '.$maintable.' SET	  priority=(priority)+1  WHERE priority > '.intval($data_priority-1).'   ';
					@mysql_query($sql); 
					$sql =  'UPDATE '.$maintable.' SET	  priority='.$data_priority.'  WHERE '.$primarykey.' = '.$data_primarykey.'  ';
					@mysql_query($sql);  
					
		  	   }
		  	   if($data_d_content_upcoming == 1)
		  	   {
			  	   $sql =  'UPDATE '.$maintable.' SET	  d_content_upcoming=0  WHERE '.$primarykey.' != '.$data_primarykey.'    ';
					@mysql_query($sql); 
		  	   }
		    
				
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
		         $db->Execute("UPDATE ".$maintable."  SET priority=(priority)-1 WHERE priority >= ".$RS->fields['priority']."  ORDER BY priority ASC ");
			     if($allowmainimage === true && isset($RS->fields['mainimagename']) && $RS->fields['mainimagename'] != '')
				 {
			   		if(file_exists('../../../upload/'.$RS->fields['mainimagename'])) { @unlink('../../../upload/'.$RS->fields['mainimagename']);}
			   		if( file_exists('../../../upload/thumb_'.$RS->fields['mainimagename']) ) {@unlink('../../../upload/thumb_'.$RS->fields['mainimagename']);}
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
	  	      $d_content_year_temp[$i] =  $RS->fields['d_content_year']; 
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
	  			'd_content_year_temp' 			=> $d_content_year_temp,
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
	  	  }
	  	  
	  	  $show_select_opt_parent = show_select_opt_parent(0, $RS->fields["d_content_gallerytype"], '');
		  $smarty->assign('show_select_opt_parent' , $show_select_opt_parent); 
	  	  
  	  }
	   
	  $smarty->display($tplfile.'_insert.tpl');
	break;
	  
	case "gallery" :
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
				  if(isset($_POST['submitnew']) || isset($_POST['submitedit']) )
				  { 
					  if(isset($_POST['submitedit']))
					  {
						  $edit_id = $_POST['edit_id'];
					  }
					  
					  $data_gallery_image = $_FILES['data_gallery_image'];
					  $old_mainimagename 			= trim($_POST["old_mainimagename"]);
					  
					  $data_gallery_image2 = $_FILES['data_gallery_image2'];
					  $old_mainimagename2 			= trim($_POST["old_mainimagename2"]);
					  
					  
					  $data_gallery_name_id = $_POST['data_gallery_name_id'];
					  $data_gallery_name_en = $_POST['data_gallery_name_en'];
					  
					  if($data_gallery_image["name"] == '' &&  $old_mainimagename == '')
					  { $errmsg.="Please input PDF (EN)<br>"; }
					  if($data_gallery_image2["name"] == '' &&  $old_mainimagename2 == '')
					  { $errmsg.="Please input PDF (ID)<br>"; }
					  
					 if($data_gallery_name_id == '' || $data_gallery_name_en == '')
					  { $errmsg.="Please input content title<br>"; }
						  
					  if( isset($data_gallery_image["name"]) && $data_gallery_image['name'] !='')
					  {   $handle = new Upload($data_gallery_image);
		                  $handle->allowed            = array('application/pdf'); 
					        if ($handle->uploaded) { 
					            $handle->Process("../../../upload/");
					            if ($handle->processed) {
					                
					                $mainimagename     = $handle->file_dst_name; 
					            } else {
					                
					                $errmsg = $handle->error;
					                $handle->clean();
					            } 
					            $handle->clean();
					        } else { 
					            $errmsg = $handle->error;
					        }
				        }
				        else
						{
							  $mainimagename = !empty($old_mainimagename) ? $old_mainimagename : '';
						}   
					    if( isset($data_gallery_image2["name"]) && $data_gallery_image2['name'] !='')
					  {   $handle = new Upload($data_gallery_image2);
		                  $handle->allowed            = array('application/pdf'); 
					        if ($handle->uploaded) { 
					            $handle->Process("../../../upload/");
					            if ($handle->processed) {
					                
					                $mainimagename2     = $handle->file_dst_name; 
					            } else {
					                
					                $errmsg = $handle->error;
					                $handle->clean();
					            } 
					            $handle->clean();
					        } else { 
					            $errmsg = $handle->error;
					        }
				        }
				        else
						{
							  $mainimagename2 = !empty($old_mainimagename2) ? $old_mainimagename2 : '';
						}  
					  if($mainimagename != '')
					  {
					  	  if(file_exists("../../../upload/".$mainimagename) )
						  {
							  $oldimage = '<div class="row"> 
				                          <div class="form-group">
				                        <label class="col-sm-2 control-label">&nbsp;</label>
				                        <div class="col-sm-6"><BR />
				                        <a href="../../../upload/'.$mainimagename.'" target="_blank">'.$mainimagename.'</a> <input type="hidden" name="old_mainimagename" value="'.$mainimagename.'" />
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
				                        <a href="../../../upload/'.$mainimagename2.'" target="_blank">'.$mainimagename2.'</a> <input type="hidden" name="old_mainimagename2" value="'.$mainimagename2.'" />
				                        </div> 
				                        </div></div>';
							   
						  }  
						  $smarty->assign('oldimage2' 	, $oldimage2);
				  	  }
				  	  
					  if($errmsg == '')
					  {
						  if(isset($_POST['submitedit']))
						  {
							  $sql = 'UPDATE  `d_rilispdf` SET `'.$primarykey.'`=\''.$data_primarykey.'\', `gallery_pdf`=\''.$mainimagename.'\', `gallery_pdf2`=\''.$mainimagename2.'\',  `gallery_name_id`=\''.$data_gallery_name_id.'\',   `gallery_name_en`=\''.$data_gallery_name_en.'\'
							  WHERE gallery_id=\''.$edit_id.'\'  ;';
							  if(@mysql_query($sql)) {  $errmsg .= 'PDF has been updated'; }
							  else {  $errmsg .= 'PDF cant been updated.'; }
						  }
						  else
						  {
							  $sql = 'INSERT INTO  `d_rilispdf` SET `'.$primarykey.'`=\''.$data_primarykey.'\', `gallery_pdf`=\''.$mainimagename.'\', `gallery_pdf2`=\''.$mainimagename2.'\',  `gallery_name_id`=\''.$data_gallery_name_id.'\',   `gallery_name_en`=\''.$data_gallery_name_en.'\'  ;';
							  if(@mysql_query($sql)) {  $errmsg .= 'PDF has been inserted'; }
							  else {  $errmsg .= 'PDF cant been inserted.'; }
						  }
						  
						  $fetchURL 	=  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
						  $_SESSION['flash_msg'] = $errmsg;
						  header('location: '.$fetchURL .'');
						  die();
							  
					  }
					  $smarty->assign('errmsg' ,  $errmsg); 
				  }
				  if(isset($_SESSION['flash_msg']))
				  {
					   $smarty->assign('errmsg' ,  $_SESSION['flash_msg']); 
					  unset($_SESSION['flash_msg']);
				  }
				  //*** Hapus Gallery
				  if(isset($_GET['delete_img']))
			  	  {  $old_mainimage = $_GET['old_mainimage'];
				  	  if(is_file("../../../upload/".$old_mainimage)) { @unlink("../../../upload/".$old_mainimage); }
				  	  $sql = 'DELETE FROM `d_rilispdf`  WHERE gallery_id=\''.intval($_GET['delete_img']).'\' ;';
					  if(@mysql_query($sql)) { $errdelete .= 'Gallery has been deleted.'; }
					  $smarty->assign('errdelete' ,  $errdelete); 
			  	  }
			  	  
			  	  if(isset($_GET['edit_img']))
			  	  {   
				  	  $sql = 'SELECT * FROM `d_rilispdf`  WHERE gallery_id=\''.intval($_GET['edit_img']).'\' ;';
					  $res = mysql_query($sql);
				  	  $num = @mysql_num_rows($res);
				  	  if($num)
				  	  {
					  	  $row = mysql_fetch_assoc($res);
					  	  $smarty->assign('edit_mode' ,  1);
						  $smarty->assign('edit_id' ,  $row['gallery_id']);  
						  $data_gallery_image = $row['gallery_pdf']; 
						  $data_gallery_name_id = $row['gallery_name_id'];
						  $data_gallery_name_en = $row['gallery_name_en'];
						  $data_gallery_name_en = $row['gallery_name_en'];
						  
						  $mainimagename = $row['gallery_pdf'];
						  if($mainimagename != '')
						  {
						  	  if(file_exists("../../../upload/".$mainimagename) )
							  {
								  $oldimage = '<div class="row"> 
					                          <div class="form-group">
					                        <label class="col-sm-2 control-label">&nbsp;</label>
					                        <div class="col-sm-6"><BR />
					                        <a href="../../../upload/'.$mainimagename.'" target="_blank">'.$mainimagename.'</a> <input type="hidden" name="old_mainimagename" value="'.$mainimagename.'" />
					                        </div> 
					                        </div></div>';
								   
							  }  
							  $smarty->assign('oldimage' 	, $oldimage);
					  	  }
					  	  
					  	  $mainimagename2 = $row['gallery_pdf2'];
						  if($mainimagename2 != '')
						  {
						  	  if(file_exists("../../../upload/".$mainimagename2) )
							  {
								  $oldimage2 = '<div class="row"> 
					                          <div class="form-group">
					                        <label class="col-sm-2 control-label">&nbsp;</label>
					                        <div class="col-sm-6"><BR />
					                        <a href="../../../upload/'.$mainimagename2.'" target="_blank">'.$mainimagename2.'</a> <input type="hidden" name="old_mainimagename2" value="'.$mainimagename2.'" />
					                        </div> 
					                        </div></div>';
								   
							  }  
							  $smarty->assign('oldimage2' 	, $oldimage2);
					  	  }
				  	   
					  }
					  
			  	  }
			  	  $smarty->assign('data_gallery_image' ,  $data_gallery_image);  
			  	  $smarty->assign('data_gallery_image2' ,  $data_gallery_image2);  
			  	  $smarty->assign('data_gallery_name_id' ,  $data_gallery_name_id); 
			  	  $smarty->assign('data_gallery_name_en' ,  $data_gallery_name_en); 
				  
			  	  //*** View Gallery
			  	  $sql = 'SELECT * FROM `d_rilispdf` WHERE `'.$primarykey.'` =\''.$data_primarykey.'\'   ORDER BY gallery_id ASC ';
			  	  $res = mysql_query($sql);
			  	  $num = @mysql_num_rows($res);
			  	  if($num)
			  	  {  $i=0;
				  	  while($row = mysql_fetch_assoc($res))
				  	  {   $gallery_gallery_pdf[$i] = is_file('../../../upload/'.$row['gallery_pdf']) ? '<a href="../../../upload/'.$row['gallery_pdf'].'" alt="'.$row['gallery_pdf'].'"   >'.$row['gallery_pdf'].'</a>' : '&nbsp;';
					  	  $gallery_gallery_id[$i] = $row['gallery_id'];
					  	  $gallery_gallery_name_id[$i] = $row['gallery_name_id'];
					  	  $gallery_gallery_ismain[$i] = $row['gallery_ismain'] == 1 ? '<span class="label bg-primary">Main Image</span>' : 'N/A'; 
					  	  $gallery_delete_link[$i] = basename(__FILE__).'?action=gallery&data_primarykey='.$data_primarykey.'&delete_img='.$row['gallery_id'].'&old_mainimage='.$row['gallery_image'].'';
					  	  $gallery_edit_link[$i] = basename(__FILE__).'?action=gallery&data_primarykey='.$data_primarykey.'&edit_img='.$row['gallery_id'].'';
					  	  $i++;
				  	  }
				  	  $smarty->assign('gallery', array(
				  	   'gallery_gallery_pdf' =>  $gallery_gallery_pdf,
				  	   'gallery_gallery_id' =>  $gallery_gallery_id,
				  	   'gallery_gallery_ismain' =>  $gallery_gallery_ismain,
				  	   'gallery_delete_link' =>  $gallery_delete_link,
				  	   'gallery_edit_link' =>  $gallery_edit_link,
				  	   'gallery_gallery_name_id' =>  $gallery_gallery_name_id));
			  	  }
			  	  $smarty->assign('data_gallery_exists' ,  $num); 
					  	  
		  	  } 
		  }
	  } else $msg = "There is no record in our database";

	 
	  $smarty->assign('msg' , $msg); 
	  $smarty->display($tplfile.'_gallery.tpl');
	break;
	 
	
	 
	}
}
?>