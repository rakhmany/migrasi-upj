<?php
if ($_SERVER["SERVER_NAME"] == "localhost") {
  $conf["db_username"] = "root";
  $conf["db_password"] = "";
  $conf["db_database"] = "basic_klikwebsite";
} else {
  $conf["db_username"] = "fabercms_user";
  $conf["db_password"] = "qwepoi132";
  $conf["db_database"] = "fabercms_dbmain";
}
?>