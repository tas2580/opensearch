<?php

/**
 * @group functional
 */
class phpbb_functional_test extends \tas2580\opensearch\tests\base\functional_test
{
	public function setUp()
	{
		parent::setUp();
		$this->purge_cache();
		$this->login();
	}

    public function test_opensearch()
    {
		$crawler = $this->request('GET', 'app.php/opensearch.xml');
    }
}
