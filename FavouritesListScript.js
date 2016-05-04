function Start(){
    LoadFavouriteTopics();
    LoadFavourites();
}

function LoadFavouriteTopics(){
    var selectBox = document.getElementById("Select-List");
    var file = "FavouriteLists.txt";
    $.get({url: file, cache: false}).then(function(txt){
        var lines = txt.split("\n");
        var len = lines.length;
        for(var i = 0; i < len; i++){
            $(selectBox).append("<option value='"+lines[i]+"'>"+lines[i]+"</option>"); 
        }
    });
}

function LoadFavourites(){
    var selection = document.getElementById("Select-List").value;
    if(selection === ""){
        selection = "Songs";
    }
    var file = "";
    var listArea = document.getElementById("Favourites-Div");
    $(listArea).empty();
    if(selection === "Songs"){
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
            $(listArea).append("<div class='Input-Div'><form action='FavouritesAddition.php' method='post'><input type='text' class='Position-Entry' name='Favourites-Position' value='Enter the Position of the new Favourite (1-"+favouriteNumber+")...' onfocus='DefaultEntry(this, "+favouriteNumber+")'><br/><input type='text' class='Favourite-Entry' value='Enter Favourite Here...' name='New-Favourite' onfocus='DefaultEntry(this, 1)'><br/><input type='submit' name='Submit-Favourite' value='Submit New Favourite'><input type='hidden' name='Topic' value='"+selection+"'><input type='hidden' name='List-Length' value = '"+favouriteNumber+"'></form></div>");
        });
    }
    $(".Favourites-Div").change(function(){
       window.location = "FavouritesList.php";
    });
}

$("select").on("change", function(){
    LoadFavourites();
});

function DefaultEntry(text, favouriteNumber){
    if(text.value === "Enter the Position of the new Favourite (1-"+favouriteNumber+")..." || text.value === "Enter Favourite Here..."){
        text.value = "";
    }
}