<?php

/*
=========== DRAGUPLOAD START ===========
*/

//if ($page == "dragupload") {

?>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
<div id="drop_file_zone" ondrop="upload_file(event)" ondragover="return false">
    <div id="drag_upload_file">
        <p>Drop file here to upload</p>
        <p>or</p>
        <p><input type="button" value="Select File" onclick="file_explorer();" /></p>
        <input type="file" id="selectfile" />
    </div>
</div>
<div class="img-content"></div>

</form>

<script>
var fileobj;
function upload_file(e) {
    e.preventDefault();
    fileobj = e.dataTransfer.files[0];
    ajax_file_upload(fileobj);
}

<?php
/* One file drag upload, works. */
?>

function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
        fileobj = document.getElementById('selectfile').files[0];
        ajax_file_upload(fileobj);
    };
}

<?php
/* Multi file drag upload, does not work:
function file_explorer() {
    document.getElementById('selectfile').click();
    document.getElementById('selectfile').onchange = function() {
       const files = document.querySelector(‘[type=file]’).files;
       for (i = 0; i < files.length; i++) {
          fileobj = document.getElementById('selectfile').files[i];
          ajax_file_upload(fileobj);
       }
   };
}
*/

/* Multi file drag upload, this also does not work:
function file_explorer(e) {
   e.preventDefault();
   for (i = 0; i < e.dataTransfer.files.length; i++) {
      fileobj = e.dataTransfer.files[i];
      ajax_file_upload(fileobj);
   }
}
*/
?>

function ajax_file_upload(file_obj) {
    if(file_obj != undefined) {
        var form_data = new FormData();                  
        form_data.append('file', file_obj);
        var xhttp = new XMLHttpRequest();
        xhttp.open("POST", "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>", true);
        xhttp.onload = function(event) {
            oOutput = document.querySelector('.img-content');
            if (xhttp.status == 200) {
                // oOutput.innerHTML = "<img src='"+ this.responseText +"' alt='The Image' />";
                oOutput.innerHTML = "Upload done.";
            } else {
                oOutput.innerHTML = "Error " + xhttp.status + " occurred when trying to upload your file.";
            }
        }
 
        xhttp.send(form_data);
    }
}
</script>

<hr>

<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

<?php

/*
=========== DRAGUPLOAD END ===========
*/

?>
