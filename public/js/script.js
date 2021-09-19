let site = document.querySelector(".site");

if (site) {
  $(document).ready(function () {
    $(".hamburger").click(function () {
      $(".overlay").toggleClass("hide");
      $(this).toggleClass("is-active");
      $(".mobile__menu").toggleClass("closed");
      $("body").toggleClass("fixed-position");
    });

    let _dataMobile = [
      ".mobile__slider--nav div[data-slide",
      ".menu__inner--slider",
    ];
    let mobileMenu = $(".menu__inner--slider").slick({
      arrows: false,
      infinite: true,
      responsive: [
        {
          breakpoint: 9999,
          settings: "unslick",
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
    let mobileMenuRight = $(".mobile__slider--nav .slider__button--right");
    let mobileMenuLeft = $(".mobile__slider--nav .slider__button--left");
    let mobileMenuData = $(".mobile__slider--nav div[data-slide]");
    mobileMenuRight.click(() => {
      checkSliderNav(_dataMobile);
      mobileMenu.slick("slickNext");
      checkSliderButtons(mobileMenu, this, mobileMenuLeft);
    });
    mobileMenuLeft.click(() => {
      checkSliderNav(_dataMobile);
      mobileMenu.slick("slickPrev");
      checkSliderButtons(mobileMenu, mobileMenuRight, this);
    });
    mobileMenu.on("swipe", function () {
      checkSliderNav(_dataMobile);
      checkSliderButtons(mobileMenu, mobileMenuRight, mobileMenuLeft);
    });
    mobileMenu.on("afterChange", function () {
      checkSliderNav(_dataMobile);
      checkSliderButtons(mobileMenu, mobileMenuRight, mobileMenuLeft);
    });

    mobileMenuData.click(function (e) {
      e.preventDefault();
      mobileMenuData.removeClass("active-slide");
      $(this).addClass("active-slide");
      var slideNo = $(this).data("slide");
      mobileMenu.slick("slickGoTo", slideNo - 1);
    });

    let _dataBars = [
      ".bars-gallery__navigation > div[data-slide",
      ".bars-gallery__slider",
    ];
    let barsGallerySlider = $(".bars-gallery__slider").slick({
      arrows: false,
      infinite: true,
      slidesToShow: 1,
    });
    let barsGallerySliderRight = $(
      ".bars__slider--button.slider__button--right"
    );
    let barsGallerySliderLeft = $(".bars__slider--button.slider__button--left");
    let barsGallerySliderData = $(
      ".bars-gallery__navigation > div[data-slide]"
    );
    let barsGallerySliderDataN = $(".bars__gallery--tab[data-slideN]");
    barsGallerySliderRight.click(() => {
      checkSliderNav(_dataBars);
      barsGallerySlider.slick("slickNext");
      checkSliderButtons(barsGallerySlider, this, barsGallerySliderLeft);
    });
    barsGallerySliderLeft.click(() => {
      checkSliderNav(_dataBars);
      barsGallerySlider.slick("slickPrev");
      checkSliderButtons(barsGallerySlider, barsGallerySliderRight, this);
    });
    barsGallerySlider.on("swipe", function () {
      checkSliderNav(_dataBars);
      checkSliderButtons(
        barsGallerySlider,
        barsGallerySliderRight,
        barsGallerySliderLeft
      );
    });
    barsGallerySlider.on("afterChange", function () {
      checkSliderNav(_dataBars);
      checkSliderButtons(
        barsGallerySlider,
        barsGallerySliderRight,
        barsGallerySliderLeft
      );
    });

    barsGallerySliderData.click(function (e) {
      e.preventDefault();
      barsGallerySliderData.removeClass("active-slide");
      $(this).addClass("active-slide");
      var slideNo = $(this).data("slide");
      // console.log(slideNo);
      barsGallerySlider.slick("slickGoTo", slideNo - 1);
    });
    barsGallerySliderDataN.click(function (e) {
      e.preventDefault();
      var slideNo = $(this).data("sliden");
      barsGallerySlider.slick("slickGoTo", slideNo - 1);
      checkSliderNav(_dataBars);
      checkSliderButtons(
        barsGallerySlider,
        barsGallerySliderRight,
        barsGallerySliderLeft
      );
    });

    function checkSliderButtons(slider, sliderRight, sliderLeft) {
      if (
        slider.find(".slick-track").children().first().hasClass("slick-active")
      ) {
        $(sliderLeft).removeClass("active-arrow");
        $(sliderRight).addClass("active-arrow");
      } else if (
        slider.find(".slick-track").children().last().hasClass("slick-active")
      ) {
        $(sliderLeft).addClass("active-arrow");
        $(sliderRight).removeClass("active-arrow");
      } else {
        $(sliderLeft).addClass("active-arrow");
        $(sliderRight).addClass("active-arrow");
      }
    }

    function checkSliderNav(scope) {
      setTimeout(() => {
        $(`${scope[0]}]`).removeClass("active-slide");
        const index = $(`${scope[1]} .slick-active`).data("slick-index") + 1;
        $(`${scope[0]}='${index}']`).addClass("active-slide");
      }, 100);
    }

    var bars__list = $(".gallery__item");

    $(".bars__gallery--tab").click(function () {
      bars__list.css("display", "block").addClass("showed");
      var tab_target = $(this).data("tab");
      if (tab_target) {
        bars__list
          .filter((i, elem) => {
            if ($(elem).data().tab) {
              return $(elem).data().tab.search(tab_target) == -1;
            } else {
              return true;
            }
          })
          .css("display", "none")
          .removeClass("showed");
      }
    });

    $(
      ".gallery__item, .gallery__popup--cross, .overlay-wrapper, .vip-button, .bk-bar-button"
    ).click(function (e) {
      $(".bk-bar-button .bars-button").click(function (e) {
        e.stopPropagation();
      });

      $(".overlay").toggleClass("hide");
      $(".gallery__popup").toggleClass("visibilited");
      $(".gallery__popup").fadeToggle();
      if ($(".gallery__popup--slides").hasClass("gallery__slide--action")) {
        setTimeout(() => {
          let slider = $(".showed").clone();
          $(".gallery__popup--slides").append(
            "<div class='popup__slider--inner'></div>"
          );
          $(".popup__slider--inner").html(slider);
          $(".gallery__popup .main__section--title").text(
            $(slider[0]).data("tab")
          );
          let gallerySlider = $(".popup__slider--inner")
            .not(".slick-initialized")
            .slick({
              arrows: false,
              infinite: false,
              slidesToShow: 1,
              centerMode: true,
              centerPadding: "60px",
              dots: true,
              responsive: [
                {
                  breakpoint: 730,
                  settings: {
                    centerPadding: "0px",
                  },
                },
              ],
            });
          let galleryRight = $(
            ".gallery__popup--navigation .slider__button--right"
          );
          let galleryLeft = $(
            ".gallery__popup--navigation .slider__button--left"
          );
          galleryRight.click(() => {
            gallerySlider.slick("slickNext");
            checkSliderButtons(gallerySlider, this, galleryLeft);
          });
          galleryLeft.click(() => {
            gallerySlider.slick("slickPrev");
            checkSliderButtons(gallerySlider, galleryRight, this);
          });
          if (
            e.currentTarget.className == "gallery__popup--cross" ||
            e.currentTarget.className == "overlay-wrapper"
          ) {
            $(".popup__slider--inner").remove();
            $(".gallery__popup .main__section--title").text("");
          }
        }, 100);
      } else {
        $(".overlay").toggleClass("z-indexed");

        vips__list = $(".popup__slider--block");
        vipText__list = $(".popup__text");
        vips__list.css("display", "block").addClass("showed");
        vipText__list.css("display", "block").addClass("showed");
        var tab_target = $(this).data("tab");
        var bar_target = $(this).data("tip");
        // console.log(tab_target);
        if (tab_target) {
          vips__list
            .filter((i, elem) => {
              if ($(elem).data().tab) {
                return $(elem).data().tab.search(tab_target) == -1;
              } else {
                return true;
              }
            })
            .css("display", "none")
            .removeClass("showed");
          vipText__list
            .filter((i, elem) => {
              if ($(elem).data().tab) {
                return $(elem).data().tab.search(tab_target) == -1;
              } else {
                return true;
              }
            })
            .css("display", "none")
            .removeClass("showed");
        }

        if (bar_target == "bars") {
          $(".gallery__popup .main__section--title").text(`${tab_target}`);
        } else {
          $(".gallery__popup .main__section--title").text(
            `Кабина VIP ${tab_target}`
          );
        }

        let vipSlider = $(".popup__slider--block.showed")
          .not(".slick-initialized")
          .slick({
            arrows: false,
            infinite: false,
            slidesToShow: 1,
            centerMode: true,
            centerPadding: "60px",
            dots: true,
            adaptiveHeight: true,
            responsive: [
              {
                breakpoint: 730,
                settings: {
                  centerPadding: "0px",
                },
              },
            ],
          });
        let vipRight = $(".gallery__popup--navigation .slider__button--right");
        let vipLeft = $(".gallery__popup--navigation .slider__button--left");
        vipRight.click(() => {
          vipSlider.slick("slickNext");
          checkSliderButtons(vipSlider, this, vipLeft);
        });
        vipLeft.click(() => {
          vipSlider.slick("slickPrev");
          checkSliderButtons(vipSlider, vipRight, this);
        });

        if (
          e.currentTarget.className == "gallery__popup--cross" ||
          e.currentTarget.className == "overlay-wrapper"
        ) {
          vipSlider.slick("unslick");
          $(".gallery__popup .main__section--title").text("");
        }
      }
    });

    // let _deliveryPageData = [".delivery__page-slider--nav div[data-slide", ".delivery__page__inner--slider"];
    let deliverySliderPage = $(".delivery__page__inner--slider").slick({
      arrows: false,
      infinite: true,
      responsive: [
        {
          breakpoint: 9999,
          settings: "unslick",
        },
        {
          breakpoint: 576,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
    let deliverySliderPageRight = $(
      ".delivery__page-slider--nav .slider__button--right"
    );
    let deliverySliderPageLeft = $(
      ".delivery__page-slider--nav .slider__button--left"
    );
    deliverySliderPageRight.click(() => {
      deliverySliderPage.slick("slickNext");
      checkSliderButtons(deliverySliderPage, this, deliverySliderPageLeft);
    });
    deliverySliderPageLeft.click(() => {
      deliverySliderPage.slick("slickPrev");
      checkSliderButtons(deliverySliderPage, deliverySliderPageRight, this);
    });
    deliverySliderPage.on("swipe", function () {
      checkSliderButtons(
        deliverySliderPage,
        deliverySliderPageRight,
        deliverySliderPageLeft
      );
    });
    deliverySliderPage.on("afterChange", function () {
      checkSliderButtons(
        deliverySliderPage,
        deliverySliderPageRight,
        deliverySliderPageLeft
      );
    });

    $(".delivery__page-slide__item").click(function () {
      $(".delivery__page-slide__item").removeClass("active-tab");
      $(this).addClass("active-tab");
    });

    var menu = document.querySelector(".mobile__menu");
    menu.onscroll = function () {
      headerMobileScroll();
    };

    var header = document.querySelector("header");

    var sticky = header.offsetTop;

    function headerMobileScroll() {
      if ($("body").hasClass("fixed-position")) {
        if (menu.scrollTop > sticky) {
          header.classList.add("fadeIt");
        } else {
          header.classList.remove("fadeIt");
        }
      }
    }
  });
}
