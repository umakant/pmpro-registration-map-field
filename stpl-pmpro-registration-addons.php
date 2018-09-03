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


function stpl_pmpro_enqueue_time_picker_script() {
    wp_enqueue_script( 'stpl_pmpro_time_picker_script', plugin_dir_url( __FILE__ ) . 'js/jquery.timepicker.js' );
}

function stpl_pmpro_enqueue_time_picker_style() {
    wp_enqueue_style( 'stpl_pmpro_time_picker_style', plugin_dir_url( __FILE__ ) . 'css/jquery.timepicker.css' );
}

add_action('wp_enqueue_scripts', 'stpl_pmpro_enqueue_time_picker_script');
add_action('wp_enqueue_scripts', 'stpl_pmpro_enqueue_time_picker_style');

function wpse_enqueue_datepicker() {
    wp_enqueue_script( 'jquery-ui-datepicker' );

    wp_register_style( 'jquery-ui', 'http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css' );
    wp_enqueue_style( 'jquery-ui' );  
}
add_action( 'wp_enqueue_scripts', 'wpse_enqueue_datepicker' );

function stpl_function_addon( ) {
    //don't break if Register Helper is not loaded
    if( ! function_exists ( 'pmprorh_add_registration_field' ) ) {
        return false;
    }

    //define the fields
    $fields = array();

    $fields[] = new PMProRH_Field (
        'business_name',
        'text',
        array(
            'label' => 'Business Name',
            'profile' => true,
            'required' => true,
    ));

    $fields[] = new PMProRH_Field (
        'business_category',
        'select',
        array(
            'label' => 'Business Category',
            'profile' => true,
            'required' => true,
            'options' => array(
                'web_development' => 'Web Development',
                'angular_development' => 'Angular Development',
                'app_development' => 'App Development'
            )
    ));


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
                <td>Service Primary category</td>
                <td><input type="text" name="services_primary" value=""></td>
            <tr>
            <tr>
                <td>Secondary Services </td>
                <td><input type="text" name="services[]" value=""></td>
            </tr>
        </table>
        <br />
        <span class="add_new_service" id="list_services">Add New Service(+)</span>',
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
                        <div class="check_days">
                            <input type="checkbox" value="1" id="sunday_checked">
                        </div>
                        <div class="sunday_hide hours_field">
                            <input type="text" name="hours_operation_start[]" class="sunday_input" id="sun_start_hrs" value="" placeholder="Start Hours">
                            <input type="text" name="hours_operation_end[]" id="sun_end_hrs" class="sunday_input" value="" placeholder="End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Monday</td>
                    <td>
                        <div class="check_days">
                            <input type="checkbox" value="1" id="monday_checked">
                        </div>
                        <div class="monday_hide hours_field">
                            <input type="text" name="hours_operation_start[]" class="monday_input" id="mon_start_hrs" value="" placeholder="Start Hours">
                            <input type="text" name="hours_operation_end[]" class="monday_input" id="mon_end_hrs" value="" placeholder="End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Tuesday</td>
                    <td>
                        <div class="check_days">
                            <input type="checkbox" value="1" id="tuesday_checked">
                        </div>
                        <div class="tuesday_hide hours_field">
                            <input type="text" name="hours_operation_start[]" class="tuesday_input" id="tues_start_hrs" value="" placeholder="Start Hours">
                            <input type="text" name="hours_operation_end[]" class="tuesday_input" id="tues_end_hrs" value="" placeholder="End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Wednesday</td>
                    <td>
                        <div class="check_days">
                            <input type="checkbox" value="1" id="wednesday_checked">
                        </div>
                        <div class="wednesday_hide hours_field">
                            <input type="text" name="hours_operation_start[]" class="wednesday_input" id="wed_start_hrs" value="" placeholder="Start Hours">
                            <input type="text" name="hours_operation_end[]" class="wednesday_input" id="wed_end_hrs" value="" placeholder="End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Thursday</td>
                    <td>
                        <div class="check_days">
                            <input type="checkbox" value="1" id="thursday_checked">
                        </div>
                        <div class="thursday_hide hours_field">
                            <input type="text" name="hours_operation_start[]" class="thursday_input" id="thur_start_hrs" value="" placeholder="Start Hours">
                            <input type="text" name="hours_operation_end[]" class="thursday_input" id="thur_end_hrs" value="" placeholder="End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Friday</td>
                    <td>
                        <div class="check_days">
                            <input type="checkbox" value="1" id="friday_checked">
                        </div>
                        <div class="friday_hide hours_field">
                            <input type="text" name="hours_operation_start[]" class="friday_input" id="fri_start_hrs" value="" placeholder="Start Hours">
                            <input type="text" name="hours_operation_end[]" class="friday_input" id="fri_end_hrs" value="" placeholder="End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>Saturday</td>
                    <td>
                        <div class="check_days">
                            <input type="checkbox" value="1" id="saturday_checked">
                        </div>
                        <div class="saturday_hide hours_field">
                            <input type="text" name="hours_operation_start[]" class="saturday_input" id="sat_start_hrs" value="" placeholder="Start Hours">
                            <input type="text" name="hours_operation_end[]" class="saturday_input"  id="sat_end_hrs" value="" placeholder="End Hours">
                        </div>
                    </td>
                </tr>
                <tr>
                </tr>
            </table>',
    ));

    $fields[] = new PMProRH_Field (
        'special_hours_div',
        'html',
        array(
            'label' => 'Special Hours',
            'html' => '<table id="special_hours_table">
            <tr>
                <td>Special Hours </td>
                <td><input type="text" name="special_hours[]" id="special_hours_picker" value="" placeholder="Select Date"></td>
                <td><input type="text" name="special_start_hours[]" id="special_start_hours" value="" placeholder="Start Hours"></td>
                <td><input type="text" name="special_end_hours[]" id="special_end_hours" value="" placeholder="End Hours"></td>
            </tr>
        </table>
        <br />
        <span class="add_new_spec_hours" id="special_hours">Add New Special Hours(+)</span>',
    ));

    $fields[] = new PMProRH_Field (
        'company_logo',
        'file',
        array(
            'label' => 'Company Logo',
            'accept' => 'jpeg, jpg, png, gif',
    ));

    $fields[] = new PMProRH_Field (
        'uploads_files',
        'html',
        array(
            'label' => 'Upload Other Pictures',
            'html' => '<input type="file" name="upload_attachment[]" class="files" size="50" multiple="multiple" />',
    ));


    $fields[] = new PMProRH_Field (
        'areas_serviced',
        'text',
        array(
            'label' => 'Areas Serviced',
            'profile' => true,
            'required' => true,
    ));

    $fields[] = new PMProRH_Field (
        'year_established',
        'html',
        array(
            'label' => 'Year Established',
            'html' => '<input type="text" name="year_established[]" id="year_established" class="year_established" placeholder="Select Date"/>',
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
    $services_primary = serialize($_POST['services_primary']);
    $hours_operation_start = serialize($_POST['hours_operation_start']);
    $hours_operation_end = serialize($_POST['hours_operation_end']);
    $special_hours = serialize($_POST['special_hours']);
    $special_start_hours = serialize($_POST['special_start_hours']);
    $special_end_hours = serialize($_POST['special_end_hours']);

    if($hours_operation_start){
        update_user_meta($user_id,'hours_operation_start', $hours_operation_start);
    }
    if($hours_operation_end){
        update_user_meta($user_id,'hours_operation_end', $hours_operation_end);
    }
    if($services_primary){
        update_user_meta($user_id,'services_primary', $services_primary);
    }
    if($services){
        update_user_meta($user_id,'services', $services);
    }
    if($special_hours){
        update_user_meta($user_id,'special_hours', $special_hours);
    }
    if($special_start_hours){
        update_user_meta($user_id,'special_start_hours', $special_start_hours);
    }
    if($special_end_hours){
        update_user_meta($user_id,'special_end_hours', $special_end_hours);
    }


    if ($_FILES) {

        require_once( ABSPATH . 'wp-admin/includes/image.php' );
        require_once( ABSPATH . 'wp-admin/includes/file.php' );
        require_once( ABSPATH . 'wp-admin/includes/media.php' );


        $files = $_FILES['upload_attachment'];
        $count = 0;
        $galleryImages = array();


        foreach ($files['name'] as $count => $value) {

            if ($files['name'][$count]) {

                $file = array(
                    'name'     => $files['name'][$count],
                    'type'     => $files['type'][$count],
                    'tmp_name' => $files['tmp_name'][$count],
                    'error'    => $files['error'][$count],
                    'size'     => $files['size'][$count]
                );

                $upload_overrides = array( 'test_form' => false );
                $upload = wp_handle_upload($file, $upload_overrides);


                // $filename should be the path to a file in the upload directory.
                $filename = $upload['file'];

                // The ID of the post this attachment is for.
                $parent_post_id = $post_id;

                // Check the type of tile. We'll use this as the 'post_mime_type'.
                $filetype = wp_check_filetype( basename( $filename ), null );

                // Get the path to the upload directory.
                $wp_upload_dir = wp_upload_dir();

                // Prepare an array of post data for the attachment.
                $attachment = array(
                    'guid'           => $wp_upload_dir['url'] . '/' . basename( $filename ), 
                    'post_mime_type' => $filetype['type'],
                    'post_title'     => preg_replace( '/\.[^.]+$/', '', basename( $filename ) ),
                    'post_content'   => '',
                    'post_status'    => 'inherit'
                );

                // Insert the attachment.
                $attach_id = wp_insert_attachment( $attachment, $filename, $parent_post_id );

                // Make sure that this file is included, as wp_generate_attachment_metadata() depends on it.
                require_once( ABSPATH . 'wp-admin/includes/image.php' );

                // Generate the metadata for the attachment, and update the database record.
                $attach_data = wp_generate_attachment_metadata( $attach_id, $filename );
                wp_update_attachment_metadata( $attach_id, $attach_data );

                array_push($galleryImages, $attach_id);

            }

            $count++;

            // add images to the gallery field
            if($galleryImages){
                update_user_meta($user_id,'upload_images', $galleryImages);
            }
        }



    }

}

add_action( 'pmpro_after_checkout', 'insert_values_pmpro' );

// Upload Media Files


function stpl_pmpro_dropzone_enqueue_script() {
    wp_enqueue_script( 'stpl_pmpro_dropzone_script', plugin_dir_url( __FILE__ ) . 'dropzone/dropzone.js' );
}

function stpl_pmpro_dropzone_enqueue_style() {
    wp_enqueue_style( 'stpl_pmpro_dropzone_style', plugin_dir_url( __FILE__ ) . 'dropzone/dropzone.css' );
}


add_action('wp_enqueue_scripts', 'stpl_pmpro_dropzone_enqueue_script');
add_action('wp_enqueue_scripts', 'stpl_pmpro_dropzone_enqueue_style');

// // Register the script
// function stpl_pmpro_dropzone_enqueue_customscript() {
// wp_enqueue_script( 'stpl_pmpro_dropzone_customscript', plugin_dir_url( __FILE__ ) . 'js/stpl_pmpro_dropzone.js' );
// //wp_register_script( 'dropzone_Js', plugin_dir_url( __FILE__ ) . 'js/stpl_pmpro_dropzone.js' );
// }

// $drop_param = array(
//   'upload'=> admin_url( 'admin-ajax.php?action=handle_dropped_media' ),
//   'delete'=> admin_url( 'admin-ajax.php?action=handle_deleted_media' ),
// );

// wp_localize_script('stpl_pmpro_dropzone_enqueue_customscript','dropParam', $drop_param);

// add_action('wp_enqueue_scripts', 'stpl_pmpro_dropzone_enqueue_customscript');
// //wp_enqueue_scripts('dropzone_Js');


function stpl_enqueue_customscripts() {
    /**
     * frontend ajax requests.
     */
    wp_enqueue_script( 'dropzone-ajax', plugin_dir_url( __FILE__ ) . 'js/stpl_pmpro_dropzone.js', array(), null, true );
    wp_localize_script( 'dropzone-ajax', 'dropParam',
        array(
          'upload'=> admin_url( 'admin-ajax.php?action=handle_dropped_media' ),
          'delete'=> admin_url( 'admin-ajax.php?action=handle_deleted_media' ),
        )
    );
}
add_action( 'wp_enqueue_scripts', 'stpl_enqueue_customscripts' );


add_action( 'wp_ajax_handle_dropped_media', 'handle_dropped_media' );

// if you want to allow your visitors of your website to upload files, be cautious.
add_action( 'wp_ajax_nopriv_handle_dropped_media', 'handle_dropped_media' );

function add_script() {

  echo  $js= "

   jQuery(document).ready(function () {
    Dropzone.autoDiscover = false;
    jQuery('#media-uploader').dropzone({
    url: ".admin_url( 'admin-ajax.php?action=handle_dropped_media' ).",
    //url: dropParam.upload,
    acceptedFiles: 'image/*'
    success: function (file, response) {
        file.previewElement.classList.add('dz-success');
        file['attachment_id'] = response; // push the id for future reference
        var ids = jQuery('#media-ids').val() + ',' + response;
        jQuery('#media-ids').val(ids);
    },
    error: function (file, response) {
        file.previewElement.classList.add('dz-error');
    },
    // update the following section is for removing image from library
    addRemoveLinks: true,
    removedfile: function(file) {
        var attachment_id = file.attachment_id;        
        jQuery.ajax({
            type: 'POST',
            url: ".admin_url( 'admin-ajax.php?action=handle_deleted_media' ).",
            //url: dropParam.delete,
            data: {
                media_id : attachment_id
            }
        });
        var _ref;
        return (_ref = file.previewElement) != null ? _ref.parentNode.removeChild(file.previewElement) : void 0;        
    }
}); 
";
}

//add_action('wp_footer','add_script');


function handle_dropped_media() {

    //status_header(200);

    $upload_dir = wp_upload_dir();
    $upload_path = $upload_dir['path'] . DIRECTORY_SEPARATOR;
    $num_files = count($_FILES['file']['tmp_name']);

    $newupload = 0;

    if ( !empty($_FILES) ) {
        $files = $_FILES;
        foreach($files as $file) {
            $newfile = array (
                    'name' => $file['name'],
                    'type' => $file['type'],
                    'tmp_name' => $file['tmp_name'],
                    'error' => $file['error'],
                    'size' => $file['size']
            );

            $_FILES = array('upload'=>$newfile);
            foreach($_FILES as $file => $array) {
                $newupload = media_handle_upload( $file, 0 );
            }
        }
    }

    echo $newupload;    
    die();
}

add_action( 'wp_ajax_handle_deleted_media', 'handle_deleted_media' );

function handle_deleted_media(){

    if( isset($_REQUEST['media_id']) ){
        $post_id = absint( $_REQUEST['media_id'] );

        $status = wp_delete_attachment($post_id, true);

        if( $status )
            echo json_encode(array('status' => 'OK'));
        else
            echo json_encode(array('status' => 'FAILED'));
    }

    die();
}

?>
