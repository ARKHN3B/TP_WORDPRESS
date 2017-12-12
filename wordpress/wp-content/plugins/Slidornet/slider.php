<?php
/**
 * Plugin Name: Slidornet
 * Description: A fancy slider, easy to use it !
 * Version: 1.0.0
 * Author: ARKHN3B
 */

// LOAD DEPENDANCIES FOR MY PLUGIN
function load_dependancies(){
    wp_enqueue_script('slidornet', plugin_dir_url('./').'Slidornet/slider.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'load_dependancies');

// HOOK
function create_slider_home(){

    register_post_type('slidornet', array(
        'label'         => 'Slidornet',
        'description'   => 'Display a fancy slider on your home web page !',
        'show_in_menu'  => TRUE,
        'public'        => TRUE,
        'menu_icon'     => 'dashicons-money',
        'menu_position' => 4,
        'supports'      => [
            'title',
            'revisions',
            'thumbnail'
        ]
    ));
}
add_action('init', 'create_slider_home');

// ADD SHORTCODE
function display_slider(){
    $slider = new WP_Query(array(
        'post_type' => 'slidornet'
    ));

    $slider_html = '<div id="slidornet" style="width: 100%;
                                               height: 30em">';

    if ( $slider->have_posts() ){
        while ( $slider->have_posts() ){

            $slider->the_post();

            $title = get_the_title();
            $thumbnail_url = get_the_post_thumbnail_url(NULL, 'full');

                ob_start();
                echo "<div style='background-image: url($thumbnail_url);
                                  background-size: cover; 
                                  background-position: center;
                                  height: 100%;
                                  display: flex;
                                  justify-content: center;
                                  align-items: center;'
                           class='slidornet-container'>";
                echo "<h3 style='font-size: 4em;
                                 color: white'>$title</h3>";
                echo "</div>";
                $buffer = ob_get_contents();
                ob_end_clean();

                $slider_html .= $buffer;
        }
    }

    $slider_html .= "</div>";
    return $slider_html;
}
add_shortcode('slidornet', 'display_slider');