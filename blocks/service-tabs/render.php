<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

$strl_pretitle  = ! empty( $attributes['pretitle'] ) ? $attributes['pretitle'] : '';
$strl_title     = ! empty( $attributes['title'] ) ? $attributes['title'] : '';
?>
<section <?php echo wp_kses_post( get_block_wrapper_attributes( array( 'class' => 'service-tabs' ) ) ); ?>>
	<div class="header">
		<p><?php echo esc_html( $strl_pretitle ); ?></p>
		<h2><?php echo esc_html( $strl_title ); ?></h2>
	</div>
	<div class="left-col">
		<div class="media-wrapper">
			Lottie animatie
		</div>
	</div>
	<div class="right-col">
		Tekst en knop
	</div>
</section>
