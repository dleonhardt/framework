<?php

namespace Application\Classes;

use Application\Database;

class Test {
	
	function __construct() {
		echo 'Class Test working <br />';
		
		$db = new Database;
		
		var_dump($db);
		
		$test_query = $db->query("SELECT * FROM users");
		
		var_dump($test_query);
		
		$test_result = $test_query->fetchAll();
		
		print_r($test_result);
	}
	
}