<?php

class adr_ServiceProviders_Templates extends tad_DI52_ServiceProvider {

	/**
	 * Binds and sets up implementations.
	 */
	public function register() {
		//		$this->container->when( 'adr_Responders_Responder' )
		//		                ->needs( 'Twig_Environment' )
		//		                ->give( array( $this, 'buildTwigEnvironment' ) );
		$this->container->singleton( 'Twig_Environment', array( $this, 'buildTwigEnvironment' ) );
	}

	/**
	 * @return Twig_Environment
	 */
	public function buildTwigEnvironment() {
		$root   = dirname( dirname( dirname( dirname( __FILE__ ) ) ) );
		$loader = new Twig_Loader_Filesystem( $root . '/templates' );
		$twig   = new Twig_Environment( $loader, array(
			'cache' => $root . '/templates/cache',
		) );

		return $twig;
	}
}