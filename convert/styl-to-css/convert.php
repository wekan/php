<?php

$repopath="/home/user/repos/";
$sourcedir=$repopath . "wekan";
$destpath=$repopath . "w/php/css/";

// https://stackoverflow.com/questions/1860393/recursive-file-search-php
$it = new RecursiveDirectoryIterator($sourcedir);
$allowed=array("styl");
foreach(new RecursiveIteratorIterator($it) as $file) {
    if(in_array(substr($file, strrpos($file, '.') + 1),$allowed)) {
        $dest = rtrim($file, "styl");
        $dest = $dest . "styl";
        $dest = str_replace("/home/user/repos/wekan/client/components/", "", $dest);
        $dest = str_replace("/", "-", $dest);
        //$dest = $destpath . $dest;
        //$cmd = "stylus -w " . $file . " -o " . $destdir . $dest;
        $cmd = "cp " . $file . " " . $destpath . $dest;
        $output = shell_exec($cmd);
        //echo "$output" . "\n";
    }
}

// https://www.npmjs.com/package/stylus
// stylus -w style.styl -o style.css

//$my_str = "The quick brown fox jumps over the lazy dog.";
//echo str_replace("quick brown fox", "swift white cat", $my_str);

?>
