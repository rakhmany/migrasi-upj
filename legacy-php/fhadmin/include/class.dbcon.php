<?php

/**************************************************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 31 Januari 2009
  * @copyright by FaberHost.com

  * Basic Class for Database Connection
  * Fungsi Class ini sebagai extends dari Class lain
  * Diambil dari basic configuration di config.inc.php
  
  * Selain itu juga di berikan fungsi untuk insert userlog
   
**************************************************************************/

class dbcon {

	var $db;
    
	function dbcon () {
		global $conf;
		//*** Open database
		$this->db =  ADONewConnection($conf['db_type']);
		$this->db -> Connect($conf['db_hostname'], $conf['db_username'], $conf['db_password'], $conf['db_database']);
		$this->db -> debug = $conf['db_debug'];
		if (!$this->db->IsConnected()) {
			die("Database connection error");
			exit;
		}
	}
	

	function insert_log ( $action_log, $pagetitle_log , $description_log ) {
        global $fh_userid;
        global $fh_usergroupid;
        
        //*** Process
	    $SQL1 = "INSERT INTO	fh_userlog (fh_userid, fh_usergroupid, fh_pagetitle, fh_action, fh_description, fh_date)
                 VALUES			(".$fh_userid." , ".$fh_usergroupid." , '".$pagetitle_log."' , '".$action_log."' , '".$description_log."', now())";
	    $this->db-> Execute($SQL1);
	}
	
}

?>