<?php
if($_SERVER["HTTP_HOST"] == 'localhost' || strpos($_SERVER["HTTP_HOST"], '192.168.1') !== false) {
    $DB_CONFIG = [
        "DB_HOST" => "localhost",
        "DB_DATABASE" => "upj_2017",
        "DB_USERNAME" => "root",
        "DB_PASSWORD" => "",
    ];
} else {
    $DB_CONFIG = [
        "DB_HOST" => "localhost",
        "DB_DATABASE" => "upeje_dbmain",
        "DB_USERNAME" => "upeje_usernew",
        "DB_PASSWORD" => "fF_??Ig(v#n.",
    ];
}
return $DB_CONFIG;