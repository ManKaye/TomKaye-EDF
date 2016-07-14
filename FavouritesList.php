<html>
    <head>
        <title>Tom's Favourites List</title>
        <link rel="stylesheet" href="Main.css">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="FavouritesListScript.js"></script>
        <script type="text/javascript">
        </script>
    </head>
    <body>
        <div class="Main-Div">
            <h1>Favourites List</h1>
            <div id="Back-Button-Div">
                <input type="button" class="Back Button" onclick="window.location = 'index.html';" value="Back to Main Page">
            </div>
            <div>
                <br/>
                <h4>Choose a favourites list:</h4>
                <div id="Select-Div">
                    <select class="List" id="Select-List">
                    </select>
                </div>
                <br/>
                <form action="FavouritesAddition.php" method="post">
                    <h4>Create a new favourites list here:</h4>
                    <input type="text" name="Favourites-Entry" class="Favourites Entry" id="Favourites-Entry" value="Enter List Name Here..." onfocus="if(this.value==='Enter List Name Here...') this.value='';">
                    <input type="submit" name="Submit-Entry" class="Submit Button" id="Submit-Entry" value="Submit New List">
                </form>
            </div>
            <div class="Favourites-Div" id="Favourites-Div">
            </div>
        </div>
    </body>
</html>