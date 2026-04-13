<?php
/**************************************************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 1 Februari 2013
  * @copyright by FaberHost.com

  * Checked : 28 Maret 2013
**************************************************************************/

require_once("../../config.inc.php");
require_once("../../back.config.inc.php");

$tabel_utama = "job_vacancy1";
$primary_key = "jobvacancyid";
$nama_tpl = "job_vacancy1_";
$judul_halaman = "Career Management";

$optarray_status = enum($tabel_utama.".jobvacancystatus");
$smarty->assign('optarray_status' , $optarray_status);

$optarray_jobvacancycat = enum($tabel_utama.".jobvacancycat");
$smarty->assign('optarray_jobvacancycat' , $optarray_jobvacancycat);

//*** Security ACCESS LEVEL  
$akses_level_page = access_level_page($fh_usergroupid, $db);
if ($fh_userid && $akses_level_page)
{	//*** seting orderfield 
	if (!(isset($_GET["orderfield"])))  $orderfield= $primary_key;
	else 
	{ $orderfield=$_GET["orderfield"];
	  if (!(($orderfield=="jobvacancyid") || ($orderfield=="jobvacancydateend") || ($orderfield=="jobvacancydatestart") || ($orderfield=="jobvacancytitle") )) $orderfield=$primary_key; 
	}
	$teks_parameter = "";

    //*** Inset dan Edit
	if ( (isset($_POST["insert"])) || (isset($_POST["edit"])) ) { 
		if ((isset($_POST["edit"]))) $data_jobvacancyid = trim($_POST["data_jobvacancyid"]);
		$data_jobvacancycat = $_POST["data_jobvacancycat"];
		$data_metatag = $_POST["data_metatag"];
		$data_metakeyword = $_POST["data_metakeyword"];
		$data_metadescription = $_POST["data_metadescription"];
		$data_jobvacancydatestart = $_POST["data_jobvacancydatestart"];
		$data_jobvacancydateend = $_POST["data_jobvacancydateend"];
		$data_jobvacancytitle = $_POST["data_jobvacancytitle"];
		$data_jobvacancytitle_en = $_POST["data_jobvacancytitle_en"];
		$data_jobvacancydescription = $_POST["data_jobvacancydescription"];
		$data_jobvacancydescription_en = $_POST["data_jobvacancydescription_en"];
		$data_jobvacancyqualification = $_POST["data_jobvacancyqualification"];
		$data_jobvacancyqualification_en = $_POST["data_jobvacancyqualification_en"];
		$data_jobvacancystatus = $_POST["data_jobvacancystatus"];
        
		$data_jobvacancy_code 		= trim($_POST["data_jobvacancy_code"]);
        $data_jobvacancy_salary 	= trim($_POST["data_jobvacancy_salary"]);
        $data_jobvacancy_workexp 	= trim($_POST["data_jobvacancy_workexp"]);
        
        $data_jobvacancy_fullpart 	= trim($_POST["data_jobvacancy_fullpart"]);
        
        //*** validasi
        if ($data_jobvacancycat == "") { $msg.="Please select category <br>"; }
        if ($data_jobvacancydatestart == "") { $msg.="Please input start date <br>"; }
        if ($data_jobvacancydateend == "") { $msg.="Please input end date <br>"; }
        if ($data_jobvacancytitle == "") { $msg.="Please input Job Vacancy Title<br>"; }
        if ($data_jobvacancytitle_en == "") { $msg.="Please input Job Vacancy Title (EN)<br>"; }
		if ($data_jobvacancydescription == "") { $msg.="Please input Description<br>"; }
		if ($data_jobvacancydescription_en == "") { $msg.="Please input Description (EN)<br>"; }
		// if ($data_jobvacancyqualification == "") { $msg.="Please input Qualification<br>"; }
		// if ($data_jobvacancyqualification_en == "") { $msg.="Please input Qualification (EN)<br>"; }
		
		if ($msg==""){ 
		    $tmp = explode('-', $data_jobvacancydatestart);
		    $data_jobvacancydatestart = $tmp[2]."-".$tmp[1]."-".$tmp[0];

		    $tmp = explode('-', $data_jobvacancydateend);
		    $data_jobvacancydateend = $tmp[2]."-".$tmp[1]."-".$tmp[0];

    		if (isset($_POST["insert"])){
				$SQL1 =  "INSERT INTO 	".$tabel_utama." 
                                                    (jobvacancycat, metatag, metakeyword, metadescription, jobvacancydatestart, jobvacancydateend, 
                                                    jobvacancytitle, jobvacancytitle_en, jobvacancydescription, jobvacancydescription_en, jobvacancyqualification, jobvacancyqualification_en, jobvacancystatus, jobvacancy_code, jobvacancy_salary, jobvacancy_workexp, jobvacancy_fullpart)
                               VALUES			('".$data_jobvacancycat."', '".$db->escape($data_metatag)."','".$db->escape($data_metakeyword)."','".$db->escape($data_metadescription)."','" . $data_jobvacancydatestart . "', '" . $data_jobvacancydateend . "', 
                                                    '".$db->escape($data_jobvacancytitle)."', '".$db->escape($data_jobvacancytitle_en)."', '".$db->escape($data_jobvacancydescription)."', '".$db->escape($data_jobvacancydescription_en)."', '".$db->escape($data_jobvacancyqualification)."', '".$db->escape($data_jobvacancyqualification_en)."', '".$data_jobvacancystatus."', '".$db->escape($data_jobvacancy_code)."', '".$db->escape($data_jobvacancy_salary)."', '".$db->escape($data_jobvacancy_workexp)."', '".$db->escape($data_jobvacancy_fullpart)."')"; 
					
				$db   -> Execute($SQL1);
				$lastid = $db->Insert_ID();

				insert_log('Add', $judul_halaman , 'Add Job Vacancy : '.$data_jobvacancytitle); 
				$final_message = "Your Job Vacancy : ".stripslashes($data_jobvacancytitle)." has been inserted<br>";
				
            } else {
				$SQL1 = "UPDATE			".$tabel_utama."
						  SET			jobvacancycat = '".$data_jobvacancycat."', 
										jobvacancydatestart = '".$data_jobvacancydatestart."', 
										jobvacancydateend = '".$data_jobvacancydateend."', 
										metatag = '".$db->escape($data_metatag)."',
										metakeyword = '".$db->escape($data_metakeyword)."',
										metadescription = '".$db->escape($data_metadescription)."',
										jobvacancytitle = '".$db->escape($data_jobvacancytitle)."', 
										jobvacancytitle_en = '".$db->escape($data_jobvacancytitle_en)."', 
										jobvacancydescription = '".$db->escape($data_jobvacancydescription)."', 
										jobvacancydescription_en = '".$db->escape($data_jobvacancydescription_en)."', 
										jobvacancyqualification= '".$db->escape($data_jobvacancyqualification)."',
										jobvacancyqualification_en= '".$db->escape($data_jobvacancyqualification_en)."',
										jobvacancystatus = '".$data_jobvacancystatus."',
										jobvacancy_code = '".$data_jobvacancy_code."',
										jobvacancy_fullpart = '".$data_jobvacancy_fullpart."',
										jobvacancy_salary = '".$data_jobvacancy_salary."',
										jobvacancy_workexp = '".$data_jobvacancy_workexp."'
                              WHERE		".$primary_key." = ".$data_jobvacancyid;
				$db   -> Execute($SQL1);
            
				insert_log('Edit', $judul_halaman , 'Edit Job Vacancy : '.$data_jobvacancytitle); 
				$final_message = "Your Job Vacancy : ".stripslashes($data_jobvacancytitle)." has been updated<br>";
            }
            
        } else { if(isset($_POST["insert"])) $action="insert"; else  $action="detail"; }
    }
    
    
    //*** Proses Delete 
	if (isset($_POST["del"])) 
	{  $delete=$_POST["delete"];
       for($i=0; $i<count($delete); $i++)
	   { $SQL = "SELECT 		*
                      FROM			".$tabel_utama."
                      WHERE		".$primary_key." = ".$delete[$i];
		 $RS  = $db->Execute($SQL);
		   
		 if ($RS->fields["jobvacancyid"] != '')
		 { //**** Untuk check domain dimasukkan ke userlog
		    insert_log('Delete', $judul_halaman , 'Delete Job Vacancy : '.$RS->fields["jobvacancytitle"].", ID : ".$RS->fields["jobvacancyid"]); 
		    $SQL1 = "DELETE FROM		".$tabel_utama."
                           WHERE			    ".$primary_key." = ".$delete[$i];
            $RS1  = $db->Execute($SQL1);
		 }   
	   }
       $action = "view";
	   $final_message = "Job Vacancy has been deleted<br>";
	}
	
	//*** Seting Header 
	$smarty->assign('insert' , '<a href='.$_SERVER['PHP_SELF'].'?action=insert><img src=../../images/icon2.gif alt=insert></a>'); 
	$smarty->assign('view' , '<a href='.$_SERVER['PHP_SELF'].'?action=view><img src=../../images/icon3.gif alt=view></a>'); 
	$smarty->assign('title' , $judul_halaman); 
//	$smarty->assign('title_search' , 'Job');
	$smarty->assign('search' , $search); 
	$smarty->assign('search1' , $search1); 
	// $smarty->display($nama_tpl.'header.tpl');

	
	//*** MAIN CODE 
	switch ($action) {
	case "view" :
	$tmp_sql =  "";
    if ($search3 != "") $tmp_sql .=" AND jobvacancystatus = '".$search3."'";
    if ($search1 != "") $tmp_sql .=" AND jobvacancycat = '".$search1."'";

    $SQL = "SELECT			*
                FROM		".$tabel_utama."
                WHERE		(jobvacancytitle like '%".$search."%'
							OR jobvacancytitle_en like '%".$search."%'
							OR jobvacancydescription like '%".$search."%'
							OR jobvacancydescription_en like '%".$search."%'
							OR jobvacancyqualification like '%".$search."%'
							OR jobvacancyqualification_en like '%".$search."%' )
                            ".$tmp_sql."
                ORDER BY	" . $orderfield . " " . $order;
	  $RS =$db->Execute($SQL);
	  
	  if ($RS->fields["jobvacancyid"] != "")
	  { $total_jumlah_record = $RS->RecordCount();
   	  	$total_jumlah_page = ceil(($total_jumlah_record)/$conf["page"]);
   	  	$teks_parameter = "&action=".$action."&order=".$order."&orderfield=".$orderfield."&search=".$search."&search1=".$search1;;
   	  	
   	  	if ($page != 0 ) {
			if ($page > $total_jumlah_page) $page=$total_jumlah_page;
			$pagination = pagination($page, $total_jumlah_page, $teks_parameter);
			$SQL = "SELECT 			*
                         FROM		".$tabel_utama."
                         WHERE		(jobvacancytitle like '%".$search."%'
									OR jobvacancytitle_en like '%".$search."%'
									OR jobvacancydescription like '%".$search."%'
									OR jobvacancydescription_en like '%".$search."%'
									OR jobvacancyqualification like '%".$search."%'
									OR jobvacancyqualification_en like '%".$search."%' )
									".$tmp_sql."
                         ORDER BY	" . $orderfield . " " . $order . " 	  
                         LIMIT		" . (($conf["page"] * $page ) - $conf["page"]) . ",".$conf["page"];
			$RS = $db->Execute($SQL);
	  	
			$i=0;
			while (!$RS->EOF) {
                $list_jobvacancyid[$i] = $RS->fields["jobvacancyid"];
                $list_jobvacancycat[$i] = stripslashes($RS->fields["jobvacancycat"]);
                $list_jobvacancytitle[$i] = stripslashes($RS->fields["jobvacancytitle"]);
                $data_jobvacancycat[$i] = $RS->fields["jobvacancycat"];
                $list_jobvacancytitle_en[$i] = stripslashes($RS->fields["jobvacancytitle_en"]);
                $list_jobvacancydatestart[$i] = date("d-m-Y" , strtotime($RS->fields["jobvacancydatestart"]));
                $list_jobvacancydateend[$i] = date("d-m-Y" , strtotime($RS->fields["jobvacancydateend"]));
                $list_jobvacancystatus[$i] = $RS->fields["jobvacancystatus"];
                        
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
	  	        'search1'  => $search1,
	  	        'action' => $action,
	  	        'pagination' => $pagination,

				'data_jobvacancyid' => $list_jobvacancyid,
				'data_jobvacancycat' => $list_jobvacancycat,
				'data_jobvacancytitle' => $list_jobvacancytitle,
				'data_jobvacancytitle_en' => $list_jobvacancytitle_en,
				'data_jobvacancystatus' => $list_jobvacancystatus,
				'data_jobvacancydatestart' => $list_jobvacancydatestart,
				'data_jobvacancydateend'	=> $list_jobvacancydateend));
	  $smarty->display($nama_tpl.'list.tpl');
	break;
	
	case "detail" :
	case "insert" :
  	
	  if ((isset($_GET["data_jobvacancyid"])) and (ctype_digit($_GET["data_jobvacancyid"]))) 
	  {   $data_jobvacancyid = $_GET["data_jobvacancyid"];
            $SQL = "SELECT 	*
                        FROM		".$tabel_utama."
                        WHERE		".$primary_key." = ".$data_jobvacancyid;
            $RS  = $db->Execute($SQL);	   	  
	  	  
		    if ($RS->fields["jobvacancyid"] == '') $msg = "There is no record in our database";
            else {
                //** Ambil semua inputan user **/
                $data_jobvacancyid = $RS->fields["jobvacancyid"];
                $data_jobvacancycat = $RS->fields["jobvacancycat"];
                $data_metatag =  stripslashes($RS->fields["metatag"]);
                $data_metakeyword =  stripslashes($RS->fields["metakeyword"]);
                $data_metadescription =  stripslashes($RS->fields["metadescription"]);
                $data_jobvacancytitle =  stripslashes($RS->fields["jobvacancytitle"]);
                $data_jobvacancytitle_en =  stripslashes($RS->fields["jobvacancytitle_en"]);
                $data_jobvacancyqualification = stripslashes($RS->fields["jobvacancyqualification"]);
                $data_jobvacancyqualification_en = stripslashes($RS->fields["jobvacancyqualification_en"]);
                $data_jobvacancydescription = stripslashes($RS->fields["jobvacancydescription"]);
                $data_jobvacancydescription_en = stripslashes($RS->fields["jobvacancydescription_en"]);
                $data_jobvacancydatestart = date("d-m-Y" , strtotime($RS->fields["jobvacancydatestart"]));
                $data_jobvacancydateend = date("d-m-Y" , strtotime($RS->fields["jobvacancydateend"]));
                $data_jobvacancystatus = $RS->fields["jobvacancystatus"];
                $data_jobvacancy_code =  stripslashes($RS->fields["jobvacancy_code"]);
                $data_jobvacancy_salary =  stripslashes($RS->fields["jobvacancy_salary"]);
                $data_jobvacancy_workexp =  stripslashes($RS->fields["jobvacancy_workexp"]);
                $data_jobvacancy_fullpart =  stripslashes($RS->fields["jobvacancy_fullpart"]);
                
			
            }
          
	  } 
	  if ($data_jobvacancydatestart == '') $data_jobvacancydatestart = date("d-m-Y");

	  $smarty->assign('msg' , $msg);
	  $smarty->assign('path_image' , $path_image);
	  $smarty->assign('data_jobvacancyid' , $data_jobvacancyid);
	  $smarty->assign('data_jobvacancycat' , $data_jobvacancycat);
	  $smarty->assign('data_metatag' , $data_metatag);
	  $smarty->assign('data_metakeyword' , $data_metakeyword);
	  $smarty->assign('data_metadescription' , $data_metadescription);
	  $smarty->assign('data_jobvacancydatestart' , $data_jobvacancydatestart);
	  $smarty->assign('data_jobvacancydateend' , $data_jobvacancydateend);
	  $smarty->assign('data_jobvacancytitle' , $data_jobvacancytitle);
	  $smarty->assign('data_jobvacancytitle_en' , $data_jobvacancytitle_en);
	  $smarty->assign('data_jobvacancydescription' , $data_jobvacancydescription);
	  $smarty->assign('data_jobvacancydescription_en' , $data_jobvacancydescription_en);
	  $smarty->assign('data_jobvacancyqualification' , $data_jobvacancyqualification);
	  $smarty->assign('data_jobvacancyqualification_en' , $data_jobvacancyqualification_en);
	  $smarty->assign('data_jobvacancystatus' , $data_jobvacancystatus);
	  $smarty->assign('data_jobvacancy_code' , $data_jobvacancy_code);
	  $smarty->assign('data_jobvacancy_salary' , $data_jobvacancy_salary);
	  $smarty->assign('data_jobvacancy_workexp' , $data_jobvacancy_workexp);
	  $smarty->assign('data_jobvacancy_fullpart' , $data_jobvacancy_fullpart);
	  $smarty->display($nama_tpl.'insert.tpl');
	break;
	}
}
?>