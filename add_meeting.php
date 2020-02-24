<?php

require_once "inc/database/database.php";

$meeting = new Meeting();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // var_dump($_POST);

    $begin_time = $_POST["begin_time"];
    $end_time = $_POST["end_time"];
    $type = 0;
    $title = $_POST["title"];
    $description = $_POST["description"];
    $extra = $_POST["extra"];

    var_dump($extra,$description, $title, $type, $end_time, $begin_time);

    $meeting->insert_meeting($begin_time, $end_time, $type, $title, $description, $extra);

}

$fh = TRUE;
$view = "views/add_meeting.php";
$title = ('WAH toevoegen opkomst');
include "template.php";
