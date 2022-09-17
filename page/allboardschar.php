<?php

/*
=========== ALL BOARDS CHAR START ===========
*/

if ($page == "allboards") {

//$limit = 20;
//$type = "board";

$db = new SQLite3('../../../../wekan.sqlite');
$statement = $db->prepare('SELECT _id, title, type from boards ORDER BY type, title ASC;');

//$statement->bindValue(':id', $id);
//$statement->bindValue(':limit', $limit);
//$statement->bindValue(':type', $type);

$results = $statement->execute();

?>

    <div class="navigation">
        <div style="float: left; text-align: left;">
            <img src="logo-header.png" alt="">
            <span class="allBoards"><a href="/"><img src="img/home.png"><?php translate("all-boards"); ?></a></span>
            <span class="current empty"><?php translate("quick-access-description"); ?></span>
        </div>
        <div style="float: right; text-align: right;">
            <span><a class="notifications-drawer-toggle fa fa-bell" href="#"><?php translate("notifications"); ?></a></span>
            <span><?php
if (isset($_SESSION["user"])) {
 echo $_SESSION["user"];
}

?></span>
        </div>
    </div>

<div style="position:absolute; top: 50px;">
    <h1><?php translate("my-boards"); ?></h1>

<h2>Boards</h2>

<a href="addboard"><?php translate("add-board"); ?></a>
<?php
$type = "board";
$statement = $db->prepare('SELECT _id, title, type from boards WHERE type=:type ORDER BY title ASC;');
$statement->bindValue(':type', $type);
$results = $statement->execute();
while ($row = $results->fetchArray()) {
    //var_dump($row);
    // board ID:
    echo "\n";
    echo ', <a href="?boardid=' . $row[0] . '">';
    // board title:
    if (isset($row[1])) {
      echo $row[1];
    } else {
      echo "(Empty title)";
    }
    echo "</a>";
/*
    if (isset($row[2])) {
      echo " (" . $row[2] . ")";
    }
*/
}

?>

<h2>Template Boards</h2>

<a href="addboard"><?php translate("add-board"); ?></a>
<?php
$type = "template-board";
$statement = $db->prepare('SELECT _id, title, type from boards WHERE type=:type ORDER BY title ASC;');
$statement->bindValue(':type', $type);
$results = $statement->execute();
while ($row = $results->fetchArray()) {
    //var_dump($row);
    // board ID:
    echo "\n";
    echo ', <a href="?boardid=' . $row[0] . '">';
    // board title:
    if (isset($row[1])) {
      echo $row[1];
    } else {
      echo "(Empty title)";
    }
    echo "</a>";
/*
    if (isset($row[2])) {
      echo " (" . $row[2] . ")";
    }
*/
}

?>

<h2>Template Containers</h2>

<a href="addboard"><?php translate("add-board"); ?></a>
<?php
$type = "template-container";
$statement = $db->prepare('SELECT _id, title, type from boards WHERE type=:type ORDER BY title ASC;');
$statement->bindValue(':type', $type);
$results = $statement->execute();
while ($row = $results->fetchArray()) {
    //var_dump($row);
    // board ID:
    echo "\n";
    echo ', <a href="?boardid=' . $row[0] . '">';
    // board title:
    if (isset($row[1])) {
      echo $row[1];
    } else {
      echo "(Empty title)";
    }
    echo "</a>";
/*
    if (isset($row[2])) {
      echo " (" . $row[2] . ")";
    }
*/

}

?>

<br>
<br>
<br>

</div>

<?php

}

/*
=========== ALL BOARDS CHAR END ===========
*/

?>
