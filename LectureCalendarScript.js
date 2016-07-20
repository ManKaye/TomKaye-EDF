$(document).ready(function(){
    var selectBox = document.getElementById("Odd-Even-Select");
    $(".Odd-Even-Select").on("change", function(){
        var selection = $(this).val();
        if(selection === "Odd"){
            var file = "OddWeekCalendar.txt";
            $.get({url: file, cache: false}).then(function(txt){
                var lines = txt.split("\n");
                var len = lines.length;
                var time = 9;
                for(var i = 0; i < len; i++){
                    var linesArray = lines[i].split(",");
                    var hours = parseInt(linesArray[1]);
                    if(linesArray[0] === "Mo"){
                        if(hours === 1){
                            $("#"+time+linesArray[0]).append(linesArray[2]);
                            time = time + hours;
                        }
                        if(hours > 1){
                            $("#"+time+linesArray[0]).append(linesArray[2]);
                            for(var j = time + 1; j <= time + hours; j++){
                                $("#"+j+linesArray)
                            }
                        }
                    }
                }
            });
        }
    })
    $(".Odd-Even-Select").trigger("change");
});