<div id="poststuff">
    <div id="post-body" class="<?php echo (!$settings->get_sidebar()) ?: 'columns-2'; ?>">
        <div id="post-body-content">
        <form method="post" action="<?php echo $settings->get_full_url(); ?>">
            <?php WPVNTeam\WPSettings\view('section-menu', compact('settings')); ?>            
            <div class="nav-tab-content">
                <?php foreach ($settings->get_active_tab()->get_active_sections() as $section) { ?>
                    <?php WPVNTeam\WPSettings\view('section', compact('section')); ?>
                <?php } ?>
            </div>
            <?php wp_nonce_field('wp_settings_save_' . $settings->option_name, '_wpnonce'); ?>            
            <?php if (strpos(strval($section->slug), '1') === false) { ?>
                <?php submit_button(); ?>
            <?php } ?>
        </form>
        </div>
        <?php if ($sidebar = $settings->get_sidebar()) { ?>
        <div id="postbox-container-1" class="postbox-container sidebar">
            <h3><?php echo $sidebar['title']; ?></h3>
            <div><?php echo $sidebar['message']; ?></div>
        </div>
        <?php } ?>
    </div>
</div>