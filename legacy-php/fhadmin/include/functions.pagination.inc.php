<?php

//*** function.pagination.inc.php created by Seto Andry Wibowo
//*** Date : 14 April 2008

//*** $page 				= halaman yang diakses sekarang
//*** $total_jumlah_page 	= total jumlah halaman yang ada
//*** $teks_parameter		= berisi parameter-parameter untuk $_GET
    
//*** Return file dari function adalah :
//*** $pagingStart			= Start Halaman yang akan mungul
//*** $pagingEnd			= Ending Halaman yang akan muncul
//*** $halaman_first		= untuk halaman firstnya
//*** $halaman_next			= untuk halaman selanjutnya
//*** $halaman_prev			= untuk halaman sebelumnya
//*** $halaman_last			= untuk halaman terakhirnya


function pagination($page, $total_jumlah_page, $teks_parameter, $class_active = 'active', $place_active ='', $next_text = '<i class="fa fa-chevron-left"></i> ', $prev_text = ' <i class="fa fa-chevron-right"></i>', $last_text = 'Last &raquo;', $first_text = '&laquo; First', $rewriteurl = false)
{ 
   global $fconf;
   if ($total_jumlah_page != 0) {
     if (($page <= $total_jumlah_page) and ($page > 0)) {
   	     if ($page < 5) {
		   		$array['pagingStart'] = 1;
   	       		if ($total_jumlah_page >= 10)  $array['pagingEnd']=10;
		   		else $array['pagingEnd'] = $total_jumlah_page;
		 } else {
		   	  	if (($page >= 5) and ($total_jumlah_page <= 10)) {
 				   		$array['pagingStart'] = 1;
 						$array['pagingEnd']   = $total_jumlah_page;
   	     		} else {
   	     		  	   if (($total_jumlah_page - $page) < 5) {
   	     		  	       		$array['pagingStart'] = $total_jumlah_page - 9;
   	     		  	       		$array['pagingEnd']	  = $total_jumlah_page;
   	     		  	   } else {
   	     		  	   	 	    $array['pagingStart'] = $page - 4;
   	     		  	   	 	    $array['pagingEnd']   = $page + 5;
   	     		  	   }
   	     		}
		 }
     }
	if ($rewriteurl) {
	
		 if ($page <>1 ) { 
			 $array['halaman_first'] = '<li><a  href="' . $fconf['site'].$teks_parameter . 'page/1/'.'">'.$first_text.'</a></li>';
			 $array['halaman_next'] = '<li><a  href="' . $fconf['site'].$teks_parameter . 'page/' . ($page-1).'/">'.$next_text.'</a></li>';
		 }

		 $array['halaman_content'] = '';
		 for ($i = $array['pagingStart']; $i <= $array['pagingEnd']; $i++)
		 { if ($i == $page) $array['halaman_content'] .= '<li'.($place_active == ''? ' class="'.$class_active.'"':'').'><a href="javascript:;"'.($place_active == 'a'? ' class="'.$class_active.'"':'').'>'.$i.'</a></li>'; 
		   else $array['halaman_content'] .= '<li><a  href="' . $fconf['site'].$teks_parameter . 'page/' . $i .'/">' . $i . '</a></li>';
		 }
		  
		 if ($page <> $total_jumlah_page ) { 
			 $array['halaman_prev'] = '<li><a  href="' . $fconf['site'].$teks_parameter . 'page/' . ($page+1) .'/">'.$prev_text.'</a></li>';
			 $array['halaman_last'] = '<li><a  href="' . $fconf['site'].$teks_parameter . 'page/' . $total_jumlah_page .'/">'.$last_text.'</a></li>';
		 } 

	} else {
	
		 if ($page <>1 ) { 
			 $array['halaman_first'] = '<li><a  href="' . $_SERVER['PHP_SELF'] . '?page=1'.$teks_parameter.'">'.$first_text.'</a></li>';
			 $array['halaman_next'] = '<li><a  href="' . $_SERVER['PHP_SELF'] . '?page=' . ($page-1) . $teks_parameter.'">'.$next_text.'</a></li>';
		 }

		 $array['halaman_content'] = '';
		 for ($i = $array['pagingStart']; $i <= $array['pagingEnd']; $i++)
		 { if ($i == $page) $array['halaman_content'] .= '<li'.($place_active == ''? ' class="'.$class_active.'"':'').'><a href="javascript:;"'.($place_active == 'a'? ' class="'.$class_active.'"':'').'>'.$i.'</a></li>'; 
		   else $array['halaman_content'] .= '<li><a  href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . $teks_parameter.'">' . $i . '</a></li>';
		 }
		  
		 if ($page <> $total_jumlah_page ) { 
			 $array['halaman_prev'] = '<li><a  href="' . $_SERVER['PHP_SELF'] . '?page=' . ($page+1) . $teks_parameter.'">'.$prev_text.'</a></li>';
			 $array['halaman_last'] = '<li><a  href="' . $_SERVER['PHP_SELF'] . '?page=' . $total_jumlah_page . $teks_parameter.'">'.$last_text.'</a></li>';
		 } 

	}
     return ($array);
   }   
}

