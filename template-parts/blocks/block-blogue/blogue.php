<?php

$classes = ['info-blog'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$args = array(
    'taxonomy' => 'category',
    'hide_empty' => false,
    'exclude' => array('1')
);

$taxonomies = get_terms($args);

$args = array(
    'post_type' => 'post',
    'posts_per_page' => -1
);

// The Query
$the_query = new WP_Query($args);

// The Loop
if ($the_query->have_posts()) {

?>

    <section class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>
        <div class="wrap">
            <div class="infoBlog">
                <?php
                if (!empty($taxonomies)) { ?>
                    <div class="selectCategory">
                        <div class="selectField">
                            <select name="categories" id="category">
                                <option value="" selected>
                                    <?php echo __('Toutes les catégories', 'utopian'); ?>
                                </option>
                                <?php foreach ($taxonomies as $taxonomy) { ?>
                                    <option value="<?php echo $taxonomy->term_id; ?>"><?php echo $taxonomy->name; ?></option>
                                <?php } ?>
                            </select>
                            <i class="fa-thin fa-arrow-down-long"></i>
                        </div>
                    </div>
                <?php } ?>
                <div class="allInfoBlog">

                    <?php
                    while ($the_query->have_posts()) {
                        $the_query->the_post();
                        blogPost(get_the_ID());
                    } ?>
                </div>
            </div>
        </div>
    </section>

<?php
}
?>