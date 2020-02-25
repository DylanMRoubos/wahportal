<?php
require_once "inc/database/database.php";

$user = new User();

$user->logout();

header("location: ./login.php");