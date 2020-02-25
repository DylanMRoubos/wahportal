<?php
require_once "inc/database/database.php";

$blog = new Blog();
$blog_content = $blog->get_all_blogs();

$fh = TRUE;
$view = "views/blog_overview.php";
$title = ('Blogs');

include "template.php";