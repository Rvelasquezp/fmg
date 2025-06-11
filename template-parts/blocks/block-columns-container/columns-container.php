<?php 

$classes = ['columns-container'];
if( !empty( $block['className'] ) )
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['align'] ) )
    $classes[] = 'align' . $block['align'];

$anchor = '';
if( !empty( $block['anchor'] ) )
	$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$template = array(

	array('core/spacer', array(
		'height' => 50
	)),
	array('core/group', array(
		'className' => 'columnsGrid'
	), array(
		array('core/group', array(
			'className' => 'column-1'
		), array(
			array('core/heading', array(
				'level' => 3,
				'content' => 'Emplacement du Festival',
			)),
			array('core/paragraph', array(
				'content' => 'Au Parc de la Baie <br>
				Fin de semaine de la fête du Travail <br><br>
				<strong>Parc de la Bai</strong> <br>
				988, rue Saint-louis <br>
				Gatineau (Québec) Canada J8T 2S4',
			)),
		)),
		array('core/group', array(
			'className' => 'column-2'
		), array(
			array('core/heading', array(
				'level' => 3,
				'content' => 'Nos bureaux',
			)),
			array('core/paragraph', array(
				'content' => '<strong>Festival de montgolfières de Gatineau</strong><br />
				165, rue Saint-Antoine <br />
				Gatineau (Québec) Canada J8T 3M6',
			))
		))
	)),
	array('core/spacer', array(
		'height' => 50
	)),

	
); 
?>
		<section class="<?php echo join( ' ', $classes ); ?>" <?php echo $anchor; ?>>
			<div class="wrapBackground">
				<div class="wrap">
					<div class="columns-grid">
						<InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>"   />
					</div>
				</div>
			</div>
		</section>

