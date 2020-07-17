$(document).ready(function() {

    var defaultProductOption = '<option value="" selected>Select a Product</option>';

    $("#product-table").on("change", ".product_name", function(e) {
        e.preventDefault();
        //console.log($(this).val());
        var parentElm = $(this).closest("tr");
        //var product_price= $(this).find(':selected').data('price');
        var priceID = $(this).val();
        //console.log('price',product_price );
        loadPrices(priceID, parentElm);
        resetAmount(parentElm);
        resetQuantity(parentElm)
        calculateTotalAmount();
        parentElm.find('.product_quantity').focus();
        validate(parentElm);
    });

    $("#product-table").on("change", ".product_quantity", function(e) {
        e.preventDefault();
        var parentElm = $(this).closest("tr");
        var price = parentElm.find('.product_price').val();
        var quantity = $(this).val();
        //console.log(price,quantity);
        calulateAmount(price, quantity, parentElm);
        calculateTotalAmount();
    });

    $("#product-table").on("click", ".btn-delete-line", function(e) {
        e.preventDefault();
        var btn = $(this);
        //console.log('5');
        deleteThisRow(btn);
        calculateTotalAmount()
    });

    $("#btn-new-line").click(function(e) {
        e.preventDefault();
        addNewRow();
        //selectSearch();
    });

    $('#product-table').on("keypress", 'input', function(e) {
        if (e.which == 13) {
            addNewRow();
            $(this).blur();
        }
    });

    $('#order-form').on('keyup keypress', function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            return false;
        }
    });

    loadProducts();


    function loadProducts() {

        var apiURL = mainSettings.apiURLs.getProducts;
        var nextElm = $("tr").next();

        $.ajax({
            url: apiURL,
            method: "GET",
        }).done(function(data, status) {
            if (status === "success") {
                //console.log(JSON.parse(data));
                addProducts(JSON.parse(data), nextElm);
            } else {
                console.error("API Failed");
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("API Failed");
        });

    }

    function addProducts(products, nextElm) {

        var emptyOption = "<option disabled selected>No Products Found</option>";
        var productsOption = "";

        $.each(products, function(index, product) {

            productsOption += '<option value="' + product.id + '" data-price="' + product.product_price + '" >' + product.product_name + '</option>';

        });

        if (products.length != 0) {
            $("tr").last().find(".product_name").html(defaultProductOption + productsOption);
        } else {
            $("tr").find(".product_name").html(emptyOption);
        }

        var newElm = $(this).last("tr");
        newElm.find(".product_name").show();
        selectSearch();
    }

    function loadPrices(priceID, parentElm) {
        //console.log(priceID);
        var apiURL = mainSettings.apiURLs.getPrice + "/" + priceID;

        $.ajax({
            url: apiURL,
            method: "GET",
        }).done(function(data, status) {
            if (status === "success") {
                addPrice(JSON.parse(data), parentElm);
                //console.log(JSON.parse(data));
            } else {
                console.error("API Failed");
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("API Failed");
        });

    }

    function addPrice(prices, parentElm) {
        //console.log(price[product_price]);
        //priceInput = '<input value="'+product_price+'">';
        //parentElm.find(".product_price").val(price.product_price.toFixed(2));

        $.each(prices, function(index, price) {

            //console.log(price.product_price);
            parentElm.find(".product_price").val(price.product_price.toFixed(2));

        });

    }

    function calulateAmount(price, quantity, parentElm) {

        var productAmount = price * quantity;
        //console.log(productAmount);
        parentElm.find('.product_amount').val(productAmount.toFixed(2));

    }

    function calculateTotalAmount() {

        var amountList = [];

        $("tr").each(function(rowindex) {
            var amount = $(this).find('.product_amount').val();
            //console.log(amount);
            if (typeof amount != 'undefined') {
                amountList.push(amount);
            }

        });

        var totalAmount = 0;
        for (var i = 0; i < amountList.length; i++) {
            totalAmount += amountList[i] << 0;
        }

        //console.log(totalAmount);
        $('#total_amount').val(totalAmount.toFixed(2));

    }

    function validate(parentElm) {

        var productList = [];

        $("tr").each(function(rowindex) {
            var products = $(this).find('.product_name').val();
            //console.log(amount);
            if (typeof products != 'undefined') {
                productList.push(products);
            }
        });
        var poped = productList.pop();
        //console.log(productList);
        //var poped2=productList.pop();
        if (productList.includes(poped)) {
            alert("You have Already Select This Item");
            deleteLastRow(parentElm);
        }
    }

    function deleteThisRow(btn) {

        if (typeof(btn) == "object") {
            $(btn).closest("tr").remove();
        } else {
            return false;
        }
    }

    function deleteLastRow(parentElm) {
        parentElm.closest("tr").remove();
    }

    function resetQuantity(parentElm) {
        parentElm.find(".product_quantity").val('');
    }

    function resetAmount(parentElm) {
        parentElm.find(".product_amount").val('0.00');
    }

    function addNewRow() {

        var tableRow = '<tr class="table-data-row">' +
            '<td scope="row">' +
            '<div class="form-group">' +
            '<select name="product_id[]" id="product_name" class="form-control product_name" required>' +
            '<option value="" selected>Select a Product</option>' +
            '</select>' +
            '</div>' +
            '</td>' +
            '<td scope="row">' +
            '<div class="form-group for-readonly">' +
            '<input type="number" name="product_price[]" id="product_price" class="form-control product_price" min="0" value="0.00" readonly required>' +
            '</div>' +
            '</td>' +
            '<td>' +
            '<div class="form-group">' +
            '<input type="number" class="form-control product_quantity" name="product_quantity[]" id="product_quantity" placeholder="Enter quantity..." min="1" value="0" pattern="[0-9]" required>' +
            '</div>' +
            '</td>' +
            '<td>' +
            '<div class="form-group for-readonly">' +
            '<input type="number" class="form-control product_amount" name="product_amount[]" id="product_amount" min="0" value="0.00" readonly required>' +
            '</div>' +
            '</td>' +
            '<td>' +
            '<div class="btn-group">' +
            '<button type="button" class="btn btn-danger btn-delete-line py-1 px-2">' +
            '<i class="fas fa-backspace"></i>' +
            '</button>' +
            '</div>' +
            '</td>' +
            '</tr>'

        //var tr = $('.table-data-row').html();
        $('#product-table > tbody:last-child').append(tableRow);

        loadProducts();

    }

    function selectSearch() {
        $("tr").last().find('.product_name').selectize({
            sortField: 'text',
        });
    }

});