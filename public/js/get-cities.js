$(document).ready(function(){

    // get default options in district select box
    var defaultOption = $("#city_name").html();

    $("#dist_name").change(function(e){
        e.preventDefault();

        loadCities( $(this).val() );

    });


    function loadCities(cityID){
        
        var apiURL = mainSettings.apiURLs.getCities + "/" + cityID;

        $.ajax({
            url: apiURL,
            method: "GET",
        }).done(function (data, status) {
            if (status === "success") {
                addCities(JSON.parse(data));
            } else {
                console.error("API Failed");
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("API Failed");
        });

    }

    function addCities(cities){

        var emptyOption="<option value='city' selected>No Cities Found</option>";
        var cityOption = "";
        
        $.each(cities, function( index, city ) {

            cityOption += '<option value="'+city.city_name+'">'+city.city_name+'</option>';
            
        });

        if(cityOption === ''){ 
            $("#city_name").html(emptyOption);
        }
        else{
            $("#city_name").html(defaultOption + cityOption);
        }


    }

});