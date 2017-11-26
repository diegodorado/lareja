window.width 	= jQuery(window).width();
window.height 	= jQuery(window).height();

/* Init */
jQuery(window).ready(function () {
  if(jQuery('#preloader').length > 0) {

    jQuery(window).on("load", function() {

      jQuery('#preloader').fadeOut(1000, function() {
        jQuery('#preloader').remove();
      });

      // setTimeout(function() {}, 1000);

    });
  }
}(jQuery));
