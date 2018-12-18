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
//
//
//
//

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
    $items['premium-support'] = 'Afropolitan Passport';
    return $items;
}

add_filter( 'woocommerce_account_menu_items', 'bbloomer_add_premium_support_link_my_account' );


// ------------------
// 4. Add content to the new endpoint

function bbloomer_premium_support_content() {
echo '<h3>Afrpolitan Passport</h3><p>A cada compra que fizer no site, você adquire 1 ponto no Afropolitan Passport.</p>';
echo do_shortcode( '[gamipress_points type="passport-points"]' );
}

add_action( 'woocommerce_account_premium-support_endpoint', 'bbloomer_premium_support_content' );
// Note: add_action must follow 'woocommerce_account_{your-endpoint-slug}_endpoint' format
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

