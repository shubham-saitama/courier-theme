/**
 * Exoplanet Custom JS
 *
 * @package Exoplanet
 *
 * Distributed under the MIT license - http://opensource.org/licenses/MIT
 */

var stickyon = jQuery('#sticky-onoff').text().trim();
var a1 = stickyon.length;
window.onscroll = function () {
  if (a1 == 3) {
    myScrollNav();
  }
}

var navbar = document.getElementById("vw-sticky-menu");
var sticky = navbar.offsetTop;
function myScrollNav() {
  if (window.pageYOffset > sticky) {
    //alert(window.pageYOffset);
    navbar.classList.add("sticky");
    navbar.classList.add("stickynavbar");
  } else {
    navbar.classList.remove("sticky");
    navbar.classList.remove("stickynavbar");
  }
}

jQuery(document).ready(function () {
  var elementHeight = jQuery("#site_top").height();
  var adminBarHeight = jQuery('div#wpadminbar').height();
  var top = elementHeight + 16;
  var topWithAdmin = top + adminBarHeight;
  // console.log("Element height (excluding padding and borders): " + elementHeight + "px");
  // jQuery('#masthead').css('height', elementHeight);
  console.log('LoggedIn====================>', jQuery('body').hasClass('.logged-in'));

  if (jQuery('body').hasClass('logged-in')) {
    jQuery('.toggle-nav.mobile-menu').css('top', topWithAdmin);
  } else {
    jQuery('.toggle-nav.mobile-menu').css('top', top);
  }
  console.log("topWithAdmin========================>", topWithAdmin);
  console.log("top========================>", top);
  // Create a <span> element
  var spanElement = jQuery("<span class='dropDown fa-solid fa-chevron-down'></span>");

  // Append the <span> element inside each element with class "menu-item-has-children"
  jQuery(".menu-item-has-children").append(spanElement);

  // Attach the click event to the dynamically created span elements
  jQuery('span.dropDown').on('click', function () {
    // Toggle the corresponding sub-menu
    jQuery(this).siblings(".sub-menu").slideToggle(500);
    // Toggle the 'active' class on the clicked span
    jQuery(this).toggleClass('active');
  });
  jQuery('.ewd-otp-form-identifier .ewd-otp-field-label').text('Your Tracking ID');
  jQuery('.ewd-otp-form-email .ewd-otp-field-label').text('Email Address');

  var input = jQuery("input[name='ewd_otp_identifier_number']");
  var label = jQuery(".ewd-otp-form-identifier .ewd-otp-field-label");
  var email = jQuery("input[name='ewd_otp_form_email']");
  var emailLable = jQuery(".ewd-otp-form-email .ewd-otp-field-label");
  input.focus(function () {
    label.addClass("active");
    console.log('inputStatus=================> active');
  });
  input.blur(function () {
    if (input.val() === "") {
      label.removeClass("active");
      console.log('inputStatus================> inActive');
    }
  });
  email.focus(function () {
    emailLable.addClass("active");
    console.log('EmailStatus=================> active');
  });

  email.blur(function () {
    if (email.val() === "") {
      emailLable.removeClass("active");
      console.log('emailStatus================> inActive');
    }
  });
});


jQuery(function ($) {

  jQuery('.search-icon > i').click(function () {
    jQuery(".serach_outer").slideDown(700);
  });

  jQuery('.closepop i').click(function () {
    jQuery(".serach_outer").slideUp(700);
  });
});

var menu_width = "";

var menu_width = "";
/* Mobile responsive Menu*/
jQuery(function ($) {
  jQuery('#open_nav').click(function () {
    jQuery('ul#menu-primary-menu').toggleClass("open-nav");
    jQuery('#open_nav').toggleClass('active');
  })

});

jQuery(document).ready(function () {
  jQuery('.archive .product a.added').removeClass("loading");
})

