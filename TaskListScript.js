$(document).ready(function(){
    var file = "Tasks.txt";
    var taskArea = document.getElementById("Sub-Div");
    var topics = [];
    var tasks = $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        var taskID = 1;
        var taskArray = [];
        for(var i = 0; i < len; i++){
            var task = lines[i].replace(/ /g, "-").trim();
            taskArray.push(task);
            $(taskArea).append("<h5 class='Task-Header' id='Task-"+taskID+"' value='"+taskID+","+task+"'>"+lines[i]+"</h5><div class='"+task+"-Task-Div'><div id='"+taskID+"' class='Input-Div' hidden><form action='SubTaskEntry.php' method='post'><input type='text' name='Task-Entry' class='Task Entry' id='Task-Entry' value='Enter Sub-Task Here...' onfocus='if(this.value == \"Enter Sub-Task Here...\"){this.value = \"\";}'><input type='submit' name='Submit-Entry' class='Submit Button' id='Submit-Entry' value='Submit Sub-Task'><input type='hidden' name='Task-Name' value='"+task+"'></form></div></div><div class='"+task+"-Sub-Task-Table-Div'></div>");
            if(readCookie(taskID) === null && readCookie(task) === null){
                createCookie(taskID, "none");
                createCookie(task, "none");
            }
            taskID++;
            topics.push(task);
        }
        for(var j = 0; j < taskArray.length; j++){
            $("#"+(j+1)+".Input-Div").css("display", readCookie(j+1));
            $("."+taskArray[j]+"-Sub-Task-Table-Div").css("display", readCookie(taskArray[j]));
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
                    $("."+task+"-Sub-Task-Table-Div").append("<div class='"+task+"-Sub-Task-Row-Div'><div class='Sub-Task-Cell'>"+subTask.substring(0, subTask.length-8)+"</div><div class='Sub-Task-Status-Cell' id='"+taskAndSubTaskID+"' style='color: red;'>Not Completed.</div><div class='Sub-Task-Form-Cell'><form action='SubTaskEntry.php' method='post' class='Table-Form'><input type='submit' class='Complete Button' name='Complete-Button' value='Complete'><input type='submit' name='Edit-Entry' class='Edit Button' value='Edit Entry'><input type='hidden' name='Task' value='"+task+"'><input type='hidden' name='Sub-Task' value=\""+subTask+"\"></form></div></div>");
                    subTaskID++;
                }
                else{
                    $("."+task+"-Sub-Task-Table-Div").append("<div class='"+task+"-Sub-Task-Row-Div'><div class='Sub-Task-Cell'>"+subTask.substring(0, subTask.length-4)+"</div><div class='Sub-Task-Status-Cell' id='"+taskAndSubTaskID+"' style='color: green;'>Completed.</div><div class='Sub-Task-Form-Cell'><form action='SubTaskEntry.php' method='post' class='Table-Form'><input type='submit' class='Complete Button' name='Uncomplete-Button' value='Uncomplete'><input type='submit' name='Edit-Entry' class='Edit Button' value='Edit Entry'><input type='hidden' name='Task' value='"+task+"'><input type='hidden' name='Sub-Task' value=\""+subTask+"\"></form></div></div>");
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
    
    $(".Sub-Div").on("click", ".Task-Header", function(){
        var id = $(this).attr("value").split(",")[0];
        var task = $(this).attr("value").split(",")[1];
        if($("#"+id+".Input-Div").is(":hidden")){
            $("#"+id+".Input-Div").css("display", "block");
            $("."+task+"-Sub-Task-Table-Div").css("display", "table");
            createCookie(id, "block");
            createCookie(task, "table");
        }
        else if($("#"+id+".Input-Div").not(":hidden")){
            $("#"+id+".Input-Div").css("display", "none");
            $("."+task+"-Sub-Task-Table-Div").css("display", "none");
            createCookie(id, "none");
            createCookie(task, "none");
        }
    });
});

function createCookie(name,value,days) {
        if (days) {
                var date = new Date();
                date.setTime(date.getTime()+(days*24*60*60*1000));
                var expires = "; expires="+date.toGMTString();
        }
        else var expires = "";
        document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
        var nameEQ = name + "=";
        var ca = document.cookie.split(';');
        for(var i=0;i < ca.length;i++) {
                var c = ca[i];
                while (c.charAt(0) === ' ') c = c.substring(1,c.length);
                if (c.indexOf(nameEQ) === 0) return c.substring(nameEQ.length,c.length);
        }
        return null;
}

function eraseCookie(name) {
        createCookie(name,"",-1);
}