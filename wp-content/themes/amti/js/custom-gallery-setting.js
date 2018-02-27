(function($) {
    $.fn.slideshow = function(options) {
        options = $.extend({
            wrapper: ".slider-wrapper",
            previous: ".slider-previous",
            next: ".slider-next",
            slides: ".slide",
            nav: ".slider-nav",
            pagination: ".slider-pagination",
            speed1: 100,
            speed2: 200,
            easing: "linear"

        }, options);


        $.fn.slideshow.index = 0;
        
        var slideTo = function(slide, element) {

            var $currentSlide = $(options.slides, element).eq(slide);

            $currentSlide.
            animate({
                opacity: 1
            }, options.speed1, options.easing).
            siblings(options.slides).animate({
                opacity: 0
            }, options.speed2, options.easing).
            css("opacity", 0);
    
        };

        return this.each(function() {
            var $element = $(this),

                $pagination = $(options.pagination, $element),
                $paginationLinks = $("div", $pagination),
                total = $(options.slides).length;

            $(options.slides, $element).each(function() {
                var $slide = $(this);
                var image = $slide.data("image");
                $slide.html("<img src='" + image + "'>");
            });

            $paginationLinks.on("click", function(e) {
                e.preventDefault();
                var $a = $(this),
                    elemIndex = $a.index();
                $.fn.slideshow.index = elemIndex;
                //console.log($a.index());
                slideTo($.fn.slideshow.index, $element);
                $a.addClass("current");
                $a.siblings().removeClass("current");

            });

        });
    };



    $(function() {
        $("#main-slider").slideshow();
    });




    $('.slider-pagination > div:first-of-type > .cg-description').addClass('active');
    var allPanels = $('.slider-pagination > div > .cg-description:not(.active)').hide();

    $('.slider-pagination > div').click(function() {

        var allPanels = $('.slider-pagination > div');
        $target = $(this);
        //$target =  $this.next();
        //$parents = $target.parents('div').in();
        //console.log()

        if (!$target.hasClass('active')) {

            allPanels.children('.cg-description').removeClass('active').slideUp();
            $target.children('.cg-description').addClass('active').slideDown();
        }
        
        return false;
    });


   


//$('.slider-wrapper').height($slideheight1);



})(jQuery);