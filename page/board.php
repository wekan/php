<?php

/*
=========== BOARD START ===========
*/

//$limit = 1;

$db = new SQLite3('../../../../wekan.sqlite');

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
    //var_dump($row);

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
      <td align="left" valign="top" bgcolor="blue"><font color="white">List
with custom color as underline (1/2)</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">Todo</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">Doing</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">Done</font>
      </td>
      <td align="left" valign="top" bgcolor="blue"><font color="white">
<form action="board.html">
<input type="submit" value="+Add List">
</form>
</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black"># Card
1 <img src="openmoji/2764.png" alt="heart" width="30" height="30"> <img src="openmoji/1F44D.png" alt="thumbsup" width="30" height="30"> <img src="openmoji/1F4AF.png" alt="100 points" width="30" height="30"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Something</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Yes Sir
I can boogie</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">The big
task</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 2</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Maybe</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 3</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Probably</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 4</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black"></font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 5</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 6</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 7</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 8</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 9</font>
      </td>
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

