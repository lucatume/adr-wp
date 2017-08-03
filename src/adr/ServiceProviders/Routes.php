<?php

class adr_ServiceProviders_Routes extends tad_DI52_ServiceProvider {

	/**
	 * Binds and sets up implementations.
	 */
	public function register() {
		add_filter( 'do_parse_request', array( $this, 'filterDoParseRequest' ) );

		respond( 'GET', '/posts', $this->container->callback( 'adr_Actions_ViewPosts', 'handle' ) );
	}

	public function filterDoParseRequest( $do_parse_request ) {
		// a klein52 methods that will either echo and die if found or let the execution continue
		dispatch_or_continue();

		// let WordPress do its job; we could not handle the request
		return $do_parse_request;
	}
}