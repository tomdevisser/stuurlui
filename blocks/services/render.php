<?php
/**
 * Renders the Pretitle block.
 *
 * @package strl
 */

$strl_block_attributes = get_block_wrapper_attributes( array( 'class' => 'services' ) );
$strl_block_pretitle   = $attributes['pretitle'] ?? '';
$strl_block_title      = $attributes['title'] ?? '';
?>
<div <?php echo wp_kses_post( $strl_block_attributes ); ?>>
	<p class="pretitle"><?php echo wp_kses_post( $strl_block_pretitle ); ?></p>
	<h2><?php echo wp_kses_post( $strl_block_title ); ?></h2>

	<div class="service-tab-titles">
		<button>Strategie</button>
		<button>Design</button>
		<button>Development</button>
	</div>

	<div class="service-tab-content">
		<div class="service-tab-image">

		</div>
		<div class="service-tab-card">
			<?php echo wp_kses_post( $content ); ?>
		</div>
	</div>
</div>
