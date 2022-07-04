<pre>

<?php

require_once 'vendor/autoload.php';
require_once 'vendor/mongodb/mongodb/src/functions.php';

//require(__DIR__."../vendor/autoload.php");
use MongoDB\Client as MGDClient;

$collection = (new MGDClient("mongodb://127.0.0.1:27019/wekan"))->wekan->users;

//$cursor = $collection->find([],['limit'=>5]);

//var_dump($cursor);



//$client = new MongoDB\Client("mongodb://localhost:27019");
//$collection = $client->wekan->users;

$result = $collection->findOne();

print_r($result);

//foreach ($result as $entry) {
//    echo $entry['_id'], ': ', $entry['name'], "\n";
//}


?>
</pre>
