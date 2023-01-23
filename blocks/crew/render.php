<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

$strl_block_attributes = get_block_wrapper_attributes( array( 'class' => 'crew' ) );
$strl_block_title      = $attributes['title'] ?? '';
?>
<div <?php echo wp_kses_post( $strl_block_attributes ); ?>>

</div>
