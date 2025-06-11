<?php 

$classes = ['title-collapse'];
if( !empty( $block['className'] ) )
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['align'] ) )
    $classes[] = 'align' . $block['align'];

$anchor = '';
if( !empty( $block['anchor'] ) )
	$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

	$template = array(
		array('core/heading', array(
			'level' => 2,
			'content' => 'Devenez bénévol pour le FMG!',
		)),
		array('core/button', array(
			'text' => 'S’inscrire'
		)),
	); 
?>
		<section class="<?php echo join( ' ', $classes ); ?>" <?php echo $anchor; ?>>
			<div class="wrap">
				<div class="titleCollapse">
					<InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>"   />
				</div>
			</div>
		</section>

