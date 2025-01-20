<?php

use Exception;
use MongoDB\Client;
use MongoDB\Driver\Exception\Exception as MongoDBException;
use MongoDB\Driver\ServerApi;

/*
=========== MONGO START ===========
*/

if ($page == "mongo") {
    require_once("../vendor/autoload.php");
    require_once("../vendor/mongodb/mongodb/src/functions.php");

    echo "<pre>";
    
    $uri = 'mongodb://127.0.0.1:27019';

    try {
        // Create the server API object
        $serverApi = new ServerApi(ServerApi::V1);
        
        // Create a new client and connect to the server with options
        $client = new Client($uri, [], ['serverApi' => $serverApi]);
        $collection = $client->wekan;
        
        // Verify connection
        $client->listDatabases();
        
        $result = $collection->users->findOne();
        var_dump($result);
        
    } catch (MongoDBException $e) {
        echo "MongoDB Error: " . $e->getMessage();
    } catch (Exception $e) {
        echo "General Error: " . $e->getMessage();
    }

    echo "</pre>";
}

/*
=========== MONGO END ===========
*/

?>
