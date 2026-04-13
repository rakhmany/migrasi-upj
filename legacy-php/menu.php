<?php
include('front.config.inc.php'); 
$fh_strukturid = intval($_GET['id']);

$sql = ' SELECT * FROM `fh_struktur_menu` WHERE `fh_strukturid` = \''.$fh_strukturid.'\' AND fh_strukturstatus != \'Hidden\'   ';
$RS = $db->Execute($sql); 
if ($RS->fields['fh_strukturid'] != "")
{ 
	if($RS->fields['fh_menu_name'] == 'Kerjasama' )
	{
		$selected_menu = $RS->fields;
		include('cooperation-academic.php');
	}
	else
	{
		if($RS->fields['fh_strukturtipe'] ==  'Page Statis' )
		{
			$selected_menu = $RS->fields;
			//include('page-statis.php');
			$link_statis = BASE_URL. 'static-page/'.$RS->fields['fh_strukturid'].'/'.createPermaLink($RS->fields['fh_menu_name_en']);
			$link_statis = BASE_URL. 'static-page/'.$RS->fields['fh_pagestatisid'].'/'.createPermaLink($RS->fields['fh_menu_name_en']);
			header('location: '.$link_statis.'');
			die();
		}
		elseif($RS->fields['fh_strukturtipe'] ==  'Custom Link' )
		{
			if(stripos($RS->fields['fh_modulefilename'],"://"))
			{
				
			}
			else
			{
				$RS->fields['fh_modulefilename'] = BASE_URL. $RS->fields['fh_modulefilename'];
			}  
			header('location: '.$RS->fields['fh_modulefilename'].'');
			die();
		}
		else
		{
			include('404.php');
		}
	}
}
else
{
	include('404.php');
}
?>