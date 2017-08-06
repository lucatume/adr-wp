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

		return $this->query->have_posts() ? $posts : array();
	}
}