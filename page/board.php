<?php

/*
=========== BOARD START ===========

2024-09-17 Previous text from here moved to ../ROADMAP.md

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
