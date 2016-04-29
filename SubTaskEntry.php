<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <script src="TaskListScript.js"></script>
    </head>
    <body>
        <?php
            ob_start();
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
                header("Location: TaskList.php");
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
                header("Location: TaskList.php");
            }
            if($_POST["Uncomplete-Button"]){
                $task = $_POST["Task"];
                $file = $task."-Tasks.txt";
                $subTask = $_POST["Sub-Task"];
                $strippedSubTask = substr($subTask, 0, -4);
                $fileOpen = file_get_contents($file);
                $fileNew = str_replace($subTask, $strippedSubTask."not done", $fileOpen);
                file_put_contents($file, $fileNew);
                header("Location: TaskList.php");
            }
            if($_POST["Edit-Entry"]){
                $task = $_POST["Task"];
                $subTask = $_POST["Sub-Task"];
                $subTaskStatus = substr($subTask, -8);
                if($subTaskStatus == "not done"){
                    $status = "not done";
                }
                else{
                    $status = "done";
                }
                echo "<div class='Main-Div'><br/>";
                echo "<input type='button' class='Back-Button' onclick='window.location = \"TaskList.php\";' value='Back to Task List'>";
                echo "<h3>The current sub-task is:</h3><form action='' method='post'><p>".substr($subTask, 0, -strlen($status))."</p>";
                echo "<input type='text' class='Task-Entry' name='Task-Entry'><input type='submit' name='Submit-Edit' value='Append the Task'><input type='hidden' name='Sub-Task' value='".$subTask."'><input type='hidden' name='Status' value='".$status."'><input type='hidden' name='Task' value='".$task."'></form></div";
            }
            if($_POST["Submit-Edit"]){
                if("" == trim($_POST["Task-Entry"])){
                    die("The data set was the default.");
                }
                else{
                    $subTask = $_POST["Sub-Task"];
                    $task = $_POST["Task"];
                    $file = $task."-Tasks.txt";
                    $new = $_POST["Task-Entry"];
                    $status = $_POST["Status"];
                    $fileOpen = file_get_contents($file);
                    $fileNew = str_replace($subTask, $new.$status, $fileOpen);
                    file_put_contents($file, $fileNew); 
                }
                echo "<script>window.location = 'TaskList.php'</script>";               
            }
        ?>
    </body>
</html>