<?php

/**
 * Registers the `milestone` post type.
 */
function milestone_init() {
	register_post_type(
		'milestone',
		[
			'labels'                => [
				'name'                  => __( 'Milestones', 'strl' ),
				'singular_name'         => __( 'Milestone', 'strl' ),
				'all_items'             => __( 'All Milestones', 'strl' ),
				'archives'              => __( 'Milestone Archives', 'strl' ),
				'attributes'            => __( 'Milestone Attributes', 'strl' ),
				'insert_into_item'      => __( 'Insert into Milestone', 'strl' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Milestone', 'strl' ),
				'featured_image'        => _x( 'Featured Image', 'milestone', 'strl' ),
				'set_featured_image'    => _x( 'Set featured image', 'milestone', 'strl' ),
				'remove_featured_image' => _x( 'Remove featured image', 'milestone', 'strl' ),
				'use_featured_image'    => _x( 'Use as featured image', 'milestone', 'strl' ),
				'filter_items_list'     => __( 'Filter Milestones list', 'strl' ),
				'items_list_navigation' => __( 'Milestones list navigation', 'strl' ),
				'items_list'            => __( 'Milestones list', 'strl' ),
				'new_item'              => __( 'New Milestone', 'strl' ),
				'add_new'               => __( 'Add New', 'strl' ),
				'add_new_item'          => __( 'Add New Milestone', 'strl' ),
				'edit_item'             => __( 'Edit Milestone', 'strl' ),
				'view_item'             => __( 'View Milestone', 'strl' ),
				'view_items'            => __( 'View Milestones', 'strl' ),
				'search_items'          => __( 'Search Milestones', 'strl' ),
				'not_found'             => __( 'No Milestones found', 'strl' ),
				'not_found_in_trash'    => __( 'No Milestones found in trash', 'strl' ),
				'parent_item_colon'     => __( 'Parent Milestone:', 'strl' ),
				'menu_name'             => __( 'Milestones', 'strl' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'editor' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-smiley',
			'show_in_rest'          => true,
			'rest_base'             => 'milestone',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'milestone_init' );

/**
 * Sets the post updated messages for the `milestone` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `milestone` post type.
 */
function milestone_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['milestone'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Milestone updated. <a target="_blank" href="%s">View Milestone</a>', 'strl' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'strl' ),
		3  => __( 'Custom field deleted.', 'strl' ),
		4  => __( 'Milestone updated.', 'strl' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Milestone restored to revision from %s', 'strl' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Milestone published. <a href="%s">View Milestone</a>', 'strl' ), esc_url( $permalink ) ),
		7  => __( 'Milestone saved.', 'strl' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Milestone submitted. <a target="_blank" href="%s">Preview Milestone</a>', 'strl' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Milestone scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Milestone</a>', 'strl' ), date_i18n( __( 'M j, Y @ G:i', 'strl' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Milestone draft updated. <a target="_blank" href="%s">Preview Milestone</a>', 'strl' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'milestone_updated_messages' );

/**
 * Sets the bulk post updated messages for the `milestone` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `milestone` post type.
 */
function milestone_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['milestone'] = [
		/* translators: %s: Number of Milestones. */
		'updated'   => _n( '%s Milestone updated.', '%s Milestones updated.', $bulk_counts['updated'], 'strl' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Milestone not updated, somebody is editing it.', 'strl' ) :
						/* translators: %s: Number of Milestones. */
						_n( '%s Milestone not updated, somebody is editing it.', '%s Milestones not updated, somebody is editing them.', $bulk_counts['locked'], 'strl' ),
		/* translators: %s: Number of Milestones. */
		'deleted'   => _n( '%s Milestone permanently deleted.', '%s Milestones permanently deleted.', $bulk_counts['deleted'], 'strl' ),
		/* translators: %s: Number of Milestones. */
		'trashed'   => _n( '%s Milestone moved to the Trash.', '%s Milestones moved to the Trash.', $bulk_counts['trashed'], 'strl' ),
		/* translators: %s: Number of Milestones. */
		'untrashed' => _n( '%s Milestone restored from the Trash.', '%s Milestones restored from the Trash.', $bulk_counts['untrashed'], 'strl' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'milestone_bulk_updated_messages', 10, 2 );
