<?php
/**
 * The template for displaying demo plugin content.
 *
 * Override this template by copying it to yourtheme/dc-product-vendor/emails/vendor-new-order.php
 *
 * @author 		WC Marketplace
 * @package 	dc-product-vendor/Templates
 * @version   0.0.1
 */
if (!defined('ABSPATH'))
    exit; // Exit if accessed directly 
global $WCMp;
$vendor = get_wcmp_vendor(absint($vendor_id));
do_action( 'woocommerce_email_header', $email_heading, $email );
?>

<p><?php printf(__('Um novo pedido foi recebido e marcado como "processando" de %s. Descrição do pedido:', 'dc-woocommerce-multi-vendor'), $order->get_billing_first_name() . ' ' . $order->get_billing_last_name()); ?></p>

<?php do_action('woocommerce_email_before_order_table', $order, true, false); ?>
<table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
    <thead>
        <tr>
            <?php do_action('wcmp_before_vendor_order_table_header', $order, $vendor->term_id); ?>
            <th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Produto', 'dc-woocommerce-multi-vendor'); ?></th>
            <th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Quantidade', 'dc-woocommerce-multi-vendor'); ?></th>
            <th scope="col" style="text-align:left; border: 1px solid #eee;"><?php _e('Comissão', 'dc-woocommerce-multi-vendor'); ?></th>
            <?php do_action('wcmp_after_vendor_order_table_header', $order, $vendor->term_id); ?>
        </tr>
    </thead>
    <tbody>
        <?php
        $vendor->vendor_order_item_table($order, $vendor->term_id);

        ?>
    </tbody>
</table>
<?php
if (apply_filters('show_cust_order_calulations_field', true, $vendor->id)) {
    ?>
    <table cellspacing="0" cellpadding="6" style="width: 100%; border: 1px solid #eee;" border="1" bordercolor="#eee">
        <?php
        $totals = $vendor->wcmp_vendor_get_order_item_totals($order, $vendor->term_id);
        if ($totals) {
            foreach ($totals as $total_key => $total) {
                ?><tr>
                    <th scope="row" colspan="2" style="text-align:left; border: 1px solid #eee;"><?php echo $total['label']; ?></th>
                    <td style="text-align:left; border: 1px solid #eee;"><?php echo $total['value']; ?></td>
                </tr><?php
            }
        }
        ?>
    </table>
    <?php
}
if (apply_filters('show_cust_address_field', true, $vendor->id)) {
    ?>
    <h2><?php _e('Detalhes do CLiente', 'dc-woocommerce-multi-vendor'); ?></h2>
    <?php if ($order->get_billing_email()) { ?>
        <p><strong><?php _e('Nome:', 'dc-woocommerce-multi-vendor'); ?></strong> <?php echo $order->get_billing_first_name() . ' ' . $order->get_billing_last_name(); ?></p>
        <p><strong><?php _e('E-mail:', 'dc-woocommerce-multi-vendor'); ?></strong> <?php echo $order->get_billing_email(); ?></p>
    <?php } ?>
    <?php if ($order->get_billing_phone()) { ?>
        <p><strong><?php _e('Telefone:', 'dc-woocommerce-multi-vendor'); ?></strong> <?php echo $order->get_billing_phone(); ?></p>
    <?php
    }
}
if (apply_filters('show_cust_billing_address_field', true, $vendor->id)) {
    ?>
    <table cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">
        <tr>
            <td valign="top" width="50%">
                <h3><?php _e('Endereço de Cobrança', 'dc-woocommerce-multi-vendor'); ?></h3>
                <p><?php echo $order->get_formatted_billing_address(); ?></p>
            </td>
        </tr>
    </table>
    <?php }
?>

<?php if (apply_filters('show_cust_shipping_address_field', true, $vendor->id)) { ?> 
    <?php if (( $shipping = $order->get_formatted_shipping_address())) { ?>
        <table cellspacing="0" cellpadding="0" style="width: 100%; vertical-align: top;" border="0">
            <tr>
                <td valign="top" width="50%">
                    <h3><?php _e('Endereço de Entrega', 'dc-woocommerce-multi-vendor'); ?></h3>
                    <p><?php echo $shipping; ?></p>
                </td>
            </tr>
        </table>
    <?php
    }
}
?>



<?php do_action('wcmp_email_footer'); ?>