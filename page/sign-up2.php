<?php

/*
=========== SIGN-UP PART 2 START ===========
*/

if ($page == "sign-up") {

?>

                        <input type="submit" name="register" class="at-btn submit" id="at-btn" value="<?php translate("register"); ?>">
                    </form>

                    <br>
        <div class="at-signin-link">
    <p>

    <br>

    <?php translate("if-you-already-have-an-account"); ?>
      <a href="/sign-in" id="at-signIn" class="at-link at-signin">
        <?php translate("log-in"); ?></a>
    </p>

    <div class="at-pwd-link">
      <p><a href="/forgot-password" id="at-forgotPwd" class="at-link at-pwd"><?php translate("forgot-password"); ?></a></p>
    </div>

  </div>
    </div>
                           

                </td>
            </tr>
        </table>
    </center>

<?php

}

/*
=========== SIGN-UP PART 2 END ===========
*/

?>
