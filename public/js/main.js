/* =================================
------------------------------------
  TopGym | Fitness HTML Template
  Version: 1.0
 ------------------------------------
 ====================================*/

"use strict";

(function ($) {
    $("#changePasswordButton").click(function (e) {
        e.preventDefault();
        if (
            $("#current-password").val() === "" ||
            $("#new-password").val() === "" ||
            $("#new-password-confirm").val() === ""
        ) {
            Swal.fire("Please fill form completely");
            return;
        }
        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                doChangePassword();
            } else if (result.isDenied) {
            }
        });
    });
    $("#editProfileButton").click(function (e) {
        e.preventDefault();

        Swal.fire({
            title: "Do you want to save the changes?",
            showDenyButton: true,
            confirmButtonText: "Save",
            denyButtonText: `Don't save`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                doEditProfile();
            } else if (result.isDenied) {
            }
        });
    });
    function doChangePassword() {
        var data = {
            currentpassword: $("#current-password").val(),
            newpassword: $("#new-password").val(),
            newpasswordconfirm: $("#new-password-confirm").val(),
        };
        $.ajax({
            type: "POST",
            url: "/change-password",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: data,
            success: function (data) {
                Swal.fire(data.msg);
            },
            error: function () {
                console.log(data);
            },
        });
    }

    function doEditProfile() {
        var data = {
            member_firstname: $("#member_firstname").val(),
            member_lastname: $("#member_lastname").val(),
            member_phonenumber: $("#member_phonenumber").val(),
        };
        $.ajax({
            type: "POST",
            url: "/member/edit-profile",
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            },
            data: data,
            success: function (data) {
                Swal.fire(data.msg);
            },
            error: function () {
                console.log(data.msg);
            },
        });
    }
    /*------------------
        Preloader
    --------------------*/
    $(window).on("load", function () {
        $(".loader").fadeOut();
        $("#preloder").delay(400).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $(".set-bg").each(function () {
        var bg = $(this).data("setbg");
        $(this).css("background-image", "url(" + bg + ")");
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: "#mobile-menu-wrap",
        allowParentLinks: true,
    });

    /*------------------
		Search Bar Wrap
	--------------------*/
    $(".search-trigger").on("click", function () {
        $(".search-bar-wrap").addClass("active");
    });

    $(".search-close").on("click", function () {
        $(".search-bar-wrap").removeClass("active");
    });

    /*------------------
        Hero Slider
    --------------------*/
    var hero_s = $(".slide-items");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        nav: false,
        items: 1,
        dots: true,
        mouseDrag: false,
        animateOut: "fadeOut",
        animateIn: "fadeIn",
        navText: [
            '<i class="flaticon-left-arrow-1"></i>',
            '<i class="flaticon-right-arrow-1"></i>',
        ],
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true,
        onInitialized: function () {
            var a = this.items().length;
            $("#snh-1").html("<span>1</span><span>" + a + "</span>");
        },
    });

    /*------------------
        BMI calculator
    --------------------*/
    function computeBMI() {
        // user inputs
        var height = Number(document.getElementById("bmi-hight").value);
        var weight = Number(document.getElementById("bmi-weight").value);
        var result = weight / (height * height);

        //Display result of calculation
        var output = Math.round(result * 100) / 100;
        if (output < 18.5) {
            document.getElementById("bmi-result").value =
                output + " (Underweight)";
        } else if (output >= 18.5 && output <= 25) {
            document.getElementById("bmi-result").value = output + " (Normal)";
        } else if (output >= 25 && output <= 30) {
            document.getElementById("bmi-result").value = output + " (Obese)";
        } else if (output > 30) {
            document.getElementById("bmi-result").value =
                output + " (Overweight)";
        } else {
            document.getElementById("bmi-result").value = output;
        }
    }

    $("#bmi-submit").on("click", function () {
        computeBMI();
    });

    /*------------------
        Magnific Popup
    --------------------*/
    $(".pop-up").magnificPopup({
        type: "iframe",
    });

    /*------------------
        About Counter Up
    --------------------*/
    $(".counter").each(function () {
        $(this)
            .prop("Counter", 0)
            .animate(
                {
                    Counter: $(this).text(),
                },
                {
                    duration: 4000,
                    easing: "swing",
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    },
                }
            );
    });

    /*------------------
        Elements Counter UP
    --------------------*/
    $(".m-counter").each(function () {
        $(this)
            .prop("Counter", 0)
            .animate(
                {
                    Counter: $(this).text(),
                },
                {
                    duration: 4000,
                    easing: "swing",
                    step: function (now) {
                        $(this).text(Math.ceil(now));
                    },
                }
            );
    });

    /*------------------
        Barfiller
    --------------------*/
    $("#bar1").barfiller({
        barColor: "#2E8B57",
        duration: 2000,
    });
    $("#bar2").barfiller({
        barColor: "#2E8B57",
        duration: 2000,
    });
    $("#bar3").barfiller({
        barColor: "#2E8B57",
        duration: 2000,
    });

    /*------------------
        Accordin Active
    --------------------*/
    $(".collapse").on("shown.bs.collapse", function () {
        $(this).prev().addClass("active");
    });

    $(".collapse").on("hidden.bs.collapse", function () {
        $(this).prev().removeClass("active");
    });

    /*------------------
        Progress Loader
    --------------------*/
    $(".circle-progress").each(function () {
        var cpvalue = $(this).data("cpvalue");
        var cpcolor = $(this).data("cpcolor");
        var cpid = $(this).data("cpid");

        $(this).append(
            '<div class="' +
                cpid +
                '"></div><div class="progress-value"><span class="loader-percentage">' +
                cpvalue +
                "%</span></div>"
        );

        if (cpvalue < 100) {
            $("." + cpid).circleProgress({
                value: "0." + cpvalue,
                size: 174,
                thickness: 16,
                fill: cpcolor,
                emptyFill: "rgba(0, 0, 0, 0)",
            });
        } else {
            $("." + cpid).circleProgress({
                value: 1,
                size: 174,
                thickness: 16,
                fill: cpcolor,
                emptyFill: "rgba(0, 0, 0, 0)",
            });
        }
    });

    $(".table-controls ul li").on("click", function () {
        var tsfilter = $(this).data("tsfilter");
        $(".table-controls ul li").removeClass("active");
        $(this).addClass("active");

        if (tsfilter == "all") {
            $(".class-timetable").removeClass("filtering");
            $(".ts-meta").removeClass("show");
        } else {
            $(".class-timetable").addClass("filtering");
        }
        $(".ts-meta").each(function () {
            $(this).removeClass("show");
            if ($(this).data("tsmeta") == tsfilter) {
                $(this).addClass("show");
            }
        });
    });
})(jQuery);
