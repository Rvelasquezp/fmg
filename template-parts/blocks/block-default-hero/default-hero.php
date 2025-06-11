<?php

$classes = ['default-hero'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$template = array(
    array('core/spacer', array(
        'height' => 10,
    )),
    array('core/group', array(), array(

        array('core/group', array(
            'className' => 'title'
        ), array(
            array('core/heading', array(
                'level' => 1,
                'content' => get_the_title(),
                'className' => 'h2'
            ))
        )),
        array('core/group', array(
            'className' => 'rightInfo'
        ), array(
            array('core/paragraph', array(
                'className' => 'edition',
                'content' => '35<sup>e</sup> édition',
            )),
            array('core/paragraph', array(
                'className' => 'date',
                'content' => 'Du 1<sup>er</sup> au 5 septembre 2022',
            ))
        ))
    ))
);

if (get_post_type(get_the_ID()) == 'post') {
    $template = array(
        array('core/spacer', array(
            'height' => 10,
        )),
        array('core/group', array(), array(
            array('core/group', array(
                'className' => 'title'
            ), array(
                array('core/heading', array(
                    'level' => 1,
                    'content' => get_the_title(),
                    'className' => 'h2'
                )),
                array('core/spacer', array(
                    'height' => '1em'
                ))
            ))
        ))
    );
}

?>
<section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?> style="background-color: <?php echo get_field('background'); ?>">
    <!-- <div class="wrap">
        <div class="defaultHero">
            <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" templateLock="all" />
        </div>
    </div> -->
    <div class="background"></div>
    <section class="container">
        <div class="wrap">
            <h1><?php echo get_the_title(); ?></h1>
        </div>
    </section>
</section>