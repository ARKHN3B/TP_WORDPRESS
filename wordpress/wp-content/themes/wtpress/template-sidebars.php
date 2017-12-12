<?php
/**
 * Template Name: Sidebars Template
 */

// Si le template ne s'affiche pas, rafraîchir le CSS en passant au versionning supérieur
    get_header();

?>

<div id="primary" class="content-area" style="display: flex;
                                              justify-content: center;
                                              margin: 2em 0em">
    <main id="main" class="site-main" style="display: flex;
                                             width: 95%">

        <?php
//      $sidebars = wp_get_sidebars_widgets();
//      $leftSidebar = $sidebars['left-sidebar'];

/*      // Création d'un buffer ou mémoire tampon
        ob_start();
        echo '<div style="width: 30%">';
        dynamic_sidebar('left-sidebar');
        echo '</div>';

        $leftSidebar = ob_get_contents();
        ob_end_clean();
*/

            function obuffer($width, $position){
                ob_start();
                echo "<div class='sidebar-container-$position' style=\"width: $width%\">";
                dynamic_sidebar("$position-sidebar");
                echo '</div>';

                $sidebar = ob_get_contents();
                ob_end_clean();

                return $sidebar;
            }

            if (is_active_sidebar('left-sidebar') && is_active_sidebar('right-sidebar') == FALSE){

                $div_width = '70%';
                $rightSidebar = NULL;

                $leftSidebar = obuffer(30, 'left');

            } elseif ( is_active_sidebar('right-sidebar') && is_active_sidebar('left-sidebar') == FALSE ){
                $div_width = '70%';
                $leftSidebar = NULL;

                $rightSidebar = obuffer(30, 'right');

            } elseif ( is_active_sidebar('right-sidebar') && is_active_sidebar('left-sidebar') ){
                $div_width = '50%';
                $leftSidebar = obuffer(25, 'left');
                $rightSidebar = obuffer(25, 'right');
            } else {
                $div_width = '100%';
                $leftSidebar = NULL;
                $rightSidebar = NULL;
            }

            while ( have_posts() ){
                the_post();

                $title = get_the_title();
                $content = get_the_content();
                $thumbnail_url = get_the_post_thumbnail_url(NULL, 'full');
            }
        ?>


        <?= $leftSidebar ?>

        <div style="width: <?= $div_width ?>">
            <h2 style="margin-top: 0px"><?= $title ?></h2>
            <div style="background-image: url(<?= $thumbnail_url ?>);
                        width: 100%;
                        height: 20em;
                        background-size: cover;
                        background-position: center;">
            </div>
            <div style="text-align: justify"><?= $content ?></div>
        </div>

        <?= $rightSidebar ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();