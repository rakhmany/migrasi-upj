<?php

/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 1 Maret 2012
  * @copyright by FaberHost.com
  * Versi : 1.0
  
  * Plugin Author: Bambang Riswanto
  * Checked : 7 Mei 2013
  
*************************************/
require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

// $db->debug = true;
// debugvar($_POST);
// $smarty->debugging = true;

$tabel_utama = "rgs";
$primary_key = "pmbid";

$tabel_config = "rgsconfig";
$primary_key_config = "pmbconfigid";

$nama_tpl = "rgs_";
$judul_halaman = "IUP Registaration Online";
$path_file_image = "../../../upload/module/pmb/";

$optarray = enum("rgs.status");
$smarty->assign('optarray' , $optarray);
$optarray_jkel = enum("rgs.pmbjkel");
$smarty->assign('optarray_jkel' , $optarray_jkel);
	  
//*** Security ACCESS LEVEL 
$akses_level_page = access_level_page($fh_usergroupid, $db);

if ($fh_userid && $akses_level_page)
{	$teks_parameter = "";
    
	//*** Sorting
	if (!(isset($_GET["orderfield"])))  $orderfield="pmbid";
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!(($orderfield=="pmbid") || ($orderfield=="pmbdate") || ($orderfield=="pmbname") || ($orderfield=="pmburl") || ($orderfield=="pmbid")|| ($orderfield=="status"))) $orderfield="pmbdate"; 
	}
	if (!(isset($_GET["order"])))  $order="DESC";

	
	  $msg = "";
	  $final_message = "";
	  if (isset($_POST["editconfig"]) || isset($_POST["insertconfig"])) {
			$data_pmbconfigterms = $_POST["data_pmbconfigterms"];
			$data_pmbconfigterms_en = $_POST["data_pmbconfigterms_en"];
			$data_pmbconfigregister = $_POST["data_pmbconfigregister"];
			$data_pmbconfigregister_en = $_POST["data_pmbconfigregister_en"];
			
			if ($data_pmbconfigterms == "") { $msg .= "Please Input Prosedur & Persyaratan (INA)"; }
			if ($data_pmbconfigterms_en == "") { $msg .= "Please Input Prosedur & Persyaratan (ENG)"; }
			if ($data_pmbconfigregister == "") { $msg .= "Please Input Registrasi Ulang Setelah Lulus UMS (INA)"; }
			if ($data_pmbconfigregister_en == "") { $msg .= "Please Input Registrasi Ulang Setelah Lulus UMS (ENG)"; }
			
			if ($msg == "") {
				$SQL = "UPDATE ".$tabel_config." SET pmbconfigterms = '".mysql_real_escape_string($data_pmbconfigterms)."',
													pmbconfigterms_en = '".mysql_real_escape_string($data_pmbconfigterms_en)."',
													pmbconfigregister = '".mysql_real_escape_string($data_pmbconfigregister)."',
													pmbconfigregister_en = '".mysql_real_escape_string($data_pmbconfigregister_en)."'";
				if ($db->Execute($SQL)) {
					$final_message = "Config has been saved.";
					insert_log('Edit', $judul_halaman , 'Edit PMB Config'); 
				} else {
					$msg .= "Database error, please try again later";
				}
				
			}
		$action = "config";
	  }
	
    //*** Proses Delete 
	if (isset($_POST["del"])) 
	{  $delete=$_POST["delete"];
       for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 		*
                      FROM		".$tabel_utama."
                      WHERE		".$primary_key." = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["pmbid"] != '')
		 {  insert_log('Delete', $judul_halaman , 'Delete pmb  : '.$RS->fields["pmbname"].', id : '.$RS->fields["pmbid"]); 
            if ($RS->fields["pmbphoto"] != "" ) {  @unlink($path_file_image.$RS->fields["pmbphoto"]);  }
		    $SQL1 = "DELETE FROM	".$tabel_utama."
                           WHERE	".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "pmb  has been deleted<br>";
	}
	

	//*** Seting Header 
	//$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'pmb Name');
	$smarty->assign('search' , $search); 
	$smarty->assign('search2' , $search2); 
	// $smarty->display($nama_tpl.'header.tpl');
	
	
	//*** MAIN CODE 
	switch ($action) {
	case "view" :
      $tmpl = "";
	  if ($search2 != "") {$tmpl .= " AND pmbjkel = '".$search2."'";}
	  //$db -> debug = true;
	  $SQL = "SELECT 		*
                FROM		".$tabel_utama."
                WHERE 		(pmbname like '%".$search."%'
							OR pmbname like '%".$search."%'
							OR pmbagama like '%".$search."%'
							OR pmbhp like '%".$search."%'
							OR pmbemail like '%".$search."%'
							OR pmblulusan like '%".$search."%'
							OR pmbgraduateyear like '%".$search."%'
							OR pmbdadyname like '%".$search."%')
							".$tmpl."
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =  $db->Execute($SQL);
	  
	  if ($RS->fields["pmbid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                         FROM		".$tabel_utama."
                         WHERE		(pmbname like '%".$search."%'
							OR pmbagama like '%".$search."%'
							OR pmbhp like '%".$search."%'
							OR pmbemail like '%".$search."%'
							OR pmblulusan like '%".$search."%'
							OR pmbgraduateyear like '%".$search."%'
							OR pmbdadyname like '%".$search."%')
                         ".$tmpl."
						 ORDER BY	" . $orderfield . " " . $order . " 	  
                         LIMIT		" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_pmbid[$i] = $RS->fields["pmbid"];
                $list_pmbname[$i] = $RS->fields["pmbname"];
                $list_pmbphoto[$i] = $RS->fields["pmbphoto"];
                $list_pmbaddress[$i] = $RS->fields["pmbaddress"];
                $list_pmbkota[$i] = $RS->fields["pmbkota"];
                $list_pmbprovince[$i] = $RS->fields["pmbprovince"];
                $list_pmbpostcode[$i] = $RS->fields["pmbpostcode"];
                $list_pmbphone[$i] = $RS->fields["pmbphone"];
                $list_pmbhp[$i] = $RS->fields["pmbhp"];
                $list_pmbemail[$i] = $RS->fields["pmbemail"];
                $list_pmbgraduateyear[$i] = $RS->fields["pmbgraduateyear"];
                $list_status[$i] = $RS->fields["status"];
                $list_pmbdate[$i] = date("d-m-Y" , strtotime($RS->fields["pmbdate"]));
                
				
				
                $RS->MoveNext();
                $i++;
			}
		} else $msg = "Sorry, There is no record in our database<br>";
	  } else $msg = "Sorry, There is no record in our database<br>";

	  $smarty->assign('view', array(
	  	        'msg' => $msg,
	  	        'final_message' => $final_message,
	  	        'page' => $page,
	  	        'order' => $order,
	  	        'orderfield' => $orderfield,
	  	        'search'  => $search,
	  	        'action' => $action,
	  	        'pagination' => $pagination,

				'data_pmbid' => $list_pmbid,
				'data_pmbname' => $list_pmbname,
				'data_pmbphoto' => $list_pmbphoto,
				'data_pmbaddress' => $list_pmbaddress,
				'data_pmbkota' => $list_pmbkota,
				'data_pmbprovince' => $list_pmbprovince,
				'data_pmbpostcode' => $list_pmbpostcode,
				'data_pmbhp' => $list_pmbhp,
				'data_pmbemail' => $list_pmbemail,
				'data_pmbgraduateyear' => $list_pmbgraduateyear,
				'data_status' => $list_status,
				'path_file_image' => $path_file_image,
				'data_pmbdate'	=> $list_pmbdate));
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
		$pmbsekolah_list = array();
		$pmbsekolah_list["A"] = "Tidak tamat SD";
		$pmbsekolah_list["B"] = "Tamat SD";
		$pmbsekolah_list["C"] = "Tamat SMP";
		$pmbsekolah_list["D"] = "Tamat SMA";
		$pmbsekolah_list["E"] = "Diploma ( D1 - D2 )";
		$pmbsekolah_list["F"] = "Sarjana Muda ( D3 )";
		$pmbsekolah_list["G"] = "Sarjana ( D4 - S1 )";
		$pmbsekolah_list["H"] = "Pascasarjana ( S2 )";
		$pmbsekolah_list["I"] = "Doktor ( S3 )";
		
	  if ((isset($_GET["data_pmbid"])) and (ctype_digit($_GET["data_pmbid"]))) 
	  {   $data_pmbid = $_GET["data_pmbid"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_pmbid;
            $RS  = $db->Execute($SQL);
			
			$data_pmbid = $RS->fields["pmbid"];
            $data_pmbname = $RS->fields["pmbname"];
            $data_pmbplace = $RS->fields["pmbplace"];
            $data_pmbbirth = $RS->fields["pmbbirth"];
            $data_pmbjkel = $RS->fields["pmbjkel"];
            $data_pmbagama = $RS->fields["pmbagama"];
            $data_pmbaddress = $RS->fields["pmbaddress"];
            $data_pmbpostcode = $RS->fields["pmbpostcode"];
            $data_pmbphone = $RS->fields["pmbphone"];
            $data_pmbhp = $RS->fields["pmbhp"];
            $data_pmbemail = $RS->fields["pmbemail"];
            $data_pmbphoto = $RS->fields["pmbphoto"];
            $data_pmbgraduateyear = $RS->fields["pmbgraduateyear"];
            $data_pmbacademicscore = $RS->fields["pmbacademicscore"];
            $data_pmbenglishscore = $RS->fields["pmbenglishscore"];
            $data_pmbknowwe = $RS->fields["pmbknowwe"];
            $data_pmbnamerecomend = $RS->fields["pmbnamerecomend"];
            $data_pmbnimrecomend = $RS->fields["pmbnimrecomend"];
            $data_pmbnoperecomend = $RS->fields["pmbnoperecomend"];
            $data_pmbnik = $RS->fields["pmbnik"];
            $data_status = $RS->fields["status"];
            $data_ip = $RS->fields["ip"];
            $data_pmbdate = date("d-m-Y" , strtotime($RS->fields["pmbdate"]));
			
            $data_pmbstatusnikah = $RS->fields["pmbstatusnikah"];
			
            $data_pmbdadyname = $RS->fields["pmbdadyname"];
            $data_pmbmammyname = $RS->fields["pmbmammyname"];
            $data_pmbparentaddress = $RS->fields["pmbparentaddress"];
            $data_pmbparentpostcode = $RS->fields["pmbparentpostcode"];
            $data_pmbparenthp = $RS->fields["pmbparenthp"];
            $data_pmbdadylaststudy = $pmbsekolah_list[$RS->fields["pmbdadylaststudy"]];
            $data_pmbmammylaststudy = $pmbsekolah_list[$RS->fields["pmbmammylaststudy"]];
            $data_pmbdadyjob = $RS->fields["pmbdadyjob"];
            $data_pmbmammyjob = $RS->fields["pmbmammyjob"];
            $data_pmbdadysalary = $RS->fields["pmbdadysalary"];
            $data_pmbmammysalary = $RS->fields["pmbmammysalary"];
            $data_pmbparentstatus = $RS->fields["pmbparentstatus"];
            $data_pmbdadystatus = $RS->fields["pmbdadystatus"];
            $data_pmbmammystatus = $RS->fields["pmbmammystatus"];
			
            $data_pmblulusan = $RS->fields["pmblulusan"];
            $data_pmbwilayah = $RS->fields["pmbwilayah"];
            $data_pmbjurusan = $RS->fields["pmbjurusan"];
            $data_pmbbiaya = $RS->fields["pmbbiaya"];
            $data_pmbprogramstudy = $RS->fields["pmbprogramstudy"];
            $data_pmbprogramstudy2 = $RS->fields["pmbprogramstudy2"];
            $data_pmbgelombang = $RS->fields["pmbgelombang"];
            
		    if ($RS->fields["pmbid"] == '') $msg = "There is no record in our database";
	  } 

	  $smarty->assign('msg' , $msg);
	  
	  $smarty->assign('data_pmbid' , $data_pmbid);
	  $smarty->assign('data_pmbname' , $data_pmbname);
	  $smarty->assign('data_pmbplace' , $data_pmbplace);
	  $smarty->assign('data_pmbbirth' , $data_pmbbirth);
	  $smarty->assign('data_pmbjkel' , $data_pmbjkel);
	  $smarty->assign('data_pmbagama' , $data_pmbagama);
	  $smarty->assign('data_pmbnik', $data_pmbnik);
	  $smarty->assign('data_pmbaddress' , $data_pmbaddress);
	  $smarty->assign('data_pmbpostcode' , $data_pmbpostcode);
	  $smarty->assign('data_pmbhp' , $data_pmbhp);
	  $smarty->assign('data_pmbemail' , $data_pmbemail);
	  $smarty->assign('data_pmbphoto' , $data_pmbphoto);
	  $smarty->assign('data_pmbgraduateyear' , $data_pmbgraduateyear);
	  $smarty->assign('data_pmbacademicscore' , $data_pmbacademicscore);
	  $smarty->assign('data_pmbenglishscore' , $data_pmbenglishscore);
	  $smarty->assign('data_pmbknowwe' , $data_pmbknowwe);
	  $smarty->assign('data_pmbnamerecomend' , $data_pmbnamerecomend);
	  $smarty->assign('data_pmbnimrecomend' , $data_pmbnimrecomend);
	  $smarty->assign('data_pmbnoperecomend' , $data_pmbnoperecomend);
	  $smarty->assign('data_status' , $data_status);
	  $smarty->assign('data_ip' , $data_ip);
	  $smarty->assign('data_pmbdate' , $data_pmbdate);
	  
	  $smarty->assign('data_pmbstatusnikah' , $data_pmbstatusnikah);
	  
	  $smarty->assign('data_pmbdadyname' , $data_pmbdadyname);
	  $smarty->assign('data_pmbmammyname' , $data_pmbmammyname);
	  $smarty->assign('data_pmbparentaddress' , $data_pmbparentaddress);
	  $smarty->assign('data_pmbparentpostcode' , $data_pmbparentpostcode);
	  $smarty->assign('data_pmbparenthp' , $data_pmbparenthp);
	  $smarty->assign('data_pmbdadylaststudy' , $data_pmbdadylaststudy);
	  $smarty->assign('data_pmbmammylaststudy' , $data_pmbmammylaststudy);
	  $smarty->assign('data_pmbdadyjob' , $data_pmbdadyjob);
	  $smarty->assign('data_pmbmammyjob' , $data_pmbmammyjob);
	  $smarty->assign('data_pmbdadysalary' , $data_pmbdadysalary);
	  $smarty->assign('data_pmbmammysalary' , $data_pmbmammysalary);
	  $smarty->assign('data_pmbparentstatus' , $data_pmbparentstatus);
	  $smarty->assign('data_pmbdadystatus' , $data_pmbdadystatus);
	  $smarty->assign('data_pmbmammystatus' , $data_pmbmammystatus);
	  
	  $smarty->assign('data_pmblulusan' , $data_pmblulusan);
	  $smarty->assign('data_pmbwilayah', $data_pmbwilayah);
	  $smarty->assign('data_pmbjurusan', $data_pmbjurusan);
	  $smarty->assign('data_pmbbiaya', $data_pmbbiaya);
	  $smarty->assign('data_pmbprogramstudy' , $data_pmbprogramstudy);
	  $smarty->assign('data_pmbprogramstudy2' , $data_pmbprogramstudy2);
	  $smarty->assign('data_pmbgelombang' , $data_pmbgelombang);
	  
	  $smarty->assign('path_file_image' , $path_file_image);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	
	case "data" :
		$pmbsekolah_list = array();
		$pmbsekolah_list["A"] = "Tidak tamat SD";
		$pmbsekolah_list["B"] = "Tamat SD";
		$pmbsekolah_list["C"] = "Tamat SMP";
		$pmbsekolah_list["D"] = "Tamat SMA";
		$pmbsekolah_list["E"] = "Diploma ( D1 - D2 )";
		$pmbsekolah_list["F"] = "Sarjana Muda ( D3 )";
		$pmbsekolah_list["G"] = "Sarjana ( D4 - S1 )";
		$pmbsekolah_list["H"] = "Pascasarjana ( S2 )";
		$pmbsekolah_list["I"] = "Doktor ( S3 )";
		
	  if ((isset($_GET["data_pmbid"])) and (ctype_digit($_GET["data_pmbid"]))) 
	  {   $data_pmbid = $_GET["data_pmbid"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key."= ".$data_pmbid;
            $RS  = $db->Execute($SQL);
			
			$data_pmbid = $RS->fields["pmbid"];
            $data_pmbname = $RS->fields["pmbname"];
            $data_pmbplace = $RS->fields["pmbplace"];
            $data_pmbbirth = $RS->fields["pmbbirth"];
            $data_pmbjkel = $RS->fields["pmbjkel"];
            $data_pmbagama = $RS->fields["pmbagama"];
            $data_pmbaddress = $RS->fields["pmbaddress"];
            $data_pmbhp = $RS->fields["pmbhp"];
            $data_pmbemail = $RS->fields["pmbemail"];
            $data_pmbphoto = is_file($path_file_image.$RS->fields["pmbphoto"]) ? '<a href="'.$path_file_image.$RS->fields["pmbphoto"].'" target="_blank">'.$RS->fields["pmbphoto"].'</a>' : '';
            $data_pmbgraduateyear = $RS->fields["pmbgraduateyear"];
            $data_pmbacademicscore = $RS->fields["pmbacademicscore"];
            $data_pmbenglishscore = $RS->fields["pmbenglishscore"];
            $data_pmbknowwe = $RS->fields["pmbknowwe"];
            $data_pmbnik = $RS->fields["pmbnik"];
            $data_status = $RS->fields["status"];
            $data_ip = $RS->fields["ip"];
            $data_pmbdate = date("d-m-Y" , strtotime($RS->fields["pmbdate"]));
            $data_pmbstatusnikah = $RS->fields["pmbstatusnikah"];
            $data_pmbdadyname = $RS->fields["pmbdadyname"];
            $data_pmbparentaddress = $RS->fields["pmbparentaddress"];
            $data_pmbparenthp = $RS->fields["pmbparenthp"];
            $data_pmbdadylaststudy = $pmbsekolah_list[$RS->fields["pmbdadylaststudy"]];
            $data_pmbdadyjob = $RS->fields["pmbdadyjob"];
            $data_pmblulusan = $RS->fields["pmblulusan"];
            
		    if ($RS->fields["pmbid"] == '') $msg = "There is no record in our database";
	  } 

	  $smarty->assign('msg' , $msg);
	  
	  $smarty->assign('data_pmbid' , $data_pmbid);
	  $smarty->assign('data_pmbname' , $data_pmbname);
	  $smarty->assign('data_pmbplace' , $data_pmbplace);
	  $smarty->assign('data_pmbbirth' , $data_pmbbirth);
	  $smarty->assign('data_pmbjkel' , $data_pmbjkel);
	  $smarty->assign('data_pmbagama' , $data_pmbagama);
	  $smarty->assign('data_pmbnik', $data_pmbnik);
	  $smarty->assign('data_pmbaddress' , $data_pmbaddress);
	  $smarty->assign('data_pmbhp' , $data_pmbhp);
	  $smarty->assign('data_pmbemail' , $data_pmbemail);
	  $smarty->assign('data_pmbphoto' , $data_pmbphoto);
	  $smarty->assign('data_pmbgraduateyear' , $data_pmbgraduateyear);
	  $smarty->assign('data_pmbacademicscore' , $data_pmbacademicscore);
	  $smarty->assign('data_pmbenglishscore' , $data_pmbenglishscore);
	  $smarty->assign('data_pmbknowwe' , $data_pmbknowwe);
	  $smarty->assign('data_status' , $data_status);
	  $smarty->assign('data_ip' , $data_ip);
	  $smarty->assign('data_pmbdate' , $data_pmbdate);
	  $smarty->assign('data_pmbstatusnikah' , $data_pmbstatusnikah);
	  $smarty->assign('data_pmbdadyname' , $data_pmbdadyname);
	  $smarty->assign('data_pmbparentaddress' , $data_pmbparentaddress);
	  $smarty->assign('data_pmbparenthp' , $data_pmbparenthp);
	  $smarty->assign('data_pmbdadylaststudy' , $data_pmbdadylaststudy);
	  $smarty->assign('data_pmbdadyjob' , $data_pmbdadyjob);
	  $smarty->assign('data_pmblulusan' , $data_pmblulusan);
	  $smarty->assign('path_file_image' , $path_file_image);
	  $smarty->display($nama_tpl.'data.tpl');
	break;
	
	case "config":
	  
	  $SQL = "SELECT * FROM ".$tabel_config." LIMIT 0,1";
	  $RS = $db->Execute($SQL);
	  if ($RS->fields[$primary_key_config] != "") {
		$data_pmbconfigid = $RS->fields[$primary_key_config];
		$data_pmbconfigterms = stripcslashes($RS->fields["pmbconfigterms"]);
		$data_pmbconfigterms_en = stripcslashes($RS->fields["pmbconfigterms_en"]);
		$data_pmbconfigregister = stripcslashes($RS->fields["pmbconfigregister"]);
		$data_pmbconfigregister_en = stripcslashes($RS->fields["pmbconfigregister_en"]);
	  } else {
		$msg .= "Sorry, there are no record in our database.";
	  }
	  
	  $smarty->assign('msg' , $msg);
	  $smarty->assign('final_message' , $final_message);
	  $smarty->assign('data_pmbconfigid' , $data_pmbconfigid);
	  $smarty->assign('data_pmbconfigterms' , $data_pmbconfigterms);
	  $smarty->assign('data_pmbconfigterms_en' , $data_pmbconfigterms_en);
	  $smarty->assign('data_pmbconfigregister' , $data_pmbconfigregister);
	  $smarty->assign('data_pmbconfigregister_en' , $data_pmbconfigregister_en);
	  $smarty->display($nama_tpl.'config.tpl');
	break;
}
}
?>