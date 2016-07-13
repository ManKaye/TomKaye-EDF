$(document).ready(function(){
    var file = "Tasks.txt";
    var taskArea = document.getElementById("Tasks-Div");
    var topics = [];
    var tasks = $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        var taskID = 1;
        for(var i = 0; i < len; i++){
            var task = lines[i].replace(/ /g, "-").trim();
            $(taskArea).append("<h5 class='Task-Header' id='Task-"+taskID+"' value='"+taskID+","+task+"'>"+lines[i]+"</h5><div class='"+task+"-Task-Div'><div id='"+taskID+"' class='Input-Div' hidden><form action='SubTaskEntry.php' method='post'><input type='text' name='Task-Entry' class='Task Entry' id='Task-Entry' value='Enter Sub-Task Here...' onfocus='if(this.value == \"Enter Sub-Task Here...\"){this.value = \"\";}'><input type='submit' name='Submit-Entry' class='Submit Button' id='Submit-Entry' value='Submit Sub-Task'><input type='hidden' name='Task-Name' value='"+task+"'></form></div></div><div class='"+task+"-Sub-Task-Table-Div'></div>");
            taskID++;
            topics.push(task);
        }
    });
    
    var GetSubTasks = function(task, k){
        $.get({url: task+"-Tasks.txt", cache: false}).then(function(txt){
            var lines = txt.split("\n");
            var len = lines.length;
            var subTaskID = 1;
            for(var j = 0; j < len; j++){
                var subTask = lines[j].trim();
                var notDone = subTask.substring(subTask.length-8);
                var taskAndSubTaskID = k+""+subTaskID;
                if(notDone === "not done"){
                    $("."+task+"-Sub-Task-Table-Div").append("<div class='"+task+"-Sub-Task-Row-Div' hidden><div class='Sub-Task-Cell'>"+subTask.substring(0, subTask.length-8)+"</div><div class='Sub-Task-Status-Cell' id='"+taskAndSubTaskID+"' style='color: red;'>Not Completed.</div><div class='Sub-Task-Form-Cell'><form action='SubTaskEntry.php' method='post'><input type='submit' class='Complete Button' name='Complete-Button' value='Complete'><input type='submit' name='Edit-Entry' class='Edit Button' value='Edit Entry'><input type='hidden' name='Line' value='"+subTask+"'><input type='hidden' name='Task' value='"+task+"'><input type='hidden' name='Sub-Task' value='"+subTask+"'></form></div></div>");
                    subTaskID++;
                }
                else{
                    $("."+task+"-Sub-Task-Table-Div").append("<div class='"+task+"-Sub-Task-Row-Div' hidden><div class='Sub-Task-Cell'>"+subTask.substring(0, subTask.length-4)+"</div><div class='Sub-Task-Status-Cell' id='"+taskAndSubTaskID+"' style='color: green;'>Completed.</div><div class='Sub-Task-Form-Cell'><form action='SubTaskEntry.php' method='post'><input type='submit' class='Complete Button' name='Uncomplete-Button' value='Uncomplete'><input type='submit' name='Edit-Entry' class='Edit Button' value='Edit Entry'><input type='hidden' name='Line' value='"+subTask+"'><input type='hidden' name='Task' value='"+task+"'><input type='hidden' name='Sub-Task' value='"+subTask+"'></form></div></div>");
                    subTaskID++;
                }
            }
        });
    };
    
    $.when(tasks).done(function(){
        for(var k = 0; k < $(".Task-Header").length; k++){
            GetSubTasks(topics[k], k+1);
        }
    });
    
    $(".Tasks-Div").on("click", ".Task-Header", function(){
        var id = $(this).attr("value").split(",")[0];
        var task = $(this).attr("value").split(",")[1];
        if($("#"+id+".Input-Div").is(":hidden")){
            $("#"+id+".Input-Div").show();
            $("."+task+"-Sub-Task-Row-Div").css("display", "table-row");
        }
        else if($("#"+id+".Input-Div").not(":hidden")){
            $("#"+id+".Input-Div").hide();
            $("."+task+"-Sub-Task-Row-Div").hide();
        }
    });
});