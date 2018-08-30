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
        'list_of_services',
        'textarea',
        array(
            'label' => 'List of Services Offered',
            'profile' => true,
            'required' => true,
    ));

    $fields[] = new PMProRH_Field (
        'hours_operation',
        'html',
        array(
            'label' => 'Hours of Operation',
            'html' => '<table id="addHours" border="1">
                <tr>
                    <td>Sunday</td>
                    <td>
                        <input type="text" name="hours_operation_start[]" value="" placeholder="Enter Start Hours">
                        <input type="text" name="hours_operation_end[]" value="" placeholder="Enter End Hours">
                    </td>
                </tr>
                <tr>
                    <td>Monday</td>
                    <td>
                        <input type="text" name="hours_operation_start[]" value="" placeholder="Enter Start Hours">
                        <input type="text" name="hours_operation_end[]" value="" placeholder="Enter End Hours">
                    </td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td>
                        <input type="text" name="hours_operation_start[]" value="" placeholder="Enter Start Hours">
                        <input type="text" name="hours_operation_end[]" value="" placeholder="Enter End Hours">
                    </td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td>
                        <input type="text" name="hours_operation_start[]" value="" placeholder="Enter Start Hours">
                        <input type="text" name="hours_operation_end[]" value="" placeholder="Enter End Hours">
                    </td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td>
                        <input type="text" name="hours_operation_start[]" value="" placeholder="Enter Start Hours">
                        <input type="text" name="hours_operation_end[]" value="" placeholder="Enter End Hours">
                    </td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td>
                        <input type="text" name="hours_operation_start[]" value="" placeholder="Enter Start Hours">
                        <input type="text" name="hours_operation_end[]" value="" placeholder="Enter End Hours">
                    </td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td>
                        <input type="text" name="hours_operation_start[]" value="" placeholder="Enter Start Hours">
                        <input type="text" name="hours_operation_end[]" value="" placeholder="Enter End Hours">
                    </td>
                </tr>
                <tr>
                </tr>
            </table>',
    ));

    $fields[] = new PMProRH_Field (
        'what_your_location_div',
        'html',
        array(
            'label' => 'List of Services Offered',
            'html' => '<table id="addService" border="1">
            <tr>
                <td>Services</td>
                <td><input type="text" name="services[]" value=""></td>
                <td><input type="text" name="services[]" value=""></td>
                <td><input type="text" name="services[]" value=""></td>
                <td><input type="text" name="services[]" value=""></td>
            </tr>
        </table>
        <br />
        <button type="button" onclick="displayResult()">Add new Service</button>',
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