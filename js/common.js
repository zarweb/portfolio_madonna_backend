$(document).ready(function(){
    window.setTimeout('fadeout();', 1500);
});
function fadeout(){
    $('.loading').fadeOut('slow', function() {
        // Animation complete.
    });
}


$(document).ready(function(){



    var j$ = jQuery,
        $mContainer = j$("#mnsry_container"),
        $filterButton = j$(".button"),
        $loadingMessage = j$("#loading_msg");
    $params = {
        itemSelector: ".item",
        filtersGroupSelector:".filters"
    };

    j$(window).load(function() {
        $mContainer.multipleFilterMasonry($params);
        $mContainer.find("article").animate({
            "opacity":1
        }, 1200);
        $loadingMessage.fadeOut();
        $filterButton.find("input").change(function(){
            j$(this).parent().toggleClass("active");
        });
    });







    //        menu active changing
    var sections = $('section')
        , nav = $('nav')
        , nav_height = nav.outerHeight();

    $(window).on('scroll', function () {
        var cur_pos = $(this).scrollTop();

        sections.each(function() {
            var top = $(this).offset().top - nav_height - 200,
                bottom = top + $(this).outerHeight();

            if (cur_pos >= top && cur_pos <= bottom) {
                nav.find('a').removeClass('active');
                sections.removeClass('active');

                $(this).addClass('active');
                nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('active');
            }
        });
    });


//        mobile menu toogle
    $('.mobile-burger').on('click', function() {

        $( "section.header header" ).toggle( "fast", function() {

        });

    })









    // gallery zoom
    $('.open-gallery-link').click(function() {

        var items = [];
        $( $(this).attr('href') ).find('.slide').each(function() {
            items.push( {
                src: $(this)
            } );
        });

        $.magnificPopup.open({
            items:items,
            gallery: {
                enabled: true,
            }
        });
    });


    // $('.image-link').magnificPopup({type:'image'});


    $(".pulsate").click(function() {
        $('html, body').animate({
            scrollTop: $(".popul-list").offset().top
        }, 1500);
    });


    //scroll body
    $("html").easeScroll({
        frameRate: 200,
        animationTime: 3000,
        stepSize: 150,
        pulseAlgorithm: 1,
        pulseScale: 8,
        pulseNormalize: 1,
        accelerationDelta: 20,
        accelerationMax: 1,
        keyboardSupport: true,
        arrowScroll: 50,
        touchpadSupport: true,
        fixedBackground: true
    });

    // animation
    new WOW().init();

    // animation scroll hrefs
    $(document).on('click', 'a[href^="#"]', function (event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top
        }, 1500);
    });




});

// zooms
$(document).ready(function() {

    $('.image-popup-vertical-fit').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        mainClass: 'mfp-img-mobile',
        image: {
            verticalFit: true
        }

    });

    $('.image-popup-fit-width').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        image: {
            verticalFit: false
        }
    });

    $('.image-popup-no-margins').magnificPopup({
        type: 'image',
        closeOnContentClick: true,
        closeBtnInside: false,
        fixedContentPos: true,
        mainClass: 'mfp-no-margins mfp-with-zoom', // class to remove default margin from left and right side
        image: {
            verticalFit: true
        },
        zoom: {
            enabled: true,
            duration: 300 // don't foget to change the duration also in CSS
        }
    });

});




//filter

$(document).ready(function(){

    $(".filter-button").click(function(){
        var value = $(this).attr('data-filter');

        if(value == "all")
        {
            //$('.filter').removeClass('hidden');
            $('.filter').show('6000');
        }
        else
        {
//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');
//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');
            $(".filter").not('.'+value).hide('5000');
            $('.filter').filter('.'+value).show('6000');

        }
    });

    if ($(".filter-button").removeClass("active")) {
        $(this).removeClass("active");
    }
    $(this).addClass("active");

});

$(window).resize(function(){
    if ($(window).width() < 991) {
        var list = $('.menu');
        var listItems = list.children('li');
        list.append(listItems.get().reverse());
    }
});

if ($(window).width() < 991) {
    var list = $('.menu');
    var listItems = list.children('li');
    list.append(listItems.get().reverse());
}