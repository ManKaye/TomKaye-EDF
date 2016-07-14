<html>
    <head>
        <title>Personal Task List</title>
        <link rel="stylesheet" href="Main.css">
        <script src="bower_components/jquery/dist/jquery.min.js"></script>
        <script src="PersonalTaskListScript.js"></script>
    </head>
    <body>
        <div class="Main-Div">
            <h1>Personal Task List</h1>
            <br/>
            <div id="Back-Button-Div">
                <input type="button" class="Back Button" onclick="window.location = 'index.html';" value="Back to Main Page">
            </div>
            <div class="Sub-Div">
                <h4>Insert a Task Here: </h4>
                <div class="Input-Div">
                    <form action="PersonalTaskEntry.php" method="post">
                        <input type="text" name="Personal-Task-Entry" class="Task Entry" id="Task-Entry" value="Enter Task Here..." onfocus="if(this.value==='Enter Task Here...') this.value='';">
                        <input type="submit" name="Submit-Entry" class="Submit Button" id="Submit-Entry" value="Submit Task">
                    </form>
                </div>
                <div id="Personal-Task-Entry">
                    
                </div>
            </div>
        </div>
    </body>
</html>