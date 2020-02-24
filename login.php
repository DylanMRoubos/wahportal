<?php
require_once "inc/package.php";

if(isset($_SESSION["loggedin"])) {
    header("location: ./index.php");
}

$fh = FALSE;
$view = "views/login.php";
$title = "WAH inloggen";
//Check if the method is POST to determine if you should handle the request or send it to the login page.
if (isLoginRequest()) {
    //Clear error session variables
    $_SESSION["mail_err_l"] = NULL;
    $_SESSION["password_err_l"] = NULL;

    // Define variables and initialize with empty values
    $mail = $password = "";
    $username_err = $password_err = "";

    is_username_or_password_empty($mail, $password);
    // Validate credentials
    if (empty($_POST["mail_err_l"]) && empty($_POST["password_err"])) {
        login($mail , $password);
    }
}

include "template.php";

/**
 * Checks if the username or password is empty 
 * 
 * @side-effect  - modifies  session variables
 */
function is_username_or_password_empty(&$mail, &$password){
    // Check if username is empty
    if (empty(trim($_POST["mail"]))) {
        $_SESSION["mail_err_l"] = "Vul een e-mail in";
    } else {
        $mail = trim($_POST["mail"]);
        $_SESSION["mail_l"] = trim($_POST["mail"]);
    }

    // Check if password is empty
    if (empty(trim($_POST["password"]))) {
        $_SESSION["password_err_l"] = "Vul je wachtwoord in";
    } else {
        $password = trim($_POST["password"]);
    }
}


/**
 *  Log a user in if his credentials match with known credentials
 * 
 *  @side-effect  - modifies session variables
 */
function login($mail, $password) {
    // Create database object
    $user_db = new User();

    // Get the user data from the db
    $user_data = $user_db->get_user_data($mail)[0];

    // Check if the user is known
    if (empty($user_data)) {
        $_SESSION["mail_err_l"] = "Wachtwoord en e-mail combinatie fout";
        $_SESSION["password_err_l"] = "Wachtwoord en e-mail combinatie fout";
    }else {
        if($user_data["activated"] === 0) {
            $_SESSION["mail_err_l"] = "Account niet geactiveerd";
        }
        // Check if the filed password matches the password in the db
        elseif (password_verify($password, $user_data["password"])) {
            // Store data in session variables
            $_SESSION["loggedin"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["mail"] = $mail;

            // Redirect to starting page -- login succesfull!
            header("location: ./index.php");

        } else {
            $_SESSION["mail_err_l"] = "Wachtwoord en gebruikersnaam combinatie fout";
            $_SESSION["password_err_l"] = "Wachtwoord en gebruikersnaam combinatie fout";
        }
    }
}

/**
 * Checks if the user is sending his credentials
 * 
 */
function isLoginRequest () {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset ($_POST['mail'])  && isset($_POST['password']) ) {
            return true;
        }

        return false;
    }  
    return false ;
}