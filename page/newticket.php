<?php

/*
=========== NEW TICKET START ===========
*/

if ($page == "newticket") {

?>

<h1><?php translate("help-request"); ?></h1>

<form role="form" id="at-pwd-form" novalidate="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

<table border="0" padding="20" spacing="20">
  <tr>
    <td valign="top"><?php translate("type"); ?>
    </td>
    <td valign="top">
      <form>
      <select name = "type">
      <option value = "type1" selected>Type 1</option>
      <option value = "type2">Type 2</option>
      </select>
    </td>
  </tr>
  <tr>
    <td valign="top">
       <label for="subject"><?php translate("subject"); ?></label>
    </td>
    <td valign="top">
       <input type="text" id="subject" name="subject" placeholder="" autocapitalize="none" autocorrect="off">
    </td>
  </tr>
  <tr>
    <td valign="top">
       <label for="details"><?php translate("details"); ?></label>
    </td>
    <td valign="top">
       <textarea id="details" name="details" rows="10" cols="50" placeholder="" autocapitalize="none" autocorrect="off">
       </textarea>
    </td>
  </tr>
  <tr>
    <td valign="top">
       <label for="carbon-copy"><?php translate("carbon-copy"); ?></label>
    </td>
    <td valign="top">
       <input type="text" id="carbon-copy" name="carbon-copy" placeholder="" autocapitalize="none" autocorrect="off">
    </td>
  </tr>
  <tr>
    <td valign="top">
      <br />
      <br />
      <input type="submit" name="login" class="at-btn submit" id="at-btn" value="<?php translate("save"); ?>">
      </form>
    </td>
    <td valign="top">
    </td>
  </tr>
</table>

<?php

}

/*
=========== NEW TICKET END ===========
*/

?>