function vw_courier_serivce_pro_filters(event, ui) {
  var data_obj = {};

  data_obj['values'] = jQuery('#product-price-slider').slider("values");
  data_obj['search_value'] = jQuery('[name="products_search"]').val();

  jQuery('.shop-page-filters [type="checkbox"]:checked').each(function (index, element) {
    if (!Array.isArray(data_obj[jQuery(element).attr('name')])) {
      data_obj[jQuery(element).attr('name')] = new Array();
    }
    data_obj[jQuery(element).attr('name')].push(jQuery(element).val())
  });

  jQuery.post(vw_courier_serivce_pro_customscripts_obj.ajaxurl, {
    'action': 'get_shop_page_filter',
    'data': data_obj
  },
    function (response) {
      jQuery('.products.columns-3').html(response.html)
    });

}

function vw_courier_serivce_pro_filters_listings(event, ui) {
  var data_obj = {};

  data_obj['values'] = jQuery('#listing-price-slider').slider("values");

  jQuery.post(vw_courier_serivce_pro_customscripts_obj.ajaxurl, {
    'action': 'get_listing_page_filter',
    'data': data_obj
  },
    function (response) {
      jQuery('.auto-listings-row .auto-listing-box').remove();
      jQuery('.auto-listings-row').append(response.html);
    });
}

// jQuery(document).ready(function () {
//   jQuery('.archive .product a.added').removeClass("loading");

//   const get_woocommerce_currency_symbol = vw_courier_serivce_pro_customscripts_obj.get_woocommerce_currency_symbol;
//   const finalAmount = get_woocommerce_currency_symbol + parseInt(vw_courier_serivce_pro_customscripts_obj.product_max_price);
//   const StartAmountProduct = get_woocommerce_currency_symbol + 0;


//   jQuery("#product-amount-final").text(finalAmount);
//   jQuery("#product-amount-start").text(StartAmountProduct);

//   jQuery('.shop-page-filters [type="checkbox"]').on('change', function (event) {
//     vw_courier_serivce_pro_filters(event);
//   });

//   jQuery('[name="products_search"').on('input', function (event) {
//     vw_courier_serivce_pro_filters(event);
//   });

//   jQuery("#product-price-slider").slider({
//     range: true,
//     min: 0,
//     max: parseInt(vw_courier_serivce_pro_customscripts_obj.product_max_price),
//     values: [0, parseInt(vw_courier_serivce_pro_customscripts_obj.product_max_price)],
//     change: function (event, ui) {
//       vw_courier_serivce_pro_filters(event, ui);
//     },
//     slide: function (event, ui) {

//       jQuery("#product-amount-start").text(
//         get_woocommerce_currency_symbol + ui.values[0]
//       );
//       jQuery("#product-amount-end").text(
//         get_woocommerce_currency_symbol + ui.values[1]
//       );
//     }
//   });

//   const get_listing_currency_symbol = vw_courier_serivce_pro_customscripts_obj.listing_currency_symbol;
//   const finalAmountListing = get_listing_currency_symbol + parseInt(vw_courier_serivce_pro_customscripts_obj.listing_max_price);
//   const StartAmountListing = get_listing_currency_symbol + 0;

//   jQuery("#listing-amount-final").text(finalAmountListing);
//   jQuery("#listing-amount-start").text(StartAmountListing);

//   jQuery("#listing-price-slider").slider({
//     range: true,
//     min: 0,
//     max: parseInt(vw_courier_serivce_pro_customscripts_obj.listing_max_price),
//     values: [0, parseInt(vw_courier_serivce_pro_customscripts_obj.listing_max_price)],
//     change: function (event, ui) {
//       vw_courier_serivce_pro_filters_listings(event, ui);
//     },
//     slide: function (event, ui) {

//       jQuery("#listing-amount-start").text(
//         get_listing_currency_symbol + ui.values[0]
//       );
//       jQuery("#listing-amount-end").text(
//         get_listing_currency_symbol + ui.values[1]
//       );
//     }
//   });
// })


jQuery(function () {
  //----- OPEN
  jQuery('[data-popup-open]').on('click', function (e) {
    var targeted_popup_class = jQuery(this).attr('data-popup-open');
    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeIn(350);

    e.preventDefault();
  });

  //----- CLOSE
  jQuery('[data-popup-close]').on('click', function (e) {
    var targeted_popup_class = jQuery(this).attr('data-popup-close');
    jQuery('[data-popup="' + targeted_popup_class + '"]').fadeOut(350);

    e.preventDefault();
  });
});


