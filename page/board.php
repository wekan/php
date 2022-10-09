<?php

/*
=========== BOARD START ===========
*/

if ($page == "board") {

/*
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
*/



?>

<table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="8">

  <tbody>
    <tr>
      <td colspan="5" rowspan="1" valign="top" bgcolor="blue"><font color="white">Logo <a href="board.html">All
Boards</a> Star a board to add a shortcut
in this bar.&nbsp; +</font>
      </td>
      <td bgcolor="white"><br>
      </td>
    </tr>
    <tr>
      <td colspan="5" rowspan="1" valign="top" bgcolor="white"><font color="black">Wekan -
Open Source kanban board with MIT license * Public Muted Filter
Rules
Search Swimlanes Multi-Selection<br></font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Sidebar</font></td>
    </tr>
    <tr>
      <td colspan="5" rowspan="1" bgcolor="darkgreen" align="center"><font color="white">Swimlane 1 with green background color</font>
      </td>
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
    <tr align="center">
      <td colspan="5" rowspan="1" align="cente" valign="top" bgcolor="orange"><font color="black">Swimlane
2 with custom orange color</font><br>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="blue"><font color="white">List some</font>
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
</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 10</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 11</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 12</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 13</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 14</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 15</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 16</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 17</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 18</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 19</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 20</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 21</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 22</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 23</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 24</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 25</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 26</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 27</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 28</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 29</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 30</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 31</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 32</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 33</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 34</font>
      </td>
    </tr>
    <tr>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 35</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 36</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 37</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 38</font>
      </td>
      <td align="left" valign="top" bgcolor="white"><font color="black">Card 39</font>
      </td>
    </tr>
  </tbody>
</table>

<br>

<br>

<?php

}

/*
=========== BOARD END ===========
*/

?>

