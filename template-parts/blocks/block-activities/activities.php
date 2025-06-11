<?php

$style = get_field('style');

$classes = ['filter-activities', $style];

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
        'content' => 'Des activités surprenantes<br> pour toute la famille',

    )),
    array('core/paragraph', array(
        'content' => 'Se déroulant traditionnellement lors de la fête du Travail, le FMG – Festival de montgolfières de Gatineau est le plus grand événement estival en Outaouais. Reconnu pour sa programmation artistique diversifiée, le FMG vous propose des activités surprenantes pour toute la famille dans une ambiance féérique!',
    )),
    array('core/buttons', array(), array(
        array('core/button', array(
            'text' => 'En savoir plus',
        )),
    ))
);


$ageGroups = $terms = get_terms([
    'taxonomy' => 'age_group',
    'hide_empty' => true,
]);


$dates = $terms = get_terms([
    'taxonomy' => 'event_date',
    'hide_empty' => true,
]);

$args = array(
    'post_type' => 'activity',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => -1
);

if (get_field('categories')) {
    $args['tax_query'] = array(
        array(
            'taxonomy' => 'activity_category',
            'field'    => 'term_id',
            'terms'    => get_field('categories'),
        ),
    );
}

?>
<section class="<?php echo join(' ', $classes); ?>">

    <div class="wrap">

        <div class="filterActivities" data-cat="<?php echo json_encode(get_field('categories')); ?>" style="background-image: linear-gradient(to bottom,<?php echo get_field('background_color_1'); ?>,<?php echo get_field('background_color_2'); ?>,<?php echo get_field('background_color_3'); ?>,<?php echo get_field('background_color_4'); ?>,<?php echo get_field('background_color_5'); ?>);">

            <?php if (!get_field('turn_filters_off')) { ?>

                <div class="filter">

                    <div class="eachFilter">

                        <select name="age" id="age">

                            <option value="" selected>
                                <?php echo __('All ages', 'utopian'); ?>
                            </option>
                            <?php foreach ($ageGroups as $age) { ?>
                                <option value="<?php echo $age->term_id ?>"><?php echo $age->name ?></option>
                            <?php } ?>

                        </select>

                        <i class="fa-thin fa-arrow-down-long"></i>

                    </div>

                    <div class="eachFilter">

                        <select name="days" id="days">

                            <option value="" selected>
                                <?php echo __('All days', 'utopian'); ?>
                            </option>

                            <?php foreach ($dates as $date) { ?>
                                <option value="<?php echo $date->term_id ?>"><?php echo $date->name ?></option>
                            <?php } ?>

                        </select>

                        <i class="fa-thin fa-arrow-down-long"></i>

                    </div>
                </div>

            <?php } ?>

            <?php $the_query = new WP_Query($args);

            if ($the_query->have_posts()) { ?>

                <div class="galleryActivities">

                    <?php while ($the_query->have_posts()) {
                        $the_query->the_post();
                        singleContentBox(get_the_ID());
                    } ?>

                </div>

            <?php } ?>
        </div>
    </div>

</section>