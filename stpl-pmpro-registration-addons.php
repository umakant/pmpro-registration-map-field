<?php
/*
Plugin Name: STPL PMPro Registration Fields Addon
Plugin URI: https://www.paidmembershipspro.com/wp/pmpro-customizations/
Description: Customizations for PM Pro plugin by STPL
Version: .1
Author: STPL
Author URI: https://www.stpl.biz/
*/

function stpl_pmpro_enqueue_script() {
    wp_enqueue_script( 'stpl_pmpro_script', plugin_dir_url( __FILE__ ) . 'js/stpl_pmpro_register.js' );
}

function stpl_pmpro_enqueue_style() {
    wp_enqueue_style( 'stpl_pmpro_style', plugin_dir_url( __FILE__ ) . 'css/stpl_pmpro_style.css' );
}

add_action('wp_enqueue_scripts', 'stpl_pmpro_enqueue_script');
add_action('wp_enqueue_scripts', 'stpl_pmpro_enqueue_style');

function stpl_function_addon( ) {
    //don't break if Register Helper is not loaded
    if( ! function_exists ( 'pmprorh_add_registration_field' ) ) {
        return false;
    }

    //define the fields
    $fields = array();

    $fields[] = new PMProRH_Field (
        'brief_description',
        'textarea',
        array(
            'label' => 'Brief Description',
            'profile' => true,
            'required' => true,
    ));


    $fields[] = new PMProRH_Field (
        'website_url',
        'text',
        array(
            'label' => 'Website URL',
            'profile' => true,
            'required' => true,
    ));

    $fields[] = new PMProRH_Field (
        'what_your_location_div',
        'html',
        array(
            'label' => 'List of Services Offered',
            'html' => '<table id="addService">
            <tr>
                <td>Services </td>
                <td><input type="text" name="services[]" value=""></td>
            </tr>
        </table>
        <br />
        <button type="button" id="list_services">Add new Service</button>',
    ));


    $fields[] = new PMProRH_Field (
        'hours_operation',
        'html',
        array(
            'label' => 'Hours of Operation',
            'html' => '<table id="addHours">
                <tr>
                    <td>Sunday</td>
                    <td>
                        <input type="checkbox" value="1" id="sunday_checked">
                        <div class="sunday_hide hours_field">
                            <input type="text" name="hours_operation_start[]" class="sunday_input" value="" placeholder="Start Hours">
                            <input type="text" name="hours_operation_end[]" class="sunday_input" value="" placeholder="End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Monday</td>
                    <td>
                        <input type="checkbox" value="1" id="monday_checked">
                        <div class="monday_hide">
                            <input type="text" name="hours_operation_start[]" class="monday_input" value="" placeholder="Start Hours">
                            <input type="text" name="hours_operation_end[]" class="monday_input" value="" placeholder="End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td>
                        <input type="checkbox" value="1" id="tuesday_checked">
                        <div class="tuesday_hide">
                            <input type="text" name="hours_operation_start[]" class="tuesday_input" value="" placeholder="Enter Start Hours">
                            <input type="text" name="hours_operation_end[]" class="tuesday_input" value="" placeholder="Enter End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td>
                        <input type="checkbox" value="1" id="wednesday_checked">
                        <div class="wednesday_hide">
                            <input type="text" name="hours_operation_start[]" class="wednesday_input" value="" placeholder="Enter Start Hours">
                            <input type="text" name="hours_operation_end[]" class="wednesday_input" value="" placeholder="Enter End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td>
                        <input type="checkbox" value="1" id="thursday_checked">
                        <div class="thursday_hide">
                            <input type="text" name="hours_operation_start[]" class="thursday_input" value="" placeholder="Enter Start Hours">
                            <input type="text" name="hours_operation_end[]" class="thursday_input" value="" placeholder="Enter End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td>
                        <input type="checkbox" value="1" id="friday_checked">
                        <div class="friday_hide">
                            <input type="text" name="hours_operation_start[]" class="friday_input" value="" placeholder="Enter Start Hours">
                            <input type="text" name="hours_operation_end[]" class="friday_input" value="" placeholder="Enter End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td>
                        <input type="checkbox" value="1" id="saturday_checked">
                        <div class="saturday_hide">
                            <input type="text" name="hours_operation_start[]" class="saturday_input" value="" placeholder="Enter Start Hours">
                            <input type="text" name="hours_operation_end[]" class="saturday_input" value="" placeholder="Enter End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                </tr>
            </table>',
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


function insert_values_pmpro() {
    $user_id = get_current_user_id();
    $services = serialize($_POST['services']);
    $hours_operation_start = serialize($_POST['hours_operation_start']);
    $hours_operation_end = serialize($_POST['hours_operation_end']);
    update_user_meta($user_id,'services', $services);
    update_user_meta($user_id,'hours_operation_start', $hours_operation_start);
    update_user_meta($user_id,'hours_operation_end', $hours_operation_end);
}

add_action( 'pmpro_after_checkout', 'insert_values_pmpro' );

?>