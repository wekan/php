<?php

/*
=========== ALL PAGES START ===========
*/


if ($page == "allpages") {

?>
  <center>
  <h1></h1>
<?php

    // Login logo image URL
    if (!empty($loginLogoImageUrl)) {
      echo '<img src="' . urlencode($loginLogoImageUrl) . '" alt="' .
      htmlentities($productName) .
      '" width="' . strip_tags($loginLogoImageWidth) .
      '" height="' . strip_tags($loginLogoImageHeight) . '">';
    }

?>

<br>
<br>

<section class="auth-layout">
  <section class="auth-dialog">
    <div class="at-form">
        <h3>
          <a class="button-link" href="/sign-in"><?php translate("log-in"); ?></a><br /><br />
          <a class="button-link" href="/sign-up"><?php translate("register"); ?></a><br /><br />
          <a class="button-link" href="/allboards"><?php translate("all-boards"); ?></a><br /><br />
          <a class="button-link" href="/myboards"><?php translate("my-boards"); ?></a><br /><br />
          <a class="button-link" href="/board"><?php translate("board"); ?></a><br /><br />
          <a class="button-link" href="/newticket"><?php translate("tickets"); ?></a><br /><br />
          <a class="button-link" href="/sqlite">SQLite</a><br /><br />
          <a class="button-link" href="/mongo">MongoDB 3.6 or newer</a><br /><br />
          <a class="button-link" href="/dragupload">dragupload if JS, onlyupload if no JS</a><br /><br />
        </h3>
    </div>
  </section>
</section>

  </center>

<?php

}

/*
=========== ALL PAGES END ===========
*/

?>
