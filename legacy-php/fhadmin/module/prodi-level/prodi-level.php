<?php

// bissmillahirahmanirrahiim
// oleh sriyono01@gmail.com dengan rahmat dari allah yang maha mengetahui lagi maha bijaksana


require_once("../../config.inc.php");
require_once("../../back.config.inc.php");
 

$flag_benefit_ssk_ismember = 1;
$flag_benefit_ssk_type = 0;


//my config

$maintable = 'prodi_level';
$primarykey = 'content_id';

$mainfieldname = 'content_name_id';
$mainfieldnamed = 'Level Name (ID)';
$systemname = 'Prodi Level';

$benefit_ssk_type = 3;
$allow_select_branch = 1;
$allowmainimage = false;
$requiremainimage = false;
$imagesize = 1950000;
$thumb_type = 'resize'; // resize || crop
$thumb_crop_type = 'default'; // full || center || default
$imagethumbsize_x = 788;
$imagethumbsize_y = 308;
$best_image_view = '<br />Best view: '.($imagethumbsize_x ).'px - '.($imagethumbsize_y ).'px';
$smarty->assign('best_image_view' ,  $best_image_view);
$smarty->assign('allow_select_branch' ,  $allow_select_branch);





$tplfile = 'bssk';

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
	 
 	
	$option_showhide_val = array(0, 1 );
	$option_showhide_name = array( 'Inactive', 'Active' );
	$arr_showhide_name = array(   1=> 'Active', 0 => 'Inactive');
	$smarty->assign('option_showhide_val' ,$option_showhide_val); 
	$smarty->assign('option_showhide_name' ,$option_showhide_name); 
	
	$option_membertype_val = array(0, 1 );
	$option_membertype_name = $master_member_type; 
	$smarty->assign('option_membertype_val' ,$option_membertype_val); 
	$smarty->assign('option_membertype_name' ,$option_membertype_name); 
	
	
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
	  
	  $data_content_name_en 			= trim($_POST["data_content_name_en"]); 
	  
	   
	  //** validasi image ++/
	  if ($data_content_name_en == "") { $msg.="Please input level name (EN)<br>"; }   
	   
	  
	  //** Kalau inputan valid do the process **//
	  if ($msg=="")
	  {
		  //$data_productdesc = htmlspecialchars(stripslashes($data_productdesc));
		 
		  $encrypted = $crypt->encrypt($data_benefit_ssk_password);
		  
		   if (isset($_POST["insert"])) 
	  	   { 
		  	   $RS = $db   -> Execute('SELECT MAX(list_priority)+1 as value FROM '.$maintable.' ') ;
		  	   $max = $RS->fields;
		  	   $max['value'] = intval($max['value']) == 0 ? 1 : $max['value']; 
		  	   
			   $SQL1 =  "INSERT INTO 	".$maintable."  SET   
			   ".$mainfieldname."=".$db->qstr($data_mainfieldname)." ,
			   content_name_en=".$db->qstr($data_content_name_en)." ,  
			   list_priority=".$db->qstr($max['value'])."
			   ";
			   $db   -> Execute($SQL1); 
			   
			   $logword = 'Add';
			}  else  { 
			    $SQL1 =  "UPDATE ".$maintable." SET	 
			    ".$mainfieldname."=".$db->qstr($data_mainfieldname)." ,
			   content_name_en=".$db->qstr($data_content_name_en)." 
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
	
		$orderfield = ' list_priority ';
		$order = " asc ";
	  if ($search!="") {
		  $mod_Sql = " WHERE 	".$mainfieldname." like '%".$search."%' ";
	  }
	    $SQL = "SELECT 	*
	  	   	    FROM	".$maintable." 
	  	   	     $mod_Sql
			    ORDER BY	" . $orderfield . " " . $order;
	    $RS =$db->Execute($SQL);
	    if ($RS->fields[$primarykey] != "")
	    { $total_jumlah_record = $RS->RecordCount();
   	      $total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	      $teks_parameter = "&action=search&order=".$order."&search=".$search."&orderfield=".$orderfield;
      	  
		  if ($page != 0 ) {
		    if ($page > $total_jumlah_page) $page=$total_jumlah_page; 
    		$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
   	  
	        $SQL = "SELECT 		*
	    	        FROM		".$maintable."
	    	        $mod_Sql
			        ORDER BY	" . $orderfield . " " . $order . " 	  
			        LIMIT		" . (($conf["page"] * $page ) - $conf["page"]) . " , ".$conf["page"];
	        $RS =$db->Execute($SQL);
	  	
	        $i=0;
	        while (!$RS->EOF) {
			  $primarykey_temp[$i] = $RS->fields[$primarykey];
			  
			  $link_p = isset($_GET['page']) ? 'page='.$_GET['page'] : '';
		  	  $link_down = ($RS->fields['list_priority'] < $total_jumlah_record) ? ' <a href="?'.$link_p.'&amp;down='.$RS->fields['list_priority'].'&amp;i='.$RS->fields[$primarykey].'"><img src="../../images/arrow_down.png" alt="down" /></a> ' : '';
	  	      $link_up =  ($RS->fields['list_priority'] > 1) ? '  <a href="?'.$link_p.'&amp;up='.$RS->fields['list_priority'].'&amp;i='.$RS->fields[$primarykey].'"><img src="../../images/arrow_top.png" alt="up" /></a> ' : '';
	  	      $priority = $link_down.$link_up == '' ? 'N/A' : $link_down.' '.$link_up;
	  	      $priority_temp[$i] = $priority;
	  	      
	  	      
	  	      
	  	      $mainfieldname_temp[$i] = $RS->fields[$mainfieldname];
	  	      $benefit_ssk_fullname_temp[$i] = $RS->fields['benefit_ssk_fullname'];
	  	      $gennews_statname_temp[$i] = $arr_showhide_name[$RS->fields['benefit_ssk_status']]; 
	  	      $benefit_ssk_branchname_temp[$i] = $option_branch_arr[$RS->fields['data_branch_id']]; 
	  	      $benefit_ssk_status_temp[$i] = $RS->fields['benefit_ssk_status']; 
	  	      $timestamp_temp[$i] = date("d-m-Y G:i:s" , strtotime($RS->fields['timestamp']));
	  	      
	  	      
	  	      $i++;
	  	      $RS->MoveNext();
	  	    }
	      } else $msg="Sorry there is no record in our database<br>";
	    } else $msg="Sorry there is no record in our database<br>";
	   
	  
	  $smarty->assign('mainfieldnamed' 	, $mainfieldnamed);
	  $smarty->assign('mainfieldname' 	, $mainfieldname);
	  $smarty->assign('view', array(
	  	        'msg' 					=> $msg,
	  	        'page' 					=> $page,
	  	        'order' 				=> $order,
	  	        'orderfield' 			=> $orderfield,
	  	        'search' 				=> $search,
	  	        'action'				=> 'search',
	  	        'pagination' 			=> $pagination,
	  	  		'primarykey_temp' 			=> $primarykey_temp,
	  			'timestamp_temp' 			=> $timestamp_temp,
	  			'priority_temp' 			=> $priority_temp,
	  			'gennews_statname_temp' 			=> $gennews_statname_temp,
	  			'benefit_ssk_fullname_temp' 			=> $benefit_ssk_fullname_temp,
	  			'benefit_ssk_branchname_temp' 			=> $benefit_ssk_branchname_temp,
	  			'benefit_ssk_status_temp' 			=> $benefit_ssk_status_temp,
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
	    
	  $smarty->display($tplfile.'_insert.tpl');
	break;

	case "detail" :
	  if ((isset($_GET["data_primarykey"])) ) 
	  {   
		  $data_primarykey= intval($_GET["data_primarykey"]);
		   $SQL = "SELECT * FROM ".$maintable." WHERE    ".$primarykey." = ".$data_primarykey."   ";
	  	  $RS  = $db->Execute($SQL);	   	  
		  if ($RS->fields[$primarykey] == '') $msg = "There is no record in our database";
	  } else $msg = "There is no record in our database";

	 
	  $smarty->assign('msg' , $msg);
	  if(is_array($RS->fields) && sizeof($RS->fields)>0)
	  {
		  $smarty->assign('mainfieldnamed' 	, $mainfieldnamed);
		  $smarty->assign('data_mainfieldname' 	, $RS->fields[$mainfieldname]);
		  $smarty->assign('data_primarykey' 	, $data_primarykey);
		  $RS->fields["benefit_ssk_password"]	=  $crypt->decrypt($RS->fields["benefit_ssk_password"]);;
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
	  	  
  	  }
	   
	  $smarty->display($tplfile.'_insert.tpl');
	break;
	 
	 
	
	}
}
?>