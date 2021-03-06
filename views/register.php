<div class="login">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="login-box">
                    <h2>Registreer</h2>
                    <p>Vul het formulier in om een account aan te maken</p>
                    <form action="register" method="POST">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" name="email" class="form-control <?php echo (isset($_SESSION['email_r'])) ? 'is-invalid' : ''; ?>">
                            <span class="help-block"><?php if(isset($_SESSION['email_err_r'])) { echo $_SESSION['email_err_r']; } ?></span>
                        </div>
                        <div class="form-group">
                            <label>Naam</label>
                            <input type="text" name="username" <?php if (isset($_SESSION["username_r"])) { echo "value=" . $_SESSION["username_r"] . ""; }?> class="form-control <?php echo (isset($_SESSION['username_err_r'])) ? 'is-invalid' : ''; ?>">
                            <span class="help-block"><?php if(isset($_SESSION['username_err_r'])) { echo $_SESSION['username_err_r']; } ?></span>
                        </div>
                        <div class="form-group">
                            <label>Wachtwoord</label>
                            <input type="password" name="password" class="form-control <?php echo (isset($_SESSION['password_err_r'])) ? 'is-invalid' : ''; ?>">
                            <span class="help-block"><?php if(isset($_SESSION['password_err_r'])) { echo $_SESSION['password_err_r']; } ?></span>
                        </div>
                        <div class="form-group">
                            <label>Herhaal wachtwoord</label>
                            <input type="password" name="confirm_password" class="form-control <?php echo (isset($_SESSION['confirm_password_err_r'])) ? 'is-invalid' : ''; ?>">
                            <span class="help-block"><?php if(isset($_SESSION['confirm_password_err_r'])) { echo $_SESSION['confirm_password_err_r']; } ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn custom-button-primary" value="Registreren">
                        </div>
                        <p>Heb je al een account? <a href="login.php">Log hier in.</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>