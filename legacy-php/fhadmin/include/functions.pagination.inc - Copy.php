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


function pagination($page, $total_jumlah_page, $teks_parameter, $rewrite = false) {
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
		 $array['halaman_first'] = '<a href="' . $_SERVER['PHP_SELF'] . '?page=1'.$teks_parameter.'"><div id="tabelpagingnormal">&laquo; First</a></div>';
   	     $array['halaman_next'] = '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($page-1) . $teks_parameter.'"><div id="tabelpagingnormal">&lsaquo; Prev</a></div>';
     }

     $array['halaman_content'] = '';
     for ($i = $array['pagingStart']; $i <= $array['pagingEnd']; $i++)
     { if ($i == $page) $array['halaman_content'] .= '<div id="tabelpaginonpage">'.$i.'</div>'; 
       else $array['halaman_content'] .= '<div id="tabelpagingnormal"><a href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . $teks_parameter.'">' . $i . '</a></div>';
     }
   	  
     if ($page <> $total_jumlah_page ) { 
   	     $array['halaman_prev'] = '<div id="tabelpagingnormal"><a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($page+1) . $teks_parameter.'"> Next &rsaquo;</a></div>';
		 $array['halaman_last'] = '<div id="tabelpagingnormal"><a href="' . $_SERVER['PHP_SELF'] . '?page=' . $total_jumlah_page . $teks_parameter.'">Last &raquo;</a></div>';
     } 

     return ($array);
	}   
}

?>