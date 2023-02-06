<?php

/**
 * Registers the `team` post type.
 */
function team_init() {
	register_post_type(
		'team',
		[
			'labels'                => [
				'name'                  => __( 'Teams', 'strl' ),
				'singular_name'         => __( 'Team', 'strl' ),
				'all_items'             => __( 'All Teams', 'strl' ),
				'archives'              => __( 'Team Archives', 'strl' ),
				'attributes'            => __( 'Team Attributes', 'strl' ),
				'insert_into_item'      => __( 'Insert into Team', 'strl' ),
				'uploaded_to_this_item' => __( 'Uploaded to this Team', 'strl' ),
				'featured_image'        => _x( 'Featured Image', 'team', 'strl' ),
				'set_featured_image'    => _x( 'Set featured image', 'team', 'strl' ),
				'remove_featured_image' => _x( 'Remove featured image', 'team', 'strl' ),
				'use_featured_image'    => _x( 'Use as featured image', 'team', 'strl' ),
				'filter_items_list'     => __( 'Filter Teams list', 'strl' ),
				'items_list_navigation' => __( 'Teams list navigation', 'strl' ),
				'items_list'            => __( 'Teams list', 'strl' ),
				'new_item'              => __( 'New Team', 'strl' ),
				'add_new'               => __( 'Add New', 'strl' ),
				'add_new_item'          => __( 'Add New Team', 'strl' ),
				'edit_item'             => __( 'Edit Team', 'strl' ),
				'view_item'             => __( 'View Team', 'strl' ),
				'view_items'            => __( 'View Teams', 'strl' ),
				'search_items'          => __( 'Search Teams', 'strl' ),
				'not_found'             => __( 'No Teams found', 'strl' ),
				'not_found_in_trash'    => __( 'No Teams found in trash', 'strl' ),
				'parent_item_colon'     => __( 'Parent Team:', 'strl' ),
				'menu_name'             => __( 'Teams', 'strl' ),
			],
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => [ 'title', 'editor', 'thumbnail' ],
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-smiley',
			'show_in_rest'          => true,
			'rest_base'             => 'team',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		]
	);

}

add_action( 'init', 'team_init' );

/**
 * Sets the post updated messages for the `team` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `team` post type.
 */
function team_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['team'] = [
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Team updated. <a target="_blank" href="%s">View Team</a>', 'strl' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'strl' ),
		3  => __( 'Custom field deleted.', 'strl' ),
		4  => __( 'Team updated.', 'strl' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Team restored to revision from %s', 'strl' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Team published. <a href="%s">View Team</a>', 'strl' ), esc_url( $permalink ) ),
		7  => __( 'Team saved.', 'strl' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Team submitted. <a target="_blank" href="%s">Preview Team</a>', 'strl' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Team scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview Team</a>', 'strl' ), date_i18n( __( 'M j, Y @ G:i', 'strl' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Team draft updated. <a target="_blank" href="%s">Preview Team</a>', 'strl' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	];

	return $messages;
}

add_filter( 'post_updated_messages', 'team_updated_messages' );

/**
 * Sets the bulk post updated messages for the `team` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `team` post type.
 */
function team_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	global $post;

	$bulk_messages['team'] = [
		/* translators: %s: Number of Teams. */
		'updated'   => _n( '%s Team updated.', '%s Teams updated.', $bulk_counts['updated'], 'strl' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 Team not updated, somebody is editing it.', 'strl' ) :
						/* translators: %s: Number of Teams. */
						_n( '%s Team not updated, somebody is editing it.', '%s Teams not updated, somebody is editing them.', $bulk_counts['locked'], 'strl' ),
		/* translators: %s: Number of Teams. */
		'deleted'   => _n( '%s Team permanently deleted.', '%s Teams permanently deleted.', $bulk_counts['deleted'], 'strl' ),
		/* translators: %s: Number of Teams. */
		'trashed'   => _n( '%s Team moved to the Trash.', '%s Teams moved to the Trash.', $bulk_counts['trashed'], 'strl' ),
		/* translators: %s: Number of Teams. */
		'untrashed' => _n( '%s Team restored from the Trash.', '%s Teams restored from the Trash.', $bulk_counts['untrashed'], 'strl' ),
	];

	return $bulk_messages;
}

add_filter( 'bulk_post_updated_messages', 'team_bulk_updated_messages', 10, 2 );
