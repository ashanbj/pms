$(document).ready(function(){

    // get default options in product select box
    var defaultOption = $("#product_name").html();

    $("#category_name").change(function(e){
        e.preventDefault();

        loadProducts( $(this).val() );

    });


    function loadProducts(categoryID){
        
        var apiURL = mainSettings.apiURLs.getProducts + "/" + categoryID;

        $.ajax({
            url: apiURL,
            method: "GET",
        }).done(function (data, status) {
            if (status === "success") {
                addProducts(JSON.parse(data));
            } else {
                console.error("API Failed");
            }
        }).fail(function (jqXHR, textStatus, errorThrown) {
            console.error("API Failed");
        });

    }

    function addProducts(products){

        var emptyOption="<option disabled selected>No Products Found</option>";
        var productsOption = "";
        
        $.each(products, function( index, product ) {

            productsOption += '<option value="'+product.product_name+'">'+product.product_name+'</option>';
            
        });

        if(productsOption === ''){ 
            $("#product_name").html(emptyOption);
        }
        else{
            $("#product_name").html(defaultOption + productsOption);
        }


    }

});