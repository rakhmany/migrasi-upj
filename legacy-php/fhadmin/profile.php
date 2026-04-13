<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 13 April 2008
  * @copyright by FaberHost.com
*************************************/
 
require_once("config.inc.php");
require_once("back.config.inc.php");

if ($fh_userid)
{	if (isset($_POST["edit"]))
		  { $fh_userid=$_POST["fh_userid"];
			$fh_username=$_POST["fh_username"];
		    $fh_password=$_POST["fh_password"];
		    $fh_name=$_POST["fh_name"];
		    $fh_address=$_POST["fh_address"];
		    $fh_email=$_POST["fh_email"];
		    $fh_phone=$_POST["fh_phone"];
		    $fh_mobile=$_POST["fh_mobile"];
			
			if ($fh_name == "") { $msg.="Please input Name<br>"; }
	  		else { if (!(check_name($fh_name))) $msg.="Invalid Name<br>"; }
	  
	  		if ($fh_email == "") { $msg.="Please input Email Address<br>"; }
	  		else { if (!(check_email($fh_email))) $msg.="Invalid email address<br>"; }
	  
			
			if ($msg=="")
			{ $encrypted = $crypt->encrypt($fh_password);
			  $SQL1 =  "UPDATE		 	fh_user 
                        SET				fh_password='".$encrypted."', 
										fh_name='".$fh_name."', 
										fh_address='".$fh_address."', 
										fh_email='".$fh_email."', 
										fh_phone='".$fh_phone."', 
										fh_mobile='".$fh_mobile."'
                        WHERE			fh_userid = ".$fh_userid;
		   	  $db   -> Execute($SQL1);
			  

		   	  insert_log('Edit', 'Edit Profile' , 'Edit Profile<br>Username : '.$fh_username);
			  $msg="Your Profile has been updated";
			}
		  }

	  $SQL = "SELECT 		*
              FROM  		fh_user
              WHERE			fh_userid = ".$fh_userid;
	  $RS  = $db->Execute($SQL);
	  
	  $SQL = "SELECT 		    *
              FROM  		    fh_usergroup
              WHERE				fh_usergroupid = ".$fh_usergroupid;
	  $RS2  = $db->Execute($SQL);
	  
	  $smarty->assign('title' , "Edit Profile");
	  $smarty->assign('msg' , $msg);
	  $smarty->assign('fh_userid',$RS->fields["fh_userid"]);
	  $smarty->assign('fh_usergroupname',$RS2->fields["fh_usergroupname"]);
	  $smarty->assign('fh_username',$RS->fields["fh_username"]);
	  $smarty->assign('fh_password',$crypt->decrypt($RS->fields["fh_password"]));
	  $smarty->assign('fh_name',$RS->fields["fh_name"]);
	  $smarty->assign('fh_address',$RS->fields["fh_address"]);
	  $smarty->assign('fh_email',$RS->fields["fh_email"]);
	  $smarty->assign('fh_phone',$RS->fields["fh_phone"]);
	  $smarty->assign('fh_mobile',$RS->fields["fh_mobile"]);
	  //$smarty->display('profile.tpl');
	  $smarty->display($themesdir_admin.'/profile.tpl');

}
?>