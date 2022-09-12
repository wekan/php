<?php

/*
  Index page: List of pages Wekan has
*/

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
          <a class="button-link" href="/sign-in"><?php echo htmlentities($translate["log-in"]); ?></a><br /><br />
          <a class="button-link" href="/sign-up"><?php echo htmlentities($translate["register"]); ?></a><br /><br />
          <a class="button-link" href="/allboards"><?php echo htmlentities($translate["all-boards"]); ?></a><br /><br />
          <a class="button-link" href="/myboards"><?php echo htmlentities($translate["my-boards"]); ?></a><br /><br />
          <a class="button-link" href="/board"><?php echo htmlentities($translate["board"]); ?></a><br /><br />
          <a class="button-link" href="/newticket"><?php echo htmlentities($translate["tickets"]); ?></a><br /><br />
          <a class="button-link" href="/mongo">Mongo</a><br /><br />
          <a class="button-link" href="/dragupload">dragupload if JS, onlyupload if no JS</a><br /><br />
        </h3>
    </div>
  </section>
</section>

  </center>

