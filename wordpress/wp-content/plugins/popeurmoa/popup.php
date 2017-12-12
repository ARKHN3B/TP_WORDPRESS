<?php
/**
 * Plugin Name: PopeurmoA
 * Description: Displaying popup
 * Version: 1.0.0
 * Author: ARKHN3B
 */

function load_dependancies_popup(){
    wp_enqueue_style('popup', plugin_dir_url('./').'popeurmoa/popup.css');
    wp_enqueue_script('popup', plugin_dir_url('./').'popeurmoa/popup.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'load_dependancies_popup');

// HOOK
function create_popup(){
    register_post_type('popeurmoa', array(
        'label'         => 'PopeurmoA',
        'description'   => 'Displaying a fancy pop-up !',
        'show_in_menu'  => TRUE,
        'public'        => TRUE,
        'menu_icon'     => 'dashicons-images-alt',
        'menu_position' => 5,
        'supports'      => [
            'title',
            'editor',
            'revisions',
            'thumbnail'
        ]
    ));
}
add_action('init', 'create_popup');



function display_popup($atts){
//    global $shortname;

    $popup = new WP_Query(array(
        'post_type' => 'popeurmoa'
    ));

    $popup_html = '<div class="popup-overlay">';

    if ( $popup->have_posts() ){


        while ( $popup->have_posts() ){

            $popup->the_post();

            if (get_post_meta($popup->post->ID, 'postname')[0] == $atts['name'] /*$shortname*/){

                $title = get_the_title();
                $content = get_the_content();
                $thumbnail_url = get_the_post_thumbnail_url(NULL, 'full');

                $popup_html .= "<div class=\"popup-container\">";
                $popup_html .= "<span class='close-popup'>X</span>";
                $popup_html .= "<h2>$title</h2>";
                $popup_html .= "<div class='popup-content'>$content</div>";
                $popup_html .= "<div style='background-image: url($thumbnail_url); width: 100%; height: 25em'></div>";
                $popup_html .= "</div>";
            } else {
                continue;
            }
        }
;    }


    $popup_html .= '</div>';
    return $popup_html;
}
add_shortcode('popeurmoa', 'display_popup');

function shortcode_post_name(){
    add_meta_box('postname', 'Shortcode Post Name', 'display_post_name', 'popeurmoa');

    function display_post_name(){
        ?>

        <input type="text" name="postname" value="<?= ifNotEmpty() ?>">

        <?php
    }
}
add_action('add_meta_boxes', 'shortcode_post_name');

function update_shortcode_post_name(){
    global $post;

    if ( get_post_meta($post->ID, 'postname') ){
        update_post_meta($post->ID, 'postname', $_POST['postname']);
    } else {
        add_post_meta($post->ID, 'postname', $_POST['postname']);
    }
}
add_action('save_post', 'update_shortcode_post_name');

function ifNotEmpty(){
    global $post;

    !get_post_meta($post->ID, 'postname') ? $test = '' : $test = get_post_meta($post->ID, 'postname', TRUE) ;

    $post->shortcode_post_name = $test;

    return $test;
}