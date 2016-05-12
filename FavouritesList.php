<html>
    <head>
        <title>Tom's Favourites List</title>
        <link rel="stylesheet" href="Main.css">
        <script src="FavouritesListScript.js"></script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
    </head>
    <body onload="Start()">
        <div class="Main-Div">
            <h1 class="Std-Header">Favourites List</h1>
            <div class="Input-Div" id="Back-Button-Div">
                <input type="button" class="Back-Button" onclick="window.location = 'index.html';" value="Back to Main Page">
            </div>
            <div class="Input-Div">
                <br/>
                <h4 class="Std-Header">Choose a favourites list:</h4>
                <select class="Select-List" id="Select-List" onchange="LoadFavourites()">
                </select>
                <br/>
                <form action="FavouritesEntry.php" method="post">
                    <h4 class="Std-Header">Create a new favourites list here:</h4>
                    <input type="text" name="Favourites-Entry" class="Favourites-Entry" id="Favourites-Entry" value="Enter List Name Here..." onfocus="if(this.value=='Enter List Name Here...') this.value='';">
                    <input type="submit" name="Submit-Entry" class="Submit-Entry" id="Submit-Entry" value="Submit New List">
                </form>
            </div>
            <div class="Favourites-Div" id="Favourites-Div">
            </div>
        </div>
    </body>
</html>