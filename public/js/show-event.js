$(document).ready(function() {
    $( ".photoset-grid-lightbox" ).photosetGrid({
      highresLinks: true,
      rel: 'withhearts-gallery',
      gutter: '2px',

      onComplete: function(){
        $( ".photoset-grid-lightbox" ).attr('style', '');
        $( ".photoset-grid-lightbox a" ).colorbox({
          photo: true,
          scalePhotos: true,
          maxHeight:'90%',
          maxWidth:'90%'
        });
      }
    });
});

// Code bellow from Author Template
var stickyHeaders = (function() {
    var $window = $(window),
        $stickies;

    var load = function(stickies) {

        if (typeof stickies === "object" && stickies instanceof jQuery &&
            stickies.length > 0) {

            $stickies = stickies.each(function() {

                var $thisSticky = $(this).wrap(
                    '<div class="followWrap" />');

                $thisSticky
                    .data('originalPosition', $thisSticky.offset()
                        .top)
                    .data('originalHeight', $thisSticky.outerHeight())
                    .parent()
                    .height($thisSticky.outerHeight());
            });

            $window.off("scroll.stickies").on("scroll.stickies",
                function() {
                    _whenScrolling();
                });
        }
    };

    var _whenScrolling = function() {

        $stickies.each(function(i) {

            var $thisSticky = $(this),
                $stickyPosition = $thisSticky.data(
                    'originalPosition');

            if ($stickyPosition <= $window.scrollTop()) {

                var $nextSticky = $stickies.eq(i + 1),
                    $nextStickyPosition = $nextSticky.data(
                        'originalPosition') - $thisSticky.data(
                        'originalHeight');

                $thisSticky.addClass("fixed");

                if ($nextSticky.length > 0 && $thisSticky.offset()
                    .top >= $nextStickyPosition) {

                    $thisSticky.addClass("absolute").css(
                        "top", $nextStickyPosition);
                }

            } else {

                var $prevSticky = $stickies.eq(i - 1);

                $thisSticky.removeClass("fixed");

                if ($prevSticky.length > 0 && $window.scrollTop() <=
                    $thisSticky.data('originalPosition') -
                    $thisSticky.data('originalHeight')) {

                    $prevSticky.removeClass("absolute").removeAttr(
                        "style");
                }
            }
        });
    };

    return {
        load: load
    };
})();

$(function() {
    stickyHeaders.load($(".multiple-sticky"));
});

var lastId,
    topMenu = $("#multiple-sticky-menu"),
    topMenuHeight = topMenu.outerHeight() + 80,
    menuItems = topMenu.find("a"),
    scrollItems = menuItems.map(function() {
        var item = $($(this).attr("href"));
        if (item.length) {
            return item;
        }
    });

menuItems.click(function(e) {
    var href = $(this).attr("href"),
        offsetTop = href === "#" ? 0 : $(href).offset().top - 110;
    $('html, body').stop().animate({
        scrollTop: offsetTop
    }, 300);
    e.preventDefault();
});

$(window).scroll(function() {
    var fromTop = $(this).scrollTop() + topMenuHeight;
    var cur = scrollItems.map(function() {
        if ($(this).offset().top < fromTop)
            return this;
    });
    cur = cur[cur.length - 1];
    var id = cur && cur.length ? cur[0].id : "";

    if (lastId !== id) {
        lastId = id;
        menuItems
            .parent().removeClass("active")
            .end().filter("[href='#" + id + "']").parent().addClass(
                "active");
    }
});
