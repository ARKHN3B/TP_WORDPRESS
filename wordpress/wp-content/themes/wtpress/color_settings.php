<?php
function settings_color_menu(){
    add_submenu_page(
        'wtpress_theme_menu',
        'ColorSettings',
        'Color settings',
        'administrator',
        'color_wtpress_menu',
        'settings_color_theme'
    );
}
add_action('admin_menu', 'settings_color_menu');

function settings_color_theme(){

    if ( isset($_POST['color_h']) && isset($_POST['color_headernav']) ){
        $colors = array(
                'headers'       => $_POST['color_h'],
                'header_nav'    => $_POST['color_headernav']
        );

        update_option('custom_colors', $colors);
    }

    $colors_val = [
        'headers' => [],
        'header_nav' => ''
    ];

    if ( get_option('custom_colors') ){
        $colors_val = get_option('custom_colors');
    }

    ?>
        <h2>Colorized</h2>
        <form method="post">
            <?php
                for ($i = 0; $i < 6; $i++){
                    ?>
                    <label>
                        Color h<?= ($i + 1) ?>:
                        <input type="text" class="jscolor" name="color_h[]" value="<?= $colors_val['headers'][$i] ?>"> <br>
                    </label>

                    <?php
                }
            ?>
            <br>
            <label>
                Header nav :
                <input type="text" class="jscolor" name="color_headernav" value="<?= $colors_val['header_nav'] ?>">
            </label>
            <br><br>
            <input type="submit">
        </form>
    <?php
}