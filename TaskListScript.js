var file = "Tasks.txt";

function LoadTasks(){
    var taskArea = document.getElementById("Tasks-Div");
    $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        var taskID = 1;
        for(var i = 0; i < len; i++){
            var task = lines[i].replace(/ /g, "-").trim();
            $(taskArea).append("<h5 class='Task-Header' id='Task-"+taskID+"' onclick='ShowHide(\""+taskID+"\", \""+task+"\")'>"+task+"</h5><div class='"+task+"-Task-Div'><div id='"+taskID+"' class='Input-Div' hidden><form action='SubTaskEntry.php' method='post'><input type='text' name='Task-Entry' class='Task-Entry' id='Task-Entry' value='Enter Entry Here...' onfocus='DefaultEntry(this)'><input type='submit' name='Submit-Entry' class='Submit-Entry' id='Submit-Entry' value='Submit Sub-Task'><input type='hidden' name='Task-Name' value='"+task+"'></form></div></div>");
            LoadSubTasks(task, taskID);
            taskID++;
        }
    });
}

function LoadSubTasks(task, taskID){
    var taskFile = task+"-Tasks.txt";
    $.get({url: taskFile, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        var subTaskID = 1;
        for(var j = 0; j < len; j++){
            var subTask = lines[j].trim();
            var notDone = subTask.substring(subTask.length-8);
            var taskAndSubTaskID = taskID+""+subTaskID;
            if(notDone === "not done"){
                $("."+task+"-Task-Div").append("<div class='"+task+"-Sub-Task-Div' hidden><p class='Sub-Task'>"+subTask.substring(0, subTask.length-8)+"</p><p class='Sub-Task-Status' id='"+taskAndSubTaskID+"' style='color: red;'>Not Completed.</p><form action='SubTaskEntry.php' class='Sub-Task-Form' method='post'><input type='submit' class='Complete-Button' name='Complete-Button' value='Complete'><input type='submit' name='Edit-Entry' class='Edit-Entry' value='Edit Entry'><input type='hidden' name='Line' value='"+subTask+"'><input type='hidden' name='Task' value='"+task+"'><input type='hidden' name='Sub-Task' value='"+subTask+"'></form></div>");
                subTaskID++;
            }
            else{
                $("."+task+"-Task-Div").append("<div class='"+task+"-Sub-Task-Div' hidden><p class='Sub-Task'>"+subTask.substring(0, subTask.length-4)+"</p><p class='Sub-Task-Status' id='"+taskAndSubTaskID+"' style='color: green;'>Completed.</p><form action='SubTaskEntry.php' class='Sub-Task-Form' method='post'><input type='submit' class='Complete-Button' name='Uncomplete-Button' value='Uncomplete'><input type='submit' name='Edit-Entry' class='Edit-Entry' value='Edit Entry'><input type='hidden' name='Line' value='"+subTask+"'><input type='hidden' name='Task' value='"+task+"'><input type='hidden' name='Sub-Task' value='"+subTask+"'></form></div>");
                subTaskID++;
            }
        }
    });
}

function CompleteIt(button, taskAndSubTaskID){
    if($("#"+taskAndSubTaskID).val("Not Completed.")){
        $("#"+taskAndSubTaskID).text("Completed.");
        $(button).val("Uncomplete");   
    }
    if($("#"+taskAndSubTaskID).val("Completed.")){
        $("#"+taskAndSubTaskID).text("Not Completed.");
        $(button).val("Complete");
    }
}

function ShowHide(id, task){
    if($("#"+id).is(":hidden")){
        $("#"+id).show();
        $("."+task+"-Sub-Task-Div").show();
    }
    else if($("#"+id).not(":hidden")){
        $("#"+id).hide();
        $("."+task+"-Sub-Task-Div").hide();
    }
}
function DefaultEntry(text){
    if(text.value == "Enter Entry Here..."){
        text.value = "";
    }
}
function Redirect(){
    window.location = "TaskList.php";
}