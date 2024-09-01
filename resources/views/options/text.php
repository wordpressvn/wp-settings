<tr valign="top" class="<?php echo $option->get_hide_class_attribute(); ?>">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?>
        <?php if($link = $option->get_arg('link')) { ?>
            <a target="_blank" href="<?php echo esc_url($link); ?>" aria-label="<?php _e('Help'); ?>"><span class="dashicons dashicons-editor-help"></span></a>
        <?php } ?>
        </label>
    </th>
    <td class="forminp forminp-text">
        <input
            name="<?php echo esc_attr($option->get_name_attribute()); ?>"
            id="<?php echo $option->get_id_attribute(); ?>"
            type="<?php echo $option->get_arg('type', 'text'); ?>"
            value="<?php echo $option->get_value_attribute(); ?>"
            class="<?php echo $option->get_input_class_attribute(); ?>"
            <?php if ($min = $option->get_arg('min')) echo ' min="' . esc_attr($min) . '"'; ?>
            <?php if ($max = $option->get_arg('max')) echo ' max="' . esc_attr($max) . '"'; ?>
            <?php if ($step = $option->get_arg('step')) echo ' step="' . esc_attr($step) . '"'; ?>>

        <?php if(($description = $option->get_arg('description')) && ($option->get_arg('type') == 'number')) { ?>
            <?php echo $description; ?>
        <?php } elseif ($description) { ?>
            <p class="description"><?php echo $description; ?></p>
        <?php } ?>

        <?php if($error = $option->has_error()) { ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php } ?>
    </td>
</tr>
