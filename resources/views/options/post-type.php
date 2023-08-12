<tr valign="top" class="<?php echo $option->get_hide_class_attribute(); ?>">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?></label>
    </th>
    <td class="forminp forminp-text">
        <select id="<?php echo $option->get_id_attribute(); ?>" name="<?php echo esc_attr($option->get_name_attribute()); ?>" multiple class="<?php echo $option->get_input_class_attribute(); ?>">
            <?php
            $included_post_type = array();
            if ($include = $option->get_arg('include')) {
                $included_post_type = (array) $include;
            }
            $exclude_post_type = array();
            if ($exclude = $option->get_arg('exclude')) {
                $exclude_post_type = (array) $exclude;
            }
            $post_types = get_post_types(['public' => true], 'objects');
            foreach ($post_types as $post_type) {
                if ($include && !in_array($post_type->name, $included_post_type)) {
                    continue;
                }
                if ($exclude && in_array($post_type->name, $exclude_post_type)) {
                    continue;
                }
                $key = $post_type->name;
                $label = $post_type->label;
            ?>
                <option value="<?php echo $key; ?>" <?php echo in_array($key, $option->get_value_attribute() ?? []) ? 'selected' : null; ?>><?php echo $label; ?></option>
            <?php } ?>
        </select>
        <?php if ($description = $option->get_arg('description')) { ?>
            <p class="description"><?php echo $description; ?></p>
        <?php } ?>

        <?php if ($error = $option->has_error()) { ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php } ?>
    </td>
</tr>
