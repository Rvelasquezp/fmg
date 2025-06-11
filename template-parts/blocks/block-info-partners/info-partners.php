<?php

$classes = ['info-partners'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$args = array(
    'taxonomy' => 'partner_category',
    'hide_empty' => false
);

if (get_field('partner_categories')) {
    $args['include'] = get_field('partner_categories');
}

$taxonomies = get_terms($args);

if (!empty($taxonomies)) { ?>

    <section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
        <div class="wrap">
            <div class="infoPartners">
                <?php
                foreach ($taxonomies as $taxonomy) {

                    $args = array(
                        'post_type' => 'partner',
                        'orderby' => 'menu_order',
						'order' => 'ASC',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'partner_category',
                                'field'    => 'term_id',
                                'terms'    => $taxonomy->term_id,
                            )
                        )
                    );

                    // The Query
                    $the_query = new WP_Query($args);

                    // The Loop
                    if ($the_query->have_posts()) {

                ?>
                        <div class="eachInfoPartners">
                            <div class="title">
                                <h3><?php echo $taxonomy->name; ?></h3>
                            </div>
                            <div class="partnerLogos">
                                <?php
                                while ($the_query->have_posts()) {
                                    $the_query->the_post(); ?>
                                    <?php if (get_field('link', get_the_ID())) { ?>
                                        <a href="<?php echo get_field('link', get_the_ID()); ?>" target="_blank" class="eachLogo">
                                            <?php echo get_the_post_thumbnail(); ?>
                                        </a>
                                    <?php } else { ?>
                                        <div class="eachLogo">
                                            <?php echo get_the_post_thumbnail(); ?>
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </section>
<?php
}
?>