<?php 

$classes = ['event-info'];
if( !empty( $block['className'] ) )
    $classes = array_merge( $classes, explode( ' ', $block['className'] ) );
if( !empty( $block['align'] ) )
    $classes[] = 'align' . $block['align'];

$anchor = '';
if( !empty( $block['anchor'] ) )
	$anchor = ' id="' . sanitize_title( $block['anchor'] ) . '"';

$template = array(
	array('core/spacer', array(
		'height' => 100,
	)),	
	array('core/group', array(
		'className' => 'eventInfoGrid'
	), array(
		array('core/heading', array(
			'level' => 2,
			'content' => 'Vivez des sensations fortes avec le parc d’attractions!',
			'className' => 'header'
		)),
		array('core/group', array(
			'className' => 'contentInfo'
		), array(
			array('core/paragraph', array(
				'content' => 'Se déroulant traditionnellement lors de la fête du Travail, le
				FMG – Festival de montgolfières de Gatineau est le plus grand
				événement estival en Outaouais. Reconnu pour sa programmation
				artistique diversifiée, le FMG vous propose des activités
				surprenantes pour toute la famille dans une ambiance féérique!',
			)),
			array('core/buttons', array(), array(
				array('core/button', array(
					'text' => 'En savoir plus',
				)),
			))
		)),
		array('core/group', array(
			'className' => 'image'
		), array(
			array('core/image', array(
				'url' => '/wp-content/uploads/2022/03/park.png'
			))
		))
	)),
	array('core/spacer', array(
		'height' => 100,
	)),
); 
?>
		<section class="<?php echo join( ' ', $classes ); ?>" <?php echo $anchor; ?>>
			<div class="wrap">
				<div class="allEventInfo">
					<InnerBlocks template="<?php echo esc_attr( wp_json_encode( $template ) ); ?>" />
					<!-- <h2>Vivez des sensations fortes avec le parc d’attractions!</h2>
					<div class="eventInfoGrid">
						<div class="contentInfo">
							<p>
								Se déroulant traditionnellement lors de la fête du Travail, le
								FMG – Festival de montgolfières de Gatineau est le plus grand
								événement estival en Outaouais. Reconnu pour sa programmation
								artistique diversifiée, le FMG vous propose des activités
								surprenantes pour toute la famille dans une ambiance féérique!
							</p>
							<div class="button">
								<a href="#">En savoir plus </a>
							</div>
						</div>
						<div class="image">
						<?php if(get_field('background_image')) {
						echo wp_get_attachment_image(get_field('background_image'), 'full');
						} ?>
						</div>
					</div> -->
				</div>
			</div>
		</section>
