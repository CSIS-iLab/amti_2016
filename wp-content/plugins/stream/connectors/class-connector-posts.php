<?php
namespace WP_Stream;

class Connector_Posts extends Connector {
	/**
	 * Connector slug
	 *
	 * @var string
	 */
	public $name = 'posts';

	/**
	 * Actions registered for this connector
	 *
	 * @var array
	 */
	public $actions = array(
		'transition_post_status',
		'deleted_post',
	);

	/**
	 * Register connector in the WP Frontend
	 *
	 * @var bool
	 */
	public $register_frontend = false;

	/**
	 * Return translated connector label
	 *
	 * @return string Translated connector label
	 */
	public function get_label() {
		return esc_html__( 'Posts', 'stream' );
	}

	/**
	 * Return translated action labels
	 *
	 * @return array Action label translations
	 */
	public function get_action_labels() {
		return array(
			'updated'   => esc_html__( 'Updated', 'stream' ),
			'created'   => esc_html__( 'Created', 'stream' ),
			'trashed'   => esc_html__( 'Trashed', 'stream' ),
			'untrashed' => esc_html__( 'Restored', 'stream' ),
			'deleted'   => esc_html__( 'Deleted', 'stream' ),
		);
	}

	/**
	 * Return translated context labels
	 *
	 * @return array Context label translations
	 */
	public function get_context_labels() {
		global $wp_post_types;

		$post_types = wp_filter_object_list( $wp_post_types, array(), null, 'label' );
		$post_types = array_diff_key( $post_types, array_flip( $this->get_excluded_post_types() ) );

		add_action( 'registered_post_type', array( $this, 'registered_post_type' ), 10, 2 );

		return $post_types;
	}

	/**
	 * Add action links to Stream drop row in admin list screen
	 *
	 * @filter wp_stream_action_links_{connector}
	 *
	 * @param array $links   Previous links registered
	 * @param Record $record Stream record
	 *
	 * @return array Action links
	 */
	public function action_links( $links, $record ) {
		$post = get_post( $record->object_id );

		if ( $post && $post->post_status === $record->get_meta( 'new_status', true ) ) {
			$post_type_name = $this->get_post_type_name( get_post_type( $post->ID ) );

			if ( 'trash' === $post->post_status ) {
				$untrash = wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'untrash',
							'post'   => $post->ID,
						),
						admin_url( 'post.php' )
					),
					sprintf( 'untrash-post_%d', $post->ID )
				);

				$delete = wp_nonce_url(
					add_query_arg(
						array(
							'action' => 'delete',
							'post'   => $post->ID,
						),
						admin_url( 'post.php' )
					),
					sprintf( 'delete-post_%d', $post->ID )
				);

