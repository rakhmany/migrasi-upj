<?php 
ini_set('memory_limit', '3048M');
include('front.config.inc.php');

require 'vendor/autoload.php'; 
use WebPConvert\WebPConvert;

$path_file_image = 'upload/';
$final_img = 'images/no-image.jpg';

// SECURITY FIX: Validate and sanitize input to prevent path traversal
$allowed_types = array('homeevent', 'homenews', 'homehighlights', 'breadcumb_img', 'facilities', 'kerjasama', 
                       'highlight_thumb', 'highlight_big', 'news_thumb', 'news_big', 'events_thumb', 
                       'events_big', 'pressrelease_thumb', 'pressrelease_big', 'vacancy_thumb', 'vacancy_big',
                       'alumni_thumb', 'alumni_big', 'halloffame_thumb', 'halloffame_big');

$type = isset($_GET['type']) ? $_GET['type'] : '';
if(!in_array($type, $allowed_types)) {
    die('Invalid image type');
}

// Sanitize filename: remove path traversal attempts and allow only safe characters
$img = isset($_GET['img']) ? $_GET['img'] : '';
$img = basename($img); // Remove any directory path
$img = preg_replace('/[^a-zA-Z0-9._-]/', '', $img); // Allow only safe characters

if(empty($img)) {
    die('Invalid image name');
}

$res_width = 200;
$res_height = 200;

if($type == 'homeevent')
{
	$path_file_image = 'upload/module/event/';
	$res_width =  800;
	$res_height = 600;
}
if($type == 'homenews')
{
	$path_file_image = 'upload/module/news/';
	$path_file_image_ori = 'upload/module/news/'.$img;
	$res_width =  800;
	$res_height = 600;
}
if($type == 'homehighlights')
{
	$path_file_image = 'upload/module/highlights/';
	$res_width =  800;
	$res_height = 600;
}
if($type == 'breadcumb_img')
{
	$path_file_image = 'upload/module/';
	$res_width = 1366;
	$res_height = 350;
}
if($type == 'facilities')
{
	$path_file_image = 'upload/module/gallery3/';
	$res_width = 1200;
	$res_height = 800;
} 
if($type == 'kerjasama')
{
	$path_file_image = 'upload/module/kerjasama/';
	$res_width = 274;
	$res_height = 174;
}
if($type == 'highlight_thumb')
{ 
	$path_file_image = 'upload/module/highlights/';
	$res_width = 800;
	$res_height = 600;
}
if($type == 'highlight_big')
{
	$path_file_image = 'upload/module/highlights/';
	$res_width = 1600;
	$res_height = 1200;
}
if($type == 'news_thumb')
{ 
	$path_file_image = 'upload/module/news/';
	$res_width = 800;
	$res_height = 600;
}
if($type == 'news_big')
{
	$path_file_image = 'upload/module/news/';
	$res_width = 1600;
	$res_height = 1200;
}
if($type == 'events_thumb')
{ 
	$path_file_image = 'upload/module/event/';
	$res_width = 800;
	$res_height = 600;
}
if($type == 'events_big')
{
	$path_file_image = 'upload/module/event/';
	$res_width = 1600;
	$res_height = 1200;
}
if($type == 'pressrelease_thumb')
{ 
	$path_file_image = 'upload/module/pressrelease/';
	$res_width = 800;
	$res_height = 600;
}
if($type == 'pressrelease_big')
{
	$path_file_image = 'upload/module/pressrelease/';
	$res_width = 1600;
	$res_height = 1200;
}
if($type == 'alumni_thumb')
{
	$res_width = 350;
	$res_height = 350;
}
if($type == 'progstudi')
{
	$path_file_image = 'upload/module/progstudi/';
	$res_width = 300;
	$res_height = 300;
}
if($type == 'progstudi_tumb')
{
	$res_width = 300;
	$res_height = 300;
}

if($type == 'manajementim')
{
	$res_width = 500;
	$res_height = 850;
}
if($type == 'collaborative_thumb')
{
	$res_width = 600;
	$res_height = 360;
}
if($type == 'footerabout')
{
	$res_width = 1104;
	$res_height = 300;
}
if($type == 'footerohs')
{
	$res_width = 200;
	$res_height = 200;
}
if($type == 'footeriso')
{
	$res_width = 120;
	$res_height = 70;
}
if($type == 'bisnisproduct')
{
	$res_width = 323;
	$res_height = 282;
}
if($type == 'recentpost')
{
	$res_width = 80;
	$res_height = 80;
}
$image_src = $path_file_image.$img; 


 
// $file_exist = false;
// // if(is_file($path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img))
// // {  
// // 	$final_img = $path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img.'';
// // 	$file_exist = true; 
// // }
// $img_webp =  $img . '.webp';
// if(is_file($path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img_webp))
// 
// {  
// 
// 	$final_img = $path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img_webp.'';
// 
// 	$file_exist = true; 
// 
// }
 


$image_src = $path_file_image.$img; 

$file_exist = false;

$img_webp =  $img . '.webp';

if(is_file($path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img_webp))
{  
	$final_img = $path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img;
	$final_imgwebp = $path_file_image.'crop'.$res_width.'-'.$res_height.'_'.$img_webp;
	
	$diff1 = time()-filemtime($final_img);
	$diff2 = time()-filemtime($image_src);
	if($diff2 > $diff1)
	{
		$file_exist = true;
	}
	else
	{
	 	@unlink($final_img);
	 	@unlink($final_imgwebp);
	}
	 
}

if($file_exist != true)
{  
	 
	if(!is_file($image_src) )
	{
		  $image_src = './images/no-image.jpg';
		   
	}
	$handle = new Upload($image_src);
	$handle->file_name_body_pre    = 'crop'.$res_width.'-'.$res_height.'_';
	$handle->image_resize          = true;
	$handle->image_ratio_crop      = true;
	$handle->file_overwrite        = true;
// 	$handle->image_convert         = 'webp';
// 	$handle->webp_quality          = 100;
	//$handle->image_greyscale       = true;
	//$handle->image_contrast        = 40;
	$handle->image_y               = $res_height;
	$handle->image_x               = $res_width;
	$handle->Process($path_file_image);
    if ($handle->processed) { 
		
	     $final_img = $path_file_image.$handle->file_dst_name;
		
		$source =  $path_file_image.$handle->file_dst_name; 
		$destination = $source . '.webp';
		$options = [];
		WebPConvert::convert($source, $destination, $options);
		$final_img = $destination;
		
	}
	else
	{
		$handle->error;
	}
	 
	 
}

 
// $foo = new upload($final_img);
// header('Content-type: ' . $foo->file_src_mime);
// echo $foo->Process();
// if (!$handle->processed) { 
// 		 
// 	echo $handle->error;
// }

 
$content = file_get_contents($final_img);
$mime = mime_content_type($final_img);
header('Content-Type: '.$mime.'');
echo $content;
 
die();
 
?>