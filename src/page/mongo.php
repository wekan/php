<pre>

<?php

require '../vendor/autoload.php';



$client = new MongoDB\Client("mongodb://localhost:27019");
$collection = $client->wekan->users;

//$result = $collection->find( [ 'name' => 'Hinterland', 'brewery' => 'BrewDog' ] );
$result = $collection->findOne()->toArray();

print_r($result);

//foreach ($result as $entry) {
//    echo $entry['_id'], ': ', $entry['name'], "\n";
//}


?>
</pre>
