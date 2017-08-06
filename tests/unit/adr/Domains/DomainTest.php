<?php

namespace adr\Domains;

use adr_Domains_Domain as Domain;

// dynamically load WordPress root folder from Codeception configuration file, see codeception.yml
include_once \Codeception\Configuration::config()['wpRootFolder'] . '/wp-includes/class-wp-query.php';

class DomainTest extends \Codeception\Test\Unit {

	/**
	 * @var \UnitTester
	 */
	protected $tester;

	/**
	 * @var \WP_Query
	 */
	protected $query;

	protected function _before() {
		$this->query = $this->prophesize( \WP_Query::class );
	}

	/**
	 * @return Domain
	 */
	private function make_instance() {
		return new Domain( $this->query->reveal() );
	}

	/**
	 * @test
	 * it should be instantiatable
	 */
	public function it_should_be_instantiatable() {
		$sut = $this->make_instance();

		$this->assertInstanceOf( Domain::class, $sut );
	}

	/**
	 * It should call a WP_Query with the provided arguments
	 *
	 * @test
	 */
	public function should_call_a_wp_query_with_the_provided_arguments() {
		$args = [ 'foo' => 'bar' ];
		$this->query->parse_query( $args )->shouldBeCalled();
		$this->query->get_posts()->shouldBeCalled();
		$this->query->have_posts()->shouldBeCalled();

		$sut = $this->make_instance();

		$sut->get( $args );
	}

	/**
	 * It should return the query result if posts are found matching the query
	 *
	 * @test
	 */
	public function should_return_the_query_result_if_posts_are_found_matching_the_query() {
		$args  = [ 'foo' => 'bar' ];
		$posts = [ 'some' => 'posts' ];
		$this->query->parse_query( $args )->shouldBeCalled();
		$this->query->get_posts()->willReturn( $posts );
		$this->query->have_posts()->willReturn( true );

		$sut = $this->make_instance();

		$this->assertEquals( $posts, $sut->get( $args ) );
	}

	/**
	 * It should return an empty array if no posts were found matching the query
	 *
	 * @test
	 */
	public function should_return_an_empty_array_if_no_posts_were_found_matching_the_query() {
		$args = [ 'foo' => 'bar' ];
		$this->query->parse_query( $args )->shouldBeCalled();
		$this->query->get_posts()->willReturn( 'foo' );
		$this->query->have_posts()->willReturn( false );

		$sut = $this->make_instance();

		$this->assertEquals( [], $sut->get( $args ) );
	}
}