<tr valign="top" class="<?php echo $option->get_hide_class_attribute(); ?>">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?></label>
    </th>
    <td class="forminp forminp-text">
        <input name="<?php echo esc_attr($option->get_name_attribute()); ?>" id="<?php echo $option->get_id_attribute(); ?>" type="password" value="<?php echo $option->get_value_attribute(); ?>" class="regular-text <?php echo $option->get_input_class_attribute(); ?>" <?php echo $option->get_disabled_class_attribute(); ?> <?php if($active = $option->get_arg('active')) { ?><?php echo $active; ?><?php } ?>>
        <?php if($status = $option->get_arg('status')) { ?>
            <?php echo $status; ?>
        <?php } ?>

        <?php if($error = $option->has_error()) { ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php } ?>
    </td>
</tr>
<?php if($description = $option->get_arg('description')) { ?>
    <?php echo $description; ?>
<?php } ?>
