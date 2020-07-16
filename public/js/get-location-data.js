$(document).ready(function() {

    loadProvince();

    var defaultOption = '<option value="" disabled selected>Select a Province</option>';

    $("#search-panel").on("change", "#pro_name", function(e) {
        e.preventDefault();
        loadDistricts($(this).val());
        resetCities();

    });

    $("#search-panel").on("change", "#dist_name", function(e) {
        e.preventDefault();
        loadCities($(this).val());

    });


    function loadProvince() {

        var apiURL = mainSettings.apiURLs.getProvince;
        //console.log(apiURL);

        $.ajax({
            url: apiURL,
            method: "GET",
        }).done(function(data, status) {
            if (status === "success") {
                addProvince(JSON.parse(data));
                //console.log(JSON.parse(data));
            } else {
                console.error("API Failed");
            }
        }).fail(function(jqXHR, textStatus, errorThrown) {
            console.error("API Failed");
        });

    }

    function addProvince(provinces) {

        var provinceOption = "";

        $.each(provinces, function(index, province) {

            provinceOption += '<option value="' + province.pro_name + '">' + province.pro_name + '</option>';

        });

        $("#pro_name").html(defaultOption + provinceOption);


    }

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
        var districtOption = "";

        $.each(districts, function(index, district) {

            districtOption += '<option value="' + district.dist_name + '">' + district.dist_name + '</option>';

        });

        $("#dist_name").html(defaultDistrictOption + districtOption);


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

});