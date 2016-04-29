<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="DiaryScript.js"></script>
    </head>
    <body>
        <?php
            $text = $_POST["entryText"];
            echo $text;
        ?>
    </body>
</html>