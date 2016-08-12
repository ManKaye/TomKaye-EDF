<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <link rel="icon" href="Basquiat Crown.png">
        <script src="DiaryScript.js"></script>
    </head>
    <body>
        <?php
            echo "<div class='Main-Div'><br/><input type='button' class='Back Button' onclick='window.location = \"Diary.php\";' value='Back to Diary'>";
            if($_POST["Submit-Entry"]){
                $date = getdate();
                $monthName = $date["month"];
                $day = $date["mday"];
                $year = $date["year"];
                $entry = $_POST["Diary-Entry"];
                if("" != trim($entry) && $entry != "Enter Entry Here..."){
                    $file = "Diary.txt";
                    $current = file_get_contents($file);
                    $fileArray = file($file, FILE_IGNORE_NEW_LINES);
                    $lastDay = settype(substr($fileArray[sizeOf($fileArray)-2], 0, 2), "integer");
                    if($day < $lastDay){
                        $current .= "\n".$monthName.", ".$year;
                    }
                    if($day == 1 || $day == 21 || $day == 31){
                        $current .= "\n".$day."st";
                    }
                    elseif($day == 2 || $day == 22){
                        $current .= "\n".$day."nd";
                    }
                    elseif($day == 3 || $day == 23){
                        $current .= "\n".$day."rd";
                    }
                    else{
                        $current .= "\n".$day."th";
                    }
                    $current .= "\n".$_POST["Diary-Entry"];
                    $insert = file_put_contents($file, $current);
                    if($insert == false){
                        die("There was an error writing the text to the file.</div>");
                    }
                    else{
                        echo "<script>window.location = 'Diary.php';</script>";
                    }
                }
                else{
                    die("<p>There was no data to write or it was left as the default value.</p></div>");
                }
            }
        ?>
    </body>
</html>