jQuery(document).ready(function ($) {

  var sync1 = $(".main-gallery");
  var sync2 = $(".main-gallery-list");
  var slidesPerPage = 6; //globaly define number of elements per page

  sync1.owlCarousel({
    items: 1,
    slideSpeed: 200,
    nav: true,
    dots: false,
    responsiveRefreshRate: 200,
    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
  }).on('changed.owl.carousel', syncPosition);

  sync2.on('initialized.owl.carousel', function () {
    sync2.find(".owl-item").eq(0).addClass("current");
  }).owlCarousel({
    items: slidesPerPage,
    dots: false,
    nav: false,
    smartSpeed: 200,
    slideSpeed: 500,
    slideBy: 4,
    autoplay: true,
    // loop:true
    responsiveRefreshRate: 100
  }).on('changed.owl.carousel', syncPosition2);

  sync2.on('click', '.owl-item', function () {
    sync1.trigger('to.owl.carousel', [$(this).index(), 200, true]);
  });

  function syncPosition(el) {
    var current = el.item.index;

    sync2.find(".owl-item").removeClass("current").eq(current).addClass("current");
    var onscreen = sync2.find('.owl-item.active').length - 1;
    var start = sync2.find('.owl-item.active').first().index();
    var end = sync2.find('.owl-item.active').last().index();

    if (current > end) {
      sync2.data('owl.carousel').to(current, 100, true);
    }
    if (current < start) {
      sync2.data('owl.carousel').to(current - onscreen, 100, true);
    }
  }

  function syncPosition2(el) {
    if (sync2.data('owl.carousel').options.loop) {
      var number = el.item.index;
      var clonedNumber = el.item.count - el.item.index;

      if (clonedNumber <= number) {
        number = clonedNumber;
      }
      number--;
      var sync2visible = sync2.find('.owl-item').eq(number).visible(true);
      sync2.data('owl.carousel').to(sync2visible, 100, true);
    } else {
      sync1.data('owl.carousel').to(el.item.index, 100, true);
    }
  }


  //custom variation home page image and price change start

  jQuery('.product_variant_color').on('click', function () {

    jQuery('.product_variant_text').hide();
    jQuery(this).closest('.variant-parent-container').find('.product_variant_text').show();
    jQuery('.product_variant_color').removeClass('checked');
    jQuery(this).addClass('checked');

    var variationId = jQuery(this).attr('variation-id');

    jQuery.ajax({
      url: vw_courier_serivce_pro_customscripts_obj.ajaxurl,
      type: 'POST',
      data: {
        action: 'get_variation_data',
        variation_id: variationId
      },
      success: function (response) {

        // Update price
        jQuery('.product-price').html(response.price_html);

        // Update images
        var imageGallery = jQuery('.product-gallery');
        imageGallery.html(response.image_html);

      }
    });

  });

  if (jQuery('.product_variant_color').length) {
    jQuery('.product_variant_color').eq(0).addClass('checked').click();
    jQuery('.variant-parent-container .product_variant_text').eq(0).show();
  }

  //custom variation home page image and price change end
});


