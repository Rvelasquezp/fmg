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

$args = array(
    'taxonomy' => 'faq_category',
    'hide_empty' => false
);

if (get_field('faq_categories')) {
    $args['include'] = get_field('faq_categories');
}

$taxonomies = get_terms($args);
if (!empty($taxonomies)) { ?>
    <section class="faq-search" <?php echo $anchor; ?>>

        <div class="faqSearchSection">
            <div class="searchFaq">
                <input class="myInput" type="text" placeholder="<?php echo __('Rechercher', 'utopian'); ?>" />
                <i class="fa-thin fa-magnifying-glass"></i>
            </div>
            <div class="selectFilter">
                <select name="category" id="category">
                    <option value="" selected><?php echo __('Filtrer par', 'utopian'); ?></option>
                    <?php
                    foreach ($taxonomies as $taxonomy) {
                    ?>
                        <option value="<?php echo $taxonomy->term_id; ?>"><?php echo $taxonomy->name; ?></option>
                    <?php
                    }
                    ?>
                </select>
                <i class="fa-thin fa-arrow-down-long"></i>
            </div>
        </div>
        <?php
        foreach ($taxonomies as $taxonomy) {
        ?>
            <div class="faqCategory" data-id="<?php echo $taxonomy->term_id; ?>">

                <h2 class="is-style-small"><?php echo $taxonomy->name; ?></h2>

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
                            'terms'    => $taxonomy->term_id,
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
        }
        ?>
    </section>
<?php
}
?>