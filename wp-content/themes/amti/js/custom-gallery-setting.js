(function($) {
    $.fn.slideshow = function(options) {
        options = $.extend({
            wrapper: ".slider-wrapper",
            previous: ".slider-previous",
            next: ".slider-next",
            slides: ".slide",
            nav: ".slider-nav",
            pagination: ".slider-pagination",
            speed: 600,
            easing: "linear"

        }, options);

        $.fn.slideshow.index = 0;
        var $first = $(".slider-pagination ul li:first-of-type");
        $first.addClass("current");

        var slideTo = function(slide, element) {

            var $currentSlide = $(options.slides, element).eq(slide);
            
            $lastslide = $(".slider-wrapper");
            //console.log(slide);
            //$currentSlide.parent().append($($currentSlide));
            $(".slider-wrapper").find($currentSlide).appendTo(".slider-wrapper");

            //console.log($currentSlide.index());
            $currentSlide.
            animate({
                opacity: 1
            }, options.speed, options.easing);

            $currentSlide.siblings().delay(800)
                .queue(function(next) {
                    $(this).css( 'opacity', 0 );
                    next();
                });

        };

        return this.each(function() {
            var $element = $(this),

                $pagination = $(options.pagination, $element),
                $paginationLinks = $("li", $pagination),
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
//console.log(elemIndex);
                    $slideIndex = $(".slide[data-index='" + elemIndex + "']");
                    $test = $slideIndex.index();
                $.fn.slideshow.index = $test;
            //console.log($test);
                slideTo($.fn.slideshow.index, $element);
                $a.addClass("current");
                $a.siblings().removeClass("current");
            });

        });
    };

    $(function() {
        $("#main-slider").slideshow();
    });

    $('.slider-pagination ul li:first-of-type > .cg-description').addClass('active');
    var allPanels = $('.slider-pagination ul li > .cg-description:not(.active)').hide();

    $oldindex = 0;

    $('.slider-pagination ul li').click(function() {

        $nowindex = $(this).index();
        //console.log($oldindex + ": " + $nowindex);

        var allPanels = $('.slider-pagination ul li');
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