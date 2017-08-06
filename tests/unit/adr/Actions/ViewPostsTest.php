<?php

namespace adr\Actions;

use adr_Actions_ViewPosts as Action;

class ViewPostsTest extends \Codeception\Test\Unit {

	/**
	 * @var \UnitTester
	 */
	protected $tester;

	/**
	 * @var \adr_Domains_Domain
	 */
	protected $domain;

	/**
	 * @var \adr_Responders_Responder
	 */
	protected $responder;

	protected function _before() {
		$this->domain    = $this->prophesize( \adr_Domains_Domain::class );
		$this->responder = $this->prophesize( \adr_Responders_Responder::class );
	}

	/**
	 * @return Action
	 */
	private function make_instance() {
		return new Action( $this->domain->reveal(), $this->responder->reveal() );
	}

	/**
	 * @test
	 * it should be instantiatable
	 */
	public function it_should_be_instantiatable() {
		$sut = $this->make_instance();

		$this->assertInstanceOf( Action::class, $sut );
	}

	/**
	 * It should provide the respnder with the posts provided by the domain
	 *
	 * @test
	 */
	public function should_provide_thebar_respnder_with_the_posts_provided_by_the_domain() {
		$this->domain->get( [ 'post_type' => 'post' ] )->willReturn( [ 'some' => 'thing' ] );
		$this->responder->render( 'posts.twig', [ 'posts' => [ 'some' => 'thing' ] ] )->shouldBeCalled();

		$sut = $this->make_instance();

		$sut->handle( new \_Request(), new \_Response() );
	}
}