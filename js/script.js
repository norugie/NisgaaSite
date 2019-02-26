// Owl Carousel

$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        autoplay: true,
        autoplayTimeout: 3500,
        dots: false
    });
});

// Page Loader

$(document).ready(function(){
    setTimeout(function () { $('.page-loader-wrapper').fadeOut(); }, 50);
});