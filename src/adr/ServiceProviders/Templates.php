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
		$root    = dirname(dirname(dirname(dirname(__FILE__))));
		$loader  = new Twig_Loader_Filesystem($root . '/templates');
		$options = array(
			'cache' => $root . '/templates/cache',
		);

		if (apply_filters('adr.debug', false)) {
			$options['debug'] = true;
			$options['auto_reload'] = true;
		}

		$twig = new Twig_Environment($loader, $options);

		$functionExtension = new adr_Twig_FunctionExtension();

		$supportedFunctions = array('wp_head', 'wp_footer', 'body_class');
		$supportedFunctions = apply_filters('adr.twig.supportedFunctions', $supportedFunctions);
		$functionExtension->setSupportedFunctions($supportedFunctions);
		$twig->addExtension($functionExtension);

		return $twig;
	}
}