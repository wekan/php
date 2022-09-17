<?php
/*
=========== UPLOAD START ===========
*/

// onlyupload

if (isset($_FILES["fileToUpload"]["name"])) {
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

if (isset($_FILES['file']['name'])) {

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

/*
=========== UPLOAD END ===========
*/
?>
