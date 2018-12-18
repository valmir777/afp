<?php
/**
 * @package CityBook - Directory Listing WordPress Theme
 * @author CTHthemes - http://themeforest.net/user/cththemes
 * @date 17-04-2018
 * @since 1.0.0
 * @version 1.0.0
 * @copyright Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license GNU General Public License version 3 or later; see LICENSE
 */
// Your php code goes here
function citybook_child_enqueue_styles() {
    $parent_style = 'citybook-style'; // This is 'citybook-style' for the Anakual theme.
    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css', array('citybook-fonts', 'font-awesome', 'lightgallery', 'slick','citybook-plugins'), null );
    wp_enqueue_style( 'citybook-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style , 'citybook-color'),
        wp_get_theme()->get('Version')
    );

	wp_enqueue_script ( 'custom-js', get_site_url() . '/wp-content/themes/citybook-child/js/custom-js.js', array('jquery'),'1.4', true );
	
}
add_action( 'wp_enqueue_scripts', 'citybook_child_enqueue_styles' );

function citybook_child_modify_footer(){
    // if(is_page(551) || is_page(2170) || is_page(2172) || is_page(2185) || is_page(2193) || is_page(2196) || is_singular( 'listing' )){
    if(!is_page(531) && !is_page(294) && !is_page(547) && !is_page(545) && !is_page(116) && !is_page(1624) && !is_page(920) && !is_page(553) && !is_page(697) && !is_page(2321) ){
    ?>
    <!--section -->
    <section class="gradient-bg">
        <div class="cirle-bg">
            <div class="bg" data-bg="<?php echo get_template_directory_uri();?>/assets/images/bg/circle.png"></div>
        </div>
        <div class="container">
            <div class="join-wrap fl-wrap">
                <div class="row">
                    <div class="col-md-8">
                        <h3>Join our online community</h3>
                        <p>Grow your marketing and be happy with your online business</p>
                    </div>
                    <div class="col-md-4 text-center"><a href="#" class="join-wrap-btn logreg-modal-open">Sign Up <i class="fa fa-sign-in"></i></a></div>
                </div>
            </div>
        </div>
    </section>
    <!-- section end -->
<?php
    }
}

// add_action( 'citybook_footer_before', 'citybook_child_modify_footer');


add_action( 'woocommerce_before_main_content', 'bbloomer_custom_action', 15 );

function bbloomer_custom_action() {
    echo '<div class="woocommerce-product-gallery" style="background: none; padding: 1em 2em">';
    echo '<span><img src="https://afropolitan.brzeelab.com/wp-content/uploads/2018/10/back-arrow.png" onclick="goBack()" style="cursor: pointer"></span>';
    echo '</div>';
}


function back_bt() {
    if( wp_script_is( 'jquery', 'done' ) ) {
    ?>
    <script type="text/javascript">
      // script dependent on jQuery
      function goBack() {
        window.history.back();
      }
    </script>
    <?php
    }
}
add_action( 'wp_footer', 'back_bt' );

function my_woocommerce_continue_shopping_redirect( $return_to ) {
    return get_permalink( wc_get_page_id( 'shop' ) );
}
add_filter( 'woocommerce_continue_shopping_redirect', 'my_woocommerce_continue_shopping_redirect', 20 );




//Mudar nomes das Tabs Minha Conta
//


//Wallet
add_filter( 'woocommerce_account_menu_items', 'bbloomer_remove_wallet', 999 );

function bbloomer_remove_wallet( $items ) {
unset($items['woo-wallet']);
return $items;
}



add_filter( 'woocommerce_account_menu_items', 'bbloomer_rename_wallet', 999 );

function bbloomer_rename_wallet( $items ) {
$items['woo-wallet'] = ' Carteira Digital';
return $items;
}


// Perguntas
add_filter( 'woocommerce_account_menu_items', 'bbloomer_remove_address_my_account', 999 );

function bbloomer_remove_address_my_account( $items ) {
unset($items['inquiry']);
return $items;
}



add_filter( 'woocommerce_account_menu_items', 'bbloomer_rename_address_my_account', 999 );

function bbloomer_rename_address_my_account( $items ) {
$items['inquiry'] = 'Perguntas';
return $items;
}



//Sair
add_filter( 'woocommerce_account_menu_items', 'bbloomer_remove_logout', 999 );

function bbloomer_remove_logout( $items ) {
unset($items['customer-logout']);
return $items;
}



add_filter( 'woocommerce_account_menu_items', 'bbloomer_rename_logout', 999 );

function bbloomer_rename_logout( $items ) {
$items['customer-logout'] = 'Sair';
return $items;
}



/**
 * @snippet       WooCommerce Add New Tab @ My Account
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=21253
 * @credits       https://github.com/woothemes/woocommerce/wiki/2.6-Tabbed-My-Account-page
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.4.5
 */


// ------------------
// 1. Register new endpoint to use for My Account page
// Note: Resave Permalinks or it will give 404 error

