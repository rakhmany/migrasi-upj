<?php

require_once("config.inc.php");



if (($_POST["username"] != "") && ($_POST["passwd"] != "")) {
    $username = trim($_POST["username"]);

    $password = trim($_POST["passwd"]);



    if (!($_SESSION['security_code'] == $_POST['security_code'] && !empty($_SESSION['security_code']))) {

        $_SESSION["login_fail"] = "1";

        header("location:index.php");
    } else {

        // check encryption first
        // SECURITY FIX: Use parameterized query to prevent SQL injection
        $SQL = "SELECT 	* 

                   FROM 	    fh_user 

                   WHERE 	    fh_username = " . $db->qstr($username);

        $RS = $db->Execute($SQL);



        if ($RS->fields["fh_userid"] != "") {
            $fh_userid = $RS->fields["fh_userid"];

            $fh_usergroupid = $RS->fields["fh_usergroupid"];

            $fh_username = $RS->fields["fh_username"];

            $fh_userstatus = $RS->fields["fh_status"];

            $fh_password = trim($crypt->decrypt($RS->fields["fh_password"]));



            if ($password == $fh_password) {   //Session Register
                // SECURITY FIX: Regenerate session ID to prevent session fixation
                session_regenerate_id(true);

                $_SESSION["fh_username"] = $fh_username;

                $_SESSION["fh_userid"]  = $fh_userid;

                $_SESSION["fh_userstatus"]  = $fh_userstatus;

                $_SESSION["fh_usergroupid"] = $fh_usergroupid;

                $_SESSION["fh_server"] = $conf['site'];



                //Update to User last login
                // SECURITY FIX: Use intval for ID
                $SQL = "UPDATE 			fh_user

                        SET				fh_logindate = now()

                        WHERE			fh_userid = " . intval($fh_userid);

                $db->Execute($SQL);



                //Inserting to logfile

                insert_log('Login', 'Login System', 'Login User <br>IP : ' . $_SERVER["REMOTE_ADDR"]  . '<br>Hostname : ' . gethostbyaddr($_SERVER["REMOTE_ADDR"]));



                $tmp_tujuan = $conf['email_admin'];

                $tmp_judul = "[" . $conf["project_name"] . "] LOGIN ALERT";

                $tmp_pengirim  = "From: Administrator " . $conf["project_name"] . " <no-reply@no-reply.com>\r\n";

                $tmp_pengirim .= "MIME-Version: 1.0\r\n";

                $tmp_pengirim .= "Content-Type: text/plain; charset=\"utf-8\"\r\n";

                $tmp_pengirim .= "Content-Transfer-Encoding: 7bit\r\n";

                $tmp_isi = "LOGIN ALERT  \n\n";

                $tmp_isi .= "Name = " . $RS->fields["fh_name"] . "\n";

                $tmp_isi .= "Username = " . $fh_username . "\n\n";

                $tmp_isi .= "DATE = " . date('j-M-Y  H:i:s ') . "\n";

                $tmp_isi .= "IP = " . $_SERVER["REMOTE_ADDR"] . "\n";

                $tmp_isi .= "HOSTNAME = " . gethostbyaddr($_SERVER['REMOTE_ADDR']) . ": \n\n";



                @mail($tmp_tujuan, $tmp_judul, $tmp_isi, $tmp_pengirim);



                //check logdel

                require_once("logdel.php");

                header("location:index.php");
            } else {
                // SECURITY FIX: Do NOT log plaintext passwords
                insert_log('FAIL LOGIN', 'FAIL LOGIN', 'FAIL LOGIN USER <br>Username : ' . $db->qstr($username) . ' <br>IP : ' . $_SERVER["REMOTE_ADDR"] . ' <br>Hostname : ' . gethostbyaddr($_SERVER["REMOTE_ADDR"]));



                $_SESSION["login_fail"] = "1";

                header("location:index.php");
            }
        } else {
            // SECURITY FIX: Do NOT log plaintext passwords
            insert_log('FAIL LOGIN', 'FAIL LOGIN', 'FAIL LOGIN USER <br>Username : ' . $db->qstr($username) . ' <br>IP : ' . $_SERVER["REMOTE_ADDR"] . ' <br>Hostname : ' . gethostbyaddr($_SERVER["REMOTE_ADDR"]));



            $_SESSION["login_fail"] = "1";

            header("location:index.php");
        }
    }
} else {

    $_SESSION["login_fail"] = "1";

    header("location:index.php");
}
