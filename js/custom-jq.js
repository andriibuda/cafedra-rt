(function ($) {
    $(document).ready(function(){
        /* ========= Initialize GoTop Button Start ========= */

        $('#gotop').gotop({
            color: 'rgb(62, 62, 62)',
            background: 'rgb(251, 251, 251)',
            mobileOnly: false,
            customHtml: '<i class="fa fa-arrow-up" aria-hidden="true"></i>'
        });

        /* ========= Initialize GoTop Button End ========= */



        /* ========= Flickity Slider Start ========= */

        $('.main-carousel').flickity({
            // options
            cellAlign: 'left',
            contain: true,
            wrapAround: true,
            autoPlay: true,
            resize: true
        });

        /* ========= Flickity Slider Start ========= */
    });
})(jQuery);
