(function($) {
    "use strict";
    jQuery(document).ready(function(){

        /* =========  Iframe width fix Start  ========== */

        // Find all YouTube videos
        // var $allVideos = $("iframe[src*='//www.youtube.com'], iframe[src*='//player.vimeo.com']"),
        var $allVideos = $("iframe"),

            // The element that is fluid width
            $fluidEl = $("body");

        // Figure out and save aspect ratio for each video
        $allVideos.each(function() {

            $(this)
                .data('aspectRatio', this.height / this.width)

                // and remove the hard coded width/height
                .removeAttr('height')
                .removeAttr('width');

        });

        // When the window is resized
        $(window).resize(function() {

            var newWidth = $fluidEl.width();

            // Resize all videos according to their own aspect ratio
            $allVideos.each(function() {

                var $el = $(this);
                var newWidth2 = $(this).parent().width();
                console.log(newWidth2);
                $el
                    .width(newWidth2)
                    .height(newWidth2 * $el.data('aspectRatio'));

            });

            // Kick off one resize to fix all videos on page load
        }).resize();

        /* =========  Iframe width fix End  ========== */

    });

})(jQuery);

