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

$eventScenes = $terms = get_terms([
    'taxonomy' => 'event_scene',
    'hide_empty' => true,
]);

$eventStyles = $terms = get_terms([
    'taxonomy' => 'event_style',
    'hide_empty' => true,
]);

$dates = $terms = get_terms([
    'taxonomy' => 'event_date',
    'hide_empty' => true,
]);

$args = array(
    'post_type' => 'programmation',
    'orderby' => 'menu_order',
    'order' => 'ASC',
    'posts_per_page' => -1,
    'meta_key' => 'hide_program',
    'meta_value' => '0'
);

if (!get_field('hide')) {
?>
    <section class="<?php echo join(' ', $classes); ?>">

        <div class="wrap">

            <div class="filterActivities">

                <div class="filter">

                    <div class="eachFilter">

                        <select class="date" name="days" id="days">

                            <option value="" selected>
								<?php echo __('All days', 'utopian'); ?>
                            </option>

                            <?php foreach ($dates as $date) { ?>
                                <option value="<?php echo $date->term_id ?>"><?php echo $date->name ?></option>
                            <?php } ?>

                        </select>

                        <i class="fa-thin fa-arrow-down-long"></i>

                    </div>

                    <div class="eachFilter">

                        <select class="scene" name="scenes" id="scenes">

                            <option value="" selected>
								<?php echo __('All stages', 'pixel'); ?>
                            </option>
                            <?php foreach ($eventScenes as $scene) { ?>
                                <option value="<?php echo $scene->term_id ?>"><?php echo $scene->name ?></option>
                            <?php } ?>

                        </select>

                        <i class="fa-thin fa-arrow-down-long"></i>

                    </div>

                    <div class="eachFilter">

                        <select class="genre" name="styles" id="styles">

                            <option value="" selected>
							<?php echo __('All styles', 'pixel'); ?>
                            </option>
                            <?php foreach ($eventStyles as $style) { ?>
                                <option value="<?php echo $style->term_id ?>"><?php echo $style->name ?></option>
                            <?php } ?>

                        </select>

                        <i class="fa-thin fa-arrow-down-long"></i>

                    </div>


                </div>

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
<?php } ?>