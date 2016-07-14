$(document).ready(function(){
    var personalTaskDiv = document.getElementById("Personal-Task-Entry");
    var file = "PersonalTasks.txt";
    $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        for(var i = 0; i < len; i++){
            if(lines[i] !== ""){
                $(personalTaskDiv).append("<div class='Task-Div'><div class='Personal-Task'>"+lines[i]+"</div><div class='Remove-Task'><form action='PersonalTaskEntry.php' class='Table-Form' method='post'><input type='submit' name='Remove-Task' class='RemoveTask Button' value='Remove the Task'><input type='hidden' name='Task-Value' value='"+lines[i]+"'></form></div></div>");
            }
        }
    });
});