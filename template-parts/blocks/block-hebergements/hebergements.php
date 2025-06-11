<?php

$classes = ['hebergements'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$args = array(
    'post_type' => 'hebergement',
    'orderby' => 'menu_order',
	'order' => 'ASC',
	'posts_per_page' => -1
);


if (get_field('hebergements')) {
    $args['post__in'] = get_field('hebergements');
}

// The Query
$the_query = new WP_Query($args);

// The Loop
if ($the_query->have_posts()) {

?>

    <section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
        <?php
        while ($the_query->have_posts()) {
            $the_query->the_post(); ?>

            <div class="eachHebergement">

                <?php if (get_field('website', get_the_ID())) { ?>
                    <a href="<?php echo get_field('website', get_the_ID()); ?>" target="_blank" class="hebergementImage">
                        <?php echo get_the_post_thumbnail(); ?>
                    </a>
                <?php } else { ?>
                    <div class="hebergementImage">
                        <?php echo get_the_post_thumbnail(); ?>
                    </div>
                <?php } ?>

                <div class="hebergementContent">
                    <h2><?php echo get_the_title(); ?></h2>
                    <div class="innerContent">
                        <?php echo get_the_content(); ?>
                    </div>
                </div>

            </div>

        <?php
        }
        ?>
    </section>
<?php
}
?>