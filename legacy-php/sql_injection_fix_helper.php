<?php
/**
 * SQL INJECTION FIX HELPER
 * UPJ Website Security Patch
 * Date: February 9, 2026
 * 
 * File ini berisi fungsi-fungsi helper untuk mencegah SQL Injection
 * di file-file admin yang masih vulnerable
 */

/**
 * Validate table name against whitelist
 * Gunakan untuk file-file yang menggunakan $_GET['t'] untuk nama tabel
 * 
 * @param string $table_name Nama tabel dari user input
 * @return string|false Valid table name atau false jika invalid
 */
function validate_table_name($table_name) {
    // Daftar tabel yang diperbolehkan
    $allowed_tables = array(
        'd_rilispdf',
        'd_rupspdf',
        'd_tahunanpdf',
        'd_lanjutanpdf',
        'about_manajemen_team',
        'media_article',
        'media_pers',
        'media_csv',
        'ourpeoplevacancy',
        'pelanggan_kami',
        'single_page',
        'prodi_level',
        'prodi_list',
        'prodi_interest',
        // Tambahkan tabel lain yang valid
    );
    
    if (in_array($table_name, $allowed_tables)) {
        return $table_name;
    }
    
    // Log attempt
    error_log("Security: Invalid table name attempted: " . $table_name . " from IP: " . $_SERVER['REMOTE_ADDR']);
    return false;
}

/**
 * Validate column name against whitelist
 * Gunakan untuk file-file yang menggunakan $_GET['p'] untuk nama kolom
 * 
 * @param string $column_name Nama kolom dari user input
 * @return string|false Valid column name atau false jika invalid
 */
function validate_column_name($column_name) {
    // Daftar kolom yang diperbolehkan
    $allowed_columns = array(
        'id',
        'gallery_id',
        'teamid',
        'articleid',
        'persid',
        'csvid',
        'vacancyid',
        'pelangganid',
        'pageid',
        'levelid',
        'listid',
        'interestid',
        // Tambahkan kolom lain yang valid
    );
    
    if (in_array($column_name, $allowed_columns)) {
        return $column_name;
    }
    
    // Log attempt
    error_log("Security: Invalid column name attempted: " . $column_name . " from IP: " . $_SERVER['REMOTE_ADDR']);
    return false;
}

/**
 * Sanitize image type parameter
 * Gunakan untuk image.php dan file sejenis
 * 
 * @param string $type Image type dari user input
 * @return string|false Valid type atau false jika invalid
 */
function validate_image_type($type) {
    $allowed_types = array(
        'homeevent', 'homenews', 'homehighlights', 
        'breadcumb_img', 'facilities', 'kerjasama',
        'highlight_thumb', 'highlight_big',
        'news_thumb', 'news_big',
        'events_thumb', 'events_big',
        'pressrelease_thumb', 'pressrelease_big',
        'vacancy_thumb', 'vacancy_big',
        'alumni_thumb', 'alumni_big',
        'halloffame_thumb', 'halloffame_big'
    );
    
    if (in_array($type, $allowed_types)) {
        return $type;
    }
    
    return false;
}

/**
 * CONTOH PENGGUNAAN 1:
 * Perbaikan untuk file: fhadmin/module/prodi-level/image.php
 */
/*
// SEBELUM (VULNERABLE):
$ssql = 'select * from '.$_GET['t'].' where '.$_GET['p'].'='.intval($_GET['i']).'; ';

// SESUDAH (SECURE):
$table = validate_table_name($_GET['t']);
$column = validate_column_name($_GET['p']);

if (!$table || !$column) {
    die('Invalid parameters');
}

$ssql = 'select * from '.$table.' where '.$column.'='.intval($_GET['i']).'; ';
*/

/**
 * CONTOH PENGGUNAAN 2:
 * Perbaikan untuk SQL injection dengan prepared statement
 */
/*
// SEBELUM (VULNERABLE):
$sql = "SELECT * FROM users WHERE email = '".$_POST['email']."'";

// SESUDAH (SECURE dengan parameterized query):
$sql = "SELECT * FROM users WHERE email = ".$db->qstr($_POST['email']);
// ATAU dengan prepared statement (jika support):
$stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
$stmt->execute([$_POST['email']]);
*/

/**
 * CONTOH PENGGUNAAN 3:
 * Perbaikan untuk press-release.php (SUDAH DIPERBAIKI)
 */
/*
// SEBELUM (VULNERABLE):
$sql = ' SELECT * FROM `latest_news1_kataterkait` WHERE kataterkait =\''.$_POST['gotocategory'].'\'  limit 1  ';

// SESUDAH (SECURE):
$sql = ' SELECT * FROM `latest_news1_kataterkait` WHERE kataterkait ='.$db->qstr($_POST['gotocategory']).' limit 1 ';
*/

/**
 * CONTOH PENGGUNAAN 4:
 * Input sanitization untuk mencegah XSS
 */
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8');
    return $data;
}

/**
 * CONTOH PENGGUNAAN 5:
 * Validate integer input
 */
function validate_int($input) {
    return filter_var($input, FILTER_VALIDATE_INT);
}

/**
 * CONTOH PENGGUNAAN 6:
 * Validate URL untuk redirect
 */
function validate_redirect_url($url) {
    // Only allow local URLs
    if (strpos($url, '://') !== false || strpos($url, '//') === 0) {
        return false;
    }
    
    // Block javascript: protocol
    if (stripos($url, 'javascript:') !== false) {
        return false;
    }
    
    // Sanitize
    $url = preg_replace('/[^a-zA-Z0-9._\/?&=-]/', '', $url);
    
    return $url;
}

/**
 * PRIORITY FILES TO FIX:
 * 
 * HIGH PRIORITY (Public facing):
 * 1. ✅ press-release.php (FIXED)
 * 2. ✅ switchlang.php (FIXED)
 * 3. ✅ image.php (FIXED)
 * 4. search.php - Uses $db->qstr() (SAFE)
 * 5. ajax-prodi.php - Needs review
 * 
 * MEDIUM PRIORITY (Admin panel):
 * 6. fhadmin/module/prodi-level/image.php
 * 7. fhadmin/module/prodi-list/image.php
 * 8. fhadmin/module/prodi-interest/image.php
 * 9. fhadmin/module-tir/media-csv/image.php
 * 10. fhadmin/module-tir/media-article/image.php
 * 11. fhadmin/module-tir/media-pers/image.php
 * 12. fhadmin/module-tir/ourpeoplevacancy/image.php
 * 13. fhadmin/module-tir/pelanggan-kami/image.php
 * 14. fhadmin/module-tir/single-page/image.php
 * 15. fhadmin/module-tir/single-page/pdf.php
 * 16. fhadmin/module-tir/about-manajemen-team/image.php
 * 17. fhadmin/module-tir/investor-tahunan/pdf.php
 * 18. fhadmin/module-tir/investor-tahunan/image.php
 * 19. fhadmin/module-tir/investor-lanjutan/pdf.php
 * 20. fhadmin/module-tir/investor-lanjutan/image.php
 * 21. fhadmin/module-tir/investor-rilis/image.php
 * 22. fhadmin/module-tir/investor-rilis/investor-rilis.php
 * 23. fhadmin/module-tir/investor-rups/image.php
 * 24. fhadmin/module-tir/investor-rups/investor-rups.php
 * 
 * LOW PRIORITY (Protected by .htaccess):
 * 25. fhadmin/lib/* (libraries - update instead)
 */

// === AUTOMATED FIX TEMPLATE ===
// Include this file at the top of vulnerable files:
// require_once('sql_injection_fix_helper.php');

?>
