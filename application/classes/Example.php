<?php

namespace Application\Classes;

use Application\Database;

class Example {
	
	private $db;
	
	public function __construct() {		
		$this->db = new Database;
	}
	
	public function testDatabase() {
		$test_query = $this->db->query("SELECT * FROM users");
		
		$test_result = $test_query->fetchAll();
		
		return $test_result;
	}
	
}