jQuery('document').ready(function () {

  jQuery(".search-toggle .search-icon").click(function (e) {
    jQuery(".search-container").show();
    e.stopPropagation();
  });

  jQuery(".search-container").click(function (e) {
    e.stopPropagation();
  });

  jQuery(document).click(function () {
    jQuery(".search-container").hide();
  });



  jQuery('.cat_toggle i').click(function () {
    jQuery('#cart_animate').toggle('slow');
  });

  jQuery(document).ready(function () {
    jQuery('.myVideoBtn').click(function () {
      var url = jQuery(this).data('url');
      // console.log(url);
      // console.log(jQuery('#videoEmbed'));
      jQuery('#videoEmbed').attr('src', url);
      jQuery("#myVideoNewModal").show();
    });
    jQuery('.close-one').click(function () {
      jQuery("#myVideoNewModal").hide()
    });

    jQuery('.counter1-up').each(function () {
      jQuery(this).prop('Counter', 0).animate({
        Counter: jQuery(this).text()
      }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
          jQuery(this).text(Math.ceil(now));
        }
      });
    });



  });


  jQuery('a[data-slide]').click(function (e) {
    e.preventDefault();
    var slideno = jQuery(this).data('slide');
    jQuery('.slider-for').slick('slickGoTo', slideno - 1);
  });

  // var owl = jQuery('#slider .owl-carousel');
  // if (owl.length > 0) {

  //   owl.owlCarousel({
  //     margin: 25,
  //     nav: false,
  //     autoplay: false,
  //     lazyLoad: true,
  //     autoHeight: false,
  //     autoplayTimeout: 2000,
  //     center: true,
  //     dots: false,
  //     loop: true,
  //     // loop: true,
  //     navText: ['<i class="fas fa-angle-left" aria-hidden="true"></i>', '<i class="fas fa-angle-right" aria-hidden="true"></i>'],
  //     responsive: {
  //       0: {
  //         items: 1,
  //         stagePadding: 0
  //       },
  //       768: {
  //         items: 1,
  //         stagePadding: 0
  //       },
  //       1024: {
  //         items: 1,
  //       },
  //       1920: {
  //         items: 1,
  //       },

  //     },
  //     autoplayHoverPause: true,
  //     mouseDrag: true
  //   });
  // }

  var owl = jQuery('#services-us .owl-carousel');
  if (owl.length > 0) {

    owl.owlCarousel({
      margin: 25,
      nav: false,
      autoplay: true,
      lazyLoad: true,
      autoplayTimeout: 3000,
      center: false,
      dots: true,
      loop: true,
      responsive: {
        0: {
          items: 1,
        },
        768: {
          dotsEach: 2,
          items: 2,
        },
        1024: {
          dotsEach: 2,
          items: 2,
        },
        1200: {
          dotsEach: 3,
          items: 3,
        },
        1400: {
          dotsEach: 3,
          items: 3,
        },
        1920: {
          dotsEach: 3,
          items: 3,
        },

      },
      autoplayHoverPause: true,
      mouseDrag: true
    });
  }


  var owl = jQuery('#blog-news .owl-carousel');
  owl.owlCarousel({
    margin: 25,
    nav: false,
    dots: true,
    autoplay: true,
    // lazyLoad: true,
    autoplayTimeout: 4000,
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      500: {
        items: 1
      },
      600: {
        items: 1
      },
      700: {
        items: 2
      },
      900: {
        items: 2
      },
      1000: {
        items: 2
      },
      1200: {
        items: 3
      },
      1300: {
        items: 3
      }
    },
    autoplayHoverPause: true,
    mouseDrag: true
  });

  var owl = jQuery('.recent-posts .owl-carousel');
  owl.owlCarousel({
    margin: 25,
    nav: false,
    dots: false,
    autoplay: true,
    // lazyLoad: true,
    autoplayTimeout: 4000,
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      500: {
        items: 1
      },
      600: {
        items: 1
      },
      700: {
        items: 2
      },
      900: {
        items: 2
      },
      1000: {
        items: 2
      },
      1200: {
        items: 3
      },
      1300: {
        items: 3
      }
    },
    autoplayHoverPause: true,
    mouseDrag: true
  });

  var owl = jQuery('section.clientandPratners .owl-carousel');
  owl.owlCarousel({
    margin: 25,
    dots: false,
    nav: false,
    autoplay: true,
    autoplayTimeout: 2000,
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    loop: true,
    responsive: {
      0: {
        items: 1
      },
      500: {
        items: 2
      },
      600: {
        items: 2
      },
      700: {
        items: 3
      },
      900: {
        items: 3
      },
      1000: {
        items: 4
      },
      1200: {
        items: 4
      },
      1300: {
        items: 4
      }
    },
    autoplayHoverPause: true,
    mouseDrag: true
  });




  var owl = jQuery('section#Our-team .owl-carousel');
  owl.owlCarousel({
    margin: 25,
    nav: false,
    dots: true,
    autoplay: true,
    // lazyLoad: true,
    autoplayTimeout: 3000,
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    loop: false,
    responsive: {
      0: {
        items: 1
      },
      500: {
        items: 1
      },
      600: {
        items: 1
      },
      700: {
        items: 2
      },
      900: {
        items: 3
      },
      1000: {
        items: 3
      },
      1300: {
        items: 3
      },
      1400: {
        items: 4
      }
    },
    autoplayHoverPause: true,
    mouseDrag: true
  });
  var owl = jQuery('section#testimonials .owl-carousel');
  owl.owlCarousel({
    margin: 25,
    nav: false,
    dots: true,
    autoplay: true,
    lazyLoad: true,
    autoplayTimeout: 4000,
    navText: ['<i class="fa fa-chevron-left" aria-hidden="true"></i>', '<i class="fa fa-chevron-right" aria-hidden="true"></i>'],
    loop: false,
    responsive: {
      0: {
        items: 1
      },
      500: {
        items: 1
      },
      600: {
        items: 1
      },
      700: {
        items: 1
      },
      900: {
        items: 1
      },
      1000: {
        items: 1
      },
      1300: {
        items: 1
      }
    },
    autoplayHoverPause: true,
    mouseDrag: true
  });
  jQuery('a.accordion-toggle').click(function () {
    jQuery("i", this).toggleClass("fas fa-plus fas fa-times");
  });
  var interval = null;
  function show_loading_box() {
    jQuery(".eco-box").css("display", "none");
    clearInterval(interval);
  }
  jQuery('document').ready(function () {

    interval = setInterval(show_loading_box, 1000);
  });

  //  offer section

});




