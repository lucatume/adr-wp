<?php

class adr_Twig_FunctionExtension extends Twig_Extension {

	protected $supportedFunctions = array();

	public function setSupportedFunctions(array $supportedFunctions) {
		$this->supportedFunctions = $supportedFunctions;
	}

	public function getFunctions() {
		$functions = array();

		foreach ($this->supportedFunctions as $function) {
			$functions[] = new Twig_SimpleFunction($function, $function);
		}

		return $functions;
	}
}