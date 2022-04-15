var $ = jQuery.noConflict();
$(document).ready(function() {
  console.log('cutom popup script connected')
  $('.gallery-content').magnificPopup({
    delegate: 'a', // child items selector, by clicking on it popup will open
    type: 'image',
    closeBtnInside: false,
    gallery: {
      enabled: true,
      navigateByImageClick: true
    }
    // other options
  });
});