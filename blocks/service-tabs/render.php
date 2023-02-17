<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

$strl_pretitle  = ! empty( $attributes['pretitle'] ) ? $attributes['pretitle'] : '';
$strl_title     = ! empty( $attributes['title'] ) ? $attributes['title'] : '';
$strl_services     = ! empty( $attributes['services'] ) ? $attributes['services'] : '';
?>
<section <?php echo wp_kses_post( get_block_wrapper_attributes( array( 'class' => 'service-tabs' ) ) ); ?>>
	<div class="block-header">
		<p class="pretitle"><?php echo esc_html( $strl_pretitle ); ?></p>
		<h2 class="block-title"><?php echo esc_html( $strl_title ); ?></h2>
	</div>
	<ul class="tab-titles">
		<?php
		foreach ( $strl_services as $key => $service ) {
			$service_title = get_the_title( $service );
			?>
			<li class="tab-title <?php echo 0 === $key ? 'active' : ''; ?>" data-service="post-<?php echo $service; ?>">
				<?php echo $service_title; ?>
			</li>
			<?php
		}
		?>
	</ul>
	<div class="tabs-content">
		<?php
		foreach ( $strl_services as $key => $service ) {
			$service_content = get_post( $service )->post_content;
			$service_title = get_post( $service )->post_title;
			$service_image = wp_get_attachment_url( get_post_thumbnail_id( get_post( $service ) ) );
			?>
			<div data-service="post-<?php echo $service; ?>" class="tab-content <?php echo 0 === $key ? 'active' : ''; ?>">
				<div class="left-col">
					<div class="media-wrapper">
						<img src="<?php echo $service_image; ?>">
					</div>
				</div>
				<div class="right-col">
					<div class="content-wrapper">
						<h3><?php echo $service_title; ?></h3>
						<?php echo $service_content; ?>
					</div>
				</div>
			</div>
			<?php
		}
		?>

	</div>
</section>
