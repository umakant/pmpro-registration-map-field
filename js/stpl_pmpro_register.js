jQuery(document).ready(function(){
    var i = 1;
    jQuery("#list_services").click(function(){
        i += 1;
        var markup = "<tr class='tr_class_"+i+"'><td>Services </td><td><input type='text' name='services[]' value=''></td><td><input type='button' class='remCF' value='Delete'></td></tr></tr>";
        jQuery("table#addService tbody").append(markup);
        jQuery(".remCF").click(function(){
            console.log('remCF');
            jQuery(this).parent().parent().remove();
        });
    });
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
