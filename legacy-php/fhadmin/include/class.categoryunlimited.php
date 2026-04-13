<?php
/**************************************************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 31 Januari 2009
  * @copyright by FaberHost.com

  * Class untuk Management Structure Menu
   
**************************************************************************/

class categoryunlimited extends dbcon {
    
    function categoryunlimited() {
		parent::dbcon();
    }
    
    //************************************************ Listing Menu dalam bentuk table ************************************
	function select_deep($parent, $prefix, $namatabel) {
	    global $tmp_flag1;
	    
        $SQL = "SELECT		*
                    FROM		    ".$namatabel."
                    WHERE		    categoryparentid = '".$parent."'
                    ORDER BY	    categoryprioritas ASC";
        $RS = $this->db->Execute($SQL);
        
        if ($tmp_flag1 == "") $tmp_flag1=0;
        
        while (!$RS->EOF) 
         {  if ($tmp_flag1=="0") {
                $tmp_menu .=  "<tr class='bgviolet3'>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=up&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/arrow_top.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=down&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/arrow_down.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=detail&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/edit.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=delete&categoryid=".$RS->fields["categoryid"]."' onclick='return konfirmasi()';><img src='../../images/delete.gif'></a></td>";
                $tmp_menu .=  "<td style='padding:2px 10px 2px 10px'>".$prefix.' '.$RS->fields['categoryname']." / ".$RS->fields['categoryname_en']."</td>";
                $tmp_menu .=  "<td class=wdth70 align=center>".$RS->fields['categorystatus']."</td>";
                $tmp_menu .=  "</tr>";
                $tmp_flag1 = 1;
            } else {
                $tmp_menu .=  "<tr class='bgwhite'>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=up&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/arrow_top.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=down&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/arrow_down.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=detail&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/edit.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=delete&categoryid=".$RS->fields["categoryid"]."' onclick='return konfirmasi()';><img src='../../images/delete.gif'></a></td>";
                $tmp_menu .=  "<td style='padding:2px 10px 2px 10px'>".$prefix.' '.$RS->fields['categoryname']." / ".$RS->fields['categoryname_en']."</td>";
                $tmp_menu .=  "<td class=wdth70 align=center>".$RS->fields['categorystatus']."</td>";
                $tmp_menu .=  "</tr>";
                $tmp_flag1 = 0;
            }
            
            $tmp_menu .=  $this->select_deep($RS->fields["categoryid"], $prefix."----", $namatabel, $selectitem);
            $RS->MoveNext();
         }
        return $tmp_menu;
    }



    //************************************************ Listing Menu dalam bentuk select option ************************************
	function select_deep_core ($parent, $prefix, $selectitem='', $namatabel) {
        $SQL = "SELECT         *
                     FROM           ".$namatabel."
                     WHERE         categoryparentid = '".$parent."'
                     ORDER BY     categoryprioritas ASC";
        $RS = $this->db->Execute($SQL);

        while (!$RS->EOF) 
         {  if ($selectitem == $RS->fields["categoryid"]) { $tmp_menu .=  '<option value="'.$RS->fields['categoryid'].'" selected>'.$prefix.' '.$RS->fields['categoryname'].'</option>';
            } else { $tmp_menu .=  '<option value="'.$RS->fields['categoryid'].'" >'.$prefix.' '.$RS->fields['categoryname']." / ".$RS->fields['categoryname_en'].'</option>'; }
            
            $tmp_menu .=  $this->select_deep_core($RS->fields["categoryid"], $prefix."----", $selectitem, $namatabel);
            $RS->MoveNext();
         }
        return $tmp_menu;
    }



    //************************************************ Add New Menu ***************************************
	function insert_menu($data_input, $namatabel) {
        $data_categoryparentid = $data_input["categoryparentid"];
        $data_categoryname = $data_input["categoryname"];
        $data_categoryname_en = $data_input["categoryname_en"];
        $data_categorystatus = $data_input["categorystatus"];
        
        if ($data_categoryname == "") $tmp["msg"].="Please input Menu Name<br>";
        if ($data_categoryname_en == "") $tmp["msg"].="Please input Menu Name (EN)<br>";
        
	    if ($tmp["msg"]=="")
	    {  $SQL1 =  "INSERT INTO 		".$namatabel." (categoryparentid, categoryname, categoryname_en, categorystatus)
                           VALUES			    ('".$data_categoryparentid."', '".$data_categoryname."', '".$data_categoryname_en."', '".$data_categorystatus."' )";
           $this -> db -> Execute($SQL1);
		   $tmp_lastid = $this -> db->Insert_ID();

           $SQL1 =  "UPDATE        ".$namatabel."
                          SET              categoryprioritas = '".$tmp_lastid."'
                          WHERE         categoryid = ".$tmp_lastid;
           $this->db->Execute($SQL1);
		   
           $this->insert_log('Insert', 'Insert New Category', 'Insert Category for '.$data_categoryname); 
	    
           $tmp["msg"] = "Category <b>".$data_categoryname."</b> has been added<br>";
	       $tmp["msg2"] = "Done";

	    } else {
	      $tmp["data_categoryparentid"] = $data_input["categoryparentid"];
          $tmp["data_categoryname"] = $data_input["categoryname"];
          $tmp["data_categoryname_en"] = $data_input["categoryname_en"];
          $tmp["data_categorystatus"] = $data_input["categorystatus"];
 	    }
	  return ($tmp); 
  }



