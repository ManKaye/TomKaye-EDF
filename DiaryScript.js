var fileURL = "file:///Users/user1/Documents/Web%20Train/Diary.txt";
var file = "Diary.txt";

$(document).ready(function(){
    var table = document.getElementById("Sub-Div");
    $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        var contents = "";
        var cellID = 1;
        var month = "";
        var monthArray = [];
        for(var i = 0; i < len; i++) {
            var tableRow = contents;
            lines[i] = lines[i].trim();
            if(!isNaN(lines[i].charAt(lines[i].length-4)) && !isNaN(lines[i].charAt(lines[i].length-3)) && !isNaN(lines[i].charAt(lines[i].length-2)) && !isNaN(lines[i].charAt(lines[i].length-1))){
                month = lines[i].replace(/, /, "");
                monthArray.push(month);
                $(table).append("<h5 class='Month-And-Year' value='"+month+"'>"+lines[i]+"</h5><div class='"+month+"-Entry-Table'></div>\n");
                if(readCookie(month) === "" || readCookie(month) === null){
                    createCookie(month, "none");
                }
            }
            else if(!isNaN(lines[i].charAt(0)) || (!isNaN(lines[i].charAt(0)) && !isNaN(lines[i].charAt(1)))){
                contents = "<div class='"+month+"-Entry-Row'><div class='Entry-Cell-Left'>"+lines[i]+"</div>";
            }
            else{
                $("."+month+"-Entry-Table").append(tableRow+"<div class='Entry-Cell-Middle'>"+lines[i]+"</div><div class='Entry-Cell-Right'><form action='EditEntries.php' method='post' class='Table-Form'><input type='submit' name='Edit-Entry' class='Edit Button' value='Edit Entry'><input type='hidden' name='Log' value='"+lines[i]+"'></form></div></div>");
                cellID ++;
            }
        }
        for(var i = 0; i < monthArray.length; i++){
            if(readCookie(monthArray[i]) === "table"){
                $("."+monthArray[i]+"-Entry-Table").css("display", readCookie(monthArray[i]));
            }
            else{
                $("."+monthArray[i]+"-Entry-Table").css("display", readCookie(monthArray[i]));
            }
        }
    });

    $("#Sub-Div").on("click", ".Month-And-Year", function(){
        var month = $(this).attr("value");
        if($("."+month+"-Entry-Table").is(":hidden")){
            $("."+month+"-Entry-Table").css("display", "table");
            createCookie(month, "table");
        }
        else if($("."+month+"-Entry-Row").not(":hidden")){
            $("."+month+"-Entry-Table").css("display", "none");
            createCookie(month, "none");
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
