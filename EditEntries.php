<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="DiaryScript.js"></script>
    </head>
    <body>
        <?php
            if($_POST["Edit-Entry"]){
                $entry = $_POST["Log"];
                echo "<div class='Main-Div'>";
                echo "<br/><input type='button' class='Back Button' onclick='window.location = \"Diary.php\";' value='Back to Diary'>";
                echo "<h3>The entry chosen to edit is:</h3>";
                echo "<form action='' method = 'post'><p name='Current'>".$entry."</p>";
                echo "<input type='text' class='Task Entry' name='Appended-Entry' value='Enter Appended Diary Log Here...' onclick='if(this.value==\"Enter Appended Diary Log Here...\") this.value=\"\";'><input type='submit' class='Submit Button' name='Submit-Edit' value='Submit the Appended Entry'><input type='hidden' name='Log' value='".$entry."'></form>";
                echo "</div>";
            }
            if($_POST["Submit-Edit"]){
                if("" == trim($_POST["Appended-Entry"])){
                    die("There was no data to write.");
                }
                else{
                    $file = "Diary.txt";
                    $current = $_POST["Log"];
                    $new = $_POST["Appended-Entry"];
                    $fileOpen = file_get_contents($file);
                    $fileNew = str_replace($current, $new, $fileOpen);
                    file_put_contents($file, $fileNew);
                    echo "<script>window.location = 'Diary.php'</script>";
                }                
            }
        ?>
    </body>
</html>