/* Counter */
jQuery(document).ready(function () {

  // ------------ Scroll Top ---------------

  jQuery(window).scroll(function () {
    if (jQuery(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
      jQuery('#return-to-top').fadeIn(200);    // Fade in the arrow
    } else {
      jQuery('#return-to-top').fadeOut(200);   // Else fade out the arrow
    }
  });
  jQuery('#return-to-top').click(function () {      // When arrow is clicked
    jQuery('body,html').animate({
      scrollTop: 0                       // Scroll to top of body
    }, 2000);
  });



});

jQuery(function ($) {
  $(window).scroll(function () {
    var scrollTop = $(window).scrollTop();
    if (scrollTop > 100) {
      $('.right_menu').addClass('scrolled');
    } else {
      $('.right_menu').removeClass('scrolled');
    }
    $('.main-header').css('background-position', 'center ' + (scrollTop / 2) + 'px');
  });

});

//At the document ready event
jQuery(function () {
  new WOW().init();
});

//also at the window load event
jQuery(window).on('load', function () {

  new WOW().init();
});


jQuery('body').on('added_to_cart', function (e, fragments, cart_hash, button) {
  var product = '';
  var img = '';
  var title = '';
  var url = '';

  if (vw_courier_serivce_pro_customscripts_obj.is_home == "1") {
    var product = jQuery(button).closest('.product-content');
    var img = product.find('img').attr('src');
    var title = product.find('.product_head').text();
    var url = product.find('.woocommerce-loop-product__link').attr('href');
  } else {
    var product = jQuery(button).closest('.product');
    var img = product.find('img').attr('src');
    var title = product.find('.woocommerce-loop-product__title').text();
    var url = product.find('.product_head').attr('href');
  }
  if (product != '') {
    jQuery.notify({
      icon: img,
      title: title,
      message: "Product has been added to your cart.",
      url: url
    }, {
      type: 'minimalist',
      delay: "3000",
      icon_type: 'image',
      template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<img data-notify="icon" class="img-circle pull-left">' +
        '<span class="prod-title" data-notify="title">{1}</span>' +
        '<div class="prod-messg" data-notify="message">{2}</div>' +
        '</div>'
    });
  }

});

jQuery(document).ready(function () {
  // Delete that line if you don't want the first Div to be displayed by default
  jQuery(".answer:first").css("display", "block");
  jQuery(".accordion-click:first").addClass('active');
  // 
  jQuery(".accordion-click").click(function () {
    jQuery(this).toggleClass('active');
    jQuery(this).next().slideToggle(500);
    jQuery(".answer").not(jQuery(this).next()).slideUp(500);
    jQuery(".accordion-click").not(jQuery(this)).removeClass('active');
  });

});
function customMediaUploader(button) {
  var customUploader = wp.media({
    title: 'Upload Image',
    button: {
      text: 'Select Image'
    },
    multiple: false
  });

  customUploader.on('select', function () {
    var attachment = customUploader.state().get('selection').first().toJSON();
    var mediaIdField = jQuery(button).closest('p').find('.custom_media_id');
    var mediaPreview = jQuery(button).closest('p').find('.custom_media_preview');

    mediaIdField.val(attachment.id);
    mediaPreview.html('<img src="' + attachment.url + '" alt="Image" style="max-width:100%;height:auto;" />');
  });

  customUploader.open();
}
setTimeout(function () {
  jQuery('.ccb-drop-down.calc_dropDown_field_id_2').on('click', function () {
    console.log('click ===============> working')
    jQuery('.calc-subtotal.calc-list').toggleClass('show')
    console.log('working==========================>');
  })
  // Check if the div is present
  if (jQuery(".ewd-otp-order-results").length == 0) {
    // The div with class "ewd-otp-order-results" is present
    // You can change the CSS of an <a> element here
    jQuery(".ewd-otp-tracking-results").css({
      "border": "none",            // Change the color to red (for example)
      "backdrop-filter": "none"  // Add underline (for example)
    });
    console.log('status================> I ran')
  }
}, 3000)




// Function to be triggered when the div is in the viewport
function onDivEnterViewport(entries, observer) {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      // The div is in the viewport
      console.log('The div is in the viewport!');
      // Call your specific function here
      // For example, you can call a function named "myFunction()"
      counterUp();
    }
  });
}

