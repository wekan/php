<?php

// Autologin:
//   Note: During development, when auth is not implemented yet ,
//       pages are displayed on url like:
//       http://localhost/?page=login
//       http://localhost/?page=allboards

// Change visible page based on $_PORT variable content.

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

include_once('../src/settings.php');
include_once('../src/lang.php');


//if (isset($_GET['page'])) {
  //$page = htmlspecialchars($_GET['page']);
//  $page = substr($_SERVER['REQUEST_URI'], 1);
//}

$page = substr($_SERVER['REQUEST_URI'], 1);
$page = str_replace("index.php/", "", $page);


//if (!isset($_SESSION["user"])) {
//  $page = 'sign-in';
//}

include_once('../src/page/debug.php');
include_once('../src/page/header.php');

if ($page == "sign-in") {
  include_once('../src/page/sign-in.php');
} else if ($page == "sign-up") {
} else if ($page == "forgotpassword") {
} else if ($page == "allboards") {
  include_once("../src/page/allboards.php");
} else if ($page == "board") {
  include_once("../src/page/board.php");
} else if ($page == "boardsettings") {
} else if ($page == "swimlane") {
} else if ($page == "swimlanesettings") {
} else if ($page == "card") {
} else if ($page == "cardsettings") {
} else if ($page == "searchallboards") {
} else if ($page == "mycards") {
} else if ($page == "calendar") {
} else if ($page == "gantt") {  
} else if ($page == "adminpanel") {
} else if ($page == "allpages") {
  include_once("../src/page/allpages.php");
} else if ($page == "newticket") {
  include_once("../src/page/newticket.php");
} else if ($page == "mongo") {
  include_once("../src/page/mongo.php");
} else {
  include_once('../src/page/sign-in.php');
}
?>

</body>

</html>
