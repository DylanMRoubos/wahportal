<?php
require_once "inc/database/database.php";

$meeting = new Meeting();

$view = "views/meeting.php";
$title = ('WAH opkomsten');

$fh = true;

include "template.php";
