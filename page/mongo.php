<?php

/*
=========== MONGO START ===========
*/

if ($page == "mongo") {

?>

<pre>

<?php

require_once("../vendor/autoload.php");
require_once("../vendor/mongodb/mongodb/src/functions.php");

//use Exception;
//use MongoDB\Client;
//use MongoDB\Driver\ServerApi;

$uri = 'mongodb://127.0.0.1:27017';

// Create a new client and connect to the server
$collection = (new MongoDB\Client($uri))->wekan;

//$cursor = $collection->find([],['limit'=>5]);

//var_dump($cursor);

$result = $collection->users->findOne();

var_dump($result);

//foreach ($result as $entry) {
//    echo $entry['_id'], ': ', $entry['name'], "\n";
//}




?>

</pre>

<?php

}

/*
=========== MONGO END ===========
*/

?>
