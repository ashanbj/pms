$(document).ready(function() {

    // get default options in district select box
    var defaultOption = $("#dist_name").html();

    $("#pro_name").change(function(e) {
        e.preventDefault();
        loadDistricts($(this).val());
        resetCities();

    });

    $("#dist_name").change(function(e) {
        e.preventDefault();
        loadCities($(this).val());
    });

    $("#com1").change(function(e) {
        e.preventDefault();
        loadCompanyTwo($(this).val());
    });


    function loadDistricts(provinceID) {

        var apiURL = mainSettings.apiURLs.getDistricts + "/" + provinceID;
        //console.log(apiURL);

        $.ajax({
            url: apiURL,
            method: "GET",
        }).done(function(data, status) {
            if (status === "success") {
                addDisticts(JSON.parse(data));
                //console.log(JSON.parse(data));
            } else {
                console.error("API Failed");
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("API Failed");
        });

    }

    function addDisticts(districts) {

        var defaultDistrictOption = '<option value="" disabled selected>Select a District</option>';
        var emptyOption = "<option value='' disabled selected>No Districts Found</option>";
        var districtOption = "";

        $.each(districts, function(index, district) {

            districtOption += '<option value="' + district.dist_name + '">' + district.dist_name + '</option>';

        });

        if (districtOption === '') {
            $("#dist_name").html(emptyOption);
        } else {
            $("#dist_name").html(defaultDistrictOption + districtOption);
        }

    }

    function loadCities(cityID) {

        var apiURL = mainSettings.apiURLs.getCities + "/" + cityID;

        $.ajax({
            url: apiURL,
            method: "GET",
        }).done(function(data, status) {
            if (status === "success") {
                addCities(JSON.parse(data));
            } else {
                console.error("API Failed");
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("API Failed");
        });

    }

    function addCities(cities) {

        var defaultCityOption = '<option value="" disabled selected>Select a City</option>';
        var emptyOption = "<option value='' disabled selected>No Cities Found</option>";
        var cityOption = "";

        $.each(cities, function(index, city) {

            cityOption += '<option value="' + city.city_name + '">' + city.city_name + '</option>';

        });

        if (cityOption === '') {
            $("#city_name").html(emptyOption);
        } else {
            $("#city_name").html(defaultCityOption + cityOption);
        }


    }

    function resetCities() {
        var resetOption = "<option value='' disabled selected>Select a District First</option>";
        $("#city_name").html(resetOption);
    }

    function loadCompanyTwo(companyID) {

        var apiURL = mainSettings.apiURLs.getCompanyTwo + "/" + companyID;
        //console.log(apiURL);

        $.ajax({
            url: apiURL,
            method: "GET",
        }).done(function(data, status) {
            if (status === "success") {
                addCompanyTwo(JSON.parse(data));
                //console.log(JSON.parse(data));
            } else {
                console.error("API Failed");
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("API Failed");
        });
    }

    function addCompanyTwo(companies) {

        var defaultCompanyTwoOption = '<option value="" disabled selected>Select a Company</option>';
        var emptyOption = "<option value='' disabled selected>No Companies Found</option>";
        var companyOption = "";

        $.each(companies, function(index, company) {

            companyOption += '<option value="' + company.user_id + '">' + company.sup_name + '</option>';

        });

        if (companyOption === '') {
            $("#com2").html(emptyOption);
        } else {
            $("#com2").html(defaultCompanyTwoOption + companyOption);
        }

    }


});