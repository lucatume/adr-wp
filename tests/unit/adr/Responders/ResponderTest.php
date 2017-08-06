<?php

namespace adr\Responders;

use adr_Responders_Responder as Responder;

class ResponderTest extends \Codeception\Test\Unit {

	/**
	 * @var \UnitTester
	 */
	protected $tester;

	/**
	 * @var \Twig_Environment
	 */
	protected $twig;

	protected function _before() {
		$this->twig = $this->prophesize( \Twig_Environment::class );
	}

	protected function _after() {
	}

	/**
	 * @return Responder
	 */
	private function make_instance() {
		return new Responder( $this->twig->reveal() );
	}

	/**
	 * @test
	 * it should be instantiatable
	 */
	public function it_should_be_instantiatable() {
		$sut = $this->make_instance();

		$this->assertInstanceOf( Responder::class, $sut );
	}

	/**
	 * It should forward the render call to the template engine
	 *
	 * @test
	 */
	public function should_forward_the_render_call_to_the_template_engine() {
		$this->twig->render( 'foo.twig', [ 'some' => 'data' ] )->shouldBeCalled();

		$sut = $this->make_instance();

		$sut->render( 'foo.twig', [ 'some' => 'data' ] );
	}
}