function pagination_old($page, $total_jumlah_page, $teks_parameter, $rewrite = false) {
   global $fconf;
	if ($total_jumlah_page != 0) {
     if (($page <= $total_jumlah_page) and ($page > 0)) {
   	     if ($page < 5) {
		   		$array['pagingStart'] = 1;
   	       		if ($total_jumlah_page >= 10)  $array['pagingEnd']=10;
		   		else $array['pagingEnd'] = $total_jumlah_page;
		 } else {
		   	  	if (($page >= 5) and ($total_jumlah_page <= 10)) {
 				   		$array['pagingStart'] = 1;
 						$array['pagingEnd']   = $total_jumlah_page;
   	     		} else {
   	     		  	   if (($total_jumlah_page - $page) < 5) {
   	     		  	       		$array['pagingStart'] = $total_jumlah_page - 9;
   	     		  	       		$array['pagingEnd']	  = $total_jumlah_page;
   	     		  	   } else {
   	     		  	   	 	    $array['pagingStart'] = $page - 4;
   	     		  	   	 	    $array['pagingEnd']   = $page + 5;
   	     		  	   }
   	     		}
		 }
     }
   
     if ($page <>1 ) { 
		 $array['halaman_first'] = '<a href="' .  $fconf['site'].$teks_parameter . 'page/1/"><div id="tabelpagingnormal">&laquo; First</a></div>';
   	     $array['halaman_next'] = '<a href="' . $fconf['site'].$teks_parameter . 'page/' . ($page-1).'/"><div id="tabelpagingnormal">&lsaquo; Prev</a></div>';
     }

     $array['halaman_content'] = '';
     for ($i = $array['pagingStart']; $i <= $array['pagingEnd']; $i++)
     { if ($i == $page) $array['halaman_content'] .= '<div id="tabelpaginonpage">'.$i.'</div>'; 
       else $array['halaman_content'] .= '<div id="tabelpagingnormal"><a href="' . $fconf['site'].$teks_parameter . 'page/' . $i .'/">' . $i . '</a></div>';
     }
   	  
     if ($page <> $total_jumlah_page ) { 
   	     $array['halaman_prev'] = '<div id="tabelpagingnormal"><a href="' . $fconf['site'].$teks_parameter . 'page/' . ($page+1) .'/"> Next &rsaquo;</a></div>';
		 $array['halaman_last'] = '<div id="tabelpagingnormal"><a href="' . $fconf['site'].$teks_parameter . 'page/' . $total_jumlah_page .'/">Last &raquo;</a></div>';
     } 

     return ($array);
	}   
}

function paging($itemperpage, $totalitem, $current_page, $param='', $pgn='')
{
	
	$totalpages = intval($totalitem/$itemperpage);
	$difference = $totalpages - $current_page;
    $low_range 	= $current_page - 3;
    $high_range = $current_page + 4;
	$param = $param == '' ? '' : '&'.$param;
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
					$pagination .= ' <span class="page_nolink">'.$i.'</span>';
				}else{
					$pagination .= " <a href=\"?".$pgn."=".$i.$param."\">$i</a>";
				}
			}
	$html = '';
	if ($totalpages <= 10) {
        for ($i=1; $i<=$totalpages; $i++) {
	        if($current_page == $i){
            	$html .= ' <span class="page_nolink">'.$i.'</span>';
        	} else {
	        	$html .= ' <a href="?'.$pgn.'='.$i.$param.'">'.$i.'</a> ';
        	}
        }
    } else if ($totalpages > 10 && $difference < 4) {
        $html .= ' <a href="?'.$pgn.'=1'.$param.'">1</a> ... ';
        for ($i=($totalpages-5); $i<=$totalpages; $i++) {
            if($current_page == $i){
            	$html .= '<span class="page_nolink">'.$i.'</span>';
        	} else {
	        	$html .= ' <a href="?'.$pgn.'='.$i.$param.'">'.$i.'</a> ';
        	}
        }
    } else if ($totalpages > 10) {
        if ($current_page < 6) {
            for ($i=1; $i<7; $i++) {
                if($current_page == $i){
	            	$html .= '<span class="page_nolink">'.$i.'</span>';
	        	} else {
		        	$html .= ' <a href="?'.$pgn.'='.$i.$param.'">'.$i.'</a> ';
	        	}
            }
            
            $html .= ' ... <a href="?'.$pgn.'='.$totalpages.$param.'">'.$totalpages.'</a>';
        } else {
            $html = ' <a href="?'.$pgn.'=1'.$param.'">1</a> ... ';
            for ($i=$low_range; $i<$high_range; $i++) {
                if($current_page == $i){
	            	$html .= '<span class="page_nolink">'.$i.'</span>';
	        	} else {
		        	$html .= ' <a href="?'.$pgn.'='.$i.$param.'">'.$i.'</a> ';
	        	}
            }
            $html .= ' ... <a href="?'.$pgn.'='.$totalpages.$param.'">'.$totalpages.'</a>';
        }
    }
    if ($current_page == 1) {
        $previous_page = ' <span class="page_nolink">&lt;</span> ';
        $first_page = ' <span class="page_nolink">&lt;&lt;</span> ';
    } else {
        $previous_page = ' <a href="?'.$pgn.'='.($current_page - 1).$param.'">&lt;</a> ';
        $first_page = ' <a href="?'.$pgn.'=1'.$param.'">&lt&lt</a> ';
    }
    if ($current_page == $totalpages) {
        $next_page = ' <span class="page_nolink">&gt;</span> ';
        $last_page = ' <span class="page_nolink">&gt;&gt;</span> ';
    } else {
        $next_page = ' <a href="?'.$pgn.'='.($current_page + 1) . $param.'">&gt;</a> ';
        $last_page = ' <a href="?'.$pgn.'='.$totalpages . $param.'">&gt;&gt;</a> ';
    }
    
	$from				=	intval(($current_page-1)*$itemperpage);
	
	$ret['prev'] 		= 	$previous_page;
	$ret['first'] 		= 	$first_page;
	$ret['next'] 		= 	$next_page;
	$ret['last'] 		= 	$last_page;
	$ret['page'] 		= 	$html;
	$ret['from'] 		= $from;
	
	return $ret;
}

?>