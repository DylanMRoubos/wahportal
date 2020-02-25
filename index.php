<?php
require_once "inc/database/database.php";

$fh = TRUE;
$view = "views/index.php";
$title = ('WAH dashboard');

$mail = new Mail();

$mail->send_single_mail("dylanroubos@gmail.com");

include "template.php";
