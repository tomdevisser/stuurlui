<?php
/**
 * Registers the Services post type.
 *
 * @package strl
 */

/**
 * Registers the `services` post type.
 */
function strl_register_services_cpt() {
	register_post_type(
		'services',
		array(
			'labels'                => array(
				'name'                  => __( 'Services', 'strl' ),
				'singular_name'         => __( 'Service', 'strl' ),
				'all_items'             => __( 'All Services', 'strl' ),
				'archives'              => __( 'Service Archives', 'strl' ),
				'attributes'            => __( 'Service Attributes', 'strl' ),
				'insert_into_item'      => __( 'Insert into Service', 'strl' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Service', 'strl' ),
				'featured_image'        => _x( 'Featured Image', 'services', 'strl' ),
				'set_featured_image'    => _x( 'Set featured image', 'services', 'strl' ),
				'remove_featured_image' => _x( 'Remove featured image', 'services', 'strl' ),
				'use_featured_image'    => _x( 'Use as featured image', 'services', 'strl' ),
				'filter_items_list'     => __( 'Filter Services list', 'strl' ),
				'items_list_navigation' => __( 'Services list navigation', 'strl' ),
				'items_list'            => __( 'Services list', 'strl' ),
				'new_item'              => __( 'New Service', 'strl' ),
				'add_new'               => __( 'Add New', 'strl' ),
				'add_new_item'          => __( 'Add New Service', 'strl' ),
				'edit_item'             => __( 'Edit Service', 'strl' ),
				'view_item'             => __( 'View Service', 'strl' ),
				'view_items'            => __( 'View Services', 'strl' ),
				'search_items'          => __( 'Search Services', 'strl' ),
				'not_found'             => __( 'No Services found', 'strl' ),
				'not_found_in_trash'    => __( 'No Services found in trash', 'strl' ),
				'parent_item_colon'     => __( 'Parent Service:', 'strl' ),
				'menu_name'             => __( 'Services', 'strl' ),
			),
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => array( 'title', 'editor' ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-smiley',
			'show_in_rest'          => true,
			'rest_base'             => 'services',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
			// wp.data.select( 'core/block-editor' ).getBlocks() can be used.
			'template'              => array(
				array(
					'core/heading',
					array(
						'content' => 'Overview',
						'level'   => 2,
					),
				),
				array(
					'core/heading',
					array(
						'content' => 'Details',
						'level'   => 2,
					),
				),
				array(
					'core/embed',
					array(
						'providerNameSlug' => 'youtube',
					),
				),
			),
			'template_lock'         => 'all',
		)
	);

}
add_action( 'init', 'strl_register_services_cpt' );

/**
 * Sets the post updated messages for the `services` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `services` post type.
 */
function strl_services_cpt_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['services'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Service updated. <a target="_blank" href="%s">View Service</a>', 'strl' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'strl' ),
		3  => __( 'Custom field deleted.', 'strl' ),
		4  => __( 'Service updated.', 'strl' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Service restored to revision from %s', 'strl' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Service published. <a href="%s">View Service</a>', 'strl' ), esc_url( $permalink ) ),
		7  => __( 'Service saved.', 'strl' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Service submitted. <a target="_blank" href="%s">Preview Service</a>', 'strl' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Service scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Service</a>', 'strl' ), date_i18n( __( 'M j, Y @ G:i', 'strl' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Service draft updated. <a target="_blank" href="%s">Preview Service</a>', 'strl' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'strl_services_cpt_messages' );

/**
 * Sets the bulk post updated messages for the `services` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `services` post type.
 */
function strl_services_cpt_bulk_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['services'] = array(
		/* translators: %s: Number of Services. */
		'updated'   => _n( '%s Service updated.', '%s Services updated.', $bulk_counts['updated'], 'strl' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Service not updated, somebody is editing it.', 'strl' ) :
						/* translators: %s: Number of Services. */
						_n( '%s Service not updated, somebody is editing it.', '%s Services not updated, somebody is editing them.', $bulk_counts['locked'], 'strl' ),
		/* translators: %s: Number of Services. */
		'deleted'   => _n( '%s Service permanently deleted.', '%s Services permanently deleted.', $bulk_counts['deleted'], 'strl' ),
		/* translators: %s: Number of Services. */
		'trashed'   => _n( '%s Service moved to the Trash.', '%s Services moved to the Trash.', $bulk_counts['trashed'], 'strl' ),
		/* translators: %s: Number of Services. */
		'untrashed' => _n( '%s Service restored from the Trash.', '%s Services restored from the Trash.', $bulk_counts['untrashed'], 'strl' ),
	);

	return $bulk_messages;
}
add_filter( 'bulk_post_updated_messages', 'strl_services_cpt_bulk_messages', 10, 2 );
