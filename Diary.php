<html>
    <head>
        <title>EDF Diary</title>
        <link rel="stylesheet" href="Main.css">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="DiaryScript.js"></script>
    </head>
    <body>
        <div class="Main-Div">
            <h1>EDF Diary</h1>
            <div id="Back-Button-Div">
                <input type="button" class="Back Button" onclick="window.location = 'index.html';" value="Back to Main Page">
            </div>
            <br/>
            <div>
                <form action="InsertEntry.php" method="post">
                    <input type="text" name="Diary-Entry" class="Diary Entry" id="Diary-Entry" value="Enter Entry Here..." onfocus="if(this.value=='Enter Entry Here...') this.value='';">
                    <input type="submit" name="Submit-Entry" class="Submit Button" id="Submit-Entry" value="Save Data">
                </form>
            </div>
            <p style="color:cornflowerblue;"><b>Click on a month to blow up the entries.</b></p>
            <div class="Sub-Div" id="Sub-Div">
            </div>
        </div>
    </body>
</html>
