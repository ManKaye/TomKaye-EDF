<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <script src="TaskListScript.js"></script>
    </head>
    <body onload='Redirect()'>
        <?php
            if($_POST["Submit-Entry"]){
                if($_POST["Task-Entry"] == "Enter Entry Here..." || "" == trim($_POST["Task-Entry"])){
                    die("The data set was the default.");
                }
                elseif("" != trim($_POST["Task-Entry"])){
                    $task = $_POST["Task-Name"];
                    $file = $task."-Tasks.txt";
                    if(file_exists($file)){
                        $current = file_get_contents($file);
                        $current .= "\n".$_POST["Task-Entry"]."not done";
                        $insert = file_put_contents($file, $current);
                        if($insert == false){
                            die("There was an error writing the text to the file.");
                        }
                        else{
                            echo "The contents was written.";
                        }
                    }
                    else{
                        $createFile = fopen($file, "w");
                        fclose($createFile);
                        $current = file_get_contents($file);
                        $current .= $_POST["Task-Entry"]."not done";
                        $insert = file_put_contents($file, $current);
                        if($insert == false){
                            die("There was an error writing the text to the file.");
                        }
                        else{
                            echo "The contents was written.";
                        }
                    }
                }
            }
            if($_POST["Complete-Button"]){
                $task = $_POST["Task"];
                $file = $task."-Tasks.txt";
                //$tasks = file($file);
                $subTask = $_POST["Sub-Task"];
                $strippedSubTask = substr($subTask, 0, -8);
                /*for($i = 0; $i < count($tasks); $i++){
                    $strippedSubTasks = substr($tasks[$i], 0, -8);
                    if($tasks[$i] == $subTask){
                        $tasks[$i] = $strippedSubTasks."done";
                    }
                }*/
                $fileOpen = file_get_contents($file);
                $fileNew = str_replace($subTask, $strippedSubTask."done", $fileOpen);
                file_put_contents($file, $fileNew);
            }
            if($_POST["Uncomplete-Button"]){
                $task = $_POST["Task"];
                $file = $task."-Tasks.txt";
                $subTask = $_POST["Sub-Task"];
                $strippedSubTask = substr($subTask, 0, -4);
                $fileOpen = file_get_contents($file);
                $fileNew = str_replace($subTask, $strippedSubTask."not done", $fileOpen);
                file_put_contents($file, $fileNew);
            }
        ?>
    </body>
</html>