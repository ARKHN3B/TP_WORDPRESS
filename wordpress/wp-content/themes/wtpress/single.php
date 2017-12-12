<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WTPRESS
 */

get_header(); ?>

	<div id="primary" class="content-area" style="width: 95%">
		<main id="main" class="site-main">

		<?php
		    while ( have_posts() ){
                the_post();


            }
		?>
            <div id="single-container">
                <?php
                    get_template_part('./template-parts/article');
                ?>
            </div>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
