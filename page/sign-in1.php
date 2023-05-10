<?php
/*
=========== SIGN-IN PART 1 START ===========
*/

if ($page == "sign-in") {

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

          <table border="0" padding="0" spacing="0" margin="0">
              <tr>
                  <td style="background-color: #f7f7f7;">
                      <h3 style="font-size: 140%; padding-top: 10px; padding-left: 20px; padding-bottom: 0px;">
                          <?php translate("log-in"); ?>
                      </h3>
                  </td>
              </tr>
              <tr>
                  <td style="padding-top: 20px; padding-left: 20px; padding-right: 20px; background-color: white;">
                      <form role="form" id="at-pwd-form" novalidate="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                          <div class="at-form-authentication">
                              <label for="select-authentication"><?php translate("authentication-method"); ?></label>
                              <br />
                              <input type="radio" id="auth-password" name="select-authentication" value="password" required>
                              <label for="auth-password"><?php translate("password"); ?></label><br>
                              <input type="radio" id="auth-oauth2" name="select-authentication" value="oauth2">
                              <label for="auth-oauth2"><?php translate("oauth2"); ?></label><br>
                              <input type="radio" id="auth-ldap" name="select-authentication" value="ldap">
                              <label for="auth-ldap"><?php translate("ldap"); ?></label><br><br>
                          </div>
                          <br />
                          <div class="at-input">
                              <label for="at-field-username_and_email"><?php translate("username");
echo " ";
translate("or");
echo " ";
translate("email");
?></label><br />
                              <input type="text" size="41" id="at-field-username_and_email" name="at-field-username_and_email" placeholder="" autocapitalize="none" autocorrect="off" required>
                          </div>
                          <br />
                          <div class="at-input"><label for="at-field-password"><?php translate("password"); ?></label><br />
                              <input type="password" size="41" id="at-field-password" name="at-field-password" placeholder="" autocapitalize="none" autocorrect="off" required>
                          </div>
                          <br />
<?php

}

/*
=========== SIGN-IN PART 1 END ===========
*/

?>
