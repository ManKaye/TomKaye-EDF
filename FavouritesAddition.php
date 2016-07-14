<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <script src="FavouritesListScript.js"></script>
    </head>
    <body>
        <?php
            echo "<div class='Main-Div'><br/><div class='Input-Div' id='Back-Button-Div'><input type='button' class='Back Button' onclick='window.location = \"FavouritesList.php\";' value='Back to Favourites'></div>";
            if($_POST["Submit-Favourite"]){
                if($_POST["New-Favourite"] == "Enter Favourite Here..." || "" == trim($_POST["New-Favourite"])){
                    die("<p>The data set for the favourite was the default or there was no data to write.</p></div>");
                }
                if($_POST["Favourites-Position"] == "Enter the Position of the new Favourite (1-".$_POST["List-Length"].")...)" || "" == trim($_POST["Favourites-Position"])){
                    die("<p>The data set for the number was the default or there was no data to write.</p></div>");
                }
                elseif("" != trim($_POST["Favourites-Position"]) && "" != trim($_POST["New-Favourite"]) && 1 <= intval($_POST["Favourites-Position"]) && intval($_POST["Favourites-Position"]) <= intval($_POST["List-Length"])+1){
                    $file = $_POST["Topic"]."List.txt";
                    $current = file($file);
                    $i = intval($_POST["List-Length"]);
                    $j = intval($_POST["Favourites-Position"]);
                    if($i - 1 === 1 && $current[0] == ""){
                        $current[0] = $_POST["New-Favourite"];
                    }
                    else{
                        while($i >= $j){
                            if($i != 0){
                                $current[$i] = $current[$i - 1];
                                $i--;
                            }
                            else{
                            }
                        }
                        if(intval($_POST["List-Length"]) != $j){
                            $current[$j - 1] = $_POST["New-Favourite"]."\n";
                        }
                        else{
                            $current[$j - 1] = "\n".$_POST["New-Favourite"];
                        }
                    }
                    $fileOpen = file_get_contents($file);
                    $fileOpen = "";
                    file_put_contents($file, $fileOpen);
                    $insert = file_put_contents($file, $current);
                    if($insert == false){
                        die("<p>There was an error writing the text to the file.</p></div>");
                    }
                    else{
                        echo "<script>window.location = 'FavouritesList.php'</script>";
                    }
                }
                else{
                    die("<p>Please enter a number in the correct range.</p></div>");
                }
            }
            if($_POST["Submit-Entry"]){
                if($_POST["Favourites-Entry"] == "Enter List Name Here..." || "" == trim($_POST["Favourites-Entry"])){
                    die("<p>The data set for the new favourite list was the default or there was no data to write.</p></div>");
                }
                else{
                    $file = "FavouriteLists.txt";
                    $newList = $_POST["Favourites-Entry"];
                    $fileOpen = file_get_contents($file);
                    $fileOpen .= "\n".$newList;
                    $insert = file_put_contents($file, $fileOpen);
                    $newFile = $newList."List.txt";
                    $fileCreate = fopen($newFile, "w");
                    fclose($fileCreate);
                    if($insert == false){
                        die("<p>There was an error writing the text to the file.</p></div>");
                    }
                    else{
                        echo "<script>window.location = 'FavouritesList.php'</script>";
                    }
                }
            }
        ?>
    </body>
</html>