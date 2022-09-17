<?php

$limit = 1;

$db = new SQLite3('../../../../wekan.sqlite');
$statement = $db->prepare('SELECT username from users LIMIT :limit;');
//$statement->bindValue(':id', $id);
$statement->bindValue(':limit', $limit);

$results = $statement->execute();

while ($row = $results->fetchArray()) {
    var_dump($row);
    echo "<br><br>Someone {$row[0]}";
}

$db->close();

?>
