<?php

class adr_Domains_Domain {

	/**
	 * @var \WP_Query
	 */
	protected $query;

	public function __construct( WP_Query $query ) {
		$this->query = $query;
	}

	public function get( array $args ) {
		$this->query->parse_query( $args );
		$posts = $this->query->get_posts();

		/** @var WP_Query $wp_query */
		global $wp_query;
		$this->set_query_flags( $args );
		$wp_query = $this->query;

		return $this->query->have_posts() ? $posts : array();
	}

	protected function set_query_flags( array $args = null ) {
		if ( empty( $args ) ) {
			return;
		}

		if ( ! empty( $args['post_type'] ) && $args['post_type'] === 'post' ) {
			$this->query->is_archive           = true;
			$this->query->is_post_type_archive = 'post';
			$this->query->is_posts_page        = true;
		}

		$this->query->is_home = false;
	}
}