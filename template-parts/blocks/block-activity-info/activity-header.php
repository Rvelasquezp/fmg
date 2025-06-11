<!-- 
    $allowed_blocks = array( 'core/gallery', 'core/image' );
    allowedBlocks="echo esc_attr( wp_json_encode( $allowed_blocks ) );" 
-->

<?php

$allowed_blocks = array( 'core/heading', 'core/buttons', 'core/button' );

$classes = ['single-activity-header'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$template = array(

    array('core/heading', array(
        'level' => 2,
        'content' => get_the_title(),
    )),
    array('core/buttons', array(), array(
		array('core/button', array(
			'text' => 'S’inscrire',
		)),
	))
);


?>

<div class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>

    <div class="wrap">

        <div class="header-grid">

            
            <div class="link">
                <?php if(get_field('back_link')) { ?>
                    <a href="<?php echo get_field('back_link')['url'] ?>">
                        <i class="fa-solid fa-arrow-left"></i><?php echo get_field('back_link')['title'] ?>
                    </a>
                <?php } ?>
            </div>

            <!-- <div class="headings"> -->

                <InnerBlocks allowedBlocks="<?php echo esc_attr( wp_json_encode( $allowed_blocks ) ); ?>" template="<?php echo esc_attr(wp_json_encode($template));?>" />

            <!-- </div> -->

            <?php if( have_rows('share_links', 'options') ) : ?>

                <div class="share-btn">

                    <div class="share">

                        <button class="">
                            <i class="fa-solid fa-arrow-up-right-from-square"></i>
                        </button>

                    </div>

                    <div class="share-button-wrapper">

                        <?php while( have_rows('share_links', 'options') ) : the_row(); ?>

                            <a target="_blank" class="share-button"
                                href="<?php echo get_sub_field('share_link') ?><?php echo get_permalink() ?>">
                                <?php echo get_sub_field('social_media_icon') ?>
                            </a>

                        <?php endwhile; ?>

                    </div>

                </div>
                

            <?php endif; ?>

        </div>
        
        
    </div>        

</div>