<?php

/**
 * Template part for displaying results in search pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package gutenberg-starter-theme
 */

?>

<article class="search-result <?php if (!has_post_thumbnail()) {
									echo 'noImage';
								} ?>" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

    <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>

    <div class="content">
        <header>
            <?php the_title(sprintf('<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>'); ?>
        </header><!-- .entry-header -->

        <div class="entry-summary">
            <?php the_excerpt(); ?>

            <div class="wp-container-620e461b32ace wp-block-buttons">
                <div class="wp-block-button is-style-underline">
                    <a class="wp-block-button__link" href="<?php echo get_permalink(); ?>" style="color:#fff;">Read
                        more</a>
                </div>
            </div>
        </div><!-- .entry-summary -->
    </div>

</article><!-- #post-<?php the_ID(); ?> -->