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

          <table>
              <tr>
                  <td>
                      <h1>
                          <?php translate("log-in"); ?>
                      </h1>

                      <form role="form" id="at-pwd-form" novalidate="" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">

                          <div class="at-form-authentication">
                              <label for="select-authentication"><?php translate("authentication-method"); ?></label>
                              <select class="select-authentication">
                                  <option value="password"><?php translate("password"); ?></option>
                              </select>
                          </div>
                          <br />
                          <div class="at-input">
                              <label for="at-field-username_and_email"><?php translate("username");
echo " ";
translate("or");
echo " ";
translate("email");
?></label><br />
                              <input type="text" id="at-field-username_and_email" name="at-field-username_and_email" placeholder="" autocapitalize="none" autocorrect="off">
                          </div>
                          <br />
                          <div class="at-input"><label for="at-field-password"><?php translate("password"); ?></label><br />
                              <input type="password" id="at-field-password" name="at-field-password" placeholder="" autocapitalize="none" autocorrect="off">
                          </div>
                          <br />
<?php

}

/*
=========== SIGN-IN PART 1 END ===========
*/

?>
