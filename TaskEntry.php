<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <script src="TaskListScript.js"></script>
    </head>
    <body onload="Redirect()">
        <?php
            if($_POST["Submit-Entry"]){
                if($_POST["Task-Entry"] == "Enter Entry Here..." || "" == trim($_POST["Task-Entry"])){
                    die("The data set was the default.");
                }
                elseif("" != trim($_POST["Task-Entry"])){
                    $file = "Tasks.txt";
                    $current = file_get_contents($file);
                    if($current != ""){
                        $current .= "\n".$_POST["Task-Entry"];
                    }
                    else{
                        $current .= $_POST["Task-Entry"];
                    }
                    $insert = file_put_contents($file, $current);
                    if($insert == false){
                        die("There was an error writing the text to the file.");
                    }
                    else{
                        echo "The contents was written.";
                    }
                }
            }
        ?>
    </body>
</html>