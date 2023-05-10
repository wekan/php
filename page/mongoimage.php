<?php

/*
=========== MONGO START ===========
*/

if ($page == "mongoimage") {

    require_once '../vendor/autoload.php'; // Make sure to adjust the path to your autoload.php file
    require_once("../vendor/mongodb/mongodb/src/functions.php");

    //use MongoDB\Client;
    //use MongoDB\GridFS\Bucket;
    $bucket = (new MongoDB\Client("mongodb://127.0.0.1:27017/wekan")->wekan->selectGridFSBucket('cfs_gridfs.attachments.chunks'));

    //$mongoClient = new MongoDB\Client("mongodb://localhost:27019"); // Replace with your MongoDB connection string
    //$databaseName = 'wekan'; // Replace with your database name
    $gridFsBucketName = 'cfs_gridfs.attachments.chunks'; // Replace with the name of your GridFS bucket, if different

    $db = $mongoClient->selectDatabase($databaseName);
    $bucket = new Bucket($db, $gridFsBucketName);

    $fileId = new MongoDB\BSON\ObjectId;

    #$bucket = (new MongoDB\Client)->test->selectGridFSBucket();
    
    $stream = $bucket->openDownloadStream($fileId);
    $contents = stream_get_contents($stream);


    $fileId = '6426b25eb7103b0001910794'; // Replace with the _id of the image you want to view
    $file = $bucket->findOne(['_id' => new MongoDB\BSON\ObjectId($fileId)]);

    if ($file) {
        header('Content-Type: ' . $file->metadata['contentType']); // Use the contentType stored in the metadata
        echo $bucket->openDownloadStream($file->_id)->readAll();
    } else {
        echo 'Image not found';
    }



}

/*
=========== MONGO END ===========
*/

?>
