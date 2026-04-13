<?php
/**************************************************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 31 Januari 2009
  * @copyright by FaberHost.com

  * Class untuk Management Structure Menu
   
**************************************************************************/

class fh_pagestatis extends dbcon {
    
    function fh_pagestatis() {
		parent::dbcon();
		//$this->db->debug = true;
    }
    
    //************************************************ Listing Menu dalam bentuk table ************************************
	function select_deep($parent, $prefix) {
	    global $tmp_flag1;
	    
        $SQL = "SELECT		*
                FROM		fh_pagestatis
                WHERE		fh_strukturparent = '".$parent."'
                ORDER BY	fh_strukturprioritas ASC";
        $RS = $this->db->Execute($SQL);
        
        if ($tmp_flag1 == "") $tmp_flag1=0;
        
        while (!$RS->EOF) 
         {  if ($tmp_flag1=="0") {
                $tmp_menu .=  "<tr class='bgviolet3'><td style='padding:2px 10px 2px 10px'>".$prefix.' '.$RS->fields['fh_menu_name'].' / <font color="red">'.$RS->fields['fh_menu_name_en']."</font></td>";
                $tmp_menu .=  "<td class=wdth80 align=center>".$RS->fields["fh_strukturparenttipe"]."</td>";
                $tmp_menu .=  "<td class=wdth80 align=center>".str_replace(':::',', ',$RS->fields["fh_menu_catselected"])."</td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=up&coremenu=".$RS->fields["fh_strukturid"]."'><img src='../../images/arrow_top.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=down&coremenu=".$RS->fields["fh_strukturid"]."'><img src='../../images/arrow_down.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=detail&coremenu=".$RS->fields["fh_strukturid"]."'><img src='../../images/edit.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=delete&coremenu=".$RS->fields["fh_strukturid"]."' onclick='return konfirmasi()';><img src='../../images/delete.gif'></a></td></tr>";
                $tmp_flag1 = 1;
            } else {
                $tmp_menu .=  "<tr class='bgwhite'><td style='padding:2px 10px 2px 10px'>".$prefix.' '.$RS->fields['fh_menu_name'].' / <font color="red">'.$RS->fields['fh_menu_name_en']."</font></td>";
                $tmp_menu .=  "<td class=wdth80 align=center>".$RS->fields["fh_strukturparenttipe"]."</td>";
                $tmp_menu .=  "<td class=wdth80 align=center>".str_replace(':::',', ',$RS->fields["fh_menu_catselected"])."</td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=up&coremenu=".$RS->fields["fh_strukturid"]."'><img src='../../images/arrow_top.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=down&coremenu=".$RS->fields["fh_strukturid"]."'><img src='../../images/arrow_down.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=detail&coremenu=".$RS->fields["fh_strukturid"]."'><img src='../../images/edit.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=delete&coremenu=".$RS->fields["fh_strukturid"]."' onclick='return konfirmasi()';><img src='../../images/delete.gif'></a></td></tr>";
                $tmp_flag1 = 0;
            }
            
            $tmp_menu .=  $this->select_deep($RS->fields["fh_strukturid"], $prefix."----", $selectitem);
            $RS->MoveNext();
         }
        return $tmp_menu;
    }



    //************************************************ Listing Menu dalam bentuk select option ************************************
	function select_deep_core ($parent, $prefix, $selectitem='') {
        $SQL = "SELECT          *
                     FROM           fh_pagestatis
                     WHERE         fh_strukturparent = '".$parent."'
                     ORDER BY     fh_strukturprioritas ASC";
        $RS = $this->db->Execute($SQL);

        while (!$RS->EOF) 
         {  if ($selectitem == $RS->fields["fh_strukturid"]) { $tmp_menu .=  '<option value="'.$RS->fields['fh_strukturid'].'" selected>'.$prefix.' '.$RS->fields['fh_menu_name'].'</option>';
            } else { $tmp_menu .=  '<option value="'.$RS->fields['fh_strukturid'].'" >'.$prefix.' '.$RS->fields['fh_menu_name'].'</option>'; }
            
            $tmp_menu .=  $this->select_deep_core($RS->fields["fh_strukturid"], $prefix."----", $selectitem);
            $RS->MoveNext();
         }
        return $tmp_menu;
    }



