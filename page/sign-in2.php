<?php

/*
=========== SIGN-IN PART 2 START ===========
*/

if ($page == "sign-in") {

?>

                          <input type="submit" name="login" class="at-btn submit" id="at-btn" value="<?php translate("log-in"); ?>">
                      </form>
  
                      <br />
  
                      <div class="at-signup-link">
                          <p><a href="/sign-up" id="at-signUp" class="at-link at-signup"><?php translate("registration"); ?></a></p>
                      </div>
  
                      <div class="at-pwd-link">
                      <p><a href="/forgot-password" id="at-forgotPwd" class="at-link at-pwd"><?php translate("forgot-password"); ?></a></p>
                      </div>
  
                  </td>
              </tr>
          </table>
      </center>
  
<?php

}

/*
=========== SIGN-IN PART 2 END ===========
*/

?>
