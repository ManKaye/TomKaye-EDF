var fileURL = "file:///Users/user1/Documents/Web%20Train/Diary.txt";
var file = "Diary.txt";

function LoadEntries(){
    var table = document.getElementById("Table-Div");
    $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        var contents = "";
        var cellID = 1;
        //var month = lines[0];
        for(var i = 0; i < len; i++) {
            var tableRow = contents;
            if(!isNaN(lines[i].charAt(lines[i].length-4)) && !isNaN(lines[i].charAt(lines[i].length-3)) && !isNaN(lines[i].charAt(lines[i].length-2)) && !isNaN(lines[i].charAt(lines[i].length-1))){
                //$(table).append("<tr class='Month-Row'><th class='Month-And-Year' colspan='3'>"+lines[i]+"</th></tr>\n");
                $(table).append("<div class='Month-Row'><div class='Month-And-Year'><p>"+lines[i]+"</p></div></div>\n");
                //month = lines[i];
            }
            else if(!isNaN(lines[i].charAt(0)) || (!isNaN(lines[i].charAt(0)) && !isNaN(lines[i].charAt(1)))){
                //contents = "<tr class='Entry-Row'><form action='EditEntries.php' method='post'><td>"+lines[i]+"</td>";
                contents = "<div class='Entry-Row'><form action='EditEntries.php' method='post'><div class='Entry-Cell-Left'><p>"+lines[i]+"</p></div>";
            }
            //if(lines[i].charAt(lines[i].length-1) === ".")
			else{
                //$(table).append(tableRow+"<td class='Entry' name='"+cellID+"' id='"+cellID+"'>"+lines[i]+"</td><input type='hidden' name='Log' value='"+lines[i]+"'><td><input type='submit' name='Edit-Entry' class='Edit-Entry' value='Edit Entry'></td></form></tr>\n");
                $(table).append(tableRow+"<div class='Entry-Cell-Middle'><p>"+lines[i]+"</p></div><div class='Entry-Cell-Right'><p><input type='submit' name='Edit-Entry' class='Edit-Entry' value='Edit Entry'><input type='hidden' name='Log' value='"+lines[i]+"'></p></div></form></div>");
                cellID ++;
            }
        }
    });
}

//$(".Main-Div").scroll(function(){
//    $("#Back-Button-Div").css("top", $(this).scrollTop());
//});