<?php

function createvarname($str) {
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $str);
	$clean = strtolower(trim($clean, '-'));
	$clean = preg_replace("/[\/_|+ -]+/", '_', $clean); 
	return $clean;
}

 
function bacafile($file)
{
	
	$return = array();
	$file = fopen($file, 'r'); 
    if (!$file)
        die('file does not exist or cannot be opened');
	
    while (($line = fgets($file)) !== false) {
        $return[] =  $line;
    } 
    fclose($file);
    
    return $return;
	
}
$content_id =  bacafile('raw_id');

$content_en = bacafile('raw_en');
 

if(is_array($content_en) && sizeof($content_en) == sizeof($content_id)  )
{
	 
	$lang_id_text = '<?php'."\n";
	$lang_en_text = '<?php'."\n";
	foreach ($content_en  as $k => $line) {
	    $varname = createvarname($line);
	    
	    if(!empty(trim($line)))
	    {
		    $lang_id_text .= '$lang_number_'.$k.' = \''.addslashes(trim($content_id[$k])).'\';'."\n";
		    $lang_en_text .= '$lang_number_'.$k.' = \''.addslashes(trim($line)).'\';'."\n";
	    }
	    else
	    {
		    $lang_id_text .=  "\n";
		    $lang_en_text .=  "\n";
	    }
	    
	}
	$lang_id_text .=  "?>";
	$lang_en_text .=  "?>";
	
	//echo $lang_id_text;
	file_put_contents('lang_id.php', $lang_id_text);
	file_put_contents('lang_en.php', $lang_en_text);
}
?>