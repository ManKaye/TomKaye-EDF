<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <script src="TaskListScript.js"></script>
    </head>
    <body>
        <?php
            echo "<div class='Main-Div'><br/><input type='button' class='Back Button' onclick='window.location = \"TaskList.php\";' value='Back to Task List'>";
            if($_POST["Submit-Entry"]){
                if($_POST["Task-Entry"] == "Enter Entry Here..." || "" == trim($_POST["Task-Entry"])){
                    die("<p>The data set was the default or there was no data to write.</p></div>");
                }
                elseif("" != trim($_POST["Task-Entry"])){
                    $file = "Tasks.txt";
                    $current = file_get_contents($file);
                    if($current != ""){
                        $current .= "\n".htmlspecialchars($_POST["Task-Entry"]);
                    }
                    else{
                        $current .= htmlspecialchars($_POST["Task-Entry"]);
                    }
                    $insert = file_put_contents($file, $current);
                    if($insert == false){
                        die("<p>There was an error writing the text to the file.</p></div>");
                    }
                    else{
                        echo "<script>window.location = 'TaskList.php'</script>";
                    }
                    $hyphonedTask = str_replace(" ", "-", htmlspecialchars($_POST["Task-Entry"]));
                    $createFile = fopen($hyphonedTask."-".$file, "w");
                    fclose($createFile);
                }
            }
        ?>
    </body>
</html>