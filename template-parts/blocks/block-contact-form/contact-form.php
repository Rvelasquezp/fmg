<?php 

$classes = ['contact-form'];
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
		'content' => 'Pour nous jondre',
	)),
	array('core/paragraph', array(
		'content' => 'Les détails concernant linscription des bénévoles pour la 35e
		édition seront disponibles au printemps 2022.',
	)),
); 
?>
		<section class="<?php echo join( ' ', $classes ); ?>" <?php echo $anchor; ?>>
			<div class="wrap">
				<div class="allContactForm">
				<InnerBlocks template="<?php echo esc_attr(wp_json_encode($template)); ?>"  templateLock="all" />
					<!-- <h2>Pour nous jondre</h2>
					<p>
						Les détails concernant l'inscription des bénévoles pour la 35e
						édition seront disponibles au printemps 2022.
					</p> -->
					<div class="contactForm">
					<?php if (get_field('contact_form')) {
                    echo do_shortcode('[contact-form-7 id="'.get_field('contact_form').'" ]');
                    } ?>
						<!-- <input type="text" id="fname" name="fname" placeholder="Nom" />
						<input
							type="email"
							id="email"
							name="email"
							placeholder="Courriel"
						/>
						<textarea placeholder="Message"></textarea>
						<input type="submit" value="S’inscrire" /> -->
					</div>
				</div>
			</div>
		</section>

