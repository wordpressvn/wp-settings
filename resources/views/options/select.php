<tr valign="top" class="<?php echo $option->get_hide_class_attribute(); ?>">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?>
        <?php if($link = $option->get_arg('link')) { ?>
            <a target="_blank" href="<?php echo esc_url($link); ?>" aria-label="<?php _e('Help'); ?>"><span class="dashicons dashicons-editor-help"></span></a>
        <?php } ?>
        </label>
    </th>
    <td class="forminp forminp-text">
        <select id="<?php echo $option->get_id_attribute(); ?>" name="<?php echo esc_attr($option->get_name_attribute()); ?>" class="<?php echo $option->get_input_class_attribute(); ?>">
            <?php foreach ($option->get_arg('options', []) as $key => $label) { ?>
                <option value="<?php echo $key; ?>" <?php selected($option->get_value_attribute(), $key); ?>><?php echo $label; ?></option>
            <?php } ?>
        </select>
        <?php if($description = $option->get_arg('description')) { ?>
            <p class="description"><?php echo $description; ?></p>
        <?php } ?>

        <?php if($error = $option->has_error()) { ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php } ?>
    </td>
</tr>
