<?php
if (isset($_POST['license_activate'])) {
    $option->activate();
} elseif (isset($_POST['license_deactivate'])) {
    $option->deactivate();
}
$license = get_option($option->section->tab->settings->option_name);
$license_status = isset($license['license_status']) ? trim($license['license_status']) : 'unverified';
$is_valid = $option->get_value_attribute() && $license_status === 'valid';
$status = $is_valid ? __('Your account is now active!') : __('Invalid activation key.');
$color = $is_valid ? 'background: rgba(18, 183, 106, 0.15); border: 1px solid rgba(18, 183, 106, 0.24); color: rgb(18, 183, 106); ' : 'background: rgba(209, 55, 55, 0.24); border: 1px solid rgba(209, 55, 55, 0.24); color: rgba(209, 55, 55, 1);';
$activate_btn_style = $is_valid ? 'display:none;' : '';
$deactivate_btn_style = $is_valid ? '' : 'display:none;';
$input_disabled = $is_valid ? ' disabled' : '';
$expiration_date = isset($license['license_expires']) ? date('d/m/Y', strtotime($license['license_expires'])) : __('N/A');
?>
<tr valign="top">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>">
        <?php echo $option->get_label(); ?>
        <?php if($link = $option->get_arg('link')) { ?>
            <a target="_blank" href="<?php echo esc_url($link); ?>" tooltip="<?php _e('Help'); ?>"><span class="dashicons dashicons-editor-help"></span></a>
        <?php } ?>
        </label>
    </th>
    <td class="forminp forminp-text">
        <input
            name="<?php echo esc_attr($option->get_name_attribute()); ?>"
            id="<?php echo $option->get_id_attribute(); ?>"
            type="password"
            value="<?php echo $option->get_value_attribute(); ?>"
            class="regular-text <?php echo $option->get_input_class_attribute(); ?>"
            <?php echo $input_disabled; ?>
        >
        <span style="<?php echo $activate_btn_style; ?>">
            <?php submit_button( __( 'Activate' ), 'primary', 'license_activate', false ); ?>
        </span>
        <span style="<?php echo $deactivate_btn_style; ?>">
            <?php submit_button( __( 'Deactivate' ), 'secondary', 'license_deactivate', false ); ?>
        </span>
        <p class="description">
            <a href="<?php echo $option->get_arg('description'); ?>" target="_blank">
                <?php _e('Don\'t have a license? Click here to purchase.', 'wp-extra'); ?>
            </a>
        </p>
        <?php if ($error = $option->has_error()) : ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php endif; ?>
    </td>
</tr>
<tr valign="top">
    <th><?php _e('Status'); ?></th>
    <td>
        <span style="height: 24px; line-height: 24px; border-radius: 100px;padding: 5px 10px; <?php echo $color; ?>">
            <?php echo $status; ?>
        </span>
    </td>
</tr>
<tr valign="top">
    <th><?php _e('Expiration'); ?></th>
    <td><?php echo esc_html($expiration_date); ?></td>
</tr>