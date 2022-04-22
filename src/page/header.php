<?php

/*
  HTML head and start or body
*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo htmlentities($productName); ?></title>
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="maximum-scale=1.0,width=device-width,initial-scale=1.0,user-scalable=0">
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
    <link rel="stylesheet" type="text/css" href="css/minimal.css">

<?php

/*
    <noscript>
    <link rel="stylesheet" type="text/css" href="css/minimal.css">
    </noscript>

<script type="text/javascript" src="js/style.js">
    </script>

*/
?>
</head>

<body style="font-family: <?php echo strip_tags($font); ?>; background-color: #<?php echo strip_tags($bgColor); ?>">

<a href="/allpages" bgcolor="white">All Pages

<?php 
//echo f(substr($_SERVER['REQUEST_URI'], 0, 11) === "/project/b/") {

//echo $_SERVER['REQUEST_URI'];
//echo "&nbsp;";
//echo substr($_SERVER['REQUEST_URI'], 1);
echo "&nbsp; / &nbsp;";
echo $page;


?>

</a>

<br>

