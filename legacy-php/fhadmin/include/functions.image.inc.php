<?Php
//*** function.image.tommy.inc.php created by Tommy
//*** merupakan pengembangan dari functions.image.inc.php
//*** Date : July 28 2008

//*** $source_pic = File yang diupload
//*** $destination_pic = Tempat file yang akan di copy
//*** $filename	= Nama file yang akan di copy
//*** $max_width = Lebar Maximum Gambar (seting di config.inc.php)
//*** $max_height = Tinggi Maximum Gambar (seting di config.inc.php)

//*** Return file dari function adalah :
//*** $destination_pic = URL dari hasil resizing

//*** Keterangan 
//*** $image_info['mime'] = Type file

function image_resize_to_folder ($source_pic, $destination_pic, $filename, $max_width, $max_height) {
	$image_info = getimagesize($source_pic['tmp_name']);
	$source_pic_name = $source_pic['name'];
	$source_pic_tmpname  = $source_pic['tmp_name'];
	$source_pic_size = $source_pic['size'];
	$source_pic_width = $image_info[0];
	$source_pic_height = $image_info[1];

	$x_ratio  = $max_width / $source_pic_width;
	$y_ratio  = $max_height / $source_pic_height;

	if( ($source_pic_width <= $max_width) && ($source_pic_height <= $max_height) ) {
		$tn_width = $source_pic_width;
		$tn_height = $source_pic_height;
    } elseif (($x_ratio * $source_pic_height) < $max_height) {
        $tn_height = ceil($x_ratio * $source_pic_height);
        $tn_width = $max_width;
    } else {
        $tn_width = ceil($y_ratio * $source_pic_width);
        $tn_height = $max_height;
	}

	switch ($image_info['mime']) {
	case 'image/gif':
		if (imagetypes() & IMG_GIF)  { 
			$src = imageCreateFromGIF($source_pic['tmp_name']) ; 
			$destination_pic.="$filename.gif";
			$namafile ="$filename.gif";
		}
		break;
  
	case 'image/jpeg':
		if (imagetypes() & IMG_JPG)  { 
			$src = imageCreateFromJPEG($source_pic['tmp_name']) ; 
			$destination_pic.="$filename.jpg";
			$namafile ="$filename.jpg";
		}
		break;
  
	case 'image/pjpeg':
		if (imagetypes() & IMG_JPG)  { 
			$src = imageCreateFromJPEG($source_pic['tmp_name']) ; 
			$destination_pic.="$filename.jpg";
			$namafile ="$filename.jpg";
		}
		break;
  
	case 'image/png':
		if (imagetypes() & IMG_PNG)  { 
			$src = imageCreateFromPNG($source_pic['tmp_name']) ; 
			$destination_pic.="$filename.png";
			$namafile ="$filename.png";
		}
		break;
  
	case 'image/wbmp':
		if (imagetypes() & IMG_WBMP)  { 
			$src = imageCreateFromWBMP($source_pic['tmp_name']) ; 
			$destination_pic.="$filename.bmp";
			$namafile ="$filename.bmp";
		}
		break;
	}
  
	//chmod($destination_pic,0777);
	$tmp=imagecreatetruecolor($tn_width,$tn_height);
	imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$source_pic_width,$source_pic_height);

	//*** 100 is the quality settings, values range from 0-100.
	switch ($image_info['mime']) {
	case 'image/jpeg':
		imagejpeg($tmp,$destination_pic,100); 
		break;
  
	case 'image/gif':
		imagegif($tmp,$destination_pic,100); 
		break;
  
	case 'image/png':
		imagepng($tmp,$destination_pic); 
		break;
  
	default:
		imagejpeg($tmp,$destination_pic,100); 
		break;
	}
              		
  return ($namafile);
}

