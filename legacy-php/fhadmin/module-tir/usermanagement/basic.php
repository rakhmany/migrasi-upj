<?php

require_once("../../config.inc.php");

require_once("../../back.config.inc.php");



$akses_level_page = access_level_page($fh_usergroupid, $db);

$access_level_type = access_level_type($fh_usergroupid, $db); //** by: Bambang Riswanto at 2013



$path_image = "../../../images/";

$width_imagelist = $basic->fields["fh_widthgeneralbanner"];

$judul_halaman = "Basic Configuration";



if ($fh_userid && $akses_level_page) {
    if (isset($_POST["fh_basicconfigid"])) {
        //*** SECURITY FIX: Validate CSRF token before processing any POST
        if (!csrf_validate_token()) {
            log_security_event('CSRF_FAIL', 'Basic Config POST rejected - invalid CSRF token');
            $msg .= "Security validation failed. Please reload the page and try again.<br>";
        } else {

            //*** Validasi

            if ($_POST["fh_companyemail"] == "") {
                $msg .= "Please input Company Email Address<br>";
            } else {
                if (!(check_email($_POST["fh_companyemail"]))) $msg .= "Invalid Company Email address<br>";
            }



            if ($_POST["fh_notifemail"] == "") {
                $msg .= "Please input Notification Email Address<br>";
            } else {
                if (!(check_email($_POST["fh_notifemail"]))) $msg .= "Invalid Notification Email address<br>";
            }



            if ($_POST["fh_emailadmin"] == "") {
                $msg .= "Please input Administrator Email Address<br>";
            } else {
                if (!(check_email($_POST["fh_emailadmin"]))) $msg .= "Invalid Administrator Email address<br>";
            }



            if (sizeof($_FILES) > 0) {

                $handle = new Upload($_FILES["fh_general_banner"]);

                if ($_FILES["fh_general_banner"]["name"] != "") {

                    if (!($handle->file_is_image)) {
                        $msg .= "Invalid image<br>";
                    }
                }
            }



            if (($_POST["fh_widthgeneralbanner"] == "") || ($_POST["fh_widthgeneralbanner"] <= 0)) $msg .= "Please input Width General Banner<br>";

            else {
                if (!(ctype_digit($_POST["fh_widthgeneralbanner"]))) $msg .= "Invalid Width General Banner<br>";
            }

            if (($_POST["fh_widthstatisbanner"] == "") || ($_POST["fh_widthstatisbanner"] <= 0)) $msg .= "Please input Width Statis Banner<br>";

            else {
                if (!(ctype_digit($_POST["fh_widthstatisbanner"]))) $msg .= "Invalid Width Statis Banner<br>";
            }

            if (($_POST["fh_heightgeneralbanner"] == "") || ($_POST["fh_heightgeneralbanner"] <= 0)) $msg .= "Please input Height General Banner<br>";

            else {
                if (!(ctype_digit($_POST["fh_heightgeneralbanner"]))) $msg .= "Invalid Height General Banner<br>";
            }

            if (($_POST["fh_heightstatisbanner"] == "") || ($_POST["fh_heightstatisbanner"] <= 0)) $msg .= "Please input Height Statis Banner<br>";

            else {
                if (!(ctype_digit($_POST["fh_heightstatisbanner"]))) $msg .= "Invalid Height Statis Banner<br>";
            }





            //*** Tidak Ada Error

            if ($msg == "") {

                if ($access_level_type->edit) {

                    //*** Untuk Upload General Banner

                    $SQL = "SELECT          *

                        FROM             fh_basicconfig

                        LIMIT             0,1";

                    $RS = $db->Execute($SQL);

                    $width_imagelist = $_POST["fh_widthgeneralbanner"];

                    $height_imagelist = $_POST["fh_heightgeneralbanner"];



                    if ($_FILES["fh_general_banner"]["name"] != "") {

                        //*** Jika Edit dengan melakukan Upload File

                        if ($RS->fields["fh_general_banner"] != "") {
                            @unlink($path_image . "" . $RS->fields["fh_general_banner"]);
                        }

                        $handle->file_new_name_body = 'defaultbanner';

                        $handle->image_resize = true;

                        if ($width_imagelist > 0) {
                            $handle->image_x = $width_imagelist;
                        }

                        if ($height_imagelist > 0) {
                            $handle->image_y = $height_imagelist;
                        }

                        $handle->Process($path_image);

                        $tmp_general_banner = $handle->file_dst_name;

                        $SQL1 = "UPDATE		 	fh_basicconfig

                                  SET		fh_general_banner = '" . $db->qstr($tmp_general_banner) . "'

                                  WHERE		fh_basicconfigid = " . intval($_POST["fh_basicconfigid"]);

                        $db->Execute($SQL1);
                    }





                    $SQL1 =     "UPDATE	fh_basicconfig

                              SET		fh_companyname = " . $db->qstr(sanitize_html($_POST["fh_companyname"])) . ", 

                                            fh_companyaddress = " . $db->qstr(sanitize_html($_POST["fh_companyaddress"])) . ", 

                                            fh_companyphone = " . $db->qstr(sanitize_input($_POST["fh_companyphone"])) . ", 

                                            fh_companyfax = " . $db->qstr(sanitize_input($_POST["fh_companyfax"])) . ", 

                                            fh_companyemail = " . $db->qstr(sanitize_input($_POST["fh_companyemail"])) . ", 

                                            fh_notifemail = " . $db->qstr(sanitize_input($_POST["fh_notifemail"])) . ", 

                                            fh_companyweb = " . $db->qstr(sanitize_input($_POST["fh_companyweb"])) . ", 

                                            fh_company_ym1 = " . $db->qstr(sanitize_input($_POST["fh_company_ym1"])) . ",

                                            fh_company_ym2 = " . $db->qstr(sanitize_input($_POST["fh_company_ym2"])) . ",

                                            fh_social_fb = " . $db->qstr(sanitize_input($_POST["fh_social_fb"])) . ",

                                            fh_social_twt = " . $db->qstr(sanitize_input($_POST["fh_social_twt"])) . ",

                                            fh_social_gplus = " . $db->qstr(sanitize_input($_POST["fh_social_gplus"])) . ",

                                            fh_social_blogger = " . $db->qstr(sanitize_input($_POST["fh_social_blogger"])) . ",

                                            fh_social_linkedin = " . $db->qstr(sanitize_input($_POST["fh_social_linkedin"])) . ",

                                            fh_social_youtube = " . $db->qstr(sanitize_input($_POST["fh_social_youtube"])) . ",

                                            fh_social_vimeo = " . $db->qstr(sanitize_input($_POST["fh_social_vimeo"])) . ",

                                            fh_social_rss = " . $db->qstr(sanitize_input($_POST["fh_social_rss"])) . ",

                                            fh_googlemap = " . $db->qstr(sanitize_html($_POST["fh_googlemap"])) . ",

                                            fh_fbbox = " . $db->qstr(sanitize_input($_POST["fh_fbbox"])) . ",

                                            fh_twtbox = " . $db->qstr(sanitize_input($_POST["fh_twtbox"])) . ",

                                            fh_index_title = " . $db->qstr(sanitize_input($_POST["fh_index_title"], 1000)) . ",

                                            fh_index_title_en = " . $db->qstr(sanitize_input($_POST["fh_index_title_en"], 1000)) . ",

                                            fh_index_description = " . $db->qstr(sanitize_html($_POST["fh_index_description"])) . ",

                                            fh_index_description_en = " . $db->qstr(sanitize_html($_POST["fh_index_description_en"])) . ",

                                            fh_widthgeneralbanner = " . intval($_POST["fh_widthgeneralbanner"]) . ",

                                            fh_heightgeneralbanner = " . intval($_POST["fh_heightgeneralbanner"]) . ",

                                            fh_widthstatisbanner = " . intval($_POST["fh_widthstatisbanner"]) . ",

                                            fh_heightstatisbanner= " . intval($_POST["fh_heightstatisbanner"]) . ",

                                            fh_general_pageheader = " . $db->qstr(sanitize_html($_POST["fh_general_pageheader"])) . ",

                                            fh_general_pageheader_en = " . $db->qstr(sanitize_html($_POST["fh_general_pageheader_en"])) . ",

                                            fh_general_metakeyword = " . $db->qstr(sanitize_input($_POST["fh_general_metakeyword"], 2000)) . ",

                                            fh_general_metadescription = " . $db->qstr(sanitize_input($_POST["fh_general_metadescription"], 2000)) . ",

                                            fh_sitetitle = " . $db->qstr(sanitize_input($_POST["fh_sitetitle"])) . ",

                                            fh_projectname = " . $db->qstr(sanitize_input($_POST["fh_projectname"])) . ",

                                            fh_projecturl = " . $db->qstr(sanitize_input($_POST["fh_projecturl"])) . ",

                                            fh_emailadmin = " . $db->qstr(sanitize_input($_POST["fh_emailadmin"])) . ",

                                            fh_maxuserlog = " . intval($_POST["fh_maxuserlog"]) . ",

                                            fh_maxfilesize = " . intval($_POST["fh_maxfilesize"]) . ",

                                            fh_frontend_page = " . intval($_POST["fh_frontend_page"]) . ",

                                            fh_backend_page = " . intval($_POST["fh_backend_page"]) . ",

                                            fh_shipping_rate = " . $db->qstr(sanitize_input($_POST["fh_shipping_rate"])) . ",

                                            fh_webstatus = " . $db->qstr(sanitize_input($_POST["fh_webstatus"])) . ",

                                            fh_webstatuskey = " . $db->qstr(sanitize_input($_POST["fh_webstatuskey"])) . "

                            WHERE	    fh_basicconfigid = " . intval($_POST["fh_basicconfigid"]);

                    $db->Execute($SQL1);



                    insert_log('Edit', 'Basic Configuration', 'Edit Basic Configuration = ' . $db->qstr($_POST["fh_companyname"]));

                    $msg = "Basic Configuration has been updated<br>";
                } else akses_level_die();
            }
        } // end CSRF validation

    }





    //*** Delete General Banner

    if (isset($_POST["delbanner"])) {

        if (!csrf_validate_token()) {
            log_security_event('CSRF_FAIL', 'Delete banner POST rejected');
        } else {
            if (!$access_level_type->delete) akses_level_die();

            $SQL = "SELECT 		*

                      FROM			fh_basicconfig

                      WHERE	    fh_basicconfigid = " . intval($_POST["fh_basicconfigid"]);

            $RS  = $db->Execute($SQL);



            if ($RS->fields["fh_basicconfigid"] != '') {  //**** Untuk check domain dimasukkan ke userlog

                insert_log('Delete', $judul_halaman, 'Delete General Banner Config Name');

                if ($RS->fields["fh_general_banner"] != "") {
                    @unlink($path_image . "" . $RS->fields["fh_general_banner"]);
                }



                $SQL1 = "UPDATE		 	fh_basicconfig

                         SET				    fh_general_banner = '' 

                         WHERE			fh_basicconfigid = " . intval($_POST["fh_basicconfigid"]);

                $db->Execute($SQL1);
            }
        } // end CSRF   

    }





    $SQL = "SELECT		*

                FROM		    fh_basicconfig

                LIMIT		    0,1";

    $RS = $db->Execute($SQL);



    foreach ($RS->fields as $key => $value) {

        $smarty->assign($key, $value);
    }



    $smarty->assign('title', $judul_halaman);

    $smarty->assign('msg', $msg);

    $smarty->assign('width_imagelist', $width_imagelist);

    $smarty->assign('path_image', $path_image);

    $smarty->display('basicconfig.tpl');
}
