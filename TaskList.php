<html>
    <head>
        <title>Tom's EDF Task List</title>
        <link rel="stylesheet" href="Main.css">
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
                <form action="TaskEntry.php" method="post">
                    <h4>Insert Project/Topic Here</h4>
                    <input type="text" name="Task-Entry" class="Task Entry" id="Task-Entry" value="Enter Task Here..." onfocus="if(this.value==='Enter Task Here...') this.value='';">
                    <input type="submit" name="Submit-Entry" class="Submit Button" id="Submit-Entry" value="Submit Task">
                </form>
            </div>
            <div class="Sub-Div">
                <div class="Tasks-Div" id="Tasks-Div">
                </div>
            </div>
        </div>
    </body>
</html>