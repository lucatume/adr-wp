<?php

namespace HooksSupport;

use FunctionalTester;

class HeadAndFooterCest {

	public function _before( FunctionalTester $I ) {
		$I->useTheme( 'twentyseventeen' );
		add_filter( 'adr.debug', '__return_true' );
		add_filter( 'klein_die_handler', function () {
			return 'echo';
		} );
	}

	/**
	 * It should run the wp_head action while managing routes
	 *
	 * @test
	 */
	public function should_run_the_wp_head_action_while_managing_routes( FunctionalTester $I ) {
		add_action( 'wp_head', function () use ( &$fired ) {
			$fired = true;
			echo '<meta foo="bar">';
		} );

		$I->amOnPage( '/posts' );

		$I->canSeeElement( 'body.adr' );
		$I->assertTrue( $fired );
		$I->seeInSource( '<meta foo="bar">' );
	}

	/**
	 * It should run the wp_footer action while managing routes
	 *
	 * @test
	 */
	public function should_run_the_wp_footer_action_while_managing_routes( FunctionalTester $I ) {
		add_action( 'wp_footer', function () use ( &$fired ) {
			$fired = true;
			echo '<p>Hello from the footer</p>';
		} );

		$I->amOnPage( '/posts' );

		$I->canSeeElement( 'body.adr' );
		$I->assertTrue( $fired );
		$I->seeInSource( '<p>Hello from the footer</p>' );
	}
}
