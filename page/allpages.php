<?php

/*
=========== ALL PAGES START ===========
*/


if ($page == "allpages") {

?>

<table align="center" bgcolor="white">
<tr><td style="padding: 15px;">

<?php
    // Login logo image URL
    if (!empty($loginLogoImageUrl)) {
      echo '<img src="' . urlencode($loginLogoImageUrl) . '" alt="' .
      htmlentities($productName) .
      '" width="' . strip_tags($loginLogoImageWidth) .
      '" height="' . strip_tags($loginLogoImageHeight) . '">';
    }

?>
        <h3>
          <a class="button-link" href="/sign-in"><?php translate("log-in"); ?></a><br /><br />
          <a class="button-link" href="/sign-up"><?php translate("register"); ?></a><br /><br />
          <a class="button-link" href="/allboards"><?php translate("all-boards"); ?></a><br /><br />
          <a class="button-link" href="/allboardschar"><?php translate("all-boards"); ?> Char</a><br /><br />
          <a class="button-link" href="/myboards"><?php translate("my-boards"); ?></a><br /><br />
          <a class="button-link" href="/board"><?php translate("board"); ?></a><br /><br />
          <a class="button-link" href="/newticket"><?php translate("tickets"); ?></a><br /><br />
          <a class="button-link" href="/sqlite">SQLite</a><br /><br />
          <a class="button-link" href="/mongo">MongoDB 3.6 or newer</a><br /><br />
          <a class="button-link" href="/mongoimage">MongoDB image</a><br /><br />
          <a class="button-link" href="/dragupload">dragupload if JS, onlyupload if no JS</a><br /><br />
        </h3>
</td>
</tr>
</table>
</center>

<?php

}

/*
=========== ALL PAGES END ===========
*/

?>