    //************************************************ Edit Menu ***************************************
	function edit_menu($data_input, $namatabel) {
        $data_categoryparentid = $data_input["categoryparentid"];
        $data_categoryname = $data_input["categoryname"];
        $data_categoryname_en = $data_input["categoryname_en"];
        $data_categorystatus = $data_input["categorystatus"];
	    $data_categoryid = $data_input["categoryid"];
        
        if ($data_categoryname == "") $tmp["msg"].="Please input Category Name<br>";
        
	    if ($tmp["msg"]=="")
        {   $SQL1 =   "UPDATE   ".$namatabel."
                            SET         categoryparentid = '".$data_categoryparentid."', 	
                                           categoryname = '".$data_categoryname."',
                                           categoryname_en = '".$data_categoryname_en."',
                                           categorystatus = '".$data_categorystatus."'                                           
                            WHERE    categoryid = ".$data_categoryid;
            $this->db->Execute($SQL1);

            $this->insert_log('Edit', 'Edit Category', 'Edit Category for '.$data_categoryname); 
	    
            $tmp["msg"] = "Category <b>".$data_categoryname."</b> has been edited<br>";
            $tmp["msg2"] = "Done";

        } else {
            $tmp["data_categoryid"] = $data_input["categoryid"];
            $tmp["data_categoryparentid"] = $data_input["categoryparentid"];
            $tmp["data_categoryname"] = $data_input["categoryname"];
            $tmp["data_categoryname_en"] = $data_input["categoryname_en"];
            $tmp["data_categorystatus"] = $data_input["categorystatus"];
        }
        return ($tmp); 
  }

}


///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

class categorygallery extends dbcon {
    
    function categorygallery() {
		parent::dbcon();
    }
    
    //************************************************ Listing Menu dalam bentuk table ************************************
	function select_deep($parent, $prefix, $namatabel) {
	    global $tmp_flag1;
	    
        $SQL = "SELECT		*
                    FROM		    ".$namatabel."
                    WHERE		    categoryparentid = '".$parent."'
                    ORDER BY	    categoryprioritas ASC";
        $RS = $this->db->Execute($SQL);
        
        if ($tmp_flag1 == "") $tmp_flag1=0;
        
        while (!$RS->EOF) 
         {  if ($tmp_flag1=="0") {
                $tmp_menu .=  "<tr class='bgviolet3'>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=up&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/arrow_top.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=down&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/arrow_down.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=detail&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/edit.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=delete&categoryid=".$RS->fields["categoryid"]."' onclick='return konfirmasi()';><img src='../../images/delete.gif'></a></td>";
                $tmp_menu .=  "<td style='padding:2px 10px 2px 10px'>".$prefix." ".$RS->fields['categoryname']." / <font color='red'>".$RS->fields['categoryname_en']."</font></td>";
                $tmp_menu .=  "<td class=wdth70 align=center>".$RS->fields['categorystatus']."</td>";
                $tmp_menu .=  "<td class=wdth70 align=center>".$RS->fields['categorytype']."</td>";
                // $tmp_menu .=  "<td class=wdth70 align=center>".$RS->fields['categoryshow']."</td>";
                $tmp_menu .=  "</tr>";
                $tmp_flag1 = 1;
            } else {
                $tmp_menu .=  "<tr class='bgwhite'>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=up&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/arrow_top.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=down&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/arrow_down.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=detail&categoryid=".$RS->fields["categoryid"]."'><img src='../../images/edit.gif'></a></td>";
                $tmp_menu .=  "<td class=wdth50 align=center><a href='". $_SERVER['PHP_SELF']."?action=delete&categoryid=".$RS->fields["categoryid"]."' onclick='return konfirmasi()';><img src='../../images/delete.gif'></a></td>";
                $tmp_menu .=  "<td style='padding:2px 10px 2px 10px'>".$prefix.' '.$RS->fields['categoryname']." / <font color='red'>".$RS->fields['categoryname_en']."</font></td>";
                $tmp_menu .=  "<td class=wdth70 align=center>".$RS->fields['categorystatus']."</td>";
                $tmp_menu .=  "<td class=wdth70 align=center>".$RS->fields['categorytype']."</td>";
                // $tmp_menu .=  "<td class=wdth70 align=center>".$RS->fields['categoryshow']."</td>";
                $tmp_menu .=  "</tr>";
                $tmp_flag1 = 0;
            }
            
            $tmp_menu .=  $this->select_deep($RS->fields["categoryid"], $prefix."----", $namatabel, $selectitem);
            $RS->MoveNext();
         }
        return $tmp_menu;
    }



