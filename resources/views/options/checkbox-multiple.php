<tr valign="top" class="<?php echo $option->get_hide_class_attribute(); ?>">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?>
        <?php if($link = $option->get_arg('link')) { ?>
            <a target="_blank" href="<?php echo esc_url($link); ?>" tooltip="<?php _e('Help'); ?>"><span class="dashicons dashicons-editor-help"></span></a>
        <?php } ?>
        </label>
    </th>
    <td class="forminp wps-checkbox-multiple">
        <?php foreach ($option->get_arg('options', []) as $key => $label) { ?>
            <p>
            <label>
                <input type="checkbox" id="<?php echo $option->get_id_attribute(); ?>_<?php echo $key; ?>" name="<?php echo esc_attr($option->get_name_attribute()); ?>" value="<?php echo $key; ?>" <?php echo in_array($key, $option->get_value_attribute() ?? []) ? 'checked' : ''; ?>>
                <?php if($del = $option->get_arg('del')) { ?>
                    <?php echo in_array($key, $option->get_value_attribute() ?? []) ? "<del>$label</del>" : $label; ?>
                <?php } else { ?>
                    <?php echo $label; ?>
                <?php } ?>
            </label>
            </p>
        <?php } ?>
        <?php if($all = $option->get_arg('select')) { ?>
            <p><a href="javascript:void(0);" class="select-all"><?php _e('Select all'); ?></a> | <a href="javascript:void(0);" class="deselect"><?php _e('Deselect'); ?></a></p>
        <?php } ?>
        <?php if($description = $option->get_arg('description')) { ?>
            <p class="description"><?php echo $description; ?></p>
        <?php } ?>
        <?php if($error = $option->has_error()) { ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php } ?>
    </td>
</tr>
