<?php
require_once "inc/package.php";

$blog = new Blog();


$id = $_GET['p'];

$blog_content = $blog->get_blog($id);
$images = $blog->get_blog_images($id);


//if ($product === NULL || $product["StockItemID"] > $biggest_product_id[0]["StockItemID"]) {
//  header("location: 404.php");
//}

$fh = true;

$view = "views/blog.php";

include "template.php";