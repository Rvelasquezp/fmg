<?php

$classes = ['accordion'];
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
		'content' => 'Véhicules récréatifs',
	)),
	array('core/paragraph', array(
		'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum eget maximus arcu. Nunc et dictum massa. Proin quis nibh vel erat iaculis vulputate in id velit. Nulla vitae mollis urna, nec commodo elit. Duis non lorem lacinia, auctor nibh at, viverra nisl. Mauris ullamcorper fermentum massa, nec cursus tellus vehicula volutpat. Curabitur suscipit, sem in pulvinar fermentum, erat eros interdum sapien, sed convallis nisl elit et lectus. Morbi interdum est placerat dictum vestibulum. Donec pharetra ut arcu id cursus. Nulla efficitur vulputate lacus eget suscipit. Curabitur vel felis ut nunc suscipit cursus in vel metus. In neque purus, lobortis eu pharetra eu, tincidunt vitae nisl. Vivamus in tristique nulla, non lacinia nisi. Vestibulum at dignissim ligula, quis convallis libero. Vestibulum ultrices mauris quis sapien mollis mollis.',
	)),
);
?>

<div class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
	<div class="svgSwitcher" style="display: none;">
		<?php echo get_field('icone_svg'); ?>
	</div>
	<InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>" />
</div>