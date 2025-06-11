<?php

$classes = ['question-answer'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$template = array(
    array('core/paragraph', array(
        'content' => 'Toute utilisation illégale ou non autorisée du Site pour sa reproduction, pour la vente de produits, l\'utilisation d\'un robot, d\'un moteur de recherche ou d\'un autre dispositif automatisé, pourrait faire l\'objet d\'une enquête et mener ultérieurement à des procédures légales contre vous.',
    )),
);

if (get_field('use_prepared_faq') && get_field('faq_category')) {

    $term = get_term(get_field('faq_category'));

?>

    <div class="faqCategory" data-id="<?php echo $term->term_id; ?>" <?php echo $anchor; ?>>

        <?php if (!get_field('hide_category_title')) { ?>

            <h2 class="is-style-small"><?php echo $term->name; ?></h2>

        <?php } ?>

        <?php

        $args = array(
            'post_type' => 'faq',
            'orderby' => 'menu_order',
			'order' => 'ASC',
			'posts_per_page' => -1,
            'tax_query' => array(
                array(
                    'taxonomy' => 'faq_category',
                    'field'    => 'term_id',
                    'terms'    => $term->term_id,
                )
            )
        );

        // The Query
        $the_query = new WP_Query($args);

        // The Loop
        if ($the_query->have_posts()) {

            while ($the_query->have_posts()) {
                $the_query->the_post();
        ?>
                <div class="<?php echo join(' ', $classes); ?>">
                    <button class="question">
                        <span><?php echo get_the_title(); ?></span>
                        <div></div>
                    </button>
                    <div class="answer">
                        <?php echo get_the_content(); ?>
                    </div>
                </div>

        <?php
            }
        }
        ?>

    </div>

<?php

} else {

?>

    <div class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
        <button class="question">
            <span><?php echo (get_field('use_prepared_faq') && get_field('faq') ? get_the_title(get_field('faq')) : get_field('question')); ?></span>
            <div></div>
        </button>
        <div class="answer">
            <?php if (get_field('use_prepared_faq') && get_field('faq')) { ?>
                <?php echo get_the_content(null, false, get_field('faq'));
                ?>
            <?php } else { ?>
                <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
            <?php } ?>
        </div>
    </div>

<?php } ?>