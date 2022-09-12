<?php

// Autologin:
//   Note: During development, when auth is not implemented yet ,
//       pages are displayed on url like:
//       http://localhost/?page=login
//       http://localhost/?page=allboards

// Change visible page based on $_PORT variable content.

//require '../vendor/autoload.php';

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

// onlyupload
if ($_FILES["fileToUpload"]["name"]) {
  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
  $uploadOk = 1;
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
  // Check if image file is a actual image or fake image
  /*
  if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
      echo "File is an image - " . $check["mime"] . ".";
      $uploadOk = 1;
    } else {
      echo "File is not an image.";
      $uploadOk = 0;
    }
  }
  */

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
    } else {
      echo "Sorry, there was an error uploading your file.";
    }
    die();
}

// dragupload
if ($_FILES['file']['name']) {

  /*
  $arr_file_types = ['image/png', 'image/gif', 'image/jpg', 'image/jpeg'];

  if (!(in_array($_FILES['file']['type'], $arr_file_types))) {
      echo "false";
      return;
  }
  */

  if (!file_exists('uploads')) {
    mkdir('uploads', 0777);
  }

  $filename = time().'_'.$_FILES['file']['name'];

  move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/'.$filename);

  echo 'uploads/'.$filename;
  die();
}

if ($page == "sign-in") {
  include_once('../src/page/sign-in.php');
} else if ($page == "sign-up") {
  include_once('../src/page/sign-up.php');
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
} else if ($page == "onlyupload") {
  include_once("../src/page/onlyupload.php");
} else if ($page == "dragupload") {
  include_once("../src/page/dragupload.php");
} else {
  include_once('../src/page/sign-in.php');
}
?>

</body>

</html>
