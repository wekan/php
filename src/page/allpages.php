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

<section class="auth-layout">
  <section class="auth-dialog">
    <div class="at-form">
        <h3>
          <a class="button-link" href="/sign-in">Sign In</a><br /><br />
          <a class="button-link" href="/sign-up">Sign Up</a><br /><br />
          <a class="button-link" href="/allboards">All Boards</a><br /><br />
          <a class="button-link" href="/board">Board</a><br /><br />
          <a class="button-link" href="/newticket">New Ticket</a><br /><br />
          <a class="button-link" href="/mongo">Mongo</a><br /><br />
        </h3>
    </div>
  </section>
</section>

  </center>

