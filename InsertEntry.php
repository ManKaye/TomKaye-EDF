<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <script src="DiaryScript.js"></script>
    </head>
    <body onload="Redirect()">
        <?php
            if($_POST["Submit-Entry"]){
                $date = getdate();
                $monthName = $date["month"];
                $day = $date["mday"];
                $year = $date["year"];
                if(isset($_POST["Diary-Entry"])){
                    $file = "Diary.txt";
                    $current = file_get_contents($file);
                    if($day == 1){
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
                        die("There was an error writing the text to the file.");
                    }
                    else{
                        echo "The contents was written.";
                    }
                }
                else{
                    die("There was no data to write.");
                }
            }
        ?>
    </body>
</html>