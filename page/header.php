<?php
/*
=========== HEADER START ===========
*/

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html <?php
if ($rtl) {
  ?>dir="rtl"<?php
}
?> lang="<?php echo $lang; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title><?php echo htmlentities($productName); ?></title>
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
?>

    <style type="text/css">
        #drop_file_zone {
            background-color: #EEE;
            border: #999 5px dashed;
            width: 290px;
            height: 200px;
            padding: 8px;
            font-size: 18px;
        }
        #drag_upload_file {
            width:50%;
            margin:0 auto;
        }
        #drag_upload_file p {
            text-align: center;
        }
        #drag_upload_file #selectfile {
            display: none;
        }
        #oneboard {
          min-height: 100px;
          border: 1px solid black;
          padding: 2px;
          border-radius: 10px 10px 10px 10px;
        }
        body {
          font-family: <?php echo strip_tags($font); ?>;
          background-color: #<?php echo strip_tags($bgColor); ?>;
          margin: 0;
          padding: 0;
        }
    </style>

<?php
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
</head>
<body>

<br>
<table width="100%">
<tr><td bgcolor="white"><a href="/allpages">All Pages</a>

<?php
//echo f(substr($_SERVER['REQUEST_URI'], 0, 11) === "/project/b/") {

//echo $_SERVER['REQUEST_URI'];
//echo "&nbsp;";
//echo substr($_SERVER['REQUEST_URI'], 1);
echo "&nbsp; / &nbsp;";
echo $page;

?>

</td></tr>
</table>

<br>

</a>

<br>

<?php

/*
=========== HEADER END ===========
*/

?>
