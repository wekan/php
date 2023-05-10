<?php

// Autologin:
//   Note: During development, when auth is not implemented yet ,
//       pages are displayed on url like:
//       http://localhost/?page=login
//       http://localhost/?page=allboards

// Change visible page based on $_PORT variable content.


include_once("../settings.php");

//include_once($pagepath . "session.php");
/*
=========== SESSION START ===========
*/

session_start();

if (isset($_POST['at-field-username_and_email']) && isset($_POST['at-field-password'])) {
    if ($_POST['at-field-username_and_email'] == 'test' && $_POST['at-field-password'] == 'test') {
        $_SESSION["user"] = "test";
    }
    /*
    else {
        session_unset();
        session_destroy();
    }
    */
}

/*
=========== SESSION END ===========
*/

// include_once($pagepath . "page.php");
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

include_once($pagepath . "debug.php");
include_once($pagepath . "translations.php");
include_once($pagepath . "header.php");

if (isset($_FILES["fileToUpload"]["name"])) {
  include_once($pagepath . "upload.php");
}

if ($page == "sign-in") {
  include_once($pagepath . "sign-in1.php");
  include($pagepath . "select-lang.php");
}

if ($page == "sign-up") {
  include_once($pagepath . "sign-up1.php");
  include($pagepath . "select-lang.php");
}

if (isset($_GET["boardid"])) {
  $page = "board";
  $boardid = $_GET["boardid"];
}

if ($page == "sign-in")          { include_once($pagepath . "sign-in2.php"); }
if ($page == "sign-up")          { include_once($pagepath . "sign-up2.php"); }
if ($page == "forgot-password")  { include_once($pagepath . "forgot-password.php");}
if ($page == "allboards")        { include_once($pagepath . "allboards.php"); }
if ($page == "allboardschar")    { include_once($pagepath . "allboardschar.php"); }
if ($page == "board")            { include_once($pagepath . "board.php"); }
if ($page == "boardsettings")    {}
if ($page == "swimlane")         {}
if ($page == "swimlanesettings") {}
if ($page == "card")             {}
if ($page == "cardsettings")     {}
if ($page == "searchallboards")  {}
if ($page == "mycards")          {}
if ($page == "calendar")         {}
if ($page == "gantt")            {}
if ($page == "adminpanel")       {}
if ($page == "allpages")         { include_once($pagepath . "allpages.php"); }
if ($page == "newticket")        { include_once($pagepath . "newticket.php"); }
if ($page == "sqlite")           { include_once($pagepath . "sqlite.php"); }
if ($page == "mongo")            { include_once($pagepath . "mongo.php"); }
if ($page == "mongoimage")       { include_once($pagepath . "mongoimage.php"); }
if ($page == "dragupload")       { include_once($pagepath . "dragupload.php"); }
?>

</body>
</html>
