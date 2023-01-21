<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

?>
<p <?php echo wp_kses_post( get_block_wrapper_attributes() ); ?>>
	<?php esc_html_e( 'Pretitle – hello from a dynamic block!', 'strl' ); ?>
</p>
