<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="Main.css">
        <script src="FavouritesListScript.js"></script>
    </head>
    <body>
        <?php
            echo "<div class='Main-Div'><br/><input type='button' class='Back-Button' onclick='window.location = \"FavouritesList.php\";' value='Back to Favourites'>";
            if($_POST["Submit-Favourite"]){
                if($_POST["New-Favourite"] == "Enter Favourite Here..." || "" == trim($_POST["New-Favourite"])){
                    die("<p>The data set for the favourite was the default or there was no data to write.</p></div>");
                }
                if($_POST["Favourites-Position"] == "Enter the Position of the new Favourite (1-".$_POST["List-Length"].")...)" || "" == trim($_POST["Favourites-Position"])){
                    die("<p>The data set for the number was the default or there was no data to write.</p></div>");
                }
                elseif("" != trim($_POST["Favourites-Position"]) && "" != trim($_POST["New-Favourite"]) && 1 <= intval($_POST["Favourites-Position"]) && intval($_POST["Favourites-Position"]) <= intval($_POST["List-Length"])+1){
                    $file = $_POST["Topic"]."List.txt";
                    $current = file($file, FILE_IGNORE_NEW_LINES);
                    $i = intval($_POST["List-Length"]);
                    while($i >= intval($_POST["Favourites-Position"]) - 1){
                        $current[$i] = $current[$i-1];
                        $i--;
                    }
                    $current[$_POST["Favourites-Position"] - 1] = $_POST["New-Favourite"];
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
                    //die("<p>Please enter a number in the correct range.</p></div>");
                }
            }
        ?>
    </body>
</html>