<?php

$classes = ['activities-slider'];
if (!empty($block['className']))
	$classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
	$classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
	$anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$template = array(
	// array('core/heading', array(
	// 	'level' => 2,
	// 	'content' => 'Découvrez</br> notre programmation',
	// )),
	// array('core/button', array(
	// 	'text' => 'Voir toute la programmation'
	// )),
);
?>

<?php if (have_rows('slider_activity')) { ?>

	<section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
		<!-- <div class="wrap"> -->
		<div class="activitiesSlide">
			<div class="wrap">
				<div class="slideArrows">
					<div class="swiper-button-prev">
						<svg xmlns="http://www.w3.org/2000/svg" fill="#20255e" viewBox="0 0 60.53 61" width="3rem" height="3rem">
							<g id="Layer_2" data-name="Layer 2">
								<g id="Layer_1-2" data-name="Layer 1">
									<path d="M0,30.5A30.42,30.42,0,0,1,30.26,0a30.5,30.5,0,0,1,0,61A30.42,30.42,0,0,1,0,30.5Zm2.35,0A27.92,27.92,0,1,0,30.26,2.37,28.05,28.05,0,0,0,2.35,30.5Z" />
									<path class="arrow" d="M21.32,30.29A1.18,1.18,0,0,1,22.5,29.1H39.34a1.19,1.19,0,0,1,0,2.37H22.5A1.18,1.18,0,0,1,21.32,30.29Z" />
									<path class="arrow" d="M28.22,39.15a1.13,1.13,0,0,1-.9-.44L21.1,31a1.2,1.2,0,0,1,0-1.47l5.56-7.26a1.18,1.18,0,1,1,1.86,1.45l-5,6.51,5.62,7A1.19,1.19,0,0,1,29,38.88a1.21,1.21,0,0,1-.75.27Z" />
								</g>
							</g>
						</svg>
					</div>
					<div class="swiper-button-next">
						<svg xmlns="http://www.w3.org/2000/svg" fill="#20255e" viewBox="0 0 61 61" width="3rem" height="3rem">
							<g id="Layer_2" data-name="Layer 2">
								<g id="Layer_1-2" data-name="Layer 1">
									<path d="M30.26,61a30.5,30.5,0,0,1,0-61,30.5,30.5,0,0,1,0,61Zm0-58.63A28.13,28.13,0,1,0,58.18,30.5,28.05,28.05,0,0,0,30.26,2.37Z" />
									<path class="arrow" d="M38,31.47H21.19a1.19,1.19,0,0,1,0-2.37H38a1.19,1.19,0,0,1,0,2.37Z" />
									<path class="arrow" d="M32.31,39.15a1.19,1.19,0,0,1-.92-1.93L37,30.27l-5-6.51a1.18,1.18,0,1,1,1.86-1.45l5.56,7.26a1.2,1.2,0,0,1,0,1.47l-6.22,7.67a1.13,1.13,0,0,1-.9.44Z" />
								</g>
							</g>
						</svg>
					</div>
				</div>
			</div>
			<div class="swiper-activities">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<!-- Slides -->
					<?php while (have_rows('slider_activity')) {
						the_row(); ?>
						<div class="swiper-slide">
							<a href="<?php echo get_sub_field('button')['url']; ?>" target="<?php echo get_sub_field('button')['target']; ?>">
								<div class="image">
									<img class="noLazy" src="<?php echo get_sub_field('image')['url']; ?>" alt="<?php echo get_sub_field('image')['alt']; ?>" />
									<div class="button">
										<div class="btn">
											<?php echo get_sub_field('button')['title'] ?>
											<i class="fa-thin fa-arrow-right-long"></i>
										</div>
									</div>
								</div>
							</a>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<!-- </div> -->
	</section>

<?php } ?>