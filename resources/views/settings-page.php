<div class="cop<?php echo $settings->lite ? ' ' . $settings->lite : ''; ?>">
    <h2><?php echo $settings->title; ?> <small><?php echo $settings->version; ?></small></h2>
    <?php if( $links = $settings->links ) { ?>
        <a href="<?php echo $links; ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false"><path d="M12 4.75a7.25 7.25 0 100 14.5 7.25 7.25 0 000-14.5zM3.25 12a8.75 8.75 0 1117.5 0 8.75 8.75 0 01-17.5 0zM12 8.75a1.5 1.5 0 01.167 2.99c-.465.052-.917.44-.917 1.01V14h1.5v-.845A3 3 0 109 10.25h1.5a1.5 1.5 0 011.5-1.5zM11.25 15v1.5h1.5V15h-1.5z"></path></svg></a>
    <?php } ?>
</div>
<?php $settings->render_tab_menu(); ?>
<div class="wrap">
    <h1 style="display: none;"></h1>
    <?php if ($flash = $settings->flash->has()) { ?>
    <div class="notice notice-<?php echo $flash['status']; ?> is-dismissible">
        <p><?php echo $flash['message']; ?></p>
    </div>
    <?php } ?>
    <?php if( $errors = $settings->errors->get_all() ) { ?>
        <div class="notice notice-error is-dismissible">
            <p><?php _e( 'Something went wrong.'); ?></p>
        </div>
    <?php } ?>

    <?php $settings->render_active_sections(); ?>
</div>
