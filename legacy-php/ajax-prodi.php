<?php
include('front.config.inc.php');

include('prodi-filter.php');


if(isset($_POST) && sizeof($_POST) > 0 )
{
	$return = array(); 
	if(!empty($_POST['rf']))
	{
		 
		$filters = array_flip($_SESSION['filter_selection']);
		unset($filters[$_POST['rf']]);
		$_SESSION['filter_selection'] = array_keys($filters);
		die();
		 
	}
	if(!empty($_POST['remall']))
	{
		 
		unset($_SESSION['filter_selection']); 
		unset($_SESSION['filter_text']); 
		die();
	}
	
	if( $_POST['add'] == 1 && !empty($_POST['t'])   )
	{
		 if(isset($array_filter_all[$_POST['t'].'_'.$_POST['v']]))
		 {
			 $_SESSION['filter_selection'][] = $_POST['t'].'_'.$_POST['v'];
		 }
		die();
	}
	if( $_POST['filter_text'] == 1 && !empty($_POST['q'])   )
	{
		$_SESSION['filter_text'] = $_POST['q'] ;
		
		die();
	} 
	
	if(!empty($_POST['view']))
	{
		$data_button  = '';
		if(is_array($_SESSION['filter_selection']) && sizeof($_SESSION['filter_selection']) > 0 )
		{
			$filters = array_keys(array_flip($_SESSION['filter_selection'])); 
			$sql_filter_level = array();
			$sql_filter_interest = array();
			foreach($filters as $val)
			{
				$val = trim($val);
				if(!empty($val))
				{
					$data_button .= ' <span class="badge badge-pill bg-danger"> <button type="button" class="btn-close btn-remove-filter" d aria-label="Close" data-filteridx="'.$val.'" ></button> '.$array_filter_all[$val].' </span>';
					
					$temp = explode('_', $val);
					if($temp[0] == 'level')
					{
						$sql_filter_level[] = ' ( `f{NUMBERJOIN}`.`filter_type` =1 AND `f{NUMBERJOIN}`.`prodi_filter` ='.intval($temp[1]).'  ) ';
					}
					else
					{
						$sql_filter_interest[] = ' ( `f{NUMBERJOIN}`.`filter_type` =2  AND `f{NUMBERJOIN}`.`prodi_filter` ='.intval($temp[1]).'  ) ';
					}
					 
					
				} 
			}
			
	
		}
		else
		{
			$data_button .= ' <span class="badge badge-pill bg-danger">All Program Study  </span>';
					
		}
		
		$sql_filter_text = '';
		if(!empty($_SESSION['filter_text']))
		{
			$sql_filter_text .= ' WHERE ( p.content_title_id like '.$db->qstr('%'.$_SESSION['filter_text'].'%').'  OR p.content_title_en like '.$db->qstr('%'.$_SESSION['filter_text'].'%').'  ) ';
		}
		$sql_filter_join = '';
		$num = 1;
		if(sizeof($sql_filter_level) > 0   )
		{
			foreach($sql_filter_level as $k => $v)
			{
				$sql_filter_join .= ' JOIN prodi_filter f'.$num.'  ON p.content_id=f'.$num.' .prodi_id  AND  ( '.str_replace('{NUMBERJOIN}', $num, str_replace('{NUMBERJOIN}', $num, $v)) .'  )';
				$num++;
			}
			
		} 
		if( sizeof($sql_filter_interest) > 0  )
		{
			foreach($sql_filter_interest as $k => $v)
			{
				$sql_filter_join .= ' JOIN prodi_filter f'.$num.'  ON p.content_id=f'.$num.' .prodi_id  AND  ( '.str_replace('{NUMBERJOIN}', $num, str_replace('{NUMBERJOIN}', $num, $v)) .'  )';
				$num++;
			}  
		}
		 
		$data_prodi = '';
		
		$sql = ' SELECT 
				    DISTINCT p.* 
				FROM 
				    d_programstudy p
				'.$sql_filter_join.'  '.$sql_filter_text.'  ORDER BY  p.`list_priority` ASC   ';
		$RS = $db->Execute($sql); 
		if ($RS->fields['content_id'] != "")
		{		
			while (!$RS->EOF)  
			{
				
				$this_image		= get_image_gallery('progstudi_tumb', $RS->fields['mainimagename']);  
				$title_text = $RS->fields['content_title'.$language] ; 
				$link_ref = $RS->fields['content_url']		;	
				$data_prodi .= '<div class="col-lg-6 col-sm-6 listing-prody-upj">
                            <div class="card portfolio-item p-0">
                                <div class="card-body item-prody">
                                    <img src="'.$this_image.'" class="img-circle">
                                    <h5 class="card-title">'.$title_text.'</h5> 
                                </div>
                                <div class="portfolio-description">
                                    <a href="'.$link_ref.'" target="_blank">
                                        <h3>'.$title_text.'</h3>
                                    </a>
                                </div>
                            </div>
                        </div>';
				$RS->MoveNext();  
			} 
			//$data_prodi .= $sql;
		}
		else
		{
			$nodata = ($language == '_en') ? 'No data' : 'Belum ada data'; 
			$data_prodi .= '<div class="alert alert-warning" role="alert">
							  '.$nodata .  '!
							</div>';
		}
		$return['data_button'] = $data_button;
		$return['data_prodi'] = $data_prodi;
		
		echo json_encode($return);
		die();
	} 
	
}

?>