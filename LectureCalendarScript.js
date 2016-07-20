$(document).ready(function(){
    var selectBox = document.getElementById("Odd-Even-Select");
    $(".Odd-Even-Select").on("change", function(){
        var selection = $(this).val();
        if(selection === "Odd"){
            var file = "OddWeekCalendar.txt";
            $.get({url: file, cache: false}).then(function(txt){
                var lines = txt.split("\n");
                var len = lines.length;
                for(var i = 0; i < len; i++){
                    var linesArray = lines[i].split(",");
                    if(linesArray[0] === "Mo"){
                        if(linesArray[1].int() === 1){
                            
                        }
                    }
                }
            });
        }
    })
    $(".Odd-Even-Select").trigger("change");
});