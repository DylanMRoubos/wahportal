<?php
/*
 * TO DO:
 *
 * Create check to see if user is already logged in
 *
 */
?>
<div class="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="login-box">
                 <h2 class="center ">Inloggen</h2>
                    <form action="login" method="POST">
                        <div class="form-group">
                            <label class="">E-mail:</label>
                            <input type="mail" name="mail" <?php if (isset($_SESSION["mail_err_l"])) { echo "value=" . $_SESSION["mail_l"] . ""; }?> class="form-control  <?php echo (isset($_SESSION['mail_err_l'])) ? 'is-invalid' : ''; ?>">
                            <span class="help-block"><?php if(isset($_SESSION['mail_err_l'])) { echo $_SESSION['mail_err_l']; } ?></span>
                        </div>
                        <div class="form-group ">
                            <label class="">Wachtwoord:</label>
                            <input type="password" name="password" class="form-control <?php echo (isset($_SESSION['password_err_l'])) ? 'is-invalid' : ''; ?>">
                            <span class="help-block"><?php if(isset($_SESSION['password_err_l'])) { echo $_SESSION['password_err_l']; } ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn custom-button-primary" value="Login">
                        </div>
                        <p>Heb je nog geen account? <a href="register">Registreer hier.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>