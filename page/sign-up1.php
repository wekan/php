<?php

/*
=========== SIGN-UP PART 1 START ===========
*/

if ($page == "sign-up") {

?>

  <center>

<?php

if ($hideLogo != true) {

    // Login logo link URL start
    if (!empty($loginLogoLinkUrl)) {
      echo '<a href="' . urlencode($loginLogoLinkUrl) . '">';
    }

    // Login logo image URL
    if (!empty($loginLogoImageUrl)) {
      echo '<img src="' . urlencode($loginLogoImageUrl) . '" alt="' . 
      htmlentities($productName) .
      '" width="' . strip_tags($loginLogoImageWidth) .
      '" height="' . strip_tags($loginLogoImageHeight) . '">';
    }

    // Login logo link URL end
    if (!empty($loginLogoLinkUrl)) {
      echo "</a>";
    }

}

?>
        <br /><br />

<?php
// <table width="80%" border="0" margin="0" padding="0">
?>

        <table>
            <tr>
                <td>
                    <h1>
                        <?php translate("register"); ?>
                    </h1>

                    <section class="auth-dialog">
    <div class="at-form">
        <div class="at-title">
    <h3><?php translate("signupPopup-title"); ?></h3>
  </div>
      
  <div class="at-pwd-form"><div class="at-form-authentication" style="display: none;">
  <label><?php translate("authentication-method"); ?></label>
  <br>

<select class="select-authentication"><option value="password"><?php translate("password"); ?></option></select></div>
    <form role="form" id="at-pwd-form" novalidate="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

    <div class="at-input">
      <label for="at-field-username">
        <?php translate("username"); ?>
      </label>
      <br>
    <input type="text" id="at-field-username" name="at-field-username" placeholder="<?php translate("username"); ?>" autocapitalize="none" autocorrect="off">
  </div>
  <br>
    <div class="at-input">
      <label for="at-field-email">
        <?php translate("email"); ?>
      </label>
      <br>
    <input type="text" id="at-field-email" name="at-field-email" placeholder="<?php translate("email"); ?>" autocapitalize="none" autocorrect="off">
  </div>
  <br>
    <div class="at-input">
      <label for="at-field-password">
      <?php translate("password"); ?>
      </label>
      <br>
    <input type="password" id="at-field-password" name="at-field-password" placeholder="<?php translate("password"); ?>" autocapitalize="none" autocorrect="off">
  </div>
  <br>
    <div class="at-input">
      <label for="at-field-password_again">
        <?php translate("password-again"); ?>
      </label>
      <br>
    <input type="password" id="at-field-password_again" name="at-field-password_again" placeholder="<?php translate("password-again"); ?>" autocapitalize="none" autocorrect="off">
  </div>
  <br>
    <div class="at-input" id="invitationcode" style="display: none;">
    <label for="at-field-code">
        <?php translate("invitation-code"); ?>
    </label>
    <br>
   <input id="at-field-invitationcode" type="text" name="at-field-invitationcode" placeholder="<?php translate("invitation-code"); ?>">
   </div>

    <br />
<?php

}

/*
=========== SIGN-UP PART 1 END ===========
*/

?>
