<?php
require_once("config.inc.php");
if ($fh_userid)
{ $SQL = "SELECT 		*
          FROM			fh_userlog
          ORDER BY 		fh_userlogid
          DESC
          LIMIT			".$conf['max_userlog'].",1";
  $RS =$db->Execute($SQL);
  
  if($RS == false){ print $db->ErrorMsg(); }
  else { $logdelid = $RS->fields["fh_userlogid"]; }
  
  	   	  
  $SQL = "DELETE FROM	fh_userlog
          WHERE			fh_userlogid < ".$logdelid;
  $RS =$db->Execute($SQL);
			    
}

?>