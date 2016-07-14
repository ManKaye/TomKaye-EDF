$(document).ready(function(){
    var selectBox = document.getElementById("Select-List");
    var file = "FavouriteLists.txt";
    $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        var options = "";
        for(var i = 0; i < len; i++){
            if(lines[i] === readCookie("lastSelection")){
                options += "<option value='"+lines[i]+"' selected='selected'>"+lines[i]+"</option>";
            }
            else{
                options += "<option value='"+lines[i]+"'>"+lines[i]+"</option>";
            }
        }
        $(selectBox).append(options);
    });

    $("#Select-List").on("change", function(){
        var selection = $(this).val();
        if(selection === null && readCookie("lastSelection") === null){
            selection = "Songs";
        }
        else if(selection === null){
            selection = readCookie("lastSelection");
        }
        else{
            createCookie("lastSelection", selection);
        }
        var file = "";
        var listArea = document.getElementById("Favourites-Div");
        $(listArea).empty();
        file = selection+"List.txt";
        $(listArea).append("<h4 class='List-Header'>Favourite "+selection+" List:</h4>");
        var favouriteNumber = 1;
        $.get({url: file, cache: false}).then(function(txt){
            var lines = txt.split("\n");
            var len = lines.length;
            for(var i = 0; i < len; i++){
                $(listArea).append("<p>"+favouriteNumber+". "+lines[i]+"</p>");
                favouriteNumber++;
            }
            $(listArea).append("<div class='Input-Div'><form action='FavouritesAddition.php' method='post'><label for='Position-Entry' style='font-size: 10pt;'><strong>Enter the position here from 1 to "+favouriteNumber+": </strong></label><input type='number' class='Entry' name='Favourites-Position' min='1' max='"+favouriteNumber+"'/><br/><input type='text' class='Favourites Entry' value='Enter Favourite Here...' name='New-Favourite' onfocus='DefaultEntry(this, 1)'><br/><input type='submit' name='Submit-Favourite' class='Submit Button' value='Submit New Favourite'><input type='hidden' name='Topic' value='"+selection+"'><input type='hidden' name='List-Length' value = '"+favouriteNumber+"'></form></div>");
        });
    });
    $("#Select-List").trigger("change"); 
});

function DefaultEntry(text, favouriteNumber){
    if(text.value === "Enter the Position of the new Favourite (1-"+favouriteNumber+")..." || text.value === "Enter Favourite Here..."){
        text.value = "";
    }
}

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