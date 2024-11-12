jQuery(document).ready(function () {

    //Arabic / RTL support
    var carousel_rtl = false;
    if (jQuery('body').hasClass('rtl')) { var carousel_rtl = true; }

    jQuery(".eg-carousel-slider ul").each(function(index, slider){

      //Number of slider settings
      var number_of_slides  = parseInt(jQuery(this).attr('number_of_slides'));
      number_of_slides_step_one = number_of_slides;
      if (number_of_slides > 4){ number_of_slides_step_one = number_of_slides - 1; }
      number_of_slides_step_two = 1;
      if (number_of_slides > 3){ number_of_slides_step_two = 2; }

      //speed and autoplay
      var slide_speed       = parseInt(jQuery(this).attr('slide_speed'));
      var slide_auto_play   = false;
      if(jQuery(this).attr('slide_auto_play') == "true"){
        slide_auto_play = true;
      }
      
      //Slick slider
      jQuery(slider).slick({
        dots: false,
        dotsClass: "slick-dots custom-dots",
        infinite: true,
        speed: 1500,
        slidesToShow: number_of_slides,
        slidesToScroll: number_of_slides,
        rtl: carousel_rtl,
        autoplay: slide_auto_play,
        autoplaySpeed: slide_speed,
        centerPadding: "0",
        responsive: [
          {
            breakpoint: 1460,
            settings: {
              slidesToShow: number_of_slides,
              slidesToScroll: number_of_slides,
              infinite: true,
            },
          },
          {
            breakpoint: 1321,
            settings: {
              dots: true,
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
          {
            breakpoint: 1260,
            settings: {
              dots: true,
              slidesToShow: number_of_slides_step_one,
              slidesToScroll: number_of_slides_step_one,
            },
          },
          {
            breakpoint: 769,
            settings: {
              dots: true,
              slidesToShow: number_of_slides_step_two,
              slidesToScroll: number_of_slides_step_two,
            },
          },
          {
            breakpoint: 569,
            settings: {
              dots: true,
              slidesToShow: 1,
              slidesToScroll: 1,
            },
          },
        ],
      });

      //Height fixing
      jQuery(this).find(".eg-carousel-slider-each-content").height('auto');
      var newscontent_heights = jQuery(this).find(".eg-carousel-slider-each-content").map(function () {
        return jQuery(this).outerHeight();
      }).get(),
      newscontent_height = Math.max.apply(null, newscontent_heights);
      jQuery(this).find(".eg-carousel-slider-each-content").css({height: newscontent_height});

      //Slider navigation button
      jQuery(this).parent().find(".eg-carousel-slider-prev").click(function() {
        jQuery(this).parent().find("button.slick-prev.slick-arrow").click();
      });
      jQuery(this).parent().find(".eg-carousel-slider-next").click(function() {
        jQuery(this).parent().find("button.slick-next.slick-arrow").click();
      });
    
    });  
    

    //on resize
    jQuery(window).resize(function() {
        //Height fixing
        jQuery(".eg-carousel-slider ul").each(function(index, slider){
          jQuery(this).find(".eg-carousel-slider-each-content").height('auto');
          var newscontent_heights = jQuery(this).find(".eg-carousel-slider-each-content").map(function () {
            return jQuery(this).outerHeight();
          }).get(),
          newscontent_height = Math.max.apply(null, newscontent_heights);
          jQuery(this).find(".eg-carousel-slider-each-content").css({height: newscontent_height});
        });
    });

});
  
jQuery(window).bind("load", function () {
    jQuery(".eg-carousel-slider ul").removeClass("cS-hidden");

    //Height fixing
    jQuery(".eg-carousel-slider ul").each(function(index, slider){
      jQuery(this).find(".eg-carousel-slider-each-content").height('auto');
      var newscontent_heights = jQuery(this).find(".eg-carousel-slider-each-content").map(function () {
        return jQuery(this).outerHeight();
      }).get(),
      newscontent_height = Math.max.apply(null, newscontent_heights);
      jQuery(this).find(".eg-carousel-slider-each-content").css({height: newscontent_height});
    });
});
  