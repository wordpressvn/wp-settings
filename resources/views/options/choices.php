<tr valign="top" class="<?php echo $option->get_hide_class_attribute(); ?>">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?></label>
    </th>
    <td class="forminp forminp-text">

        <?php foreach($option->get_arg('options', []) as $key => $label) { ?>
            <div>
                <label>
                    <input name="<?php echo esc_attr($option->get_name_attribute()); ?>" id="<?php echo $option->get_id_attribute(); ?>" type="radio" value="<?php echo $key; ?>" <?php checked($key, $option->get_value_attribute()); ?> class="<?php echo $option->get_input_class_attribute(); ?>">
                    <?php echo $label; ?>
                </label>
            </div>
        <?php } ?>

        <?php if($description = $option->get_arg('description')) { ?>
            <p class="description"><?php echo $description; ?></p>
        <?php } ?>

        <?php if($error = $option->has_error()) { ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php } ?>
    </td>
</tr>
