<?php
function SidebarsSettings(){

    register_sidebar(
        array(
            'id'            => 'left-sidebar',
            'name'          => __('left-sidebar'),
            'description'   => __('Insert a sidebar to the left'),
            'before_widget' => '<div id="left-sidebar" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        )
    );
    register_sidebar(
        array(
            'id'            => 'right-sidebar',
            'name'          => __('right-sidebar'),
            'description'   => __('Insert a sidebar to the right'),
            'before_widget' => '<div id="right-sidebar" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3>'
        )
    );
}
add_action('widgets_init', 'SidebarsSettings');