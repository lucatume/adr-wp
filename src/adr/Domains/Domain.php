<?php

class adr_Domains_Domain {

	public function get( array $args ) {
		$query = new WP_Query( $args );

		return $query->have_posts() ? $query->posts : array();
	}
}