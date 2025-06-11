<?php

$classes = ['guests-slider-list'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$args = array(
    'post_type' => 'programmation',
    'posts_per_page' => get_option('post_per_page'),
);
    
if (get_field('programmation')) {
    $args['post__in'] = get_field('programmation');
}

$the_query = new WP_Query($args);

if ($the_query->have_posts()) { ?>


        <div class="swiper guests-swiper swiper-guests">

            <div class="swiper-wrapper">
                
            <?php while ($the_query->have_posts()) {

              $the_query->the_post(); ?>
              
                <div class="swiper-slide">
                    <div style="position: relative;">
                    <div class="image">
                        <?php echo get_the_post_thumbnail(); ?>
                    </div>
					<div class="content">
						<div class="title">
							<h3><?php echo the_title(); ?></h3>
						</div>
						<?php if (!get_field('hide_program', get_the_ID())) { ?>
						<div class="button">
							<a href="<?php echo get_the_permalink(); ?>"><?php echo __('En savoir plus', 'utopian') ?></a>
						</div>
						<?php } ?>
					</div>
                    </div>
                </div>

            <?php } ?>

            </div>

        </div>

   
<?php } ?>