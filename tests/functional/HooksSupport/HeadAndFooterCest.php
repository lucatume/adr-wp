<?php

namespace HooksSupport;

use \FunctionalTester;

class HeadAndFooterCest {

	/**
	 * It should run the wp_head action while managing routes
	 *
	 * @test
	 */
	public function should_run_the_wp_head_action_while_managing_routes( FunctionalTester $I ) {
		$uniqueCode = uniqid( 'wp_head', true );
		$code       = <<< PHP
add_action('wp_head', 'test_wp_head_print');
function test_wp_head_print(){
	echo '<meta some-attr="$uniqueCode ">'
}
PHP;
		$I->haveMuPlugin('wp_head_printer.php',$code);

		$I->amOnPage( '/posts' );

		$I->canSeeInSource( '<meta some-attr="' . $uniqueCode . '">' );
	}
}
