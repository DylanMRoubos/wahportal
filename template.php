<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="robots" content="noindex">

        <link rel="stylesheet" type="text/css" href="public/vendor/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css"/>
        <link rel="stylesheet" type="text/css" href="public/css/style.css">

        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="public/vendor/bootstrap/js/bootstrap.min.js"></script>

        <script src="https://kit.fontawesome.com/cc3bd4047c.js" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/lo17dl8tpsvq9y9qqsoa9zqolfxuap7rte3p9yiwtv0ih9af/tinymce/5/tinymce.min.js"
                referrerpolicy="origin"></script>
        <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>

        <script src="public/javascript/texteditor.js"></script>

        <title><?php if (isset($title)) {
                echo($title);
            } else {
                echo("WAH");
            } ?></title>

    </head>
    <body>
        <?php
            if ($fh === TRUE) {
                include "views/basis/header.php";
            }
        ?>
        <div class="content">
            <?php
                if (isset($view)) {
                    include $view;
                } else {
                    include "404.php";
                }
            ?>
        </div>
        <?php
            if ($fh === TRUE) {
                include "views/basis/footer.php";
            }
        ?>
    </body>
</html>
