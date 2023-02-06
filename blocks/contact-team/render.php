<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

$strl_team    = ! empty( $attributes['team'] ) ? $attributes['team'] : '';
$strl_tagline = ! empty( $attributes['tagline'] ) ? $attributes['tagline'] : '';
$strl_name    = get_the_title( $strl_team );
$strl_img     = get_the_post_thumbnail_url( $strl_team );
?>
<section <?php echo wp_kses_post( get_block_wrapper_attributes( array( 'class' => 'contact-team' ) ) ); ?>>
	<div class="team-member">
		<img src="<?php echo esc_html( $strl_img ); ?>" />
		<p><?php echo esc_html( $strl_name ); ?></p>
		<h2><?php echo esc_html( $strl_tagline ); ?></h2>
		<?php echo wp_kses_post( $content ); ?>
	</div>
</section>
