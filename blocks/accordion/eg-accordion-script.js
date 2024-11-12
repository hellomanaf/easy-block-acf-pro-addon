jQuery(document).ready(function() {  
    jQuery( "body" ).on( "click", ".eg-location-accordion-each-title", function(event) {
        if(jQuery(this).parent().hasClass('eg-location-accordion-active')){
            jQuery(this).parent().parent().find('.eg-location-accordion-each').stop(true,true,true).removeClass('eg-location-accordion-active');
            jQuery(this).parent().parent().find('.eg-location-accordion-each-content').stop(true,true,true).slideUp();
        }else{
            jQuery(this).parent().parent().find('.eg-location-accordion-each').stop(true,true,true).removeClass('eg-location-accordion-active');
            jQuery(this).parent().parent().find('.eg-location-accordion-each-content').stop(true,true,true).slideUp();
            jQuery(this).parent().stop(true,true,true).addClass('eg-location-accordion-active');
            jQuery(this).parent().find('.eg-location-accordion-each-content').stop(true,true,true).slideDown();
        }
    });
});