$(document).ready(function () {

    var clickEvent = false;
    $('#carousel-example-generic').carousel({
        interval: 4000
    }).on('click', '.list-berita > ul > li, .sliders > .list-berita > ul > li', function () {
        clickEvent = true;
        $('.list-berita > ul > li, .sliders > .list-berita > ul > li').removeClass('active');
        $(this).addClass('active');
    }).on('slid.bs.carousel', function (e) {
        if (!clickEvent) {
            var count = $('.sliders > .list-berita > ul').children().length - 1;
            var current = $('.sliders > .list-berita > ul > li.active');
            current.removeClass('active').next().addClass('active');
            var id = parseInt(current.data('slide-to'));
            if (count == id) {
                $('.sliders > .list-berita > ul > li').first().addClass('active');
            }
        }
        clickEvent = false;
    });
});

$(window).load(function () {
    var boxheight = $('#carousel-example-generic .carousel-inner').innerHeight();
    var itemlength = $('.carousel-inner > .item').length;
    var triggerheight = Math.round(boxheight / itemlength + 1);
    $('.sliders > .list-berita > ul > .list-group-item').outerHeight(triggerheight);
});
