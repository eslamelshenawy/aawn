// $(function () {
//     var singleImgWid = $(".slider-items li").width();
//     var itemsNum = $(".slider-items li").length; //6
//     var moveStep = singleImgWid;
//     var backStep = singleImgWid * (itemsNum - 3);
//     var maxWidth = $(".slider-items").width()

//     $(".btn-slider.before").on("click", function () {
//         if (moveStep > maxWidth) {
//             $(".slider-items").css({ "transform": "translateX(0px)" });
//             moveStep = singleImgWid;
//             backStep = singleImgWid * (itemsNum - 3);
//         } else {
//             $(".slider-items").css({ "transform": "translateX(-" + moveStep + "px)" });
//             backStep = moveStep - singleImgWid;
//             moveStep += singleImgWid;

//         }
//     });

//     $(".btn-slider.after").on("click", function () {
//         if (backStep + singleImgWid < singleImgWid) {
//             $(".slider-items").css({ "transform": "translateX(-" + maxWidth + "px)" });
//             moveStep = singleImgWid;
//             backStep = singleImgWid * (itemsNum - 3);
//         } else {

//             $(".slider-items").css({ "transform": "translateX(-" + backStep + "px)" });
//             moveStep = backStep + singleImgWid;
//             backStep -= singleImgWid;

//         }

//     })

//     $(".slider-items li").on("click", function () {
//         $(".slider-items li").removeClass("active-img");
//         $(this).addClass("active-img");
//         var imgLink = $(this).children().attr("src");
//         $(".product-slider .main-img").attr("src", imgLink);
//         $(".product-slider .light-box img").attr("src", imgLink);
//     });

//     $(".product-slider .main-img").on("click", function () {
//         $(".product-slider .light-box").removeClass("d-none");
//     })
//     $(".product-slider .light-box").on("click", function (e) {
//         event.stopPropagation()
//         $(".product-slider .light-box").addClass("d-none");
//     })

// });


// // new slider js ////

$(function () {
    var slider = $('#main-slider');
    // reference for thumbnail items
    var thumbnailSlider = $('#base-slider');
    //transition time in ms
    var duration = 500;


    $('#main-slider').owlCarousel({
        loop: false,
        margin: 0,
        responsiveClass: true,
        items: 1,
        dots: false,
        // nav: true,
    }).on('changed.owl.carousel', function (e) {
        //On change of main item to trigger thumbnail item
        thumbnailSlider.trigger('to.owl.carousel', [e.item.index, duration, true]);
    });

    $('#base-slider').owlCarousel({
        loop: false,
        center: true,
        margin: 5,
        responsiveClass: true,
        // autoWidth: true,
        dots: false,

        responsive: {
            0: {
                items: 6,

            },
            600: {
                items: 6,

            },
            1000: {
                items: 6,
            }
        }
    }).on('click', '.owl-item', function () {
        // On click of thumbnail items to trigger same main item
        slider.trigger('to.owl.carousel', [$(this).index(), duration, true]);

        $(".base-slider .item").removeClass("active-img");
        $(this).children(".item").addClass("active-img");


    }).on('changed.owl.carousel', function (e) {
        // On change of thumbnail item to trigger main item
        slider.trigger('to.owl.carousel', [e.item.index, duration, true]);
    });

    $('.owl-prev').click(function () {
        slider.trigger('next.owl.carousel');
    });
    $('.owl-next').click(function () {
        slider.trigger('prev.owl.carousel');
    });

    // light box

    $(".product-slider .main-img").on("click", function () {
        var imgLink = $(this).attr("src");
        $(".light-box").children("img").attr("src", imgLink);
        $(".product-slider .light-box").removeClass("d-none");
    })
    $(".product-slider .light-box").on("click", function (e) {
        event.stopPropagation()
        $(".product-slider .light-box").addClass("d-none");
    })





});

