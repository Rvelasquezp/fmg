<?php

$classes = ['person-list'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

?>

<?php

$args = array(
    'post_type' => 'board_member',
    'posts_per_page' => -1,
    'orderby' => 'menu_order',
    'order' => 'ASC'
);

$all_members = new WP_Query($args);

if ($all_members->have_posts()) {

?>

    <section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>

        <div class="wrap">

            <div class="person-list-wrapper person-list-v1">

                <?php while ($all_members->have_posts()) {
                    $all_members->the_post();  ?>

                    <div class="person-list-item">

                        <div class="person-list-item-content">
                            <?php if (has_post_thumbnail()) { ?>
                                <div class="person-img">
                                    <?php echo get_the_post_thumbnail() ?>
                                </div>
                            <?php } ?>
                            <div class="contne">
                                <h3><?php echo get_the_title() ?></h3>
                                <p>
                                    <?php echo get_field('position', get_the_ID()) ?>
                                </p>
                            </div>

                        </div>

                        <?php if (get_field('email', get_the_ID())) { ?>
                            <a class="btn show-on-hover" href="mailto:<?php echo get_field('email', get_the_ID()) ?>">Courriel</a>
                        <?php } ?>
                    </div>

                <?php } ?>

            </div>
        </div>

    </section>

<?php
}
?>