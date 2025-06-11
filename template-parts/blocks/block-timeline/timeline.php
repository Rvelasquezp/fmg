<?php

$classes = ['timeline-slider'];
if (!empty($block['className']))
	$classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
	$classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
	$anchor = ' id="' . sanitize_title($block['anchor']) . '"';


$args = array(
	'post_type' => 'history',
	'orderby' => 'menu_order',
	'order' => 'ASC',
	'posts_per_page' => -1
);

if (get_field('timeline')) {
	$args['post__in'] = get_field('timeline');
}

// The Query
$the_query = new WP_Query($args);

// The Loop
if ($the_query->have_posts()) {

?>

	<section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
		<div class="timeline-slider-pagination">
			<button class="timeline-slider-nav-next">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 154.5 154.5">
					<defs>
						<style>
							.d,
							.e {
								fill: #fff;
							}
						</style>
					</defs>
					<g id="a" />
					<g id="b">
						<g id="c">
							<g>
								<path class="e" d="M77.25,0c42.597,0,77.25,34.653,77.25,77.25s-34.653,77.25-77.25,77.25S0,119.847,0,77.25,34.653,0,77.25,0Zm0,148.5c39.294,0,71.25-31.956,71.25-71.25S116.544,6,77.25,6,6,37.956,6,77.25s31.956,71.25,71.25,71.25Z" />
								<path class="d" d="M57.423,74.79h42.996c1.6641,0,3,1.3477,3,3s-1.3359,3-3,3H57.423c-1.6641,0-3-1.3477-3-3s1.3359-3,3-3Z" />
								<path class="d" d="M72.036,55.335c.668,0,1.3359,.2227,1.8984,.6797,1.2891,1.043,1.4766,2.9414,.4336,4.2186l-14.3556,17.6016,12.7383,16.4883c1.0195,1.3125,.7734,3.1992-.5391,4.2069-1.3125,1.0195-3.1992,.7617-4.2069-.5391l-14.1915-18.375c-.8555-1.1016-.832-2.6484,.0469-3.7266l15.8673-19.4415c.5742-.7383,1.4414-1.1133,2.3086-1.1133v.0004Z" />
							</g>
						</g>
					</g>
				</svg>
			</button>

			<!-- Years loop here -->
			<div class="timeline-slider-years swiper">
				<div class="swiper-wrapper">
					<?php
					while ($the_query->have_posts()) {
						$the_query->the_post(); ?>
						<div class="swiper-slide">
							<button><?php echo get_the_title(); ?></button>
						</div>
					<?php } 
					wp_reset_postdata();
					?>
				</div>
			</div>

		</div>

		<div class="timelineWrap wrap">
			<div class="timeline-slider-holder">
				<div class="swiper-wrapper">
					<!-- Slides content loop here -->
					<?php
					while ($the_query->have_posts()) {
						$the_query->the_post(); ?>
						<div class="swiper-slide">
							<div class="timeline-slide">
								<?php echo get_the_content(); ?>
							</div>
						</div>
					<?php } 
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</section>

<?php
}
?>