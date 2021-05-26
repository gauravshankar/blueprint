$(document).on("change", "#contacForm .form-group .inputMaterial, #contacForm2 .form-group .inputMaterial", function () {
    $(this).val() == '' ? $(this).parent().find(".title").removeClass('dirty') : $(this).parent().find(".title").addClass('dirty');
    $(this).val() == '' ? $(this).parent().find(".error").removeClass('dirty') : $(this).parent().find(".error").addClass('dirty');
})

$(document).on("focus", "#contacForm .form-group .inputMaterial, #contacForm2 .form-group .inputMaterial", function () {
    $(this).parent().find(".title").addClass("focus")
    $(this).parent().find(".error").addClass("focus")
})

$(document).on("focusout", "#contacForm .form-group .inputMaterial, #contacForm2 .form-group .inputMaterial", function () {
    $(this).parent().find(".title").removeClass("focus")
    $(this).parent().find(".error").removeClass("focus")
})


$("#connect-btn").on("click", function () {
    var _t = $("#contacForm").offset().top - 150
    $('html,body').animate({ scrollTop: _t }, 400);
})

$(".tab-button span").on("click", function () {
    $(".tab-button").toggleClass("growth-stage")
    $(".tab-button span").removeClass("active")
    $(this).addClass("active")
    $(".tab-panel").removeClass("active")
    $(".tab-panel." + $(this).attr("data-attr")).addClass("active")
})

$(document).ready(function () {
    $(".experiance .arrow").each(function () {
        $(this).find("svg").css({ "height": $(this).attr("data-val") + "rem" })
        if (window.matchMedia("(max-width: 576px)").matches) {
            $(this).find("svg").css({ "height": ($(this).attr("data-val") / 2) + "rem" })
        }
    })

    setTimeout(function () { $(".experiance .ar-titles").css({ "opacity": "1" }) }, 1000);
})

$('.case-studies .nav-tabs > a').on("mouseover", function () {
    var that = $(this)
        if (!(that.hasClass("active"))) {
            $('.case-studies .tab-content .tab-pane').removeClass("show active")
            that.trigger('click');
        }
});

