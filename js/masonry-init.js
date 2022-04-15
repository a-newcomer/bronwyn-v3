//SEE masonry script in functions.php
jQuery(function($) {
    // init Masonry
    console.log('masonry loaded');
    var $grid = $('.gallery-content').masonry({
        // options
        itemSelector: '.gallery-item',
        columnWidth: '.gallery-item',
        percentPosition: true
    });
    // layout Masonry after each image loads
    $grid.imagesLoaded().progress( function() {
        $grid.masonry('layout');
    });
});