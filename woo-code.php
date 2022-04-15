<?php 

//Function to add stuff to woo commerce archive page items
function bmsg_add_to_shop_item_pic() { ?>
    <div class="art-info"> 
      <?php if(get_field('art_medium')) { ?>
        <p class="art-detail"><span>Medium: </span> <?php the_field('art_medium') ?></p>
      <?php } ?>
      <?php if(get_field('art_size')) { ?>
        <p class="art-detail"><span>Size: </span> <?php the_field('art_size') ?></p>
      <?php } ?>
      <?php if(get_field('number_available')) { ?>
        <!-- We may be able to write a function and tie to stock level -->
        <p class="art-detail"><span>Available: </span> <?php the_field('number_available') ?></p>
      <?php } ?>
    </div>
  <?php
}

//Add the action to single product page
add_action( 'woocommerce_single_product_summary', 'bmsg_add_to_shop_item_pic', 5);

//Add the action to archive page
add_action( 'woocommerce_after_shop_loop_item_title', 'bmsg_add_to_shop_item_pic', 1 );

//Function to show sold notice in archive if product is marked out-of-stock 
add_action( 'woocommerce_before_shop_loop_item_title', 'bmsg_display_sold_out_loop_woocommerce' );
 
function bmsg_display_sold_out_loop_woocommerce() {
    global $product;
    if ( ! $product->is_in_stock() ) {
        echo '<span class="woo-sold-notice">Sold</span>';
    }
} 
function addColClass() { ?>
<script>
  jQuery(document).ready(function($) {
    console.log('alter class loaded');
  var alterClass = function() {
    var ww = document.body.clientWidth;
    if (ww < 1024) {
      $('.products').removeClass('blue');
    } else if (ww >= 1024) {
      $('.products').addClass('blue');
    };
  };
  $(window).resize(function(){
    alterClass();
  });
  //Fire it when the page first loads:
  alterClass();
});

</script>

<?php }
add_action('wp_footer', 'addColClass'); 

