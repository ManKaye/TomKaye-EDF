function Start(){
    LoadFavouriteTopics();
    LoadFavourites();
}

function LoadFavouriteTopics(){
    var selectBox = document.getElementById("Select-List");
    var lastTopic = document.getElementById("Last-Topic").value;
    var file = "FavouriteLists.txt";
    $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        for(var i = 0; i < len; i++){
            if(lines[i] === lastTopic){
                $(selectBox).append("<option class='Selected' value='"+lines[i]+"' selected='selected'>"+lines[i]+"</option>"); 
            }
            else{
                $(selectBox).append("<option value='"+lines[i]+"'>"+lines[i]+"</option>"); 

            }
        }
    });
}

function LoadFavourites(){
    var defaultSelection = document.getElementById("Select-List").value;
    if(defaultSelection === ""){
        defaultSelection = "Songs";
    }
    createCookie("lastSelection", defaultSelection);
    var selection = readCookie("lastSelection");
    //var lastTopic = document.getElementById("Last-Topic").value;
    //if(lastTopic === ""){
    //    selection = "Songs";
    //}
    if(selection === ""){
        selection = "Songs";
    }
    //}
    //else{
    //    selection = document.getElementById("Select-List").value;
    //}
    var file = "";
    var listArea = document.getElementById("Favourites-Div");
    $(listArea).empty();
    if(selection !== ""){
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
            $(listArea).append("<div class='Input-Div'><form action='FavouritesAddition.php' method='post'><input type='number' class='Position-Entry' name='Favourites-Position' value='Enter the Position of the new Favourite (1-"+favouriteNumber+")...' onfocus='DefaultEntry(this, "+favouriteNumber+")' min='1' max='"+favouriteNumber+"'/><br/><input type='text' class='Favourite-Entry' value='Enter Favourite Here...' name='New-Favourite' onfocus='DefaultEntry(this, 1)'><br/><input type='submit' name='Submit-Favourite' value='Submit New Favourite'><input type='hidden' name='Topic' value='"+selection+"'><input type='hidden' name='List-Length' value = '"+favouriteNumber+"'></form></div>");
        });
    }
}

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