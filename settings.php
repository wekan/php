<?php

// Settings
$defaultLang = "fi";

/*
function nojs() {

    // TODO: All should work without JS. If JS, then drag-drop replace etc.
    // Detect only no-js browsers. Other browsers get js.
    //https://developer.mozilla.org/en-US/docs/Web/HTTP/Browser_detection_using_the_user_agent
    $browser_nojs = array('NetSurf', 'AWeb', 'Amiga', 'Links', 'w3m', 'MSIE');

    $string = $_SERVER['HTTP_USER_AGENT'];
    $nocount = 0;
    foreach ($browser_nojs as $browser) {
        if (strpos($string, $browser) !== FALSE) { // Yoshi version
            $nocount = $nocount + 1;
            //return true;
        }
    }

    if ($nocount > 0) {
       echo "Nojs browser";
    } else {
        echo "JS browser";
    }

    //echo "Not found!";
    //return false;
}

echo '<html><head><title>Wekan</title></head><body><h1>';
echo $_SERVER['HTTP_USER_AGENT'];
echo '<br><br>';
nojs();
echo '</body></html>';
die();
*/

$debug = false;
$subUrl = "wekan";
$pagepath = "../page/";

// Settings: HTML head icons.
$shortcutIcon = "favicon.ico";
$appleTouchIcon180x180 = "apple-touch-icon.png";
$favicon32x32 = "favicon-32x32.png";
$favicon16x16 = "favicon-16x16.png";
$manifest = "site.webmanifest";
$maskIcon = "safari-pinned-tab.svg";
$maskIconColor = "5bbad5";
$msapplicationTileColor = "00aba9";
$themeColor = "fff";

// Admin Panel / Settings / Layout
$productName = "WeKan ® Multiverse";
$font = "Arial, Helvetica, sans-serif"; // Wekan font
$bgColor = "dfdfdf"; // Wekan background color
$displayAuthenticationMethod = true;
$authenticationMethod = "password"; // password, LDAP, OAuth2
$hideLogo = false;
$loginLogoImageUrl = "StoreLogo.scale-100.jpg";
$loginLogoImageHeight = "50";
$loginLogoImageWidth = "50";
$topLeftCornerLogoImageUrl = "logo-header.png";
$topLeftCornerLogoLinkUrl = "";
$textBelowCustomLoginLogo = "";
$topLeftCornerLogoHeight = "27";
$topLeftCornerLogoWidth = "auto";
$customUrlSchemes = ""; // should be automatically clickable. One URL Scheme per line.

?>
