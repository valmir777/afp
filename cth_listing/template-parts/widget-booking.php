<?php
/**
 * @package CityBook Add-Ons
 * @description A custom plugin for CityBook - Directory Listing WordPress Theme
 * @author CTHthemes - http://themeforest.net/user/cththemes
 * @date 25-07-2018
 * @version 1.2.2
 * @copyright Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license GNU General Public License version 3 or later; see LICENSE
 */



?>
<!--box-widget-item -->
<div class="box-widget-item fl-wrap" id="listing-booking-widget">
    <div class="box-widget-item-header">
        <h3><?php esc_html_e( 'Book a Reservation: ', 'citybook-add-ons' ); ?></h3>
    </div>
    <div class="box-widget opening-hours">
        <div class="box-widget-content">
            <form class="listing-booking-form custom-form">

                <fieldset>
                <?php if ( !is_user_logged_in() ) { ?>
                    <label><i class="fa fa-user-o"></i></label>
                    <input name="lb_name" class="has-icon" type="text" placeholder="<?php esc_attr_e( 'Your Name*', 'citybook-add-ons' ); ?>" value="" required="required">
                    <div class="clearfix"></div>
                    <label><i class="fa fa-envelope-o"></i></label>
                    <input name="lb_email" class="has-icon" type="text" placeholder="<?php esc_attr_e( 'Email Address*', 'citybook-add-ons' ); ?>" value="" required="required">
                    <label><i class="fa fa-phone"></i></label>
                    <input name="lb_phone" class="has-icon" type="text" placeholder="<?php esc_attr_e( 'Phone', 'citybook-add-ons' ); ?>" value="">
                <?php } ?>
                    <div class="quantity fl-wrap clearfix">
                        <span><i class="fa fa-user-plus"></i><?php esc_html_e( 'Persons: ', 'citybook-add-ons' ); ?></span>
                        <div class="quantity-item" data-min="1">
                            <input type="button" value="-" class="minus">
                            <input type="text" name="lb_quantity" value="1" class="qty" size="4" required="required">
                            <input type="button" value="+" class="plus">
                        </div>

                    </div>
                    <label><i class="fa fa-phone"></i></label>
                    <input name="lb_phone" class="has-icon" type="text" placeholder="<?php esc_attr_e( 'Phone', 'citybook-add-ons' ); ?>" value="">
                    <div class="row">
                        <div class="col-md-6">
                            <label><i class="fa fa-calendar-check-o"></i></label>
                            <input name="lb_date" type="text" placeholder="<?php esc_attr_e( 'Date', 'citybook-add-ons' ); ?>" class="datepicker has-icon" data-large-mode="true" data-large-default="true" value=""  required="required">
                        </div>
                        <div class="col-md-6">
                            <label><i class="fa fa-clock-o"></i></label>
                            <input name="lb_time"  type="text" placeholder="<?php esc_attr_e( 'Time', 'citybook-add-ons' ); ?>" class="timepicker has-icon" data-init-set="true" value="" required="required">
                        </div>
                    </div>

                    <textarea name="lb_add_info" cols="40" rows="3" placeholder="<?php esc_attr_e( 'Additional Information:', 'citybook-add-ons' ); ?>"></textarea>
                </fieldset>
                <input type="hidden" name="slid" value="<?php echo get_the_ID() ?>">
                <button class="btn big-btn color-bg flat-btn lbooking-submit" type="submit"><?php esc_html_e( 'Book Now', 'citybook-add-ons' ); ?><i class="fa fa-angle-right"></i></button>
            </form>
        </div>
    </div>
</div>
<!--box-widget-item end -->
