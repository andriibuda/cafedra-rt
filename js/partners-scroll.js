(function($) {



    $(document).ready(function() {

        var partnersActive = false;
        var partnersBlock = $('.partners-links-styling');
        var partnersPos = partnersBlock.offset().top;
        console.log(partnersPos);

        // Make recalculation after every page-resizing
        window.addEventListener('resize', function() {
            partnersPos = partnersBlock.offset().top;
        });

        window.addEventListener('scroll', function() {
            console.log(window.pageYOffset + ' - ' + partnersPos);
            // Add active class if user scrolls to the partners section
           if (window.pageYOffset > partnersPos - 640) {

               if (!partnersActive) {
                   partnersActive = true;
                   partnersBlock.addClass('is-active');
               }
               // Remove active class if we are on top of it
           } else {

               if (partnersActive) {
                   partnersActive = false;
                   partnersBlock.removeClass('is-active');
               }

           }
        });
    });



}(jQuery));