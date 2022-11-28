/*golbl $, alert, consol */

$(function () {
    "use strict";
    var userError   = true,
        emailError  = true,
        msgError    = true;

    // function checkErrors() { 
    //     if(userError === true || emailError === true || msgError === true) {
    //         console.log("There IS Error In Form");
    //     } else {
    //         console.log("Form Is Valid");
    //     }
    // }

    $(".username").blur(function () {
        if ($(this).val().length < 4) {
            $(this).css("border", "1px solid #F00");
            $(this).parent().find(".custom-alert").fadeIn(300);
            $(this).parent().find(".asterisx").fadeIn(100);
            userError = true;
        } else {
           // $(this).css("border", "none");
            $(this).css("border", "1px solid #080");
            $(this).parent().find(".custom-alert").fadeOut(300);
            $(this).parent().find(".asterisx").fadeOut(100);
            userError = false;
        }

    });


    $(".email").blur(function () {
        if ($(this).val() === "") {
            $(this).css("border", "1px solid #F00");
            $(this).parent().find(".custom-alert").fadeIn(300);
            $(this).parent().find(".asterisx").fadeIn(100);
            emailError = true;
        } else {
           // $(this).css("border", "none");
            $(this).css("border", "1px solid #080");
            $(this).parent().find(".custom-alert").fadeOut(300);
            $(this).parent().find(".asterisx").fadeOut(100);
            emailError = false;
        }

    });


    $(".message").blur(function () {
        if ($(this).val().length < 11) {
            $(this).css("border", "1px solid #F00");
            $(this).parent().find(".custom-alert").fadeIn(300);
            $(this).parent().find(".asterisx").fadeIn(100);
            msgError = true;
        } else {
           // $(this).css("border", "none");
            $(this).css("border", "1px solid #080");
            $(this).parent().find(".custom-alert").fadeOut(300);
            $(this).parent().find(".asterisx").fadeOut(100);
            msgError = false;
        }

    });

    // Submit Error Validation
    $(".contact-form").submit(function (e) {

        if(userError === true || emailError === true || msgError === true) {
            e.preventDefault();
            $(".username, .email, .message").blur();
        } else {

        }

    });


}); 