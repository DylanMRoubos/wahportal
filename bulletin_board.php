<?php
require_once "inc/database/database.php";

$meeting = new Meeting();
$meetings = $meeting->get_bulletin_meetings(1);

$view = "views/bulletin_board.php";
$title = ('WAH prikbordbrief');

$fh = true;

include "template.php";
