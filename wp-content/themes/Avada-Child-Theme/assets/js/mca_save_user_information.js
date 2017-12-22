jQuery(document).ready( function($) {
   $(".save-user-info").click( function() {
	alert('test');
      meta_key = $(this).parent().find('.mca_user_field').data("meta_key");
      meta_value = $(this).parent().find('.mca_user_field').val();
      //if ($("body").hasClass("postid-902") || $("body").hasClass("postid-1302")) {
      if ($("body").hasClass("postid-902")) {
        meta_value = meta_value.replace(/[^\w]/gi, '');
      }
      $(this).parent().find('.mca_user_field').val(meta_value);
      save_message = $(this).data('message');
      nonce = $(this).data('nonce');
      message_container = $(this).parent().find('.mca_user_message');
	   
      var mul_data = {
         action: "save_mca_user_information",
         meta_key : meta_key,
         meta_value: meta_value,
         save_message : save_message,
         nonce : nonce
      };
	   
	   

      $.ajax({
         type : "post",
         dataType : "json",
         url : myAjax.ajaxurl,
         data : mul_data,
         success: function(response) {
            console.log(response.html);
            $( '.postid-1302 input.quiz-submit.complete' ).show();
            message_container.html(response.save_message);
         }
      });

   });   
   
   $(".reset-user-info").click( function() {
      meta_key = $(this).parent().find('.mca_user_field').data("meta_key");
      meta_value = '';
      save_message = $(this).data('message');
      nonce = $(this).data('nonce');
      message_container = $(this).parent().find('.mca_user_message');
	  
	  $(this).parent().find('.mca_user_field').val('');

      var mul_data = {
         action: "save_mca_user_information",
         meta_key : meta_key,
         meta_value: meta_value,
         save_message : save_message,
         nonce : nonce
      };

      $.ajax({
         type : "post",
         dataType : "json",
         url : myAjax.ajaxurl,
         data : mul_data,
         success: function(response) {
            console.log(response.html);
            $( '.postid-1302 input.quiz-submit.complete' ).hide();
            message_container.html(response.save_message);
         }
      });

   });

   $('.mca_user_field').focus(function(){
      $(this).parent().find('.mca_user_message').html('');
   });

});

// Find all YouTube videos
var $allVideos = jQuery("iframe[src^='//www.youtube.com']"),

    // The element that is fluid width
    $fluidEl = jQuery(".post-content");
// Figure out and save aspect ratio for each video
$allVideos.each(function() {
  jQuery(this)
    .data('aspectRatio', this.height / this.width)
    // and remove the hard coded width/height
    .removeAttr('height')
    .removeAttr('width');

});

// When the window is resized
jQuery(window).resize(function($) {

  var newWidth = $fluidEl.width();
  // Resize all videos according to their own aspect ratio
  $allVideos.each(function() {
    var $el = $(this);
    $el
      .width(newWidth)
      .height(newWidth * $el.data('aspectRatio'));

      console.log($(this).data('aspectRatio'));
  });

// Kick off one resize to fix all videos on page load
}).resize();
