//Counddown
jQuery(function(){
   jQuery('[data-countdown]').each(function() {
      var $this = jQuery(this), finalDate = jQuery(this).data('countdown');
      $this.countdown(finalDate, function(event) {
         $this.html(event.strftime('%D : %H : %M : %S'))}).on('finish.countdown', function() {
         	jQuery(this).parent().hide();
          });
     });
 });