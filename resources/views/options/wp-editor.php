<tr valign="top" class="<?php echo $option->get_hide_class_attribute(); ?>">
    <th scope="row" class="titledesc">
        <label for="<?php echo $option->get_id_attribute(); ?>" class="<?php echo $option->get_label_class_attribute(); ?>"><?php echo $option->get_label(); ?>
        <?php if($more = $option->get_arg('more')) { ?><a href="#TB_inline?width=500&height=200&inlineId=<?php echo $option->get_id_attribute(); ?>" title="<?php echo sprintf(__('More information about %s'), $option->get_label()); ?>" class="thickbox" style="text-decoration:none"><span class="dashicons dashicons-editor-help"></span></a><div id="<?php echo $option->get_id_attribute(); ?>" style="display:none"><p class="description"><?php echo $more; ?></p><?php } ?></label>
    </th>
    <td class="forminp forminp-text">
        <?php \wp_editor(wp_kses_post($option->get_value_attribute()), $option->get_id_attribute(), [
            'textarea_name' => $option->get_name_attribute(),
            'wpautop' => $option->get_arg('wpautop', true),
            'teeny' => $option->get_arg('teeny', false),
            'media_buttons' => $option->get_arg('media_buttons', true),
            'default_editor' => $option->get_arg('default_editor'),
            'drag_drop_upload' => $option->get_arg('drag_drop_upload', false),
            'textarea_rows' => $option->get_arg('textarea_rows', 10),
            'tabindex' => $option->get_arg('tabindex'),
            'tabfocus_elements' => $option->get_arg('tabfocus_elements'),
            'editor_css' => $option->get_arg('editor_css'),
            'editor_class' => $option->get_arg('editor_class'),
            'tinymce' => $option->get_arg('tinymce', true),
            'quicktags' => $option->get_arg('quicktags', true)
        ]); ?>
        <?php if ($description = $option->get_arg('description')) { ?>
            <p class="description"><?php echo $description; ?></p>
        <?php } ?>

        <?php if ($error = $option->has_error()) { ?>
            <div class="wps-error-feedback"><?php echo $error; ?></div>
        <?php } ?>
    </td>
</tr>
