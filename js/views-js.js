(function ($) {


    $( document ).ready(function() {
        console.log( "ready!" );


        // Initialize Masonry


        zt_elements_animation();


        // Elements animation
        function zt_elements_animation(){
            $('.animated').appear(function() {
                var element = $(this);
                var animation = element.data('animation');
                var animationDelay = element.data('delay');
                if (animationDelay) {
                    setTimeout(function() {
                        element.addClass(animation + " visible");
                        element.removeClass('hiding');
                        if (element.hasClass('counter')) {
                            element.children('.value').countTo();
                        }
                    }, animationDelay);
                } else {
                    element.addClass(animation + " visible");
                    element.removeClass('hiding');
                    if (element.hasClass('counter')) {
                        element.children('.value').countTo();
                    }
                }
            }, {
                accY: -150
            });



        }

        $(window).load(function () {
            $('.masonry-wrapper').masonry({
                itemSelector: '.masonry-item'
            });
        });





    });

}(jQuery));