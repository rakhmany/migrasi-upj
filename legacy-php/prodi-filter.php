<?php

 
$array_levels = array();
$sql = ' SELECT * FROM `prodi_level`  ORDER BY  `list_priority` ASC     ';
$RS = $db->Execute($sql); 
if ($RS->fields['content_id'] != "")
{
	$i = 0;		
	while (!$RS->EOF)  
	{  
		$array_levels[$RS->fields['content_id']] = $RS->fields['content_name'.$language];
		$i++;
		$RS->MoveNext();  
	} 
} 
 
$array_interests = array();
$sql = ' SELECT * FROM `prodi_interest`  ORDER BY  `list_priority` ASC     ';
$RS = $db->Execute($sql); 
if ($RS->fields['content_id'] != "")
{		
	$i = 0;		
	while (!$RS->EOF)  
	{  
		$array_interests[$RS->fields['content_id']] = $RS->fields['content_name'.$language];
		$i++;
		$RS->MoveNext();  
	} 
} 
	
	 

$array_filter_all = array();
foreach($array_levels as $key => $val)
{
	 $array_filter_all['level_'.$key.''] = $val; 
}
foreach($array_interests as $key => $val)
{ 
	$array_filter_all['interest_'.$key.''] = $val;	
}

//print_r($array_filter_all);
?>