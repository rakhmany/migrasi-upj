
<?php
$sql = ' SELECT * FROM `popup_banner` WHERE `pbanner_date` <= \''.date('Y-m-d').'\' AND `pbanner_date_end` >= \''.date('Y-m-d').'\' AND status  = \'Show\' ORDER BY  priority ASC    ';
$RS = $db->Execute($sql); 
if ($RS->fields['pbanner_id'] != "")
{
	echo '<div class="modal fade" id="popup_notifikasi" tabindex="-1" role="modal" aria-labelledby="modal-label-3" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="">
                    <div class="custom-notif-header">
                        <button type="button" class="btn-close custom-close" data-bs-dismiss="modal" >
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="inspiro-slider slider-popup" data-dots="false" data-prevnextbuttons="false">
                            ';
	while (!$RS->EOF)  
	{
		$title_text = $language == '_en' ? $RS->fields['fh_menu_name_en'] : $RS->fields['fh_menu_name'] ; 
		$submenu = '';
		if( !empty($RS->fields['pbanner_url']) )
		{
			echo '<div class="slide" >
                <a href="'.$RS->fields['pbanner_url'].'"><img src="upload/module/banner-popup/'.$RS->fields['pbanner_pic'].'"></a>
            </div>
            ';
		}
		else
		{ 
			 
			echo '<div class="slide" >
                <img src="upload/module/banner-popup/'.$RS->fields['pbanner_pic'].'">
            </div>
            ';
        }
		 
		 
		 
		$RS->MoveNext();  
	}
	echo '</div>
                    
                    </div>
                </div>
                
            </div>
        </div>
    </div>';
	  
}

?>
	