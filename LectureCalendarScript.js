$(document).ready(function(){
    var tableState = $(".Calendar-Table").clone();
    if($(".Odd-Even-Select option:selected").val() !== readCookie("selectState")){
        $(".Odd-Even-Select option."+readCookie("selectState")).attr("selected", "selected");
    }
    $(".Odd-Even-Select").on("change", function(){
        $(".Calendar-Table").replaceWith(tableState.clone());
        var selection = $(this).val();
        var file = ""
        if(selection === "Odd"){
            file = "OddWeekCalendar.txt";
            createCookie("selectState", "Odd");
        }
        else{
            file = "EvenWeekCalendar.txt";
            createCookie("selectState", "Even");
        }
        $.get({url: file, cache: false}).then(function(txt){
            var lines = txt.split("\n");
            var len = lines.length;
            var time = 9;
            var colourArray = {"Algorithm Analysis": "#ccf2ff", "Data Mining": "#ff8566", "Cryptography and Network Security": "#ffffcc", "Mobile Application Development": "#99ffd6", "Implementation of Programming Languages": "#ffd9b3", "Advanced Networking": "#ffe6ff", "Computer Vision": "#dfbf9f"};
            for(var i = 0; i < len; i++){
                var linesArray = lines[i].split(",");
                var hours = parseInt(linesArray[1]);
                if(hours === 1){
                    $("#"+time+linesArray[0]).append(linesArray[2].trim());
                    $("#"+time+linesArray[0]).css("background-color", colourArray[linesArray[2].trim()]);
                    alert(linesArray[2]);
                    time = time + hours;
                }
                if(hours > 1){
                    $("#"+time+linesArray[0]).append(linesArray[2].trim());
                    $("#"+time+linesArray[0]).attr("rowspan", hours);
                    $("#"+time+linesArray[0]).css("background-color", colourArray[linesArray[2].trim()]);
                    alert(linesArray[2]);
                    for(var j = time + 1; j < time + hours; j++){
                        $("#"+j+linesArray[0]).detach();
                    }
                    time = time + hours;
                }
                if(time === 18){
                    time = 9;
                }
            }
        });
    })
    $(".Odd-Even-Select").trigger("change");
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