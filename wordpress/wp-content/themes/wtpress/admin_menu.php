<?php
// DISPLAYING THE MENU FOR SETTINGS MY THEME
function settings_menu_theme(){
    add_menu_page(
        'WTPress',
        'WTPress',
        'administrator',
        'wtpress_theme_menu',
        'generate_settings_menu_page',
        'dashicons-welcome-widgets-menus',
        90
    );
}
add_action('admin_menu', 'settings_menu_theme');

function generate_settings_menu_page(){
    ?>

    <h2>Administration de WTPress Theme</h2>

    <?php
}

include_once 'color_settings.php';