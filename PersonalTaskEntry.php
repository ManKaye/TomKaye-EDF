<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <link rel="icon" href="Basquiat Crown.png">
        <script src="FavouritesListScript.js"></script>
    </head>
    <body>
        <?php
            echo "<div class='Main-Div'><br/><div class='Input-Div' id='Back-Button-Div'><input type='button' class='Back Button' onclick='window.location = \"PersonalTaskList.php\";' value='Back to Personal Task List'></div>";
            if($_POST["Submit-Entry"]){
                if(trim($_POST["Personal-Task-Entry"]) === "Enter Task Here..." || trim($_POST["Personal-Task-Entry"]) === ""){
                    die("<div><p>The data set for the task was the default or there was no data to write.</p></div>");
                }
                else{
                    $file = "PersonalTasks.txt";
                    $current = file_get_contents($file);
                    $current .= "\n".trim($_POST["Personal-Task-Entry"]);
                    $insert = file_put_contents($file, $current);
                    if($insert == false){
                        die("<p>There was an error writing the text to the file.</p></div>");
                    }
                    else{
                        echo "<script>window.location = 'PersonalTaskList.php'</script>";
                    }
                }
            }
            if($_POST["Remove-Task"]){
                $file = "PersonalTasks.txt";
                $current = file($file, FILE_IGNORE_NEW_LINES);
                $remove = trim($_POST["Task-Value"]);
                $newArray = array();
                foreach ($current as $task){
                    if ($task != $remove){
                        array_push($newArray, $task);
                    }
                }

                $newData = implode("\n", array_values($newArray));
                $fileOpen = fopen($file, "w");
                fwrite($fileOpen, $newData);
                //if($insert == false){
                        //die("<p>There was an error writing the text to the file.</p></div>");
                //}
                //else{
                fclose($fileOpen);
                    echo "<script>window.location = 'PersonalTaskList.php'</script>";
                //}
            }
        ?>
    </body>
</html>