function image_arr_resize_to_folder ($source_pic, $destination_pic, $filename, $max_width, $max_height) {
	$tmp_dest = $destination_pic;
	for($index=0; $index<count($source_pic['tmp_name']); $index++){
		$destination_pic = $tmp_dest;
		$image_info = getimagesize($source_pic['tmp_name'][$index]);
		$source_pic_name = $source_pic['name'][$index];
		$source_pic_tmpname  	= $source_pic['tmp_name'][$index];
		$source_pic_size = $source_pic['size'][$index];
		$source_pic_width = $image_info[0];
		$source_pic_height = $image_info[1];

		$x_ratio  = $max_width / $source_pic_width;
		$y_ratio  = $max_height / $source_pic_height;

		if( ($source_pic_width <= $max_width) && ($source_pic_height <= $max_height) ){
			$tn_width = $source_pic_width;
			$tn_height = $source_pic_height;
		}elseif (($x_ratio * $source_pic_height) < $max_height){
			$tn_height = ceil($x_ratio * $source_pic_height);
			$tn_width = $max_width;
		}else{
			$tn_width = ceil($y_ratio * $source_pic_width);
			$tn_height = $max_height;
		}

		switch ($image_info['mime']) {
		case 'image/gif':
			if (imagetypes() & IMG_GIF)  { 
				$src = imageCreateFromGIF($source_pic['tmp_name'][$index]) ; 
				$destination_pic.="$filename[$index].gif";
				$namafile ="$filename[$index].gif";
			}
			break;
  
		case 'image/jpeg':
			if (imagetypes() & IMG_JPG)  { 
				$src = imageCreateFromJPEG($source_pic['tmp_name'][$index]) ; 
				$destination_pic.="$filename[$index].jpg";
				$namafile ="$filename[$index].jpg";
			}
			break;
  
		case 'image/pjpeg':
			if (imagetypes() & IMG_JPG)  { 
				$src = imageCreateFromJPEG($source_pic['tmp_name'][$index]) ; 
				$destination_pic.="$filename[$index].jpg";
				$namafile ="$filename[$index].jpg";
			}
			break;
  
		case 'image/png':
			if (imagetypes() & IMG_PNG)  { 
				$src = imageCreateFromPNG($source_pic['tmp_name'][$index]) ; 
				$destination_pic.="$filename[$index].png";
				$namafile ="$filename[$index].png";
			}
			break;
  
		case 'image/wbmp':
			if (imagetypes() & IMG_WBMP)  { 
				$src = imageCreateFromWBMP($source_pic['tmp_name'][$index]) ; 
				$destination_pic.="$filename[$index].bmp";
				$namafile ="$filename[$index].bmp";
			}
			break;
		}
  
		//chmod($destination_pic,0777);
		$tmp=imagecreatetruecolor($tn_width,$tn_height);
		imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$source_pic_width,$source_pic_height);

		//*** 100 is the quality settings, values range from 0-100.
		switch ($image_info['mime']) {
		case 'image/jpeg':
			imagejpeg($tmp,$destination_pic,100); 
			break;
  
		case 'image/gif':
			imagegif($tmp,$destination_pic,100); 
			break;
  
		case 'image/png':
			imagepng($tmp,$destination_pic); 
			break;
  
		default:
			imagejpeg($tmp,$destination_pic,100); 
			break;
		}
		
		$url[] = $namafile;
    }

    return ($url);
}

//*** $nw = Lebar image yang akan di crop
//*** $nh = Tinggi image yang akan di crop
//*** $source = Source file
//*** $dest = Tinggi Maximum Gambar (seting di config.inc.php)

//*** Ex . cropImage(225, 165, '/path/to/source/image.jpg',  '/path/to/dest/image.jpg');

function cropImage($nw, $nh, $source, $dest) {
    $image_info = getimagesize($source);
    $w = $image_info[0];
    $h = $image_info[1];

    switch($image_info['mime']) {
		case 'image/gif':
			$simg = imagecreatefromgif($source);
			break;
		case 'image/jpeg':
	        $simg = imagecreatefromjpeg($source);
	        break;
		case 'image/pjpeg':
	        $simg = imagecreatefromjpeg($source);
	        break;
        case 'png':
	        $simg = imagecreatefrompng($source);
	        break;
    }

    $dimg = imagecreatetruecolor($nw, $nh);

    $wm = $w/$nw;
    $hm = $h/$nh;
    $h_height = $nh/2;
    $w_height = $nw/2;

    if($w> $h) {
        $adjusted_width = $w / $hm;
        $half_width = $adjusted_width / 2;
        $int_width = $half_width - $w_height;
		
        imagecopyresampled($dimg,$simg,-$int_width,0,0,0,$adjusted_width,$nh,$w,$h);
    } elseif(($w <$h) || ($w == $h)) {
        $adjusted_height = $h / $wm;
        $half_height = $adjusted_height / 2;
        $int_height = $half_height - $h_height;
		
        imagecopyresampled($dimg,$simg,0,-$int_height,0,0,$nw,$adjusted_height,$w,$h);
    } else {
        imagecopyresampled($dimg,$simg,0,0,0,0,$nw,$nh,$w,$h);
    }
    imagejpeg($dimg,$dest,100);
}

?>