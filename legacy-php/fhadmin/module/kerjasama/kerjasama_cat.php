<?php

// bissmillahirahmanirrahiim
// oleh sriyono01@gmail.com dengan rahmat dari allah yang maha mengetahui lagi maha bijaksana


require_once("../../config.inc.php");
require_once("../../back.config.inc.php");
 


//my config

$maintable = 'kerjasama_cat';
$primarykey = 'cat_id';

$mainfieldname = 'cat_title';
$mainfieldnamed = 'Category name';
$systemname = 'Category';

$allowmainimage = false;
$requiremainimage = false;
$imagesize = 1950000;
$thumb_type = 'resize'; // resize || crop
$thumb_crop_type = 'default'; // full || center || default
$imagethumbsize_x = 570;
$imagethumbsize_y = 570;
$best_image_view = '<br />Best view: '.($imagethumbsize_x * 2).'px - '.($imagethumbsize_y * 2).'px';


$tplfile = 'category';



function show_select_opt_parent($parent, $selected, $level)
{
	global $maintable, $mainfieldname  ;
	
	if($level == '')
	{
		$ret .= '<option value="0">[Root menu]</option>';
	}
	$sql = 'SELECT * FROM '.$maintable.' WHERE cat_parent=\''.intval($parent).'\'  ORDER BY priority ASC '; 
	$res = mysql_query($sql);
	$num = mysql_num_rows($res); 
	if($num)
	{
		while($row = mysql_fetch_assoc($res))
		{
			$disabled = $row['flexmenu_type'] == 0 ? '' : ' disabled="disabled" ';
			$is_selected = $selected == $row['cat_id'] ? ' selected="selected" ' : '';
			if($row['product_category_type'] == 0)
			{
				$ret .= '<option value="'.$row['cat_id'].'" '.$is_selected.' '.$disabled.'>'. $level. ' ' . $row[$mainfieldname] .'</option>';
			}
			$ret .= show_select_opt_parent($row['cat_id'], $selected, '---'.$level);
			 
		}
	} 
	return $ret;
}
 

function show_listing_menu($parent,  $level)
{
	global $maintable, $mainfieldname, $option_type_name;
	
	$sql = 'SELECT * FROM '.$maintable.' WHERE cat_parent=\''.intval($parent).'\'  ORDER BY priority ASC '; 
	$res = mysql_query($sql);
	$num = mysql_num_rows($res); 
	if($num)
	{
		
		while($row = mysql_fetch_assoc($res))
		{
			$link_down = ($row['priority'] < $num) ? ' <a href="?'.$link_p.'&amp;down='.$row['priority'].'&amp;i='.$row['cat_id'].'&amp;p='.$parent.'"><img src="../../images/arrow_down.png" alt="down" /></a> ' : '';
	  	    $link_up =  ($row['priority'] > 1) ? '  <a href="?'.$link_p.'&amp;up='.$row['priority'].'&amp;i='.$row['cat_id'].'&amp;p='.$parent.'"><img src="../../images/arrow_top.png" alt="up" /></a> ' : '';
	  	      
			$this_priority = $link_down.$link_up == '' ? '--' : $link_down.' '.$link_up;
			
			$color_link =  $row['product_category_color'] == 1 ? '<a href="?action=color&data_primarykey='.$row['cat_id'].'" class="btn btn-default btn-xs  btn-warning" style="margin: 3px;clear: both;"><i class="fa fa-pencil"></i> Color</a>' : '';
				$ret .= '<tr  > 
				<td>
				'. $level. ' ' . $row[$mainfieldname] .' 
				</td>
				 
				<td class="text-center">'.$this_priority.'</td>
				<td class="text-center"><a href="?action=detail&data_primarykey='.$row['cat_id'].'" class="btn btn-default btn-xs btn-rounded btn-info"><i class="fa fa-pencil"></i> Edit</a></td>
				<td align=center><a href="?action=delete&amp;data_primarykey='.$row['cat_id'].'&amp;parent='.$parent.'"  onClick="return confirm(\'Are you sure want to delete this content?\');"  class="btn btn-default btn-xs btn-rounded btn-danger">Delete</a></td>
				';
			 
			
			$ret .= show_listing_menu($row['cat_id'],  '---'.$level);
			 
		}
	} 
	return $ret;
	
}

function check_for_child($parent)
{
	global $maintable;
	
	$sql = 'SELECT * FROM '.$maintable.' WHERE cat_parent=\''.intval($parent).'\'  ORDER BY priority ASC '; 
	$res = mysql_query($sql);
	$num = mysql_num_rows($res); 
	if($num)
	{
		return true;
	}
	return false;
}

