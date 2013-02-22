$(document).ready(main("2013-06-01"));

function main (departure_date) {
    $.get("/me/homecountry", function(homecountry) {
        alert("Data Loaded: " + homecountry);
        $.get(("/me/getmehome/" + homecountry + "/" + departure_date), function(flight_list) {
            alert("Data loaded:" + flight_list);
            var get_me_home_div = document.createElement("div");
            get_me_home_div.setAttribute("id", "get-me-home");
            $( $.parseHTML(flight_list) ).appendTo(get_me_home_div);
            $("div#main-page-sidebar")[0].appendChild(get_me_home_div);
        });
    });
};
