<?php

/*
=========== BOARD START ===========

2024-09-17:
- Listening to about Ember at JS Party #330 from https://changelog.com/jsparty
  - It's amazing how in podcast Ember made possible automatic upgrades for a long time
  - About abstractions, how realtime updates are hard
  - => Ember podcast: Push Push Pull 1h 6min 0sec. Reactive data system.
       When it's good to use what kind of system?
       Plugins for different reactivity systems? Need cache?
       Or presentation layer in front of cache? Schema?
       Properties that do not exists in cache<=> serialized state patch,
       or IndexDB for cross-tab for all web browser tabs?
       And dedupe, avoid thundering herd?
  - Ember designing for upgradeability, that keeps Ember winning.
    Does any other web framework design for upgradeability?
    A lot of design and discussion so that everyone understands.
  - Ember provided many years of stability of framework
    to build upon for big companies, and internally improving framework.
- Realtime updates at Meteor 2 Node.js/MongoDB:
  - Too much data is loaded to browserside
  - Does not work with big boards
- This PHP/SQLite code in this file:
  - This PHP file currently loads one kanban board from SQLite database.
  - Swimlanes are in correct order.
  - Cards are in wrong order.
- TODO for PHP/MongoDB and other DBs:
  - Why PHP, even for temporary step? There is no build step. Save file, reload webpage.
    At other frameworks there is often some long build step.
  - Keep database structure the same. Read any version of MongoDB or other DB.
  - MongoDB: Read directly one card from left top of kanban board.
  - Only read some cards, that are visible.
  - If user moves to right/left/up/down, load more cards etc.
  - Later, using timer, check is there updates to only visible data.
  - Each visible component to have code, that takes card, is it visible,
    and is there changes.
  - Reading structure of templates from existing WeKan/client/components/*.jade
    and transpiling it to use at webpage.
  - Multitenancy: Use same code to host many domains for many kanbans
  - Multi database: Use many databases with same syntax:
     a) PHP https://www.doctrine-project.org or https://adodb.org
        or some other for MongoDB and SQL databases
     b) Python Web2py DAL https://www.web2py.com
     c) Javascript NPM package TypeORM or https://kysely.dev with https://hono.dev
  - Supporting all modern and legacy web browsers. Fixes for Amiga AWeb, Dillo etc.
  - Adding accessibility support
*/

//$limit = 1;
$db = new SQLite3($sqlitepath);
$boardid = 'D2SzJKZDS4Z48yeQH'; // This is boardId of WeKan Roadmap, only temporarily here:

$boardstatement = $db->prepare('SELECT * FROM boards WHERE _id=:boardid;');
$boardstatement->bindValue(':boardid', $boardid);
$boardresults = $boardstatement->execute();

while ($boardrow = $boardresults->fetchArray()) {
//echo '<pre>';
//var_dump($boardrow);
//echo '</pre>';
?>

<div id="holder"></div>

<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="8">
  <tbody>
    <tr>
      <td colspan="15" rowspan="1" valign="top" bgcolor="blue">
        <font color="white">
          <a href="board.html"><?php translate("all-boards"); ?></a> &nbsp; +
        </font>
      </td>
    </tr>
    <tr>
      <td colspan="15" rowspan="1" valign="top" bgcolor="white">
        <font color="black">
          <?php echo "{$boardrow['title']}"; ?> <br>
          * <?php translate("public"); ?>
            <?php translate("muted"); ?>
            <?php translate("filter"); ?>
            <?php translate("rules"); ?>
            <?php translate("search"); ?>
            <?php translate("swimlanes"); ?>
            <?php translate("multi-selection"); ?> <br>
        </font>
      </td>
    </tr>
<?php
$swimlanestatement = $db->prepare('SELECT * FROM swimlanes WHERE boardId=:boardid AND archived="false" ORDER BY sort ASC;');
$swimlanestatement->bindValue(':boardid', $boardid);
$swimlaneresults = $swimlanestatement->execute();

while ($swimlanerow = $swimlaneresults->fetchArray()) {
//echo '<pre>';
//var_dump($swimlanerow);
//echo '</pre>';
?>
    <tr>
      <td colspan="15" rowspan="1" bgcolor="<?php echo "{$swimlanerow['color']}"; ?>" align="center">
        <font color="white" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
          <?php echo "{$swimlanerow['title']} "; ?>
          <?php echo "id: {$swimlanerow['_id']} "; ?>
          <?php echo "boardId: {$swimlanerow['boardId']} "; ?>
          <?php echo "swimlaneId: {$swimlanerow['swimlaneId']} "; ?>
          <?php echo "listId: {$swimlanerow['listId']} "; ?>
          <?php echo "cardId: {$swimlanerow['cardId']}"; ?>
        </font>
      </td>
    </tr>
    <tr>
<?php
$liststatement = $db->prepare('SELECT * FROM lists WHERE boardId=:boardid AND archived="false" ORDER BY sort ASC;');
$liststatement->bindValue(':boardid', $boardid);
$listresults = $liststatement->execute();

while ($listrow = $listresults->fetchArray()) {
//echo '<pre>';
//var_dump($listrow);
//echo '</pre>';
?>
      <td align="left" valign="top" bgcolor="<?php echo "{$listrow['color']}"; ?>">
        <font color="white" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
          <?php echo "{$listrow['title']} "; ?>
          <?php echo "id: {$listrow['_id']} "; ?>
          <?php echo "swimlaneId: {$listrow['swimlaneId']} "; ?>
          <?php echo "listId: {$listrow['title']} "; ?>
        </font>
      </td>
    </tr>
    <tr>
<?php
$cardstatement = $db->prepare('SELECT * FROM cards WHERE boardId=:boardid AND swimlaneid=:swimlaneid AND listid=:listid AND archived="false" ORDER BY sort ASC;');
$cardstatement->bindValue(':boardid', $boardid);
$cardstatement->bindValue(':swimlaneid', $swimlanerow['_id']);
$cardstatement->bindValue(':listid', $listrow['_id']);
$cardresults = $cardstatement->execute();

while ($cardrow = $cardresults->fetchArray()) {
//echo '<pre>';
//var_dump($cardrow);
//echo '</pre>';
?>
      <td align="left" valign="top" bgcolor="grey">
        <font color="white" style="text-shadow: -1px 0 black, 0 1px black, 1px 0 black, 0 -1px black;">
          <?php echo "{$cardrow['title']} "; ?>
          <?php echo "id: {$cardrow['_id']} "; ?>
          <?php echo "boardId: {$cardrow['boardId']} "; ?>
          <?php echo "swimlaneId: {$cardrow['swimlaneId']} "; ?>
          <?php echo "cardId: {$cardrow['cardId']} "; ?>
        </font>
      </td>
<?php
       }
     }
   }
?>
    </tr>
  </tbody>
</table>

<br>

<br>

<?php

}

$db->close();

//}

/*
=========== BOARD END ===========
*/

?>