function check_for_parent($id, $parent)
{
	global $maintable, $mainfieldname;
	
	if($id == $parent)
	{
		return true;
	}
	else
	{
		$sql = 'SELECT * FROM '.$maintable.' WHERE cat_parent=\''.intval($id).'\'  ORDER BY priority ASC '; 
		$res = mysql_query($sql);
		$num = mysql_num_rows($res); 
		if($num)
		{
			while($row = mysql_fetch_assoc($res))
			{
				if($row['cat_id'] == $parent)
				{
					return true;
				}
				return check_for_parent($row['cat_id'], $parent);
			}
		}
	}
	return false;
}

function get_parent_name($id, $pad='')
{
	global $maintable;
	
	$sql = 'SELECT * FROM '.$maintable.' WHERE cat_id=\''.intval($id).'\'   '; 
	$res = mysql_query($sql);
	$num = mysql_num_rows($res); 
	if($num)
	{
		while($row = mysql_fetch_assoc($res))
		{
			$ret .= get_parent_name($row['cat_parent'], ' -> ');
			$ret .= $row[$mainfieldname]. $pad; 
		}
	}
	$ret = $pad == '' ? '('.$ret.')' : $ret ;
	return $ret;
}
  
//***************************** Security ACCESS LEVEL *************************/
$akses_level_page = access_level_page($fh_usergroupid, $db);

