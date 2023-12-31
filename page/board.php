<?php

/*
=========== BOARD START ===========
*/

//$limit = 1;

$db = new SQLite3('../../../../../wekan.sqlite');

$boardstatement = $db->prepare('SELECT * FROM boards WHERE _id=:boardid;');
$boardstatement->bindValue(':boardid', $boardid);
$boardresults = $boardstatement->execute();

$swimlanestatement = $db->prepare('SELECT * FROM swimlanes WHERE boardId=:boardid AND archived="false" ORDER BY sort ASC;');
$swimlanestatement->bindValue(':boardid', $boardid);
$swimlaneresults = $swimlanestatement->execute();

$liststatement = $db->prepare('SELECT * FROM lists WHERE boardId=:boardid AND archived="false" ORDER BY sort ASC;');
$liststatement->bindValue(':boardid', $boardid);
$listresults = $liststatement->execute();

while ($boardrow = $boardresults->fetchArray()) {
    //echo '<pre>';
    //var_dump($boardrow);
    //echo '</pre>';

?>

<div id="holder"></div>

<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="8">

  <tbody>
    <tr>
      <td colspan="5" rowspan="1" valign="top" bgcolor="blue"><font color="white">
<a href="board.html"><?php translate("all-boards"); ?></a> &nbsp; +</font>
      </td>
<?php
//  <td bgcolor="white"><br>
?>
      </td>
    </tr>
    <tr>
      <td colspan="5" rowspan="1" valign="top" bgcolor="white"><font color="black">
<?php echo "{$boardrow['title']}"; ?> <br>* <?php translate("public"); ?> <?php translate("muted"); ?>
<?php translate("filter"); ?> <?php translate("rules"); ?> <?php translate("search"); ?>
<?php translate("swimlanes"); ?> <?php translate("multi-selection"); ?>
<br></font>
      </td>
<?php
//  <td align="left" valign="top" bgcolor="white"><font color="black">Sidebar</font></td>
?>
    </tr>
<?php while ($swimlanerow = $swimlaneresults->fetchArray()) { ?>

    <tr>
      <td colspan="5" rowspan="1" bgcolor="darkgreen" align="center">
      <font color="white"><?php echo "{$swimlanerow['title']}"; ?></font>
      </td>
<?php
/*
      <td colspan="1" rowspan="15" bgcolor="white" align="left" valign="top">
<form action="board.html">
<input type="submit" value="Board Settings">
</form>
<br>

<b>Organizations</b>
<form action="board.html">
<input type="submit" value="+Add">
</form>
</font>
<br>

<b>Members</b><br>
xet7
<form action="board.html">
<input type="submit" value="+Add">
</form>
<br>

<b>Labels</b>
<form action="board.html">
<input type="submit" value="+Add">
</form>
<br>
      <br>
<form action="board.html">
<input type="submit" value="Hide minicard label text">
</form>
<br>
      <br>
      </td>
*/
?>
    </tr>
    <tr>
<?php

$liststatement = $db->prepare('SELECT * FROM lists WHERE boardId=:boardid AND archived="false" ORDER BY sort ASC;');
$liststatement->bindValue(':boardid', $boardid);
$listresults = $liststatement->execute();

while ($listrow = $listresults->fetchArray()) {
    //var_dump($listrow);
?>
      <td align="left" valign="top" bgcolor="blue"><font color="white"><?php echo "{$listrow['title']}"; ?></font>
      </td>
<?php
}
?>

<form action="board.html">
<input type="submit" value="+Add List">
</form>
</font>
      </td>
    </tr>
    <tr>
<?php

$cardstatement = $db->prepare('SELECT * FROM cards WHERE boardId=:boardid AND archived="false" ORDER BY sort ASC;');
$cardstatement->bindValue(':boardid', $boardid);
$cardresults = $cardstatement->execute();

while ($cardrow = $cardresults->fetchArray()) {
    //var_dump($listrow);
?>
      <td align="left" valign="top" bgcolor="white"><font color="black"><?php echo "{$cardrow['title']}"; ?></font>
      </td>
<?php
}
?>
    </tr>
<?php
}
?>
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