    //************************************************ Add New Menu ***************************************
	function insert_menu($data_input, $data_files, $data_path, $data_width, $data_height) {
        global $handle;
        $data_coremenu = $data_input["coremenu"] == "" || $data_input["coremenu"] == null ? 0 : $data_input["coremenu"];
        $data_fh_menu_name = $data_input["fh_menu_name"];
        $data_fh_menu_name_en = $data_input["fh_menu_name_en"];
        $data_fh_strukturparenttipe = $data_input["fh_strukturparenttipe"];
        $data_fh_strukturstatus = $data_input["fh_strukturstatus"];
        $data_fh_strukturcontenttipe = $data_input["fh_strukturcontenttipe"];
        $data_fh_menu_pageheader = $data_input["fh_menu_pageheader"];
        $data_fh_menu_pageheader_en = $data_input["fh_menu_pageheader_en"];
        $data_fh_menu_metakeyword = $data_input["fh_menu_metakeyword"];
        $data_fh_menu_metadescription = $data_input["fh_menu_metadescription"];
        $data_fh_content_title = $data_input["fh_content_title"];
        $data_fh_content_description = $data_input["fh_content_description"];
        $data_fh_content_title_en = $data_input["fh_content_title_en"];
        $data_fh_content_description_en = $data_input["fh_content_description_en"];
        $data_fh_modulefilename = $data_input["fh_modulefilename"];
        $data_fh_menu_cat = $data_input["fh_menu_cat"];
        $data_fh_menu_catselected = '';
        
        $data_fh_coloumn_count = $data_input["fh_coloumn_count"];
        $data_fh_content_description2 = $data_input["fh_content_description2"];
        $data_fh_content_description2_en = $data_input["fh_content_description2_en"];
        $data_fh_content_description3 = $data_input["fh_content_description3"];
        $data_fh_content_description3_en = $data_input["fh_content_description3_en"];
        
         
		$data_kataterkait = $data_input["data_kataterkait"]; 
        $data_kataterkaitloop = count($data_kataterkait);
        
        
        if ($data_fh_strukturparenttipe == "") $data_fh_strukturparenttipe = 'Content'; // $tmp["msg"].="Please choose Menu Type<br>";
        if ($data_fh_menu_name == "") $tmp["msg"].="Please input Menu Name<br>";
        if ($data_fh_menu_name_en == "") $tmp["msg"].="Please input Menu Name (EN)<br>";
        if ($data_fh_strukturprioritas != "") {
           if (!(ctype_digit($data_fh_strukturprioritas))) $tmp["msg"].="Please input Prioritas (numeric)<br>";
        }
		if (sizeof($data_files)>0) {
            $handle = new Upload($data_files["fh_content_banner"]);
            if ($data_files["fh_content_banner"]["name"] != "") {
                if (!($handle-> file_is_image)) { $tmp["msg"].= "Invalid image<br>";}
            }
		}  
        
        //if (($data_fh_strukturparenttipe == "Content")  && ($data_fh_strukturcontenttipe == "")) $tmp["msg"].="Please Choose Content Type<br>";

        if (count($data_fh_menu_cat) < 1) { $tmp["msg"].="Please Select at least one category<br>"; }
		else {
			$data_fh_menu_catselected = implode(':::',$data_fh_menu_cat);
		}
		
	    if ($tmp["msg"]=="")
	    {  if ($data_fh_strukturparenttipe == "Parent") {
              $SQL1 =  "INSERT INTO 		fh_pagestatis (fh_strukturparent, fh_strukturparenttipe, fh_menu_name, fh_menu_name_en, fh_strukturstatus, fh_strukturtipe, fh_menu_catselected, fh_coloumn_count,   fh_content_description2, fh_content_description2_en, fh_content_description3, fh_content_description3_en)
                              VALUES			    ('".$data_coremenu."', '".$data_fh_strukturparenttipe."', '".$data_fh_menu_name."', '".$data_fh_menu_name_en."', '','' , '".$data_fh_menu_catselected."', '".$data_fh_coloumn_count."', '','', '','')";
           } else {
              if ($data_fh_strukturcontenttipe == "Module") {
                  $SQL1 =  "INSERT INTO 		fh_pagestatis (fh_strukturparent, fh_strukturparenttipe, fh_menu_name, fh_menu_name_en, fh_strukturstatus, fh_strukturtipe, fh_modulefilename, fh_menu_catselected, fh_coloumn_count,   fh_content_description2, fh_content_description2_en, fh_content_description3, fh_content_description3_en)
                                  VALUES			    ('".$data_coremenu."', '".$data_fh_strukturparenttipe."', '".$data_fh_menu_name."', '".$data_fh_menu_name_en."', '".$data_fh_strukturstatus."', '".$data_fh_strukturcontenttipe."', '".$data_fh_modulefilename."' , '".$data_fh_menu_catselected."', '".$data_fh_coloumn_count."', '','', '','')";
              } else {
                  $SQL1 =  "INSERT INTO 		fh_pagestatis (fh_strukturparent, fh_strukturparenttipe, fh_menu_name, fh_menu_name_en, fh_strukturstatus, fh_strukturtipe, fh_menu_pageheader, fh_menu_pageheader_en, fh_menu_metakeyword, fh_menu_metadescription, fh_content_titlename, fh_content_description, fh_content_titlename_en, fh_content_description_en, fh_menu_catselected, fh_coloumn_count,   fh_content_description2, fh_content_description2_en, fh_content_description3, fh_content_description3_en)
                                  VALUES			    ('".$data_coremenu."', '".$data_fh_strukturparenttipe."', '".$data_fh_menu_name."', '".$data_fh_menu_name_en."', '".$data_fh_strukturstatus."', '".$data_fh_strukturcontenttipe."', '".$data_fh_menu_pageheader."', '".$data_fh_menu_pageheader_en."','".$data_fh_menu_metakeyword."','".$data_fh_menu_metadescription."','".$data_fh_content_title."', '".$data_fh_content_description."','".$data_fh_content_title_en."', '".$data_fh_content_description_en."' , '".$data_fh_menu_catselected."', '".$data_fh_coloumn_count."', '".$data_fh_content_description2."', '".$data_fh_content_description2_en."', '".$data_fh_content_description3."', '".$data_fh_content_description3_en."'  )";
              }
		   }
		   
		  // var_dump($SQL1);
		  // echo '<br>';
		  // var_dump($this->db->Execute($SQL1));
		  // die;
		   
		   $this -> db -> Execute($SQL1);
		   $tmp_lastid = $this -> db->Insert_ID();
		   
		   
		   //*** Untuk Upload New Banner
            if ($data_files["fh_content_banner"]["name"] != "") {
                    $handle->file_new_name_body = 'defaultstatisbanner'.$tmp_lastid;
                    $handle->image_resize = true;
                    if ($data_width >0) $handle->image_x = $data_width;
                    if ($data_height >0) $handle->image_y = $data_height;
                    $handle->Process($data_path);
                    $tmp_content_banner = $handle->file_dst_name;
                    $SQL1 = "UPDATE		 	fh_pagestatis
                                  SET				fh_content_banner = '".$tmp_content_banner."'
                                  WHERE			fh_strukturid = ".$tmp_lastid;
                    $this->db-> Execute($SQL1);
			}
			
			if($data_kataterkaitloop > 0 )
			{
				for($i=0;$i<count($data_kataterkait);$i++){
                    $SQL = "INSERT INTO `fh_pagestatis_kataterkait`  (fh_strukturid, `kataterkait`) 	
                                VALUES ('".$tmp_lastid."', '".$data_kataterkait[$i]."')";
                    $this->db   -> Execute($SQL);
                }
            }
                
		   

           $SQL1 =  "UPDATE         fh_pagestatis 
                          SET               fh_strukturprioritas = '".$tmp_lastid."'
                          WHERE          fh_strukturid = ".$tmp_lastid;
           $this->db->Execute($SQL1);
		   
           $this->insert_log('Insert', 'Insert New Menu', 'Insert Menu for '.$data_fh_menu_name); 
	    
           $tmp["msg"] = "Menu <b>".$data_fh_menu_name."</b> has been added<br>";
	       $tmp["msg2"] = "Done";

	    } else {
	      $tmp["data_coremenu"] = $data_input["coremenu"];
          $tmp["data_fh_strukturparenttipe"] = $data_input["fh_strukturparenttipe"];
          $tmp["data_fh_menu_name"] = $data_input["fh_menu_name"];
          $tmp["data_fh_menu_name_en"] = $data_input["fh_menu_name_en"];
          $tmp["data_fh_strukturstatus"] = $data_input["fh_strukturstatus"];
          $tmp["data_fh_strukturcontenttipe"] = $data_input["fh_strukturcontenttipe"];
          $tmp["data_fh_menu_pageheader"] = $data_input["fh_menu_pageheader"];
          $tmp["data_fh_menu_pageheader_en"] = $data_input["fh_menu_pageheader_en"];
          $tmp["data_fh_menu_metakeyword"] = $data_input["fh_menu_metakeyword"];
          $tmp["data_fh_menu_metadescription"] = $data_input["fh_menu_metadescription"];
          $tmp["data_fh_content_title"] = $data_input["fh_content_title"];
          $tmp["data_fh_content_description"] = $data_input["fh_content_description"];
          $tmp["data_fh_content_title_en"] = $data_input["fh_content_title_en"];
          $tmp["data_fh_content_description_en"] = $data_input["fh_content_description_en"];
          $tmp["data_fh_modulefilename"] = $data_input["fh_modulefilename"];
          $tmp["data_fh_menu_cat"] = $data_input["fh_menu_cat"];
          $tmp["data_fh_coloumn_count"] = $data_input["fh_coloumn_count"];
          $tmp["data_fh_content_description2"] = $data_input["fh_content_description2"];
          $tmp["data_fh_content_description2_en"] = $data_input["fh_content_description2_en"];
          $tmp["data_fh_content_description3"] = $data_input["fh_content_description3"];
          $tmp["data_fh_content_description3_en"] = $data_input["fh_content_description3_en"];
          $tmp["data_kataterkait"] = $data_input["data_kataterkait"];
          $tmp["data_kataterkaitloop"] = $data_kataterkaitloop;
         $tmp["data_fh_menu_catselected"] = $data_fh_menu_catselected;
	    }
	  return ($tmp); 
  }



