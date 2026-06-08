jQuery(document).ready(function ($) {

    $('.testimonial-items').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 3000,
    });



    $(".faq-item").on("click", function () {

            $(".faq-item").removeClass("active"); 
            $(this).addClass("active"); 
        });


    $(".video-link").on("click", function () {

            $(".video-popup").removeClass("active"); 
            $(".video-popup").addClass("active"); 

        });
    
    $(".video-close, .video-overlay").on("click", function () {
            $(".video-popup").removeClass("active");
        });


    // Popup Open Carousel stop

    $(".plan-duration").on("click", function () {

        let index = $(this).index();

        $(".plan-duration").removeClass("active");
        $(this).addClass("active");

        $(".pricing-plan").removeClass("active");
        $(".pricing-plan").eq(index).addClass("active");

    });
});


