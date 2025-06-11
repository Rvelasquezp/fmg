
<?php


$classes = ['single-activity'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';

$template = array(

    array('acf/single-activity-header', array()),
    array('acf/single-activity-content', array()),
);


?>

<div class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>

    <div class="content">

        <div class="wrapper-activity">

            <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template));?>" />        

        </div> 
            
    </div>

</div>