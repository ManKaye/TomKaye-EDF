var fileURL = "file:///Users/user1/Documents/Web%20Train/Diary.txt";
var file = "Diary.txt";

function LoadEntries(){
    var table = document.getElementById("Diary-Table");
    jQuery.get(file, function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        contents = "";
        var cellID = 1;
        for(var i = 0; i < len; i++) {
            var tableRow = contents;
            if(!isNaN(lines[i].charAt(lines[i].length-4)) && !isNaN(lines[i].charAt(lines[i].length-3)) && !isNaN(lines[i].charAt(lines[i].length-2)) && !isNaN(lines[i].charAt(lines[i].length-1))){
                $(table).append("<tr class='Month-Row'><th class='Month-And-Year' colspan='2'>"+lines[i]+"</th></tr>\n");
            }
            if(!isNaN(lines[i].charAt(0)) || (!isNaN(lines[i].charAt(0)) && !isNaN(lines[i].charAt(1)))){
                /*document.getElementById("Diary-Table").innerHTML += "<tr class='Entry-Row'><td>"+lines[i]+"</td>";*/
                contents = "<tr class='Entry-Row'><td>"+lines[i]+"</td>";
            }
            if(lines[i].charAt(lines[i].length-1) == "."){
                $(table).append(tableRow+"<td class='Entry' name='"+cellID+"' id='"+cellID+"' onclick='ClickEntry("+cellID+")'>"+lines[i]+"</td></tr>\n");
                cellID ++;
            }
        }
    }, "text");
    $("#Diary-Table").change(function(){
        window.location.replace("Diary.php");
    });
}



function ClickEntry(cellID){
    $(document).ready(function(){
            var id = '#' + cellID.toString();
            var text = $(id).text();
            alert(text);
    });
}

function Redirect(){
    window.location.replace("Diary.php");
}