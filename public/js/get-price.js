$(document).ready(function(){

    $("#product_name").change(function(e){
        e.preventDefault();

        loadPrice( $(this).val() );

    });


    function loadPrice(priceID){
        
        var apiURL = mainSettings.apiURLs.getPrice + "/" + priceID;

        $.ajax({
            url: apiURL,
            method: "GET",
        }).done(function (data, status) {
            if (status === "success") {
                addPrice(JSON.parse(data));
            } else {
                console.error("API Failed");
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("API Failed");
        });

    }

    function addPrice(prices){

        var priceOption = "";
        
        $.each(prices, function( index, price ) {

            priceOption += '<option value="'+price.product_price+'">'+price.product_price+'</option>';
            
        });

        $("#product_price").html(priceOption);


    }

});