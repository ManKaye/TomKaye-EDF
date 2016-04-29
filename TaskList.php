<html>
    <head>
        <title>Tom's EDF Task List</title>
        <link rel="stylesheet" href="Main.css">
        <script src="TaskListScript.js"></script>
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
    </head>
    <body onload="LoadTasks()">
        <div class="Main-Div">
            <h1 class="Std-Header">EDF Task List</h1>
            <div class="Input-Div">
                <input type="button" class="Back-Button" onclick="window.location.replace('index.html');" value="Back to Main Page">
            </div>
            <div class="Input-Div">
                <form action="TaskEntry.php" method="post">
                    <h4 class="Std-Header">Insert Project/Topic Here</h4>
                    <input type="text" name="Task-Entry" class="Task-Entry" id="Task-Entry" value="Enter Entry Here..." onfocus="if(this.value=='Enter Entry Here...') this.value='';">
                    <input type="submit" name="Submit-Entry" class="Submit-Entry" id="Submit-Entry" value="Submit Task">
                </form>
            </div>
            <div class="Tasks-Div" id="Tasks-Div">
            </div>
        </div>
    </body>
</html>