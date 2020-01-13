$(document).ready(function () {

    $('.slickslider').slick({
        infinite: true,
        speed: 400,
        slidesToShow: 1,
        adaptiveHeight: true,
        autoplay: true,
        dots: true,
        prevArrow: "<i class=\"fas fa-chevron-left left-arrow\"></i>",
        nextArrow: "<i class=\"fas fa-chevron-right right-arrow\"></i>",
    });
});