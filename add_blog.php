<?php

require_once "inc/database/database.php";

$blog = new Blog();


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $blog->insert_blog($_POST['title'], $_POST['description']);

    $imagetype = array(image_type_to_mime_type(IMAGETYPE_GIF), image_type_to_mime_type(IMAGETYPE_JPEG),
        image_type_to_mime_type(IMAGETYPE_PNG), image_type_to_mime_type((int)'get_latest_blogIMAGETYPE_BMP'));

    $FOLDER = "public/images/";
    $myfile = $_FILES["U_FILES"];
    $keepName = false; // change this for file name.
    $response = array();
    for ($i = 0; $i < count($myfile["name"]); $i++) {
        if ($myfile["name"][$i] <> "" && $myfile["error"][$i] == 0) {
            // file is ok
            if (in_array($myfile["type"][$i], $imagetype)) {
                //Set file name
                if ($keepName) {
                    $file_name = $myfile["name"][$i];
                } else {
                    // get extention and set unique name
                    $file_extention = @strtolower(@end(@explode(".", $myfile["name"][$i])));
                    $file_name = date("Ymd") . '_' . rand(10000, 990000) . '.' . $file_extention;
                }
                if (move_uploaded_file($myfile["tmp_name"][$i], $FOLDER . $file_name) === FALSE) {
                    //Set Original File Name if Upload Error
                    $response[] = array('error' => true, 'msg' => "Error While Uploading the File", 'fileName' => $myfile["name"][$i]);
                } else {
                    // Set Name Used to Store file on Server
                    $response[] = array('error' => false, 'msg' => "File Uploaded", 'fileName' => $file_name);

                    $blog->insert_image($file_name);


                    $blog_id = $blog->get_latest_blog();
                    $image_id = $blog->get_image_id_by_name($file_name);

                    $blog->add_image_to_blog($image_id[0]['id'], $blog_id[0]['id']);
                }
            } else {
                //Set Original File Name if Invalid Image Type
                $response[] = array('error' => true, 'msg' => " Invalid Image Type.", 'fileName' => $myfile["name"][$i]);
            }
        }
    }
}
$fh = TRUE;
$view = "views/add_blog.php";
$title = ('WAH toevoegen blog');
include "template.php";
