jQuery(document).ready(function(){
    var i = 1;
    jQuery("#list_services").click(function(){
        i += 1;
        var markup = "<tr class='tr_class_"+i+"'><td>Secondary Services </td><td><input type='text' name='services[]' value=''></td><td><span class='remCF'>Delete(-)</span></td></tr></tr>";
        jQuery("table#addService tbody").append(markup);
        jQuery(".remCF").click(function(){
            jQuery(this).parent().parent().remove();
        });
    });
    var j = 1;
    jQuery("#special_hours").click(function(){
        console.log('special_hours');
        j += 1;
        var markup = "<tr class='tr_class_"+j+"'><td>Special Hours </td><td><input type='text' name='special_hours[]'  id='special_hours_picker_"+j+"' value='' placeholder='Select Date'></td><td><input type='text' name='special_start_hours[]' id='special_start_hours_"+j+"' value='' placeholder='Start Hours'></td><td><input type='text' name='special_end_hours[]'  id='special_end_hours_"+j+"' value='' placeholder='End Hours'></td><td><span class='remSH'>Delete(-)</span></td></tr></tr>";
        jQuery("table#special_hours_table tbody").append(markup);
        jQuery(".remSH").click(function(){
            jQuery(this).parent().parent().remove();
        });
        jQuery( "#special_hours_picker_"+j+"" ).datepicker();
        jQuery("#special_start_hours_"+j+"").timepicker();
        jQuery("#special_end_hours_"+j+"").timepicker();
    });
    jQuery( "#year_established" ).datepicker();
    jQuery( "#special_hours_picker" ).datepicker();
    jQuery("#special_start_hours").timepicker();
    jQuery("#special_end_hours").timepicker();

    // Dates Time Picker
    jQuery("#sun_start_hrs").timepicker();
    jQuery("#sun_end_hrs").timepicker();
    jQuery("#mon_start_hrs").timepicker();
    jQuery("#mon_end_hrs").timepicker();
    jQuery("#tues_start_hrs").timepicker();
    jQuery("#tues_end_hrs").timepicker();
    jQuery("#wed_start_hrs").timepicker();
    jQuery("#wed_end_hrs").timepicker();
    jQuery("#thur_start_hrs").timepicker();
    jQuery("#thur_end_hrs").timepicker();
    jQuery("#fri_start_hrs").timepicker();
    jQuery("#fri_end_hrs").timepicker();
    jQuery("#sat_start_hrs").timepicker();
    jQuery("#sat_end_hrs").timepicker();

    jQuery("#sunday_checked").click(function () {
        if (jQuery(this).is(":checked")) {
            jQuery(".sunday_hide").show();
        } else {
            jQuery(".sunday_hide").hide();
        }
    });
    jQuery("#monday_checked").click(function () {
        if (jQuery(this).is(":checked")) {
            jQuery(".monday_hide").show();
        } else {
            jQuery(".monday_hide").hide();
        }
    });
    jQuery("#tuesday_checked").click(function () {
        if (jQuery(this).is(":checked")) {
            jQuery(".tuesday_hide").show();
        } else {
            jQuery(".tuesday_hide").hide();
        }
    });
    jQuery("#wednesday_checked").click(function () {
        if (jQuery(this).is(":checked")) {
            jQuery(".wednesday_hide").show();
        } else {
            jQuery(".wednesday_hide").hide();
        }
    });
    jQuery("#thursday_checked").click(function () {
        if (jQuery(this).is(":checked")) {
            jQuery(".thursday_hide").show();
        } else {
            jQuery(".thursday_hide").hide();
        }
    });
    jQuery("#friday_checked").click(function () {
        if (jQuery(this).is(":checked")) {
            jQuery(".friday_hide").show();
        } else {
            jQuery(".friday_hide").hide();
        }
    });
    jQuery("#saturday_checked").click(function () {
        if (jQuery(this).is(":checked")) {
            jQuery(".saturday_hide").show();
        } else {
            jQuery(".saturday_hide").hide();
        }
    });
});
