<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

?>
<p <?php echo wp_kses_post( get_block_wrapper_attributes() ); ?>>
	<?php echo wp_kses_post( $attributes['text'] ); ?>
</p>
