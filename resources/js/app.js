require("./bootstrap");
require("alpinejs");
const $ = require("jquery");

$(document).ready(function () {
    // resize for mobile
    function alterClass() {
        var screensize = document.documentElement.clientWidth;
        if (screensize < 600) {
            $(".feature-hidden").hide();
            $(".pc-profileCard").hide();
        } else if (screensize >= 768) {
            $(".feature-hidden").show();
            $(".pc-profileCard").show();
        }
    };
    $(window).resize(function () {
        alterClass();
    });

    // sidebar buttons
    $("#openbtn").click(function () {
        //open
        $(".sidebar").removeClass("hidden");
        $(".sidebar").addClass("col-span-2");
        $(".main").addClass("col-span-5");
        $(".main").removeClass("col-span-7");
        $("#openbtn").addClass("hidden");
        $("#closebtn").removeClass("hidden");
    });
    $("#closebtn").click(function () {
        // close
        $(".sidebar").removeClass("col-span-2");
        $(".sidebar").addClass("hidden");
        $(".main").removeClass("col-span-5");
        $(".main").addClass("col-span-7");
        $("#openbtn").removeClass("hidden");
        $("#closebtn").addClass("hidden");
    });
});
