<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

$strl_block_attributes = get_block_wrapper_attributes( array( 'class' => 'textmedia' ) );
?>
<section <?php echo wp_kses_post( $strl_block_attributes ); ?>>
	<div class="text-wrapper">
		<?php echo wp_kses_post( $content ); ?>
	</div>
	<div class="media-wrapper">
		<img src="<?php echo wp_kses_post( $attributes['image']['url'] ); ?>" />
	</div>
</section>