    //************************************************ Edit Menu ***************************************
	function edit_menu($data_input,$data_files, $data_path, $data_width, $data_height) {
        global $handle;
        $data_coremenu = $data_input["coremenu"] == "" || $data_input["coremenu"] == null ? 0 : $data_input["coremenu"];
        $data_fh_menu_name = $data_input["fh_menu_name"];
        $data_fh_menu_name_en = $data_input["fh_menu_name_en"];
        $data_fh_strukturparenttipe = $data_input["fh_strukturparenttipe"];
        $data_fh_strukturstatus = $data_input["fh_strukturstatus"];
        $data_fh_strukturcontenttipe = $data_input["fh_strukturcontenttipe"];
        $data_fh_menu_pageheader = $data_input["fh_menu_pageheader"];
        $data_fh_menu_pageheader_en = $data_input["fh_menu_pageheader_en"];
        $data_fh_menu_metakeyword = $data_input["fh_menu_metakeyword"];
        $data_fh_menu_metadescription = $data_input["fh_menu_metadescription"];
        $data_fh_content_title = $data_input["fh_content_title"];
        $data_fh_content_description = $data_input["fh_content_description"];
        $data_fh_content_title_en = $data_input["fh_content_title_en"];
        $data_fh_content_description_en = $data_input["fh_content_description_en"];
        $data_fh_modulefilename = $data_input["fh_modulefilename"];
	    $data_fh_strukturid = $data_input["fh_strukturid"];
	    $data_fh_menu_cat = $data_input["fh_menu_cat"];
        $data_fh_menu_catselected = '';
		
        $data_fh_coloumn_count = $data_input["fh_coloumn_count"];
        $data_fh_content_description2 = $data_input["fh_content_description2"];
        $data_fh_content_description2_en = $data_input["fh_content_description2_en"];
        $data_fh_content_description3 = $data_input["fh_content_description3"];
        $data_fh_content_description3_en = $data_input["fh_content_description3_en"];
        
        $data_kataterkait = $data_input["data_kataterkait"]; 
        $data_kataterkaitloop = count($data_kataterkait);
        
        
        
        if ($data_fh_strukturparenttipe == "") $data_fh_strukturparenttipe = 'Content';  //$tmp["msg"].="Please choose Menu Type<br>";
        if ($data_fh_menu_name == "") $tmp["msg"].="Please input Menu Name<br>";
        if ($data_fh_menu_name_en == "") $tmp["msg"].="Please input Menu Name (EN)<br>";
        if ($data_fh_strukturprioritas != "") {
           if (!(ctype_digit($data_fh_strukturprioritas))) $tmp["msg"].="Please input Prioritas (numeric)<br>";
        }
		if (sizeof($data_files)>0) {
            $handle = new Upload($data_files["fh_content_banner"]);
            if ($data_files["fh_content_banner"]["name"] != "") {
                if (!($handle-> file_is_image)) { $msg.= "Invalid image<br>";}
            }
		}          
        
       // if (($data_fh_strukturparenttipe == "Content")  && ($data_fh_strukturcontenttipe == "")) $tmp["msg"].="Please Choose Content Type<br>";
        
        if (count($data_fh_menu_cat) < 1) { $tmp["msg"].="Please Select at least one category<br>"; }
		else {
			$data_fh_menu_catselected = implode(':::',$data_fh_menu_cat);
		}
		
	    if ($tmp["msg"]=="")
        {   if ($data_fh_strukturparenttipe == "Parent") {
                $SQL1 =   "UPDATE fh_pagestatis set 
                                    fh_strukturparent = '".$data_coremenu."', 	
                                    fh_strukturparenttipe = '" .$data_fh_strukturparenttipe. "',
                                    fh_menu_name = '".$data_fh_menu_name."',
                                    fh_menu_name_en = '".$data_fh_menu_name_en."',
                                    fh_strukturtipe = '',
                                    fh_strukturstatus = '',
                                    fh_menu_pageheader = '',
                                    fh_menu_pageheader_en = '',
                                    fh_menu_metakeyword = '',
                                    fh_menu_metadescription = '',
                                    fh_content_titlename = '',
                                    fh_content_description = '',
                                    fh_content_titlename_en = '',
                                    fh_content_description_en = '',
                                    fh_modulefilename = '',
                                    fh_menu_catselected = '". $data_fh_menu_catselected . "'
                                WHERE fh_strukturid = ".$data_fh_strukturid;
            } else {
                if ($data_fh_strukturcontenttipe == "Module") {
                    $SQL1 =   "UPDATE fh_pagestatis set 
                                    fh_strukturparent = '".$data_coremenu."', 	
                                    fh_strukturparenttipe = '" .$data_fh_strukturparenttipe. "',
                                    fh_menu_name = '".$data_fh_menu_name."',
                                    fh_menu_name_en = '".$data_fh_menu_name_en."',
                                    fh_strukturtipe = '".$data_fh_strukturcontenttipe."',
                                    fh_strukturstatus = '".$data_fh_strukturstatus."',
                                    fh_menu_pageheader = '',
                                    fh_menu_pageheader_en = '',
                                    fh_menu_metakeyword = '',
                                    fh_menu_metadescription = '',
                                    fh_content_titlename = '',
                                    fh_content_description = '',
                                    fh_content_titlename_en = '',
                                    fh_content_description_en = '',
                                    fh_modulefilename = '".$data_fh_modulefilename."',
                                    fh_menu_catselected = '".$data_fh_menu_catselected."'
                                    WHERE fh_strukturid = ".$data_fh_strukturid;
                } else {
                    $SQL1 =   "UPDATE fh_pagestatis set 
                                    fh_strukturparent = '".$data_coremenu."', 	
                                    fh_strukturparenttipe = '" .$data_fh_strukturparenttipe. "',
                                    fh_menu_name = '".$data_fh_menu_name."',
                                    fh_menu_name_en = '".$data_fh_menu_name_en."',
                                    fh_strukturtipe = '".$data_fh_strukturcontenttipe."',
                                    fh_strukturstatus = '".$data_fh_strukturstatus."',
                                    fh_menu_pageheader = '".$data_fh_menu_pageheader."',
                                    fh_menu_pageheader_en = '".$data_fh_menu_pageheader_en."',
                                    fh_menu_metakeyword = '".$data_fh_menu_metakeyword."',
                                    fh_menu_metadescription = '".$data_fh_menu_metadescription."',
                                    fh_content_titlename = '".$data_fh_content_title."',
                                    fh_content_description = '".$data_fh_content_description."',
                                    fh_content_titlename_en = '".$data_fh_content_title_en."',
                                    fh_content_description_en = '".$data_fh_content_description_en."',
                                    fh_modulefilename = '',
                                    fh_menu_catselected = '".$data_fh_menu_catselected."',
                                    fh_coloumn_count = '".$data_fh_coloumn_count."',
                                    fh_content_description2 = '".$data_fh_content_description2."',
                                    fh_content_description2_en = '".$data_fh_content_description2_en."',
                                    fh_content_description3 = '".$data_fh_content_description3."',
                                    fh_content_description3_en = '".$data_fh_content_description3_en."'
                                    WHERE fh_strukturid = ".$data_fh_strukturid;
                }
            }
            
            // $this->db->debug=true;
            // var_dump($SQL1);
            // echo '<br>';
            // var_dump($this->db->Execute($SQL1));
            // die();
            
            $this->db->Execute($SQL1);
            
		   //*** Untuk Upload New Banner
            if ($data_files["fh_content_banner"]["name"] != "") {
                    $SQL = "SELECT      *
                                 FROM        fh_pagestatis
                                 WHERE      fh_strukturid = '".$data_fh_strukturid."'";
                    $RS = $this->db->Execute($SQL);
                    if ($RS->fields["fh_content_banner"] != "") { @unlink($data_path."".$RS->fields["fh_content_banner"]);  }
                    $handle->file_new_name_body = 'defaultstatisbanner'.$data_fh_strukturid;
                    $handle->image_resize = true;
                    if ($data_width > 0 ) $handle->image_x = $data_width;
                    if ($data_height > 0 ) $handle->image_y = $data_height;
                    $handle->Process($data_path);
                    $tmp_content_banner = $handle->file_dst_name;
                    $SQL1 = "UPDATE		 	fh_pagestatis
                                  SET				fh_content_banner = '".$tmp_content_banner."'
                                  WHERE			fh_strukturid = ".$data_fh_strukturid;
                    $this->db-> Execute($SQL1);
			}
			$SQL1 = "DELETE FROM		fh_pagestatis_kataterkait  WHERE			   fh_strukturid = ".$data_fh_strukturid;
            $this->db->Execute($SQL1);
			if($data_kataterkaitloop > 0 )
			{
				for($i=0;$i<count($data_kataterkait);$i++){
                    $SQL = "INSERT INTO `fh_pagestatis_kataterkait`  (fh_strukturid, `kataterkait`) 	
                                VALUES ('".$data_fh_strukturid."', '".$data_kataterkait[$i]."')";
                    $this->db   -> Execute($SQL);
                }
            }
            


            $this->insert_log('Edit', 'Edit Menu', 'Edit Menu for '.$data_fh_menu_name); 
	    
            $tmp["msg"] = "Menu <b>".$data_fh_menu_name."</b> has been edited<br>";
            $tmp["msg2"] = "Done";

        } else {
            $tmp["data_fh_strukturid"] = $data_input["fh_strukturid"];
            $tmp["data_coremenu"] = $data_input["coremenu"];
            $tmp["data_fh_strukturparenttipe"] = $data_input["fh_strukturparenttipe"];
            $tmp["data_fh_menu_name"] = $data_input["fh_menu_name"];
            $tmp["data_fh_menu_name_en"] = $data_input["fh_menu_name_en"];
            $tmp["data_fh_strukturstatus"] = $data_input["fh_strukturstatus"];
            $tmp["data_fh_strukturcontenttipe"] = $data_input["fh_strukturcontenttipe"];
            $tmp["data_fh_menu_pageheader"] = $data_input["fh_menu_pageheader"];
            $tmp["data_fh_menu_pageheader_en"] = $data_input["fh_menu_pageheader_en"];
            $tmp["data_fh_menu_metakeyword"] = $data_input["fh_menu_metakeyword"];
            $tmp["data_fh_menu_metadescription"] = $data_input["fh_menu_metadescription"];
            $tmp["data_fh_content_title"] = $data_input["fh_content_title"];
            $tmp["data_fh_content_description"] = $data_input["fh_content_description"];
            $tmp["data_fh_content_title_en"] = $data_input["fh_content_title_en"];
            $tmp["data_fh_content_description_en"] = $data_input["fh_content_description_en"];
            $tmp["data_fh_modulefilename"] = $data_input["fh_modulefilename"];
            $tmp["data_fh_menu_cat"] = $data_input["fh_menu_cat"];
            $tmp["data_fh_coloumn_count"] = $data_input["fh_coloumn_count"];
            $tmp["data_fh_content_description2"] = $data_input["fh_content_description2"];
            $tmp["data_fh_content_description2_en"] = $data_input["fh_content_description2_en"];
            $tmp["data_fh_content_description3"] = $data_input["fh_content_description3"];
            $tmp["data_fh_content_description3_en"] = $data_input["fh_content_description3_en"];
            $tmp["data_kataterkait"] = $data_input["data_kataterkait"];
            $tmp["data_kataterkaitloop"] = $data_kataterkaitloop;
			$tmp["data_fh_menu_catselected"] = $data_fh_menu_catselected;
        }
        return ($tmp); 
  }

}

?>