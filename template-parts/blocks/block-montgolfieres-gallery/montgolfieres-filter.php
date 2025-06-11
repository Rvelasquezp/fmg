<?php

$classes = ['montgolfieres-filter'];
if (!empty($block['className']))
	$classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
	$classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
	$anchor = ' id="' . sanitize_title($block['anchor']) . '"';

?>

<?php

if( have_rows('links') ): ?>

    <section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>

        <select name="smooth_scroll" id="smooth_scroll" class="m-dropdown">

            <option value="" selected="">
                <?php echo __('Navigation rapide', 'utopian'); ?>
            </option>

    <?php
    while( have_rows('links') ) : the_row();

        $sub_value = get_sub_field('link');

        ?><option value="<?php echo $sub_value['url'] ?>"><?php echo $sub_value['title'] ?></option><?php

    endwhile; ?>

        </select>

    </section>

<?php
endif;

?>
