<?php
if(isset($_POST['license_activate'])) {
    $option->check();
    $option->activate();
} elseif(isset($_POST['license_deactivate'])) {
    $option->deactivate();
}
$lic = get_option($option->section->tab->settings->option_name);
$status = isset($lic['license_status']) ? trim($lic['license_status']) : 'unverified';
if ( $option->get_value_attribute() && $status !== false && $status == 'valid' ) {
    $license_status = __( 'Your account is now active!' );
    $dashicons      = "dashicons-cloud";
    $color          = "color:green";
    $activate_btn   = "display:none";
    $deactivate_btn = "";
    $input_disabled = " disabled";
    $text_link = __( 'Support' );
} else {
    $license_status = __( 'Invalid activation key.' );
    $dashicons      = "dashicons-warning";
    $color          = "color:red";
    $activate_btn   = "";
    $deactivate_btn = "display:none";
    $input_disabled = "";
    $text_link = __( 'Free License' );
}
?>
<tr valign="top">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?></label>
    </th>
    <td class="forminp forminp-text">
        <input name="<?php echo esc_attr($option->get_name_attribute()); ?>" id="<?php echo $option->get_id_attribute(); ?>" type="password" value="<?php echo $option->get_value_attribute(); ?>" class="regular-text <?php echo $option->get_input_class_attribute(); ?>" <?php echo $input_disabled; ?>>
        <span style="<?php echo $activate_btn; ?>">
            <input type='submit' class='button-primary' name='license_activate' value="<?php _e( 'Activate' ); ?>" />
        </span>
        <span style="<?php echo $deactivate_btn; ?>">
        <input type='submit' class='button-secondary' name='license_deactivate' value="<?php _e( 'Deactivate' ); ?>" />
        </span>
        <p class="description">
            <a href="<?php echo $option->get_arg('download'); ?>" target="_blank" /><?php _e( 'Don\'t have a license? Click here to purchase.' ); ?></a>
        </p>
        <?php if($error = $option->has_error()) { ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php } ?>
    </td>
</tr>
<tr valign="top"><th><?php _e( 'Status' ); ?></th>
<td>
    <span style="line-height:30px; <?php echo $color; ?>">
        <span class='dashicons <?php echo $dashicons ?>' style='line-height:30px;'></span>
        <?php echo $license_status ?>
    </span>
</td></tr>