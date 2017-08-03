<?php


class ViewPostsCest {

	/**
	 * It should show the site latest posts on the /posts page
	 *
	 * @test
	 */
	public function should_show_the_site_latest_posts_on_the_posts_page(AcceptanceTester $I) {
		$I->haveManyPostsInDatabase(5);

		$I->amOnPage('/posts');

		$I->seeNumberOfElements('.post', 5);
	}
}