// Intersection Observer options
const options = {
  root: null, // Use the viewport as the root
  rootMargin: '0px', // No margin around the root
  threshold: 0.1, // Trigger when 10% of the target is visible
};

// Create an Intersection Observer
const observer = new IntersectionObserver(onDivEnterViewport, options);

// Observe the target div
const targetDiv = document.querySelector('.WhyChooseUs-counter-wrapper');
observer.observe(targetDiv);

// Your specific function to be triggered
function counterUp() {
  // Replace this with your desired functionality
  const counters = document.querySelectorAll(".choose-counter-num ");
  const speed = 200;

  counters.forEach((counter) => {
    const updateCount = () => {
      const target = parseInt(+counter.getAttribute("akhi"));
      const count = parseInt(+counter.innerText);
      const increment = Math.trunc(target / speed);
      console.log(increment);

      if (count < target) {
        counter.innerText = count + increment;
        setTimeout(updateCount, 1);
      } else {
        count.innerText = target;
      }
    };
    updateCount();
  });

  console.log('Specific function triggered when the div is in the viewport.');
}
// Initialize Owl Carousel
var owl = jQuery('#slider .owl-carousel').owlCarousel({
  // Owl Carousel options
  items: 1,
  nav: false,
  dots: true,
  dotsData: true,
  // autoplay: true,
  // Callback function to customize navigation
  onInitialized: function (event) {
    // Move dots to the desired container
    var dots = jQuery(event.target).find('.owl-dots');
    jQuery('.dots-container').append(dots);

    // Add slide numbers inside dots
    var dotsContainer = dots.find('.owl-dot');
    dotsContainer.each(function (index) {
      // Format index with leading zero if necessary
      var formattedIndex = ('0' + (index + 1)).slice(-2);
      jQuery(this).text(formattedIndex);
    });

    // Attach click event listener to dots
    dotsContainer.each(function (index) {
      jQuery(this).on('click', function () {
        owl.trigger('to.owl.carousel', [index]);
      });
    });
  }
});
window.onscroll = function () { stickyHeader() };

var header = document.getElementById("header");
var sticky = header.offsetTop;

function stickyHeader() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}