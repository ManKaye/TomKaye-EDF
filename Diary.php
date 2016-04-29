<html>
    <head>
        <title>Tom's EDF Diary</title>
        <link rel="stylesheet" href="Main.css">
        <script src="DiaryScript.js"></script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
    </head>
    <body onload="LoadEntries()">
        <div class="Main-Div">
            <h1 class="Std-Header">EDF Diary</h1>
            <div class="Input-Div">
                <input type="button" class="Back-Button" onclick="window.location.replace('index.html');" value="Back to Main Page">
            </div>
            <br/>
            <div class="Input-Div">
                <form action="InsertEntry.php" method="post">
                    <input type="text" name="Diary-Entry" class="Diary-Entry" id="Diary-Entry" value="Enter Entry Here..." onfocus="if(this.value=='Enter Entry Here...') this.value='';">
                    <input type="submit" name="Submit-Entry" class="Submit-Entry" id="Submit-Entry" value="Save Data">
                </form>
            </div>
            <div id="Table-Div">
                
            </div>
        </div>
    </body>
</html>