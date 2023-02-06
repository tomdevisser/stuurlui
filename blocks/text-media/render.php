<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

$strl_pretitle  = ! empty( $attributes['pretitle'] ) ? $attributes['pretitle'] : '';
$strl_title     = ! empty( $attributes['title'] ) ? $attributes['title'] : '';
$strl_image_url = ! empty( $attributes['imageURL'] ) ? $attributes['imageURL'] : '';
?>
<section <?php echo wp_kses_post( get_block_wrapper_attributes( array( 'class' => 'text-media' ) ) ); ?>>
	<div class="left-col">
		<div class="media-wrapper">
			<img src="<?php echo esc_html( $strl_image_url ); ?>" />
		</div>
	</div>
	<div class="right-col">
		<?php echo wp_kses_post( $content ); ?>
	</div>
</section>
