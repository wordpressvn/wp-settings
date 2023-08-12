<tr valign="top" class="<?php echo $option->get_hide_class_attribute(); ?>">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?></label>
    </th>
    <td class="forminp forminp-text">
        <select id="<?php echo $option->get_id_attribute(); ?>" name="<?php echo esc_attr($option->get_name_attribute()); ?>" multiple class="<?php echo $option->get_input_class_attribute(); ?>">
            <?php if ($taxonomy = $option->get_arg('term')) { ?>
                <?php $terms = get_terms([
                    'taxonomy'   => $taxonomy,
                    'hide_empty' => false,
                ]);
                if (!empty($terms) && !is_wp_error($terms)) {
                    foreach ($terms as $term) {
                        $key = $term->term_id;
                        $label = $term->name;
                        ?>
                        <option value="<?php echo $key; ?>" <?php echo in_array($key, $option->get_value_attribute() ?? []) ? 'selected' : null; ?>><?php echo $label; ?></option>
                        <?php
                    }
                }
            ?>
            <?php } else { ?>
            <?php 
            $included_taxonomies = array();
            if ($include = $option->get_arg('include')) {
                $included_taxonomies = (array) $include;
            }
            $excluded_taxonomies = array();
            if ($exclude = $option->get_arg('exclude')) {
                $excluded_taxonomies = (array) $exclude;
            }
            $taxonomies = get_taxonomies(['public' => true], 'objects');
            foreach ($taxonomies as $taxonomy) {
                if ($include && !in_array($taxonomy->name, $included_taxonomies)) {
                    continue;
                }
                if ($exclude && in_array($taxonomy->name, $excluded_taxonomies)) {
                    continue;
                }
                $key = $taxonomy->name;
                $label = $taxonomy->label;
            ?>
                <option value="<?php echo $key; ?>" <?php echo in_array($key, $option->get_value_attribute() ?? []) ? 'selected' : null; ?>><?php echo $label; ?></option>
                <?php
            } ?>
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