function bbloomer_add_premium_support_endpoint() {
    add_rewrite_endpoint( 'passport', EP_ROOT | EP_PAGES );
}

add_action( 'init', 'bbloomer_add_premium_support_endpoint' );


// ------------------
// 2. Add new query var

function bbloomer_premium_support_query_vars( $vars ) {
    $vars[] = 'passport';
    return $vars;
}

add_filter( 'query_vars', 'bbloomer_premium_support_query_vars', 0 );


// ------------------
// 3. Insert the new endpoint into the My Account menu

function bbloomer_add_premium_support_link_my_account( $items ) {
    $items['passport'] = 'Passport';
    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'bbloomer_add_premium_support_link_my_account' );


// ------------------
// 4. Add content to the new endpoint

function bbloomer_premium_support_content() {
echo '<h3>Passport</h3><p>A cada compra que fizer no site, você adquire 1 ponto no Afropolitan Passport.</p><br><h3>Você tem:</h3>';
echo do_shortcode( '[gamipress_points type="passport-points"]' );
}

add_action( 'woocommerce_account_passport_endpoint', 'bbloomer_premium_support_content' );
// Note: add_action must follow 'woocommerce_account_{your-endpoint-slug}_endpoint' format

/**
 * @snippet       Automatically Update Cart on Quantity Change - WooCommerce
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=73470
 * @author        Rodolfo Melogli
 * @compatible    Woo 3.4
 */
 
add_action( 'wp_footer', 'bbloomer_cart_refresh_update_qty' ); 
 
function bbloomer_cart_refresh_update_qty() { 
    if (is_cart()) { 
        ?> 
        <script type="text/javascript"> 
            jQuery('div.woocommerce').on('change', 'input.qty', function(){ 
                jQuery("[name='update_cart']").trigger("click"); 
            }); 
        </script> 
        <?php 
    } 
}


function add_this_script_footer(){ ?>

<script>
$(function () {
	var parent = $("#shuffle, #shuffle-b");
	var divs = parent.children();
	while (divs.length) {
		parent.append(divs.splice(Math.floor(Math.random() * divs.length), 1)[0]);
	}
});
	
	
</script>

<?php } 

add_action('wp_footer', 'add_this_script_footer');

/**
 * @snippet       Remove Add Cart, Add View Product @ WooCommerce Loop
 * @how-to        Watch tutorial @ https://businessbloomer.com/?p=19055
 * @sourcecode    https://businessbloomer.com/?p=20721
 * @author        Rodolfo Melogli
 * @testedwith    WooCommerce 3.1.1
 */
 
// First, remove Add to Cart Button
 
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10 );
 
// Second, add View Product Button
 
//add_action( 'woocommerce_after_shop_loop_item', 'bbloomer_view_product_button', 10);
 
//function bbloomer_view_product_button() {
//global $product;
//$link = $product->get_permalink();
//echo '<a href="' . $link . '" class="button addtocartbutton">Ver Produto</a>';
//}

function top_detect_page() {
    if(is_page(4236)){
		?> <style>
			
			header.main-header, footer.citybook-footer {
				background: #001b24; /* Old browsers */
                background: -moz-linear-gradient(left, #001b24 9%, #221f21 97%); /* FF3.6-15 */
				background: -webkit-linear-gradient(left, #001b24 9%,#221f21 97%); /* Chrome10-25,Safari5.1-6 */
				background: linear-gradient(to right, #001b24 9%,#221f21 97%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001b24', endColorstr='#221f21',GradientType=1 ); /* IE6-9 */ 
			}
		    .sub-footer { background-color: rgba(19,33,40,0.96); }
			</style>
		<?php
	}
	 if(is_page(3978) || is_page(4796)){
		?> <style>
			
			header.main-header, footer.citybook-footer {
				background: #54b947; /* Old browsers */
				background: -moz-linear-gradient(left, #54b947 9%, #aed036 97%); /* FF3.6-15 */
				background: -webkit-linear-gradient(left, #54b947 9%,#aed036 97%); /* Chrome10-25,Safari5.1-6 */
				background: linear-gradient(to right, #54b947 9%,#aed036 97%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#54b947', endColorstr='#aed036',GradientType=1 ); /* IE6-9 */ 
			}
		    .sub-footer { background-color: rgba(19,33,40,0.96); }
			.nav-holder nav li.current-menu-item>a {
				color: #522d86;
			}
			
			.nav-holder nav li a:hover {
				color: #522d86;
			}
			.header-search {
				display: none;
			}
			.nav-holder nav > ul > li.current-menu-item > a:before, .nav-holder nav > ul > li.current-menu-parent > a:before, 
			.nav-holder nav > ul > li.current-menu-ancestor > a:before, .nav-holder nav li a.act-link:before {
				background: #522d86;
			}
			</style>
		<?php
	}
}
add_action( 'wp_head', 'top_detect_page' );


