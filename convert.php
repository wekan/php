<?php

$repopath="~/repos/";
$sourcedir=$repopath . "wekan";
$destdir=$repopath . "wekan-php";

// https://stackoverflow.com/questions/1860393/recursive-file-search-php
$it = new RecursiveDirectoryIterator($sourcedir);
$allowed=array("styl");
foreach(new RecursiveIteratorIterator($it) as $file) {
    if(in_array(substr($file, strrpos($file, '.') + 1),$allowed)) {
	$dest = rtrim($file, "styl");
        echo "stylus -w " . $file . " -o " . $dest . "css\n";
    }
}

// https://www.npmjs.com/package/stylus
// stylus -w style.styl -o style.css

//$my_str = "The quick brown fox jumps over the lazy dog.";
//echo str_replace("quick brown fox", "swift white cat", $my_str);

?>
