<?php

if ($_SERVER["SERVER_NAME"] == "localhost") {
  $conf["db_username"] = "root";
  $conf["db_password"] = "";
  $conf["db_database"] = "upj2023";

} else { 
    $conf["db_host"] = "103.105.68.69:5898";
    $conf["db_username"] = "upj_user";
    $conf["db_password"] = 'AyAm.GoReNg@ItU.eNaK';
    $conf["db_database"] = "upj_db";
}

?>