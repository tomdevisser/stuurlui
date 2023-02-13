<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

$strl_pretitle = ! empty( $attributes['pretitle'] ) ? $attributes['pretitle'] : '';
$strl_title    = ! empty( $attributes['title'] ) ? $attributes['title'] : '';
?>
<section <?php echo wp_kses_post( get_block_wrapper_attributes( array( 'class' => 'milestones' ) ) ); ?>>
<p class="pretitle"><?php echo esc_html( $strl_pretitle ); ?></p>
		<h2 class="block-title"><?php echo esc_html( $strl_title ); ?></h2>
</section>
