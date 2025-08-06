<?php

$classes = ['gallery-container'];
if (!empty($block['className']))
	$classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
	$classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
	$anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$cats = $terms = get_terms([
    'taxonomy' => 'montgolfiere_cat',
    'hide_empty' => true,
]);

$args = array(
	'post_type' => 'montgolfiere',
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'posts_per_page' => -1
);

// The Query
$the_query = new WP_Query($args);

// The Loop
if ($the_query->have_posts() && !get_field('hide')) {

?>
<section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
    <div class="wrap" style="background-color: #20255e;">
        <section class="montgolfieres-filter">

            <div class="container_dropdown" style="position: relative;">

                <select name="montgolfiere_cat" id="montgolfiere_cat" class="m-dropdown">

                    <option value="" selected="">
                        <?php echo __('Tous les styles', 'utopian'); ?>
                    </option>
                    <?php foreach ($cats as $cat) { ?>
                    <option value="<?php echo $cat->term_id ?>"><?php echo $cat->name ?></option>
                    <?php } ?>

                </select>

            </div>

        </section>
        <div id="lightgallery" class="items-wrapper">
            <?php
				while ($the_query->have_posts()) {
					$the_query->the_post();
				?>
            <a href="<?php echo get_the_post_thumbnail_url(); ?>" class="gallery-item">
                <div class="montgolfiereImage">
                    <?php echo get_the_post_thumbnail(); ?>
                    <div class="item-title">
                        <p><?php echo get_the_title(); ?></p>
                    </div>
                </div>
                <div class="item-description">
                    <p class="title"><?php echo get_the_title(); ?></p>
                    <p class="name"><?php echo get_field('name', get_the_ID()); ?></p>
                    <p class="location"><?php echo get_field('location', get_the_ID()); ?></p>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
</section>

<?php
}