if ($fh_userid && $akses_level_page)
{	
	
	if(isset($_GET['up']) && isset($_GET['i']) &&  isset($_GET['p']) )
	{
		$sql =  'UPDATE '.$maintable.' SET	  priority='.intval($_GET['up']).'  WHERE priority=('.intval($_GET['up']).'-1)  AND cat_parent='.intval($_GET['p']).' ';
		@mysql_query($sql);
		$sql =  "UPDATE ".$maintable." SET	  priority=(priority)-1  WHERE ".$primarykey." = ".intval($_GET['i'])."  AND cat_parent=".intval($_GET['p'])." ";
		@mysql_query($sql);
	}
	if(isset($_GET['down']) && isset($_GET['i']) &&  isset($_GET['p']))
	{
		$sql =  "UPDATE ".$maintable." SET	  priority=".intval($_GET['down'])."  WHERE priority=(".intval($_GET['down'])."+1) AND cat_parent=".intval($_GET['p'])." ";
		@mysql_query($sql);
		$sql =  "UPDATE ".$maintable." SET	  priority=(priority)+1  WHERE ".$primarykey." = ".intval($_GET['i'])."  AND cat_parent=".intval($_GET['p'])." ";
		@mysql_query($sql);
	}
	
	
	if (  $action  == 'delete') 
	{  
		$delete_id= intval($_GET["data_primarykey"]);
	     
		$RS  = $db->Execute("SELECT * FROM ".$maintable." WHERE ".$primarykey." = ".$delete_id);
		   
		if ($RS->fields[$primarykey] != '')
		{  
		    if(!check_for_child($delete_id))
		    {
				$db->Execute("INSERT INTO fh_userlog (fh_userid, fh_usergroupid, fh_pagetitle, fh_action, fh_description, fh_date) VALUES (".$fh_userid." , ".$fh_usergroupid." , '".$systemname." System' , 'Delete' , 'Delete ".$systemname." : ".$RS->fields[$mainfieldname].", id : ".$RS->fields[$primarykey]."' , now())");
				$db->Execute("DELETE FROM ".$maintable." WHERE ".$primarykey." = ".$delete_id);
				 
				 	 
				$smarty->assign('error_delete' ,  'Category has been deleted.<br /><br />'); 
				$db->Execute("UPDATE ".$maintable."  SET priority=(priority)-1 WHERE priority >= ".$RS->fields['priority']."  AND cat_parent=".intval($_GET['parent'])." ORDER BY priority ASC ");
			          
	        }
			else
			{
				$smarty->assign('error_delete' ,  'This Category have some child. please delete the child first.<br /><br />');
		         	 
	        }

		}   
	    $action="view";	
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
	
	$option_type_name = enum('product_category.product_category_type');  
	$smarty->assign('option_type_name' ,$option_type_name);  
	
	$sql = 'SELECT * FROM `product_category` where  `product_category_type`=\'Parent\' order by product_category_name_id ASC;'; 
	$RS  = $db->Execute($sql);
	if ($RS->fields['cat_id'] != "")
	{   $i=0;
		while (!$RS->EOF) 
		{ 
			$option_category_val[$i] = $RS->fields['cat_id'];
			$option_category_name[$i] = $RS->fields['product_category_name_id'];
			$option_category_arr[$RS->fields['cat_id']] = $RS->fields['product_category_name_id'];
			$i++;
			$RS->MoveNext();
		}
	}
	$smarty->assign('option_category_val' ,  $option_category_val);
	$smarty->assign('option_category_name' ,  $option_category_name);
	
	//****************************  Proses Insert ataupun Edit ***************//
	if ((isset($_POST["insert"])) || (isset($_POST["edit"])))
	{ 
		
	  if (isset($_POST["edit"]))
	  {
		  $data_primarykey = intval($_POST["data_primarykey"]);
	  } 
	  $data_cat_parent =  intval($_POST["data_cat_parent"]) ;
	  $data_mainfieldname = $_POST["data_mainfieldname"]; 
	  $data_cat_title_en = $_POST["data_cat_title_en"];
	  
	  if ($data_cat_parent < 0  )
	  {
		  $msg.="Please input parent category<br>";
	  }
	  
	  if ($data_mainfieldname == "") { $msg.="Please input ".$mainfieldnamed."<br>"; }
	  $mainimagename		= '';
	  if($allowmainimage === true)
	  {
		  $data_mainimage 		= $_FILES["data_mainimage"];
		  $old_mainimagename 	= isset( $_POST["old_mainimagename"] ) ? $_POST["old_mainimagename"] : false;
		  if ($data_mainimage['name'] == "" && !isset($_POST["edit"]) && $requiremainimage === true) { $msg.="Please input Image<br>";}
	  }
	  
	  
	  //** Ambil semua inputan user **/ 
	  //$data_product_category_color = trim($_POST['data_product_category_color']) == 1 ? 1 : 0;
	  
	  //** Validasi inputan user **// 
	  //if ($data_cat_title_en == "") { $msg.="Please input short name<br>"; }
	  
	   
	  
	  
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
		  	   $priority = @mysql_fetch_assoc(mysql_query('SELECT MAX(priority)+1 as value FROM '.$maintable.' WHERE cat_parent=\''.  $data_cat_parent .'\' '));
			   $priority['value'] = intval($priority['value']) == 0 ? 1 : $priority['value'];
		  	   
			   $SQL1 =  "INSERT INTO 	".$maintable."  SET   
			   ".$mainfieldname."=".$db->qstr($data_mainfieldname)." , 
			   cat_title_en=".$db->qstr($data_cat_title_en)." , 
			   cat_parent=".$db->qstr($data_cat_parent)." ,
			   status='Show', 
			   priority=".$priority['value']."
			    ";
			   $db   -> Execute($SQL1);
			   
			   
			   $logword = 'Add';
			}  else  {
				$old_cat_parent = intval($_POST['old_cat_parent']);
				$old_priority = intval($_POST['old_priority']);
				if($old_cat_parent != $data_cat_parent)
				{
					$priority = @mysql_fetch_assoc(mysql_query('SELECT MAX(priority)+1 as value FROM '.$maintable.' WHERE cat_parent=\''.  $data_cat_parent .'\' '));
			   		$priority['value'] = intval($priority['value']) == 0 ? 1 : $priority['value'];
			   		
			   		$SQL1 =  "UPDATE ".$maintable." SET	 
				    ".$mainfieldname."=".$db->qstr($data_mainfieldname)." , 
			   		cat_title_en=".$db->qstr($data_cat_title_en)." , 
			   		cat_parent=".$db->qstr($data_cat_parent)."  , 
			   		priority=".$priority['value']."
				    WHERE ".$primarykey." = ".$data_primarykey;
					$db   -> Execute($SQL1);
					
					$db->Execute("UPDATE ".$maintable."  SET priority=(priority)-1 WHERE priority >= ".$old_priority."  AND cat_parent=".intval($old_cat_parent)." ORDER BY priority ASC ");
					
				}
				else
				{
				    $SQL1 =  "UPDATE ".$maintable." SET	 
				    ".$mainfieldname."=".$db->qstr($data_mainfieldname)." , 
			   		cat_title_en=".$db->qstr($data_cat_title_en)." , 
			   		cat_parent=".$db->qstr($data_cat_parent)."  
				    WHERE ".$primarykey." = ".$data_primarykey;
					$db   -> Execute($SQL1);
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
	 
	 
	//********************************* Seting Header ************************//
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('systemname' , $systemname);$smarty->assign('title' , $systemname); 
	$smarty->assign('mainfieldnamed' , $mainfieldnamed); 
	//$smarty->display('the_header.tpl');
	
	
	
	
	//****************************** MAIN CODE *******************************//
	switch ($action){
	case "view" :
	  $show_listing_menu = show_listing_menu(0,  ''); 
	  $smarty->assign('show_listing_menu' 	, $show_listing_menu);
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
	  	  
	  	  $show_select_opt_parent = show_select_opt_parent(0, $RS->fields["cat_parent"], '');
		  $smarty->assign('show_select_opt_parent' , $show_select_opt_parent); 
	  	  
  	  }
	   
	  $smarty->display($tplfile.'_insert.tpl');
	break;
	 
	
	}
}
?>