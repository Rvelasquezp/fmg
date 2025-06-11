<?php

$classes = ['hero-section'];

if (get_field('which_pages_to_show_banner', 'options')) {
	$currentPage = get_the_ID();
	if (in_array($currentPage, get_field('which_pages_to_show_banner', 'options'))) {
		$classes[] = 'withBanner';
	}
}

if (!empty($block['className']))
	$classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
	$classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
	$anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$template = array(
	array('core/paragraph', array(
		'content' => '35e édition',
	)),
	array('core/heading', array(
		'level' => 1,
		'content' => 'Du 1er au 5 <br> septembre <br> 2022',
	)),
	array('core/button', array(
		'text' => 'Découvrez le festival',
		'className' => 'is-style-arrow-down'
	)),
);
?>
<section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
	<div class="wrap">
		<div class="heroSection newVersion">
			<?php if (get_field('is_background_a_video')) { ?>

				<?php if (get_field('is_the_video_an_mp4')) { ?>

					<?php if (get_field('background_video')) { ?>

						<div class="image">
							<div class="home-hero-video">
								<video autoplay muted loop playsinline>

									<source src="<?php echo get_field('background_video')['url']; ?>" type="video/mp4">

								</video>
							</div>
						</div>


					<?php } ?>

				<?php } else { ?>

					<div class="image">
						<div class="home-hero-video">
							<?php
							$iframe = get_field('oembed');

							// Use preg_match to find iframe src.
							preg_match('/src="(.+?)"/', $iframe, $matches);
							$src = $matches[1];

							// Add extra parameters to src and replace HTML.
							$params = array(
								'title' => 0,
								'byline' => 0,
								'portrait' => 0,
								'background' => 1,
								'controls'  => 0,
								'hd'        => 1,
								'loop'  => 1,
								'autoplay' => 1,
							);
							$new_src = add_query_arg($params, $src);
							$iframe = str_replace($src, $new_src, $iframe);

							// Add extra attributes to iframe HTML.
							$attributes = 'frameborder="0"';
							$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

							// Display customized HTML.
							echo $iframe;
							?>
						</div>
					</div>


				<?php } ?>

			<?php } else { ?>
				<?php if (get_field('background_image')) {
				?>
					<div class="image">
						<?php
						echo wp_get_attachment_image(get_field('background_image'), 'full');
						?>
					</div>
				<?php
				} ?>
			<?php } ?>

			<img class="m" src="/wp-content/themes/utopian/template-parts/blocks/block-hero/m.png" />
			<img class="f" src="/wp-content/themes/utopian/template-parts/blocks/block-hero/f.png" />
			<img class="g" src="/wp-content/themes/utopian/template-parts/blocks/block-hero/g.png" />

			<svg id="baloune" class="baloune1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 101.73 128.82">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M101.73,50.87C101.73,22.78,78.96,0,50.87,0c20.82,0,37.69,22.78,37.69,50.87,0,20.32-19.72,45.9-30.63,58.5h-2.82c6.55-12.6,18.38-38.18,18.38-58.5C73.48,22.78,63.36,0,50.87,0c4.16.02,7.53,22.78,7.53,50.87,0,20.32-3.95,45.9-6.13,58.5h-2.82c-2.18-12.6-6.13-38.18-6.13-58.5,0-28.09,3.38-50.87,7.54-50.87-12.49,0-22.62,22.78-22.62,50.87,0,20.32,11.83,45.9,18.38,58.5h-2.83c-10.91-12.6-30.63-38.18-30.63-58.5,0-14.05,4.22-26.76,11.04-35.96C31.03,5.7,40.45,0,50.87,0,22.78,0,0,22.78,0,50.87c0,20.32,26.61,45.9,41.34,58.5h0v2.01c0,.48.39.87.87.87h.01l1,7.18h-.27c-.46,0-.8.41-.72.86l.21,1.19c.03.2.21.34.41.34h.11l.87,5.84c.1.67.67,1.16,1.35,1.16h11.37c.68,0,1.25-.5,1.35-1.16l.87-5.84h.11c.2,0,.37-.15.41-.34l.21-1.19c.08-.45-.27-.86-.72-.86h-.27l1-7.18h.01c.48,0,.87-.39.87-.87v-2.01h0c14.73-12.6,41.33-38.18,41.33-58.5ZM50.24,119.43h-5.75l-1-7.18h6.75v7.18ZM57.24,119.43h-5.75v-7.18h6.75l-1,7.18Z" />
				</g>
			</svg>

			<svg id="baloune" class="baloune2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 101.73 128.82">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M101.73,50.87C101.73,22.78,78.96,0,50.87,0c20.82,0,37.69,22.78,37.69,50.87,0,20.32-19.72,45.9-30.63,58.5h-2.82c6.55-12.6,18.38-38.18,18.38-58.5C73.48,22.78,63.36,0,50.87,0c4.16.02,7.53,22.78,7.53,50.87,0,20.32-3.95,45.9-6.13,58.5h-2.82c-2.18-12.6-6.13-38.18-6.13-58.5,0-28.09,3.38-50.87,7.54-50.87-12.49,0-22.62,22.78-22.62,50.87,0,20.32,11.83,45.9,18.38,58.5h-2.83c-10.91-12.6-30.63-38.18-30.63-58.5,0-14.05,4.22-26.76,11.04-35.96C31.03,5.7,40.45,0,50.87,0,22.78,0,0,22.78,0,50.87c0,20.32,26.61,45.9,41.34,58.5h0v2.01c0,.48.39.87.87.87h.01l1,7.18h-.27c-.46,0-.8.41-.72.86l.21,1.19c.03.2.21.34.41.34h.11l.87,5.84c.1.67.67,1.16,1.35,1.16h11.37c.68,0,1.25-.5,1.35-1.16l.87-5.84h.11c.2,0,.37-.15.41-.34l.21-1.19c.08-.45-.27-.86-.72-.86h-.27l1-7.18h.01c.48,0,.87-.39.87-.87v-2.01h0c14.73-12.6,41.33-38.18,41.33-58.5ZM50.24,119.43h-5.75l-1-7.18h6.75v7.18ZM57.24,119.43h-5.75v-7.18h6.75l-1,7.18Z" />
				</g>
			</svg>

			<svg id="baloune" class="baloune3" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 101.73 128.82">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M101.73,50.87C101.73,22.78,78.96,0,50.87,0c20.82,0,37.69,22.78,37.69,50.87,0,20.32-19.72,45.9-30.63,58.5h-2.82c6.55-12.6,18.38-38.18,18.38-58.5C73.48,22.78,63.36,0,50.87,0c4.16.02,7.53,22.78,7.53,50.87,0,20.32-3.95,45.9-6.13,58.5h-2.82c-2.18-12.6-6.13-38.18-6.13-58.5,0-28.09,3.38-50.87,7.54-50.87-12.49,0-22.62,22.78-22.62,50.87,0,20.32,11.83,45.9,18.38,58.5h-2.83c-10.91-12.6-30.63-38.18-30.63-58.5,0-14.05,4.22-26.76,11.04-35.96C31.03,5.7,40.45,0,50.87,0,22.78,0,0,22.78,0,50.87c0,20.32,26.61,45.9,41.34,58.5h0v2.01c0,.48.39.87.87.87h.01l1,7.18h-.27c-.46,0-.8.41-.72.86l.21,1.19c.03.2.21.34.41.34h.11l.87,5.84c.1.67.67,1.16,1.35,1.16h11.37c.68,0,1.25-.5,1.35-1.16l.87-5.84h.11c.2,0,.37-.15.41-.34l.21-1.19c.08-.45-.27-.86-.72-.86h-.27l1-7.18h.01c.48,0,.87-.39.87-.87v-2.01h0c14.73-12.6,41.33-38.18,41.33-58.5ZM50.24,119.43h-5.75l-1-7.18h6.75v7.18ZM57.24,119.43h-5.75v-7.18h6.75l-1,7.18Z" />
				</g>
			</svg>

			<svg id="etoile" class="etoile1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.04 59.46">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M21.02,59.46c0-22.3-5.25-29.73-21.02-29.73,15.76,0,21.02-7.43,21.02-29.73,0,22.3,5.25,29.73,21.02,29.73-15.76,0-21.02,7.43-21.02,29.73Z" />
				</g>
			</svg>

			<svg id="etoile" class="etoile2" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.04 59.46">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M21.02,59.46c0-22.3-5.25-29.73-21.02-29.73,15.76,0,21.02-7.43,21.02-29.73,0,22.3,5.25,29.73,21.02,29.73-15.76,0-21.02,7.43-21.02,29.73Z" />
				</g>
			</svg>

			<svg id="etoile" class="etoile3" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.04 59.46">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M21.02,59.46c0-22.3-5.25-29.73-21.02-29.73,15.76,0,21.02-7.43,21.02-29.73,0,22.3,5.25,29.73,21.02,29.73-15.76,0-21.02,7.43-21.02,29.73Z" />
				</g>
			</svg>

			<svg id="etoile" class="etoile4" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.04 59.46">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M21.02,59.46c0-22.3-5.25-29.73-21.02-29.73,15.76,0,21.02-7.43,21.02-29.73,0,22.3,5.25,29.73,21.02,29.73-15.76,0-21.02,7.43-21.02,29.73Z" />
				</g>
			</svg>

			<svg id="etoilegrosse" class="etoile1big" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.04 59.46">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M21.02,59.46c0-22.3-5.25-29.73-21.02-29.73,15.76,0,21.02-7.43,21.02-29.73,0,22.3,5.25,29.73,21.02,29.73-15.76,0-21.02,7.43-21.02,29.73Z" />
				</g>
			</svg>

			<svg id="etoilegrosse" class="etoile2big" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 42.04 59.46">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M21.02,59.46c0-22.3-5.25-29.73-21.02-29.73,15.76,0,21.02-7.43,21.02-29.73,0,22.3,5.25,29.73,21.02,29.73-15.76,0-21.02,7.43-21.02,29.73Z" />
				</g>
			</svg>

			<svg id="moon" class="moon1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 121.32 158.86">
				<g id="Layer_1-2" data-name="Layer 1">
					<path style="fill: #facee1;" d="M.83,89.37c6.37,44.28,47.43,75.02,91.71,68.66,10.45-1.5,20.15-4.93,28.78-9.89-3.53,1.01-7.18,1.8-10.92,2.34-44.28,6.37-85.34-24.37-91.71-68.66C13.83,47.99,30.62,16.04,58.57,0,20.28,10.98-4.99,48.83.83,89.37Z" />
				</g>
			</svg>

			<svg id="ship" class="ship1" data-name="Layer 2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 78.93 67.33">
				<g id="Layer_1-2" data-name="Layer 1">
					<g>
						<path style="fill: #facee1;" d="M55.11,45.96l12.79-10.02c5.68-4.45,9.16-17.96,10.89-26.87.87-4.47-2.42-8.67-6.97-8.9-9.06-.45-23.02-.32-28.7,4.13l-12.79,10.02c-3.62-4.44-10.15-5.19-14.68-1.64l-7.36,5.76c-.38.29-.68.65-.89,1.04-.81,1.47-.34,3.32,1,4.33,1.65,1.25,5.99,4.63,10.63,9l-.67.53c-2.22,1.74-2.61,4.95-.87,7.17l9.12,11.65c1.74,2.22,4.95,2.61,7.17.87l.67-.53c3.13,5.55,5.37,10.58,6.19,12.47.66,1.54,2.35,2.45,3.97,2.01.43-.12.85-.32,1.23-.62l7.36-5.76c4.53-3.55,5.37-10.06,1.92-14.64ZM45.77,27.75c-3.21-4.1-2.49-10.03,1.61-13.25,4.1-3.21,10.03-2.49,13.25,1.61,3.21,4.1,2.49,10.03-1.61,13.25-4.1,3.21-10.03,2.49-13.25-1.61Z" />
						<path style="fill: #facee1;" d="M17.48,49.9c-.7-.89-1.98-1.05-2.87-.35l-11.75,9.2c-.89.7-1.05,1.98-.35,2.87.7.89,1.98,1.05,2.87.35l11.75-9.2c.89-.7,1.05-1.98.35-2.87Z" />
						<path style="fill: #facee1;" d="M10.82,41.39c-.7-.89-1.98-1.05-2.87-.35l-7.16,5.61c-.89.7-1.05,1.98-.35,2.87.7.89,1.98,1.05,2.87.35l7.16-5.61c.89-.7,1.05-1.98.35-2.87Z" />
						<path style="fill: #facee1;" d="M24.15,58.41c-.7-.89-1.98-1.05-2.87-.35l-7.16,5.61c-.89.7-1.05,1.98-.35,2.87.7.89,1.98,1.05,2.87.35l7.16-5.61c.89-.7,1.05-1.98.35-2.87Z" />
					</g>
				</g>
			</svg>

			<div class="content">
				<InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
			</div>

		</div>
	</div>
</section>