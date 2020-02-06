$(document).ready(function () {

  // preloader fade after loading
  $(window).on("load", function () {
    $(".cover-loader").fadeOut("slow");
  });
  // preloader end

  // sticky Header
  $(function () {
    createSticky($("#main-header"));
  });

  function createSticky(sticky) {
    if (typeof sticky !== "undefined") {
      var pos = sticky.offset().top + 20,
        win = $(window);

      win.on("scroll", function () {
        win.scrollTop() >= pos
          ? sticky.addClass("fixed-header")
          : sticky.removeClass("fixed-header");

        win.scrollTop() >= pos
          ? $(".search-header").addClass("display-none")
          : $(".search-header").removeClass("display-none");
      });
    }
  }
  // end sticky Header

  // numbers counter
  var countStart = 0;
  $(window).scroll(function () {
    var oTop = $(".numbers").offset().top - window.innerHeight;
    if (countStart == 0 && $(window).scrollTop() > oTop) {
      $(".numbers-item__num").each(function () {
        var $this = $(this),
          countTo = $this.attr("data-count");
        $({
          countNum: $this.text()
        }).animate(
          {
            countNum: countTo
          },

          {
            duration: 2000,
            easing: "swing",
            step: function () {
              $this.text(Math.floor(this.countNum));
            },
            complete: function () {
              $this.text(this.countNum);
            }
          }
        );
      });
      countStart = 1;
    }
  });
  // end of numbers counter //

  // Main menu hover effect //
  var navItem = $(".side-header .nav-item");
  var mainMenuItem = $(".side-header .main-menu > li");
  var subMenuItem = $(".side-header .sub-menu > li");
  navItem.mouseenter(function () {
    var internalMainMenu = $(this).children(".awn-dorpdown-items");
    internalMainMenu.removeClass("display-none");
  });
  navItem.mouseleave(function () {
    var internalMainMenu = $(this).children(".awn-dorpdown-items");
    internalMainMenu.addClass("display-none");
    $(".side-header .awn-dorpdown-items").addClass("display-none");
    $(".side-header .sub-menu").addClass("display-none");
  });

  mainMenuItem.mouseenter(function () {
    var internalSubMenu = $(this).children(".sub-menu");
    internalSubMenu.removeClass("display-none");
    $(".sub-menu")
      .not(internalSubMenu)
      .addClass("display-none");
  });
  mainMenuItem.mouseleave(function () {
    var internalSubMenu = $(this).children(".sub-menu");
    internalSubMenu.mouseleave(function () {
      internalSubMenu.addClass("display-none");
    });
  });
  // end of menu hover effect //




  // fev heart change
  var xfav;
  $(".btn-fav").on("click", function (e) {
    e.preventDefault();

    var currText = $(this).children("i").text();
    if(currText == "favorite_border") {
      xfav = true;
    } else {
      xfav = false;
    }

    if (xfav) {
      $(this)
        .children("i")
        .text("favorite");
      xfav = !xfav;
    } else {
      $(this)
        .children("i")
        .text("favorite_border");
      xfav = !xfav;
    }
  });
  // end fev heart change

  // inner header menu 
  $("#inner-header-btn").click(function (e) {
    e.preventDefault();
    $(".inner-header .inner-header-menu").toggleClass("d-none");
    innerHeader = true;
  });


});


