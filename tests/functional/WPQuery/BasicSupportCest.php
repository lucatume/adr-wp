<?php

namespace WPQuery;

use FunctionalTester;

class BasicSupportCest {

	public function _before( FunctionalTester $I ) {
		$I->useTheme( 'twentyseventeen' );
		add_filter( 'adr.debug', '__return_true' );
		add_filter( 'klein_die_handler', function () {
			return 'echo';
		} );
	}

	/**
	 * It should correctly set global wp_query flags for route
	 *
	 * @test
	 */
	public function should_correctly_set_global_wp_query_flags_for_route( FunctionalTester $I ) {
		$I->amOnPage( '/posts' );

		$expected_flags = [
			'is_single'            => false,
			'is_preview'           => false,
			'is_page'              => false,
			'is_archive'           => true,
			'is_date'              => false,
			'is_year'              => false,
			'is_month'             => false,
			'is_day'               => false,
			'is_time'              => false,
			'is_author'            => false,
			'is_category'          => false,
			'is_tag'               => false,
			'is_tax'               => false,
			'is_search'            => false,
			'is_feed'              => false,
			'is_comment_feed'      => false,
			'is_trackback'         => false,
			'is_home'              => false,
			'is_404'               => false,
			'is_paged'             => false,
			'is_admin'             => false,
			'is_attachment'        => false,
			'is_singular'          => false,
			'is_robots'            => false,
			'is_posts_page'        => true,
			'is_post_type_archive' => 'post',
		];

		/** @var \WP_Query $wp_query */
		global $wp_query;

		foreach ( $expected_flags as $key => $value ) {
			$I->assertEquals( $wp_query->{$key}, $value, "Global wp_query {$key} does not match expected {$value}" );
		}
	}
}
