
<?php


$classes = ['single-activity-content'];
if (!empty($block['className']))
    $classes = array_merge($classes, explode(' ', $block['className']));
if (!empty($block['align']))
    $classes[] = 'align' . $block['align'];

$anchor = '';
if (!empty($block['anchor']))
    $anchor = ' id="' . sanitize_title($block['anchor']) . '"';


$template = array(

    array('core/group', array(
            'className' => 'leftContent'
        ), array(

            array('acf/activity-info', array()),

            array('core/paragraph', array(
                'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras
                    faucibus efficitur sem. Ut ultrices commodo nulla ut
                    condimentum. Maecenas eget mauris at neque varius luctus.
                    Integer libero lacus, tempor vitae ligula vehicula, facilisis
                    tempor elit. Nullam semper cursus arcu a vehicula. Curabitur
                    accumsan ullamcorper sagittis. Proin accumsan neque non magna
                    viverra, in sodales purus egestas. Phasellus quis rutrum nunc.
                    Aliquam eget quam dapibus, dignissim lectus a, aliquet nisl.
                    Proin vitae sapien velit. Vestibulum tempor arcu ut convallis
                    iaculis. In eu lorem ante. Mauris non est quam. Nunc sit amet
                    velit suscipit, venenatis augue vel, mattis neque. Sed maximus
                    sed massa quis ornare.',
                'textColor' => '#fff'
            ))
    )),

    array('core/group', array(
            'className' => 'rightContent'
        ), array(

            array('core/image', array(
                'url' => '/wp-content/uploads/2022/03/gallery3.png',
            ))
    )),

);


?>

<div class="<?php echo join(' ', $classes); ?>" <?php echo $anchor; ?>>

    <div class="content" style="padding-bottom:<?php echo get_field('padding-bottom') ?>em ; margin-bottom:<?php echo get_field('margin-bottom') ?>em ;">

        <div class="wrapper-activity">

            <InnerBlocks template="<?php echo esc_attr(wp_json_encode($template));?>" />        

        </div> 
            
    </div>

</div>

<style>
    @media (max-width: 960px) {
        
        .single-activity-content .content {
            padding-bottom: 6em !important;
            margin-bottom: -4em !important;
        }
    }
</style>