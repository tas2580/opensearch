<?php

namespace tas2580\opensearch\tests\base;

abstract class database_test extends \phpbb_database_test_case
{
	static protected function setup_extensions()
	{
		return array('tas2580/opensearch');
	}
	protected $db;
	public function setUp()
	{
		parent::setUp();
		global $db;
		$db = $this->db = $this->new_dbal();
	}
}