				// translators: Placeholder refers to a post type singular name (e.g. "Post")
				$links[ sprintf( esc_html_x( 'Restore %s', 'Post type singular name', 'stream' ), $post_type_name ) ] = $untrash;
				// translators: Placeholder refers to a post type singular name (e.g. "Post")
				$links[ sprintf( esc_html_x( 'Delete %s Permenantly', 'Post type singular name', 'stream' ), $post_type_name ) ] = $delete;
			} else {
				// translators: Placeholder refers to a post type singular name (e.g. "Post")
				$links[ sprintf( esc_html_x( 'Edit %s', 'Post type singular name', 'stream' ), $post_type_name ) ] = get_edit_post_link( $post->ID );

				$view_link = get_permalink( $post->ID );
				if ( $view_link ) {
					$links[ esc_html__( 'View', 'stream' ) ] = $view_link;
				}

				$revision_id = absint( $record->get_meta( 'revision_id', true ) );
				$revision_id = $this->get_adjacent_post_revision( $revision_id, false );

				if ( $revision_id ) {
					$links[ esc_html__( 'Revision', 'stream' ) ] = get_edit_post_link( $revision_id );
				}
			}
		}

		return $links;
	}

	/**
	 * Catch registration of post_types after initial loading, to cache its labels
	 *
	 * @action registered_post_type
	 *
	 * @param string $post_type Post type slug
	 * @param array  $args      Arguments used to register the post type
	 */
	public function registered_post_type( $post_type, $args ) {
		unset( $args );

		$post_type_obj = get_post_type_object( $post_type );
		$label         = $post_type_obj->label;

		wp_stream_get_instance()->connectors->term_labels['stream_context'][ $post_type ] = $label;
	}

	/**
	 * Log all post status changes ( creating / updating / trashing )
	 *
	 * @action transition_post_status
	 *
	 * @param mixed $new
	 * @param mixed $old
	 * @param \WP_Post $post
	 */
	public function callback_transition_post_status( $new, $old, $post ) {
		if ( in_array( $post->post_type, $this->get_excluded_post_types(), true ) ) {
			return;
		}

		if ( in_array( $new, array( 'auto-draft', 'inherit' ), true ) ) {
			return;
		} elseif ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		} elseif ( 'draft' === $new && 'publish' === $old ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s unpublished',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
		} elseif ( 'trash' === $old && 'trash' !== $new ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s restored from trash',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
			$action  = 'untrashed';
		} elseif ( 'draft' === $new && 'draft' === $old ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s draft saved',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
		} elseif ( 'publish' === $new && 'draft' === $old ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s published',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
		} elseif ( 'draft' === $new ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s drafted',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
		} elseif ( 'pending' === $new ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s pending review',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
		} elseif ( 'future' === $new ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s scheduled for %3$s',
				'1: Post title, 2: Post type singular name, 3: Scheduled post date',
				'stream'
			);
		} elseif ( 'future' === $old && 'publish' === $new ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" scheduled %2$s published',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
		} elseif ( 'private' === $new ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s privately published',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
		} elseif ( 'trash' === $new ) {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s trashed',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
			$action  = 'trashed';
		} else {
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			$summary = _x(
				'"%1$s" %2$s updated',
				'1: Post title, 2: Post type singular name',
				'stream'
			);
		}

		if ( 'auto-draft' === $old && 'auto-draft' !== $new ) {
			$action = 'created';
		}

		if ( empty( $action ) ) {
			$action = 'updated';
		}

		$revision_id = null;

		if ( wp_revisions_enabled( $post ) ) {
			$revision = get_children(
				array(
					'post_type'      => 'revision',
					'post_status'    => 'inherit',
					'post_parent'    => $post->ID,
					'posts_per_page' => 1, // VIP safe
					'orderby'        => 'post_date',
					'order'          => 'DESC',
				)
			);

			if ( $revision ) {
				$revision    = array_values( $revision );
				$revision_id = $revision[0]->ID;
			}
		}

		$post_type_name = strtolower( $this->get_post_type_name( $post->post_type ) );

		$this->log(
			$summary,
			array(
				'post_title'    => $post->post_title,
				'singular_name' => $post_type_name,
				'post_date'     => $post->post_date,
				'post_date_gmt' => $post->post_date_gmt,
				'new_status'    => $new,
				'old_status'    => $old,
				'revision_id'   => $revision_id,
			),
			$post->ID,
			$post->post_type,
			$action
		);
	}

	/**
	 * Log post deletion
	 *
	 * @action deleted_post
	 *
	 * $param integer $post_id
	 */
	public function callback_deleted_post( $post_id ) {
		$post = get_post( $post_id );

		// We check if post is an instance of WP_Post as it doesn't always resolve in unit testing
		if ( ! ( $post instanceof \WP_Post ) || in_array( $post->post_type, $this->get_excluded_post_types(), true ) ) {
			return;
		}

		// Ignore auto-drafts that are deleted by the system, see issue-293
		if ( 'auto-draft' === $post->post_status ) {
			return;
		}

		$post_type_name = strtolower( $this->get_post_type_name( $post->post_type ) );

		$this->log(
			// translators: Placeholders refer to a post title, and a post type singular name (e.g. "Hello World", "Post")
			_x(
				'"%1$s" %2$s deleted from trash',
				'1: Post title, 2: Post type singular name',
				'stream'
			),
			array(
				'post_title'    => $post->post_title,
				'singular_name' => $post_type_name,
			),
			$post->ID,
			$post->post_type,
			'deleted'
		);
	}

	/**
	 * Constructs list of excluded post types for the Posts connector
	 *
	 * @return array List of excluded post types
	 */
	public function get_excluded_post_types() {
		return apply_filters(
			'wp_stream_posts_exclude_post_types',
			array(
				'nav_menu_item',
				'attachment',
				'revision',
			)
		);
	}

	/**
	 * Gets the singular post type label
	 *
	 * @param string $post_type_slug
	 *
	 * @return string Post type label
	 */
	public function get_post_type_name( $post_type_slug ) {
		$name = esc_html__( 'Post', 'stream' ); // Default

		if ( post_type_exists( $post_type_slug ) ) {
			$post_type = get_post_type_object( $post_type_slug );
			$name      = $post_type->labels->singular_name;
		}

		return $name;
	}

	/**
	 * Get an adjacent post revision ID
	 *
	 * @param int $revision_id
	 * @param bool $previous
	 *
	 * @return int $revision_id
	 */
	public function get_adjacent_post_revision( $revision_id, $previous = true ) {
		if ( empty( $revision_id ) || ! wp_is_post_revision( $revision_id ) ) {
			return false;
		}

		$revision = wp_get_post_revision( $revision_id );
		$operator = ( $previous ) ? '<' : '>';
		$order    = ( $previous ) ? 'DESC' : 'ASC';

		global $wpdb;
		// @codingStandardsIgnoreStart
		$revision_id = $wpdb->get_var( // db call okay
			$wpdb->prepare(
				"SELECT p.ID
				FROM $wpdb->posts AS p
				WHERE p.post_date {$operator} %s
					AND p.post_type = 'revision'
					AND p.post_parent = %d
				ORDER BY p.post_date {$order}
				LIMIT 1",
				$revision->post_date,
				$revision->post_parent
			)
		);
		// @codingStandardsIgnoreEnd
		// prepare okay

		$revision_id = absint( $revision_id );

		if ( ! wp_is_post_revision( $revision_id ) ) {
			return false;
		}

		return $revision_id;
	}
}
