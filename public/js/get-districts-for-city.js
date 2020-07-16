$(document).ready(function() {

    // get default options in district select box
    var defaultOption = $("#dist_name").html();

    $("#pro_name").change(function(e) {
        e.preventDefault();
        loadDistricts($(this).val());

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

});