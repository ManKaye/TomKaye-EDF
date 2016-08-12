<html>
    <head>
        <title>EDF Task List</title>
        <link rel="stylesheet" href="Main.css">
        <link rel="icon" href="Basquiat Crown.png">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="TaskListScript.js"></script>
    </head>
    <body>
        <div class="Main-Div">
            <h1>EDF Task List</h1>
            <div id="Back-Button-Div">
                <input type="button" class="Back Button" onclick="window.location = 'index.html';" value="Back to Main Page">
            </div>
            <div>
                <h4 style="padding-top: 5px;">Insert Project/Topic Here</h4>
                <form action="TaskEntry.php" method="post">
                    <input type="text" name="Task-Entry" class="Task Entry" id="Task-Entry" value="Enter Task Here..." onfocus="if(this.value==='Enter Task Here...') this.value='';">
                    <input type="submit" name="Submit-Entry" class="Submit Button" id="Submit-Entry" value="Submit Task">
                </form>
            </div>
            <p style="color:cornflowerblue;"><b>Click on a Task to blow up the entries.</b></p>
            <div class="Sub-Div" id="Sub-Div">
            </div>
        </div>
    </body>
</html>
