<?php
/**
 * The template for displaying demo plugin content.
 *
 * Override this template by copying it to yourtheme/dc-product-vendor/emails/new-admin-product.php
 *
 * @author 		WC Marketplace
 * @package 	dc-product-vendor/Templates
 * @version   0.0.1
 */


if ( !defined( 'ABSPATH' ) ) exit; 
global $WCMp;
?>

<?php do_action( 'woocommerce_email_header', $email_heading, $email ); ?>

	<p><?php printf( __( "Olá! Isto é para notificar que um novo produto foi submetido em %s.",  'dc-woocommerce-multi-vendor' ), get_option( 'blogname' ) ); ?></p>

	<p>
		<?php printf( __( "Título do Produto: %s",  'dc-woocommerce-multi-vendor' ), $product_name ); ?><br/>
		<?php printf( __( "Enviado por: %s",  'dc-woocommerce-multi-vendor' ), 'Site Administrator' ); ?><br/>
		<?php 
			if($submit_product) {
				printf( __( "Editar produto: %s",  'dc-woocommerce-multi-vendor' ), admin_url( 'post.php?post=' . $post_id . '&action=edit' ) ); 
			} else {
				printf( __( "Ver Produto: %s",  'dc-woocommerce-multi-vendor' ), get_permalink($post_id)); 
			}
		?>
		<br/>
	</p>

<?php do_action( 'wcmp_email_footer' ); ?>