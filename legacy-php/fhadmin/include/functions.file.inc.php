<?php

//*** function.file.inc.php created by Seto Andry Wibowo
//*** Date : 5 Januari 2009

//*** $source_file	= File yang diupload
//*** $destination_file	= Tempat Penyimpanan File
//*** $nama_file	= Nama File yang akan diinginkan

//*** Return file dari function adalah :
//*** $ret -> merupakan nama file yang sudah di copy

function file_copy_to_folder ($source_file, $destination_file, $nama_file) {
	
	$arrext = explode('.',$source_file['name']);
	$jml = count($arrext)-1;
	$ext = $arrext[$jml];
	$ext = strtolower($ext);
	$ret['ext'] = $ext;
	$destination_file .= $nama_file . '.' . $ext;
	
	if(@move_uploaded_file($source_file['tmp_name'], $destination_file)) { 
        $ret = $nama_file.".".$ext;
	}
	return $ret;   	 	      
}


function file_arr_copy_to_folder ($source_file, $destination_file, $nama_file) {

	$tmp_destination = $destination_file;

	for($index=0; $index<count($source_file['tmp_name']); $index++) {

        $arrext = explode('.',$source_file['name'][$index]);
        $jml = count($arrext)-1;
        $ext = $arrext[$jml];
        $ext = strtolower($ext);
        $destination_file = $tmp_destination . $nama_file[$index] . '.' . $ext;
	
        if(@move_uploaded_file($source_file['tmp_name'][$index], $destination_file)){ 
            $ret[$index] = $nama_file[$index].".".$ext;
        }
	}
	return $ret;   	 	      
}
		   	 	      
?>