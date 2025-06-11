<?php

$classes = ['partners-slider'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$args = array(
    'taxonomy' => 'partner_category',
    'hide_empty' => false,
    'fields' => 'ids',
);

if (get_field('partner_categories')) {
    $args['include'] = get_field('partner_categories');
}

$taxonomies = get_terms($args);

if (!empty($taxonomies) && get_field('display_by_category')) {

    $args = array(
        'post_type' => 'partner',
        'orderby' => 'menu_order',
		'order' => 'ASC',
        'meta_key' => 'show_in_carousel',
	    'meta_value' => true,
        'tax_query' => array(
            array(
                'taxonomy' => 'partner_category',
                'field'    => 'term_id',
                'terms'    => $taxonomies,
            )
        )
    );

} else {
	
	$args = array(
		'post_type' => 'partner',
		'orderby' => 'menu_order',
		'order' => 'ASC',
		'meta_key' => 'show_in_carousel',
		'meta_value' => true,
		'posts_per_page' => -1
	);
	
	if(get_field('partners_to_show')) {
		$args['post__in'] = get_field('partners_to_show');
		$args['orderby'] = 'post__in';
	}
	
}

    // The Query
    $the_query = new WP_Query($args);

    // The Loop
    if ($the_query->have_posts()) {

?>

        <section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
            <div class="wrap">
                <div class="partnersSlide">
                    <div class="swiper-partners">
                        <!-- Additional required wrapper -->
                        <div class="swiper-wrapper">
                            <!-- Slides -->
                            <?php
                            while ($the_query->have_posts()) {
                                $the_query->the_post(); ?>
                                <div class="swiper-slide">
                                    <?php if (get_field('link', get_the_ID())) { ?>
                                        <a href="<?php echo get_field('link', get_the_ID()); ?>" target="_blank">
                                            <?php echo get_the_post_thumbnail(); ?>
                                        </a>
                                    <?php } else { ?>
                                        <div>
                                            <?php echo get_the_post_thumbnail(); ?>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    }

?>