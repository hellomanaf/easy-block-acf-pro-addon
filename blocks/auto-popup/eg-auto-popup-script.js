jQuery(document).ready(function() {
    jQuery('.auto-popup').each(function(i, obj) {
        var popuptime = jQuery(this).attr('time');
        var popupid = jQuery(this).attr('id');
        setTimeout(function(){
            jQuery("#"+popupid).removeClass('auto-popup-load');
            jQuery("#"+popupid).fadeIn(500);
         }, popuptime);
    });
});

jQuery("body").on("click", ".auto-popup-close", function (event) {
    event.stopPropagation();
    jQuery(this).parent().parent().parent().hide();
});