    //************************************************ Listing Menu dalam bentuk select option ************************************
	function select_deep_core ($parent, $prefix, $selectitem='', $namatabel) {
        $SQL = "SELECT				*
                     FROM			".$namatabel."
                     WHERE			categoryparentid = '".$parent."'
                     ORDER BY		categoryprioritas ASC";
        $RS = $this->db->Execute($SQL);

        while (!$RS->EOF) 
         {  if ($selectitem == $RS->fields["categoryid"]) { $tmp_menu .=  '<option value="'.$RS->fields['categoryid'].'" selected>'.$prefix.' '.$RS->fields['categoryname'].'</option>';
            } else { $tmp_menu .=  '<option value="'.$RS->fields['categoryid'].'" >'.$prefix.' '.$RS->fields['categoryname'].'</option>'; }
            
            $tmp_menu .=  $this->select_deep_core($RS->fields["categoryid"], $prefix."----", $selectitem, $namatabel);
            $RS->MoveNext();
         }
        return $tmp_menu;
    }



    //************************************************ Add New Menu ***************************************
	function insert_menu($data_input, $namatabel) {
        $data_categoryparentid = $data_input["categoryparentid"];
        $data_categoryname = $data_input["categoryname"];
        $data_categoryname_en = $data_input["categoryname_en"];
        $data_categorystatus = $data_input["categorystatus"];
        $data_categorytype = $data_input["categorytype"];
        $data_categoryshow = $data_input["categoryshow"];
        
        if ($data_categoryname == "") $tmp["msg"].="Please input Menu Name<br>";
        
	    if ($tmp["msg"]=="")
	    {  $SQL1 =  "INSERT INTO		".$namatabel." (categoryparentid, categoryname, categoryname_en, categorystatus, categorytype, categoryshow)
                           VALUES		('".$data_categoryparentid."', '".$data_categoryname."', '".$data_categoryname_en."', '".$data_categorystatus."', '".$data_categorytype."', '".$data_categoryshow."' )";
           $this -> db -> Execute($SQL1);
		   $tmp_lastid = $this -> db->Insert_ID();

           $SQL1 =  "UPDATE			".$namatabel."
                          SET		categoryprioritas = '".$tmp_lastid."'
                          WHERE		categoryid = ".$tmp_lastid;
           $this->db->Execute($SQL1);
		   
           $this->insert_log('Insert', 'Insert New Category', 'Insert Category for '.$data_categoryname); 
	    
           $tmp["msg"] = "Category <b>".$data_categoryname."</b> has been added<br>";
	       $tmp["msg2"] = "Done";

	    } else {
			$tmp["data_categoryparentid"] = $data_input["categoryparentid"];
			$tmp["data_categoryname"] = $data_input["categoryname"];
			$tmp["data_categoryname_en"] = $data_input["categoryname_en"];
            $tmp["data_categorystatus"] = $data_input["categorystatus"];
            $tmp["data_categorytype"] = $data_input["categorytype"];
            $tmp["data_categoryshow"] = $data_input["categoryshow"];
 	    }
	  return ($tmp); 
  }



    //************************************************ Edit Menu ***************************************
	function edit_menu($data_input, $namatabel) {
        $data_categoryparentid = $data_input["categoryparentid"];
        $data_categoryname = $data_input["categoryname"];
        $data_categoryname_en = $data_input["categoryname_en"];
        $data_categorystatus = $data_input["categorystatus"];
        $data_categorytype = $data_input["categorytype"];
        $data_categoryshow = $data_input["categoryshow"];
	    $data_categoryid = $data_input["categoryid"];
        
        if ($data_categoryname == "") $tmp["msg"].="Please input Category Name<br>";
        
	    if ($tmp["msg"]=="")
        {   $SQL1 =   "UPDATE   ".$namatabel."
                            SET         categoryparentid = '".$data_categoryparentid."', 	
                                           categoryname = '".$data_categoryname."',
                                           categoryname_en = '".$data_categoryname_en."',
                                           categorystatus = '".$data_categorystatus."',
                                           categorytype = '".$data_categorytype."'  ,
                                           categoryshow = '".$data_categoryshow."'                                           
                            WHERE    categoryid = ".$data_categoryid;
            $this->db->Execute($SQL1);

            $this->insert_log('Edit', 'Edit Category', 'Edit Category for '.$data_categoryname); 
	    
            $tmp["msg"] = "Category <b>".$data_categoryname."</b> has been edited<br>";
            $tmp["msg2"] = "Done";

        } else {
            $tmp["data_categoryid"] = $data_input["categoryid"];
            $tmp["data_categoryparentid"] = $data_input["categoryparentid"];
            $tmp["data_categoryname"] = $data_input["categoryname"];
            $tmp["data_categoryname_en"] = $data_input["categoryname_en"];
            $tmp["data_categorystatus"] = $data_input["categorystatus"];
            $tmp["data_categorytype"] = $data_input["categorytype"];
            $tmp["data_categoryshow"] = $data_input["categoryshow"];
        }
        return ($tmp); 
  }

}

?>