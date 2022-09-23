<?php
// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * script load
 */ 
function child_sober_scripts() {
	wp_enqueue_style( 'child-sober', get_stylesheet_directory_uri() . '/style.css', array(), the_time() );
	wp_enqueue_script( 'child-script', get_stylesheet_directory_uri() . '/js/child-theme-script.js', array('jquery'), '', true );
}
add_action( 'wp_enqueue_scripts', 'child_sober_scripts' );

/**
 * move coupon code
 */ 
remove_action( 'woocommerce_before_checkout_form', 'woocommerce_checkout_coupon_form');
add_action( 'woocommerce_review_order_after_order_total_coupon', 'woocommerce_checkout_coupon_form', 20 );

/**
 * serialize woocommerce checkout fields
 */ 
function beibi_email_first( $checkout_fields ) {
	$checkout_fields['billing']['billing_email']['priority']     = 20;
	$checkout_fields['billing']['billing_phone']['priority']     = 21;
	$checkout_fields['billing']['billing_address_1']['priority'] = 22;
	$checkout_fields['billing']['billing_address_2']['priority'] = 23;
	$checkout_fields['billing']['billing_city']['priority']      = 24;
	$checkout_fields['billing']['billing_country']['priority']   = 75;

   $checkout_fields['billing']['billing_first_name']['label']   = "First Name";

	return $checkout_fields;
}
add_filter( 'woocommerce_checkout_fields', 'beibi_email_first', 999 );

/**
 * Hide the Company Name Field from the Checkout Page
 */ 
function remove_company_name( $fields ) {
	unset($fields['billing']['billing_company']);
	return $fields;
}
add_filter( 'woocommerce_checkout_fields' , 'remove_company_name' );


/**
 * Place order button
 */ 
function output_payment_button()
{
   $order_button_text = apply_filters('woocommerce_order_button_text', __('Place order', 'woocommerce'));
   echo '<input type="submit" class="button alt" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr($order_button_text) . '" data-value="' . esc_attr($order_button_text) . '" />';
}

add_action('woocommerce_review_order_after_order_total', 'output_payment_button', 30);

function remove_woocommerce_order_button_html()
{
   return '';
}

add_filter('woocommerce_order_button_html', 'remove_woocommerce_order_button_html');

/**
 * Moving Terms and Conditions checkbox above Payments
 */ 
function zn_kc_move_terms_and_conditions()
{
   ?>
   <p class="form-row terms wc-terms-and-conditions">
      <input type="checkbox" class="input-checkbox" name="terms" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms'] ) ), true ); ?> id="terms" />
      <label for="terms" class="checkbox"><?php printf( __( 'I&rsquo;ve read and accept the <a href="%s" target="_blank">terms &amp; conditions</a>', 'woocommerce' ), esc_url( wc_get_page_permalink( 'terms' ) ) ); ?> <span class="required">*</span></label>
      <input type="hidden" name="terms-field" value="1" />
   </p>
   <?php
}
add_action('woocommerce_review_order_after_order_total', 'zn_kc_move_terms_and_conditions', 25);

/**
 * checkout terms and conditions
 */ 
remove_action('woocommerce_checkout_terms_and_conditions','wc_checkout_privacy_policy_text', 20);
remove_action('woocommerce_checkout_terms_and_conditions','wc_terms_and_conditions_page_content', 30);
add_action('woocommerce_checkout_after_terms_and_conditions','wc_checkout_privacy_policy_text');
add_action('woocommerce_checkout_after_terms_and_conditions','wc_terms_and_conditions_page_content');




