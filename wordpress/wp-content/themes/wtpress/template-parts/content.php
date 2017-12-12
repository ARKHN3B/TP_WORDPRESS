<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WTPRESS
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> style="width: 50%;
                                                margin-left: 4%;
                                                padding: 1%;
                                                border: 1px solid #a52a2a1a;
                                                margin-top: 3%;">
	<header class="entry-header">
		<?php

        $thumbnail_url = get_the_post_thumbnail_url(NULL, 'medium');

		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;
        ?>
        <div style="background-image: url(<?= $thumbnail_url ?>);
                    width: 100%;
                    height: 24em;
                    background-size: cover;
                    background-position: center;">
        </div>
        <?php
		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php wtpress_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			$content = get_the_content();
            $content_without_tags = strip_tags($content);
            $content_200char = substr($content_without_tags, 0, 512);

        ?>
        <?= $content_200char ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php wtpress_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
