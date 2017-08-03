<?php

class adr_Responders_Responder {

	/**
	 * @var Twig_Environment
	 */
	protected $renderEngine;

	public function __construct( Twig_Environment $renderEngine ) {
		$this->renderEngine = $renderEngine;
	}

	public function render( $template, array $data ) {
		echo $this->renderEngine->render( $template, $data );
	}
}