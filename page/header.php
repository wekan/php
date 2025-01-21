<?php
/*
=========== HEADER START ===========

DOCTYPE: DO NOT CHANGE IT !
Otherwise page will not display at AWeb at Amiga !
*/
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php
if ($rtl) {
  ?>dir="rtl"<?php
}

switch ($page) {
  case "sign-in":
    $pageTitle = "log-in";
    break;
  case "sign-up":
    $pageTitle = "register";
    break;
  case "allboardschar":
    $pageTitle = "All Boards Char";
    break;

}

?> lang="<?php echo $lang; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo translate($pageTitle)  . " - " . htmlentities($productName); ?></title>
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="maximum-scale=1.0,width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo urlencode($shortcutIcon); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo urlencode($appleTouchIcon180x180); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo urlencode($favicon32x32); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo urlencode($favicon16x16); ?>">
    <link rel="manifest" href="<?php echo urlencode($manifest); ?>">
    <link rel="mask-icon" href="<?php echo urlencode($maskIcon); ?>" color="#<?php echo strip_tags($maskIconColor); ?>">
    <meta name="apple-mobile-web-app-title" content="<?php echo htmlentities($productName); ?>">
    <meta name="application-name" content="<?php echo htmlentities($productName); ?>">
    <meta name="msapplication-TileColor" content="#<?php echo strip_tags($msapplicationTileColor); ?>">
    <meta name="theme-color" content="#<?php echo strip_tags($themeColor); ?>">
<?php
//if ($page == "board") {
//
//    <link rel="stylesheet" href="raphael/raphael.css" type="text/css" media="screen">
//    <link rel="stylesheet" href="raphael/raphael-print.css" type="text/css" media="print">
//    <script src="raphael/raphael.js" type="text/javascript" charset="utf-8"></script>
//    <script src="raphael/raphael-curve.js" type="text/javascript" charset="utf-8"></script>
//}

/*

<link rel="stylesheet" type="text/css" href="css/minimal.css">


    <noscript>
    <link rel="stylesheet" type="text/css" href="css/minimal.css">
    </noscript>

<script type="text/javascript" src="js/style.js">
    </script>

<body background="img/background.jpg">

*/

?>
