<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 13 April 2008
  * @copyright by FaberHost.com

  * Tabel Terkait adalah :
  * Tabel User dan Tabel Group
 
*************************************/
 
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");
//***************************** Security ACCESS LEVEL *************************/
$akses_level_page = access_level_page($fh_usergroupid, $db);
$access_level_type = access_level_type($fh_usergroupid, $db); //** by: Bambang Riswanto at 2013

if ($fh_userid && $akses_level_page)
{	/***************************** seting orderfield **************************/
	if (!(isset($_GET["orderfield"])))  $orderfield="fh_userid";
	else 
	{ //*** Disesuaikan dengan field tabel terkait
	  $orderfield=$_GET["orderfield"];
	  if (!((($orderfield=="fh_username")) ||  (($orderfield=="fh_name")) || (($orderfield=="fh_logindate")) || (($orderfield=="fh_usergroupid")))) $orderfield="fh_userid"; 
	}
	$teks_parameter = "";
		
	//****************************  Proses Insert ataupun Edit ***************//
	if ((isset($_POST["insert"])) || (isset($_POST["edit"])))
	{ if (isset($_POST["edit"])) $data_fh_userid = trim($_POST["data_fh_userid"]);
	
	// error_reporting(E_ALL);
// 	$db->debug = true;
	  //** Ambil semua inputan user **/
	  $data_fh_username = trim($_POST["data_fh_username"]);
	  $data_fh_password	= $_POST["data_fh_password"];
	  $data_fh_usergroupid = $_POST["data_fh_usergroupid"];
	  $data_fh_name = $_POST["data_fh_name"];
	  $data_fh_address = $_POST["data_fh_address"];
	  $data_fh_email = $_POST["data_fh_email"];
	  $data_fh_phone = $_POST["data_fh_phone"];
	  $data_fh_mobile = $_POST["data_fh_mobile"];
		     	    
	  //** Validasi inputan user **//
	  if ($data_fh_username=="") { $msg.="Please input Username<br>"; } 
	  else {
	     if (isset($_POST["insert"]))  {
		     $SQL = "SELECT 	    *
                     FROM		    fh_user
                     WHERE			fh_username='".trim($data_fh_username)."'";
			 $RS  = $db->Execute($SQL);
			 if ($RS->fields["fh_usergroupid"]!= "") $msg.="Username is already used. Please use another Username<br>";
		 }
	  }
	  if ($data_fh_password == "") { $msg.="Please input Password<br>"; }
	  
	  if ($data_fh_name == "") { $msg.="Please input Name<br>"; }
	  else { if (!(check_name($data_fh_name))) $msg.="Invalid Name<br>"; }
	  
	  if ($data_fh_email == "") { $msg.="Please input Email Address<br>"; }
	  else { if (!(check_email($data_fh_email))) $msg.="Invalid email address<br>"; }
	  

	  //** Kalau inputan valid do the process **//
	  if ($msg=="")
	  { $encrypted = $crypt->encrypt($data_fh_password);
	  
        if (isset($_POST["insert"])) 
	  	{  
		   if (!$access_level_type->add) akses_level_die();
		   $SQL1 =  "INSERT INTO 	fh_user 
					 SET			fh_usergroupid = '".$data_fh_usergroupid."', 
									fh_username = '".$data_fh_username."', 
									fh_password = '".$encrypted."', 
									fh_name = '".$data_fh_name."', 
									fh_address = '".$data_fh_address."', 
									fh_email = '".$data_fh_email."', 
									fh_phone = '".$data_fh_phone."', 
									fh_mobile = '".$data_fh_mobile."', 
									fh_date = now(), 
									fh_logindate = now(), 
									fh_status = 0";
		   $db->Execute($SQL1);
		  // var_dump($SQL1);
		  // die;
		   
		   insert_log ('Add', 'User Admin' , 'Add User Admin = '.$data_fh_username );
		   
		   //*** Email UserPaswword
           $tmp_tujuan = $data_fh_email;
           $tmp_judul = "[".$conf["project_name"]."] LOGIN Information";
           $tmp_pengirim  = "From: Administrator ".$conf["project_name"]." <no-reply@no-reply.com>\r\n";
           $tmp_pengirim .= "MIME-Version: 1.0\r\n";
           $tmp_pengirim .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";
           $tmp_pengirim .= "Content-Transfer-Encoding: 7bit\r\n";
           $tmp_isi = "Login Information  \n\n";
           $tmp_isi .= "Name = ".$data_fh_name."\n";
           $tmp_isi .= "Username = ".$data_fh_username."\n";
           $tmp_isi .= "Password = ".$data_fh_password."\n";
           $tmp_isi .= "URL = ".$conf["project_url"]."\n\n";
           $tmp_isi .= "Terimakasih  \n";
           $tmp_isi .= "Administrator .".$conf["project_name"]."  \n";
           @mail($tmp_tujuan,$tmp_judul,$tmp_isi,$tmp_pengirim);    
           
		 

		} else  {  
		   if (!$access_level_type->edit) akses_level_die();
		   $SQL1 =  "UPDATE		fh_user 
                    SET			fh_usergroupid = ".$data_fh_usergroupid.", 
								fh_password='".$encrypted."', 
								fh_name='".$data_fh_name."', 
								fh_address='".$data_fh_address."', 
								fh_email='".$data_fh_email."', 
								fh_phone='".$data_fh_phone."', 
								fh_mobile='".$data_fh_mobile."'
                    WHERE		fh_userid = ".$data_fh_userid;
		  $db->Execute($SQL1);
		  insert_log ('Edit', 'User Admin' , 'Edit User Admin = '.$data_fh_username );
		} 
		$action="view";			  	  
	  } else { (isset($_POST["insert"])) ? $action="insert" : $action="detail"; }
	}
	
	//***************************************  Proses Delete *****************//
	if (isset($_POST["del"])) 
	{  
	   if (!$access_level_type->delete) akses_level_die();
	   $delete=$_POST["delete"];
	   for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 		*
                 FROM			fh_user
                 WHERE			fh_userid = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["fh_userid"] != '')
		 { insert_log ('Delete', 'User Admin' , 'Delete User Admin = '.$RS->fields["fh_username"].", UserId = ".$RS->fields["fh_userid"] );
	       $SQL1 = "DELETE FROM		fh_user
                    WHERE			fh_userid = ".$delete[$i];
	       $RS1  = $db->Execute($SQL1);
		  }   
	   }
	}
	 
	//********************************* Seting Header ************************//
    $SQL = "SELECT      *
            FROM        fh_usergroup";
    $RS = $db->Execute($SQL);
    $i=0;
    while (!$RS->EOF) {
        $search_fh_usergroupid[$i] = $RS->fields["fh_usergroupid"];
        $search_fh_usergroupname[$i] = $RS->fields["fh_usergroupname"];
        $i++;
        $RS->MoveNext();
    }             
	
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
  	$smarty->assign('title' , 'Master User Admin'); 
  	$smarty->assign('title_search' , 'User Admin');
  	$smarty->assign('search_fh_usergroupid' , $search_fh_usergroupid); 
  	$smarty->assign('search_fh_usergroupname' , $search_fh_usergroupname); 
  	// $smarty->display('useradminheader.tpl');
	

	//****************************** MAIN CODE *******************************//
	switch ($action){
	case "view"   :

	  switch ($orderfield) {
        case "fh_userid" : $tmp_orderfield = "U.fh_userid"; break;
        case "fh_username" : $tmp_orderfield = "U.fh_username"; break;
        case "fh_name" : $tmp_orderfield = "U.fh_name"; break;
        case "fh_logindate" : $tmp_orderfield = "U.fh_logindate"; break;
        case "fh_usergroupid"  :   $tmp_orderfield = "G.fh_usergroupid"; break;
      }  

      if ($search1 == "") {
      $SQL = "SELECT		*
              FROM		    fh_user U
              LEFT JOIN     fh_usergroup G
              ON            U.fh_usergroupid = G.fh_usergroupid
              WHERE 	    U.fh_username like '%".$search."%'
              ORDER BY	    " . $tmp_orderfield . " " . $order;
      } else {
      $SQL = "SELECT		*
              FROM		    fh_user U
              LEFT JOIN     fh_usergroup G
              ON            U.fh_usergroupid = G.fh_usergroupid
              WHERE 	    U.fh_username like '%".$search."%'
								AND G.fh_usergroupid = '".$search1."'
              ORDER BY	    " . $tmp_orderfield . " " . $order;
      }
	  $RS =$db->Execute($SQL);
	  if ($RS->fields["fh_usergroupid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search."&search1=".$search1;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			
            if ($search1 == "") {
                $SQL = "SELECT		*
                        FROM		fh_user U
                        LEFT JOIN   fh_usergroup G
                        ON          U.fh_usergroupid = G.fh_usergroupid
                        WHERE 	    U.fh_username like '%".$search."%'
                        ORDER BY	" . $tmp_orderfield . " " . $order." 
                        LIMIT		" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			} else {
                $SQL = "SELECT		*
                        FROM		fh_user U
                        LEFT JOIN   fh_usergroup G
                        ON          U.fh_usergroupid = G.fh_usergroupid
                        WHERE 	    U.fh_username like '%".$search."%'
										AND G.fh_usergroupid = '".$search1."'
                        ORDER BY	" . $tmp_orderfield . " " . $order." 
                        LIMIT		" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
            }

			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
					$fh_userid_temp[$i] = $RS->fields["fh_userid"];
					$fh_usergroupname_temp[$i] = $RS->fields["fh_usergroupname"];
					$fh_usergroupid_temp[$i] = $RS->fields["fh_usergroupid"];
					$fh_username_temp[$i] = $RS->fields["fh_username"];
					$fh_name_temp[$i] = $RS->fields["fh_name"];
					$fh_logindate_temp[$i] = date("d-m-Y G:i:s" , strtotime($RS->fields["fh_logindate"]));
					$RS->MoveNext();
					$i++;
			}
        } else $msg = "Sorry, There is no record in our database<br>";
    } else $msg = "Sorry, There is no record in our database<br>";

	 $smarty->assign('view', array(
	  	        'msg' => $msg,
	  	        'page' => $page,
	  	        'order' => $order,
	  	        'orderfield' => $orderfield,
	  	        'search'  => $search,
	  	        'search1'  => $search1,
	  	        'action' => $action,
	  	        'pagination' => $pagination,
				'fh_userid_temp' => $fh_userid_temp,
				'fh_name_temp' => $fh_name_temp,
				'fh_username_temp' => $fh_username_temp,
				'fh_usergroupid_temp' => $fh_usergroupid_temp,
				'fh_usergroupname_temp' => $fh_usergroupname_temp,
				'fh_logindate_temp' => $fh_logindate_temp));
	  $smarty->display('useradminlist.tpl');
	break;
	
	
	case "insert" :
	case "detail" :
	  $SQL = "SELECT		*
              FROM			fh_usergroup";
	  $RS  = $db->Execute($SQL);
	  
	  if ($RS->fields["fh_usergroupid"] != "")
	  {  $i=0;
	     while (!$RS->EOF) {
	  	   $list_usergroupid[$i] = $RS->fields["fh_usergroupid"];
	  	   $list_usergroupname[$i] = $RS->fields["fh_usergroupname"];
	  	   $i++;
	  	   $RS -> MoveNext();
	  	 }
	  }
		
	  if ((isset($_GET["data_fh_userid"])) and (ctype_digit($_GET["data_fh_userid"]))) 
	  {   $data_fh_userid=$_GET["data_fh_userid"];
	      $SQL = "SELECT	*
                  FROM		fh_user
                  WHERE		fh_userid = ".$data_fh_userid;
	  	  $RS  = $db->Execute($SQL);	   	  
	  	  
	  	  //** Ambil semua inputan user **/
	  	  $data_fh_userid = $RS->fields["fh_userid"];
	  	  $data_fh_username = $RS->fields["fh_username"];
	  	  $data_fh_password	= $crypt->decrypt($RS->fields["fh_password"]);
	  	  $data_fh_usergroupid = $RS->fields["fh_usergroupid"];
	  	  $data_fh_name = $RS->fields["fh_name"];
	  	  $data_fh_address = $RS->fields["fh_address"];
	  	  $data_fh_email = $RS->fields["fh_email"];
	  	  $data_fh_phone = $RS->fields["fh_phone"];
	  	  $data_fh_mobile = $RS->fields["fh_mobile"];
	  	  
	  	  
	  	  
		  if ($RS->fields["fh_userid"] == '') $msg = "There is no record in our database";
	  } 

	  $smarty->assign('msg' , $msg);
	  $smarty->assign('data_fh_userid' , $data_fh_userid);
	  $smarty->assign('data_fh_usergroupid' , $data_fh_usergroupid);
	  $smarty->assign('data_fh_username' , $data_fh_username);
	  $smarty->assign('data_fh_password'  , $data_fh_password);
	  $smarty->assign('data_fh_name'  , $data_fh_name);
	  $smarty->assign('data_fh_address' , $data_fh_address);
	  $smarty->assign('data_fh_email' , $data_fh_email);
	  $smarty->assign('data_fh_phone' , $data_fh_phone);
	  $smarty->assign('data_fh_mobile' , $data_fh_mobile);
	  $smarty->assign('list_usergroupid' , $list_usergroupid);
	  $smarty->assign('list_usergroupname'  , $list_usergroupname);
	  $smarty->display('useradmininsert.tpl');
	break;
	}
}
?>