<?php

class adr_Actions_ViewPosts {

	/**
	 * @var \adr_Domains_Domain
	 */
	protected $domain;
	/**
	 * @var \adr_Responders_Responder
	 */
	protected $responder;

	public function __construct( adr_Domains_Domain $domain, adr_Responders_Responder $responder ) {
		$this->domain    = $domain;
		$this->responder = $responder;
	}

	public function handle( _Request $request, _Response $response ) {
		$posts = $this->domain->get( array( 'post_type' => 'post' ) );

		$data = array(
			'posts' => $posts,
		);

		$this->responder->render( 'posts.twig', $data );
	}
}