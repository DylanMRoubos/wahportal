<?php
require_once "inc/package.php";

$fh = FALSE;
$view = "views/register.php";
$title = "WAH registreren";

// Create a database object
$user = new User();

// Check if the method is POST to determine if you should handle the request or send it to the login page.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Clear error session variables
    $_SESSION["username_err_r"] = NULL;
    $_SESSION["password_err_r"] = NULL;
    $_SESSION["email_err_r"] = NULL;
    $_SESSION["confirm_password_err_r"] = NULL;
    $_SESSION["username_r"] = NULL;

    // Define variables and initialize with empty values
    $username = $password = $confirm_password = "";
    $username_err = $password_err = $confirm_password_err = "";

    // Processing form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        //validate email
        if (empty(trim($_POST["email"]))) {
            $_SESSION["email_err_r"] = "Vul een email in";
        } else {
            if($user->check_if_user_exists($_POST["email"])) {
                $_SESSION["email_err_r"] = "E-mail al in gebruik";
            } else {
                $mail = trim($_POST["email"]);
                $_SESSION["email_r"] = $mail;
            }

        }

        // Validate username
        if (empty(trim($_POST["username"]))) {
            // Store data in session variables
            $_SESSION["username_err_r"] = "Vul een gebruikersnaam in.";
        } else {
            $username = trim($_POST["username"]);
            $_SESSION["username_r"] = $username;

        }
            // Validate password
        if (empty(trim($_POST["password"]))) {
            $_SESSION["password_err_r"] = "Vul een wachtwoord in";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $_SESSION["password_err_r"] = "Wachtwoord moet minimaal 6 karakters";
            $password = trim($_POST["password"]);
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $_SESSION["confirm_password_err_r"] = "Graag het wachtwoord bevestigen";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if ($password != $confirm_password) {
                $_SESSION["confirm_password_err_r"] = "Wachtwoord is niet gelijk";
            }
        }
        // Check input errors before inserting in database
        if (empty($_SESSION["username_err_r"]) && empty($_SESSION["password_err_r"]) && empty($_SESSION["confirm_password_err_r"]) && empty($_SESSION["email_err_r"])) {
            // echo "2";
            
            $password = clean_input($password);
            $param_username = clean_input($username);
            $param_mail = clean_input($mail);
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Create the user using the db object
            // echo "3";
            $user->create_user($param_username, $param_mail, $param_password);
            // $user->insert_discount_code($param_username, 10, $email);

            header("location: ./login.php");
        }
    }


}

include "template.php";
