<tr valign="top" class="mailserver-pass-wrap <?php echo $option->get_hide_class_attribute(); ?>">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?></label>
    </th>
    <td class="forminp forminp-text user-pass-wrap">
    <span class="wp-pwd">
        <input name="<?php echo esc_attr($option->get_name_attribute()); ?>" id="user_pass" type="password" value="<?php echo base64_decode($option->get_value_attribute() ?? ''); ?>" class="regular-text <?php echo $option->get_input_class_attribute(); ?>">
        <button type="button" class="button button-secondary wp-hide-pw hide-if-no-js" data-toggle="0" aria-label="<?php _e('Show password'); ?>">
            <span class="dashicons dashicons-visibility" aria-hidden="true"></span>
        </button>
    </span>
        <?php if($description = $option->get_arg('description')) { ?>
            <p class="description"><?php echo $description; ?></p>
        <?php } ?>

        <?php if($error = $option->has_error()) { ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php } ?>
    </td>
</tr>
