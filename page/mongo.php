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

$collection = (new MongoDB\Client("mongodb://127.0.0.1:27017/wekan"))->wekan->users;

//$cursor = $collection->find([],['limit'=>5]);

//var_dump($cursor);

$result = $collection->findOne();

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
