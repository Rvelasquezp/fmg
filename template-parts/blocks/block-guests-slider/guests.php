<!-- 
    $allowed_blocks = array( 'core/gallery', 'core/image' );
    allowedBlocks="echo esc_attr( wp_json_encode( $allowed_blocks ) );" 
-->

<?php

$classes = ['guests-slider'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$template = array(

    array('core/heading', array(
        'level' => 3,
        'content' => 'Les invités'
    )),
    array('acf/guests-slider', array()),
    
);


?>

<section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>

    <div class="guestsSlide">

        <div class="wrap">

            <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template));?>" />


        </div>

    </div>        

</section>