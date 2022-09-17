<?php

/*
=========== PAGE START ===========
*/

$page = substr($_SERVER['REQUEST_URI'], 1);
$page = str_replace("index.php/", "", $page);

// If page is not set, show sign-in
if ($page == "") {
  $page = "sign-in";
}

/*
=========== PAGE END ===========
*/

?>
