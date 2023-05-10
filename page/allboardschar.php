<?php

/*
=========== ALL BOARDS CHAR START ===========
*/

if ($page == "allboardschar") {

// Open SQLite database
$db = new SQLite3('../../../../wekan.sqlite');

?>

<?php translate("all-boards"); ?></a> | <?php translate("quick-access-description"); ?>
 | <?php translate("notifications"); ?>
<?php
if (isset($_SESSION["user"])) {
 echo $_SESSION["user"];
}

?>

<h3><?php translate("boards"); ?></h3>

<a href="addboard"><?php translate("add-board"); ?></a>
<?php
//$type = 'board';
//$statement = $db->query("SELECT _id, substr(title,1,1), COUNT(*), type from boards WHERE type=board GROUP BY substr(title,1,1) ORDER BY substr(title,1,1) ASC;");
//$statement->bindValue(":type", $type, SQLITE3_TEXT);
//$results = $statement->execute();
$results = $db->query("SELECT _id, substr(title,1,1), COUNT(*), type from boards WHERE type='board' GROUP BY substr(title,1,1) ORDER BY substr(title,1,1) ASC;");

while ($row = $results->fetchArray()) {
    //var_dump($row);
    // board ID:
    echo "\n";
    echo ', <a href="?boardid=' . $row[0] . '">';
    // board title first char
    if (isset($row[1])) {
      echo $row[1];
    } else {
      echo "(Empty title)";
    }
    echo "</a>";
    // count of title first char:
    if (isset($row[2])) {
      echo " (" . $row[2] . ")";
    }
}

?>

<h3>Template Boards</h3>

<a href="addboard"><?php translate("add-board"); ?></a>
<?php
$type = "template-board";
$statement = $db->prepare('SELECT _id, substr(title,1,1), COUNT(*), type from boards WHERE type=:type GROUP BY substr(title,1,1) ORDER BY substr(title,1,1) ASC;');
$statement->bindValue(':type', $type);
$results = $statement->execute();

while ($row = $results->fetchArray()) {
    //var_dump($row);
    // board ID:
    echo "\n";
    echo ', <a href="?boardid=' . $row[0] . '">';
    // board title first char
    if (isset($row[1])) {
      echo $row[1];
    } else {
      echo "(Empty title)";
    }
    echo "</a>";
    // count of title first char:
    if (isset($row[2])) {
      echo " (" . $row[2] . ")";
    }
}

?>

<h3>Template Containers</h3>

<a href="addboard"><?php translate("add-board"); ?></a>
<?php
$type = "template-container";
$statement = $db->prepare('SELECT _id, substr(title,1,1), COUNT(*), type from boards WHERE type=:type GROUP BY substr(title,1,1) ORDER BY substr(title,1,1) ASC;');
$statement->bindValue(':type', $type);
$results = $statement->execute();

while ($row = $results->fetchArray()) {
    //var_dump($row);
    // board ID:
    echo "\n";
    echo ', <a href="?boardid=' . $row[0] . '">';
    // board title first char
    if (isset($row[1])) {
      echo $row[1];
    } else {
      echo "(Empty title)";
    }
    echo "</a>";
    // count of title first char:
    if (isset($row[2])) {
      echo " (" . $row[2] . ")";
    }
}

// Close SQLite database
$db->close();

?>

<br>
<br>
<br>

<?php

}

/*
=========== ALL BOARDS CHAR END ===========
*/

?>
