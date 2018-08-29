<?php
/*
Plugin Name: STPL PMPro Registration Fields Addon
Plugin URI: https://www.paidmembershipspro.com/wp/pmpro-customizations/
Description: Customizations for PM Pro plugin by STPL
Version: .1
Author: STPL
Author URI: https://www.stpl.biz/
*/

function stpl_function_addon( ) {
    //don't break if Register Helper is not loaded
    if( ! function_exists ( 'pmprorh_add_registration_field' ) ) {
        return false;
    }

    //define the fields
    $fields = array();

    $fields[] = new PMProRH_Field (
        'what_your_business',
        'text',
        array(
            'label' => 'What your business',
            'profile' => true,
            'required' => true,
    ));

    $fields[] = new PMProRH_Field (
        'what_your_location_div',
        'html',
        array(
            'label' => 'What your location',
            'html' => '<div id="map_canvas"></div>',
    ));

    //add the fields into a new checkout_boxes are of the checkout page
    foreach( $fields as $field ) {
        pmprorh_add_registration_field(
            'after_billing_fields', // location on checkout page
            $field            // PMProRH_Field object
        );
    }
}
add_action( 'init', 'stpl_function_addon' );


?>