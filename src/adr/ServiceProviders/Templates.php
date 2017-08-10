<?php

class adr_ServiceProviders_Templates extends tad_DI52_ServiceProvider {

	/**
	 * Binds and sets up implementations.
	 */
	public function register() {
		$this->container->singleton('Twig_Environment',
			array($this, 'buildTwigEnvironment'));
	}

	/**
	 * @return Twig_Environment
	 */
	public function buildTwigEnvironment() {
		$root   = dirname(dirname(dirname(dirname(__FILE__))));
		$loader = new Twig_Loader_Filesystem($root . '/templates');
		$twig   = new Twig_Environment($loader, array(
			'cache' => $root . '/templates/cache',
		));

		$functionExtension = new adr_Twig_FunctionExtension();

		$supportedFunctions = apply_filters('adr.twig.supportedFunctions',
			array(
				'wp_head',
				'wp_footer',
			));
		$functionExtension->setSupportedFunctions($supportedFunctions);
		$twig->addExtension($functionExtension);

		return $twig;
	}
}