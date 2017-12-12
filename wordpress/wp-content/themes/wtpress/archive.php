<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WTPRESS
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="archive-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			// Utilisation d'une global wordpress pour transmettre mon nombre de posts
            global $transmission;
			if (have_posts()) $transmission = get_posts_count();
			?>

            <div style="display: flex;
                        flex-wrap: wrap;
                        padding: 2%;
                        justify-content: space-around">

            <?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content-archive', get_post_format() );

			endwhile;

			the_posts_navigation();

			?>

            </div>

            <?php

		else :

			get_template_part( 'template-parts/content-archive', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
