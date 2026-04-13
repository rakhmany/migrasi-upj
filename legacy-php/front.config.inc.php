<?php
/*************************************
  * FaberHost CMS System
  * @author : Seto Andry Wibowo
  * Created : 13 April 2008
  * @copyright by FaberHost.com
  
  * Update : Februari 2014
  * Versi 1.2

  * Config untuk Validasi Preview System
*************************************/
 //*** Include Class
include ("fhadmin/config.inc.php"); 

//*** Berfungsi untuk Cek Input Login Preview
//*** Jika Login Preveiew sama dengan Keyword Preview di sistem, maka SESSION untuk lihat progress web = 1
if ($_POST["submitkeyword"]) {
  if (!( $_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code'] ) )) {
        $msg_keywordlogin = "Please input valid security code !!";
  } else {
		if ($_POST["previewkeyword"] != $conf["webstatuskey"]) { $msg_keywordlogin = "Login Fail, Please Try again or contact your administrator !!"; }
		else { $_SESSION["cekstatusweb"] = 1; }
  }
}
 
//*** Jika $_SESSION["cekstatusweb"] = 1, maka pengunjung otomatis bisa lihat website nya
if ($_SESSION["cekstatusweb"] != 1) {
	if ($conf["webstatus"] != 'Published') {
		//*** Jika status masih dalam Trial Version / belum Published
		$smarty->assign('msg_keywordlogin',$msg_keywordlogin);	
		$smarty->display('index_onprogress.tpl');
		exit;
	} else {
		//*** Jika Status nya sudah Published
		$_SESSION["cekstatusweb"] = 1;
		// header("location:index.php");
	}
}


if (!(isset($_SESSION["lang"])) || $_SESSION["lang"] != '_id') {
	$_SESSION["lang"] = '_en';
} 
$language = $_SESSION["lang"];

include('lang/lang'. $_SESSION["lang"] .'.php');

//*** Jika dalam Mode On Progress --> Set Logout
if ((isset($_GET["seslogout"])) and (ctype_digit($_GET["seslogout"]))) 
{   if($_GET["seslogout"] == "1")   {
        session_start();
        session_destroy();
		header("location: ./");
    }
}
 

 
function redirToLogin() {
	header("location: ".$fconf["site"]."login.php?next=".rawurlencode($_SERVER["REQUEST_URI"]));
}


$SQL = "SELECT	* FROM	    fh_userlog order by fh_userlogid desc ";
$RS = $db->Execute($SQL);
$last_update_time = strtotime($RS->fields["fh_date"]);


define("BASE_URL", "//".$_SERVER['HTTP_HOST'].str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']));


 

function format_price($price)
{
	return 'Rp. '.number_format($price);
}


 
 

function pagingfront($itemperpage, $totalitem, $current_page, $param='', $pgn = 'property-listings/?page=')
{
	
	$totalpages = @intval($totalitem/$itemperpage);
	$difference = $totalpages - $current_page;
    $low_range 	= $current_page - 3;
    $high_range = $current_page + 4;
	$param = $param == '' ? '' : ''.$param;
	$pgn = $pgn != '' ? $pgn : 'page';
    
	if ($totalitem%$itemperpage){
		$totalpages++;
	}
	if($totalpages < 1)
	{
		$totalpages = 1;
	}
	
	$pagination = '';
	for ($i=1; $i<=$page_count; $i++){
		if($current_page == $i){
			$pagination .= ' <li class="page-item active"><a class="page-link"   href="'.$pgn.''.$current_page.$param.'">'.$i.'</a></li>';
		}else{
			$pagination .= ' <li class="page-item"><a class="page-link" href="'.$pgn.''.$i.$param.'">'.$i.'</a></li> ';
		}
	}
	$html = '';
	if ($totalpages <= 10) {
        for ($i=1; $i<=$totalpages; $i++) {
	        if($current_page == $i){
            	$html .= ' <li class="page-item active"><a class="page-link"   href="'.$pgn.''.$i.$param.'">'.$i.'</a></li>';
        	} else {
	        	$html .= ' <li class="page-item"><a class="page-link" href="'.$pgn.''.$i.$param.'">'.$i.'</a></li> ';
        	}
        }
    } else if ($totalpages > 10 && $difference < 4) {
        $html .= ' <li class="page-item"><a class="page-link" href="'.$pgn.'=1'.$param.'">1</a></li> ... ';
        for ($i=($totalpages-5); $i<=$totalpages; $i++) {
            if($current_page == $i){
            	$html .= '<li class="page-item active"><a class="page-link"   href="'.$pgn.''.$i.$param.'">'.$i.'</a></li>';
        	} else {
	        	$html .= ' <li class="page-item"><a class="page-link" href="'.$pgn.''.$i.$param.'">'.$i.'</a></li> ';
        	}
        }
    } else if ($totalpages > 10) {
        if ($current_page < 6) {
            for ($i=1; $i<7; $i++) {
                if($current_page == $i){
	            	$html .= '<li class="page-item active"><a class="page-link"   href="'.$pgn.''.$current_page.$param.'">'.$i.'</a></li>';
	        	} else {
		        	$html .= ' <li class="page-item"><a class="page-link" href="'.$pgn.''.$i.$param.'">'.$i.'</a></li> ';
	        	}
            }
            
            $html .= ' ... <li class="page-item"><a class="page-link" href="'.$pgn.''.$totalpages.$param.'">'.$totalpages.'</a></li>';
        } else {
            $html = ' <li class="page-item"><a class="page-link" href="'.$pgn.'1'.$param.'">1</a></li> ... ';
            for ($i=$low_range; $i<$high_range; $i++) {
                if($current_page == $i){
	            	$html .= '<li class="page-item active"><a class="page-link"   href="'.$pgn.''.$current_page.$param.'">'.$i.'</a></li>';
	        	} else {
		        	$html .= ' <li class="page-item"><a class="page-link" href="'.$pgn.''.$i.$param.'">'.$i.'</a></li> ';
	        	}
            }
            $html .= ' ... <li class="page-item"><a class="page-link" href="'.$pgn.''.$totalpages.$param.'">'.$totalpages.'</a></li>';
        }
    }
    if ($current_page == 1) {
        $previous_page = ' <li class="page-item active"><a class="page-link"   href="'.$pgn.''.$current_page.$param.'">&lt;</a></li> ';
        $first_page = ' <li class="page-item active"><a class="page-link"   href="'.$pgn.''.$current_page.$param.'">First</a></li> ';
    } else {
        $previous_page = ' <li class="page-item"><a class="page-link" href="'.$pgn.''.($current_page - 1).$param.'">&lt;</a></li> ';
        $first_page = ' <li class="page-item"><a class="page-link" href="'.$pgn.'1'.$param.'">First</a></li> ';
    }
    if ($current_page == $totalpages) {
        $next_page = ' <li class="page-item active"><a class="page-link"   href="'.$pgn.''.$totalpages.$param.'">&gt;</a></li> ';
        $last_page = ' <li class="page-item active"><a class="page-link"   href="'.$pgn.''.$totalpages.$param.'">Last</a></li> ';
    } else {
        $next_page = ' <li class="page-item"><a class="page-link" href="'.$pgn.''.($current_page + 1) . $param.'">&gt;</a></li> ';
        $last_page = ' <li class="page-item"><a class="page-link" href="'.$pgn.''.$totalpages . $param.'">Last</a></li> ';
    }
    
	$from				=	intval(($current_page-1)*$itemperpage);
	
	$ret['prev'] 		= 	$previous_page;
	$ret['first'] 		= 	$first_page;
	$ret['next'] 		= 	$next_page;
	$ret['last'] 		= 	$last_page;
	$ret['page'] 		= 	$html;
	$ret['from'] 		= 	$from;
	
	return $ret;
}

 

function makeShort($str, $len) { 
	if(strlen($str) >$len){
		//$string = substr($str, 0, $len).' ...'; 
		$string = strtok(wordwrap(ltrim(strip_tags($str)),$len,'[^^^]'),'[^^^]').' ...'; 
	}else{
		$string = $str;
	}
	return $string; 
}


function  get_image_gallery($type, $id)
{
	global $db;
	
	$path_file_image = './upload/';
	 
	if($type == 'homeevent')
	{
		$path_file_image = './upload/module/event/';
		$res_width =  800;
		$res_height =  600;
		$img = $id; 
	}
	if($type == 'homenews')
	{
		$path_file_image = './upload/module/news/';
		$res_width =  800;
		$res_height =  600;
		$img = $id; 
	}
	if($type == 'homehighlights')
	{
		$path_file_image = './upload/module/highlights/';
		$res_width =  800;
		$res_height =  600;
		$img = $id; 
	}
	if($type == 'breadcumb_img')
	{
		$path_file_image = 'upload/module/';
		$res_width = 1366;
		$res_height =  350;
		$img = $id; 
	}
	if($type == 'facilities')
	{
		$path_file_image = 'upload/module/gallery3/';
		$res_width = 1200;
		$res_height =  800;
		$img = $id; 
	}
	 
	if($type == 'kerjasama')
	{
		$path_file_image = 'upload/module/kerjasama/';
		$res_width = 274;
		$res_height =  174;
		$img = $id; 
	}
	if($type == 'highlight_thumb')
	{
		$path_file_image = 'upload/module/highlights/';
		$res_width = 800;
		$res_height =  600;
		$img = $id; 
	}
	if($type == 'highlight_big')
	{
		$path_file_image = 'upload/module/highlights/';
		$res_width = 1600;
		$res_height =  1200;
		$img = $id; 
	}
	if($type == 'news_thumb')
	{
		$path_file_image = 'upload/module/news/';
		$res_width = 800;
		$res_height =  600;
		$img = $id; 
	}
	if($type == 'news_big')
	{
		$path_file_image = 'upload/module/news/';
		$res_width = 1600;
		$res_height =  1200;
		$img = $id; 
	}
	if($type == 'events_thumb')
	{
		$path_file_image = 'upload/module/event/';
		$res_width = 800;
		$res_height =  600;
		$img = $id; 
	}
	if($type == 'events_big')
	{
		$path_file_image = 'upload/module/event/';
		$res_width = 1600;
		$res_height =  1200;
		$img = $id; 
	}
	
	if($type == 'pressrelease_thumb')
	{
		$path_file_image = 'upload/module/pressrelease/';
		$res_width = 800;
		$res_height =  600;
		$img = $id; 
	}
	if($type == 'pressrelease_big')
	{
		$path_file_image = 'upload/module/pressrelease/';
		$res_width = 1600;
		$res_height =  1200;
		$img = $id; 
	}
	if($type == 'alumni_thumb')
	{
		$res_width = 350;
		$res_height =  350;
		$img = $id; 
	} 
	if($type == 'instagram_feed')
	{
		$res_width = 280;
		$res_height =  350;
		$img = $id; 
	} 
	if($type == 'progstudi')
	{
		$path_file_image = 'upload/module/progstudi/';
		$res_width = 300;
		$res_height =  300;
		$img = $id; 
	}
	if($type == 'progstudi_tumb')
	{
		$res_width = 300;
		$res_height =  300;
		$img = $id; 
	}
	if($type == 'manajementim')
	{
		$res_width = 500;
		$res_height =  850;
		$img = $id; 
	}
	if($type == 'collaborative_thumb')
	{
		$res_width = 600;
		$res_height =  360;
		$img = $id; 
	}
	if($type == 'footerabout')
	{
		$res_width = 1104;
		$res_height =  300;
		$img = $id; 
	}
	if($type == 'footerohs')
	{
		$res_width = 200;
		$res_height =  200;
		$img = $id; 
	}
	if($type == 'footeriso')
	{
		$res_width = 120;
		$res_height =  70;
		$img = $id; 
	}
	if($type == 'bisnisproduct')
	{
		$res_width = 323;
		$res_height =  282;
		$img = $id; 
	}
	if($type == 'recentpost')
	{
		$res_width = 80;
		$res_height =  80;
		$img = $id; 
	}
	 

// 	if(!empty($img))
// 	{ 
// 		if(file_exists($path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img))
// 		{
// 			return $path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img.''; 
// 		}
// 		else
// 		{
// 			return 'image.php?type='.$type.'&img='.$id; 
// 		}
// 	}
// 	else
// 	{ 
// 		if(file_exists($path_file_image.'crop'.$res_width.'-'.$res_height.'_no-image.jpg'))
// 		{
// 			return $path_file_image.'crop'.$res_width.'-'.$res_height.'_no-image.jpg'; 
// 		}
// 	}
	
	$image_src = $path_file_image.$img; 
	$width = $type;
	
	if($width == 'instagram_feed')
    {

        $a = $path_file_image.$img;
        return $a;
        // var_dump($a);
        // die();
    }
	
	if(!empty($img))
	{
		 
		$img_webp =  $img . '.webp';
		$final_img = $path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img;
		$final_imgwebp = $path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img_webp;
	
		if(file_exists($path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img_webp))
		{
			$diff1 = time()-filemtime($final_imgwebp);
			$diff2 = time()-filemtime($image_src);
			if($diff2 > $diff1)
			{
				return $final_imgwebp; 
			}
			else
			{
			 	@unlink($final_img);
			 	@unlink($final_imgwebp);
			 	return 'image.php?type='.$type.'&img='.$id; 
			} 
			
		}
		else
		{
			return 'image.php?type='.$type.'&img='.$id; 
		}
	}
	else
	{ 
	    
		if(file_exists($path_file_image.'crop'.$res_width.'-'.$res_height.'_no-image.jpg.webp'))
		{
			return $path_file_image.'crop'.$res_width.'-'.$res_height.'_no-image.jpg.webp'; 
		}
		else
		{
			return 'image.php?type='.$type.'&img='.$id; 
		}
	} 

}

                
function get_parent($content_id, $ori_return=array())
{
	global $db, $language;
	
	$return = array();
    $sql = "SELECT * FROM d_mainmenu  WHERE mainmenu_id = $content_id"; 
    $RS = $db->Execute($sql);
    if ( is_subclass_of($RS, 'ADORecordSet') AND $RS->RecordCount())
    {
	    $link_menu = 'menu/'.$RS->fields['mainmenu_id'].'/'.createPermalink($RS->fields['mainmenu_title'.$language]).'';
	    
	    if($RS->fields['mainmenu_parent'] == 0 )
	    {
		    $return['root_id'] 		=   $RS->fields['mainmenu_id'];
		    $return['root_name'] 	=   $RS->fields['mainmenu_title'.$language];
		    if(!empty($ori_return['path']) )
		    {
			    $ori_return['path'][sizeof($ori_return['path'])] = '<a href="'.$link_menu.'">'.$RS->fields['mainmenu_title'.$language].'</a>';
		    }
		    else
		    {
			    $ori_return['path'][0] = '<a href="'.$link_menu.'">'.$RS->fields['mainmenu_title'.$language].'</a>';
		    }
		    $return['path']			=	$ori_return['path'];
	    }
	    else
	    {
		    if(!empty($ori_return['path']) )
		    {
			    $ori_return['path'][sizeof($ori_return['path'])] = '<a href="'.$link_menu.'">'.$RS->fields['mainmenu_title'.$language].'</a>';
		    }
		    else
		    {
			    $ori_return['path'][0] = '<a href="'.$link_menu.'">'.$RS->fields['mainmenu_title'.$language].'</a>';
		    }
		    
		    $return =  get_parent($RS->fields['mainmenu_parent'], $ori_return);
	    } 
    }
    return  $return;
}


if($language == '_id')
{ 
    $html_page_title = $basic->fields["fh_general_pageheader"];
}
else
{
    $html_page_title = $basic->fields["fh_general_pageheader_en"];
}

$fh_general_metakeyword 	= $basic->fields["fh_general_metakeyword"];
$fh_general_metadescription = $basic->fields["fh_general_metadescription"];

$arr_month_name_in = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember');
$arr_month_name_en = array('', 'January', 'February', 'Marh', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');


?>