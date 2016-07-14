var fileURL = "file:///Users/user1/Documents/Web%20Train/Diary.txt";
var file = "Diary.txt";

$(document).ready(function(){
    var table = document.getElementById("Diary-Div");
    $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        var contents = "";
        var cellID = 1;
        var month = "";
        for(var i = 0; i < len; i++) {
            var tableRow = contents;
            lines[i] = lines[i].trim();
            if(!isNaN(lines[i].charAt(lines[i].length-4)) && !isNaN(lines[i].charAt(lines[i].length-3)) && !isNaN(lines[i].charAt(lines[i].length-2)) && !isNaN(lines[i].charAt(lines[i].length-1))){
                month = lines[i].substring(0, lines[i].length-6);
                $(table).append("<div class='Month-Table' value='"+month+"'><div class='Month-Row'><div class='Month-And-Year'>"+lines[i]+"</div></div></div><div class='"+month+"-Entry-Table'><\div>\n");
            }
            else if(!isNaN(lines[i].charAt(0)) || (!isNaN(lines[i].charAt(0)) && !isNaN(lines[i].charAt(1)))){
                contents = "<div class='"+month+"-Entry-Row'><div class='Entry-Cell-Left'>"+lines[i]+"</div>";
            }
            else{
                $("."+month+"-Entry-Table").append(tableRow+"<div class='Entry-Cell-Middle'>"+lines[i]+"</div><div class='Entry-Cell-Right'><form action='EditEntries.php' method='post' class='Table-Form'><input type='submit' name='Edit-Entry' class='Edit Button' value='Edit Entry'><input type='hidden' name='Log' value='"+lines[i]+"'></form></div></div>");
                cellID ++;
            }
        }
    });
    
    $("#Diary-Div").on("click", ".Month-Table", function(){
        var month = $(this).attr("value");
        if($("."+month+"-Entry-Row").is(":hidden")){
            $("."+month+"-Entry-Row").css("display", "table-row");
        }
        else if($("."+month+"-Entry-Row").not(":hidden")){
            $("."+month+"-Entry-Row").css("display", "none");
        }
    });
    
    $("#Diary-Div").on("hover", ".Month-Row", function(){
        $(this).css("cursor", "pointer");
    });
});