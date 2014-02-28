<?php

namespace Application\Classes;

use Application\Database;

class UserExample {
	
	private $db;
	
	public function __construct() {
		$this->db = Database::getConnection();
	}
	
	public function createUser($user_data) {
		$this->db->insert('users', $user_data);
	}
	
	public function editUser($user_data) {
		$this->db->update('users', $user_data);
	}
	
	public function getUserById($id) {
		if(isset($id)):
			$user_query = $this->db->query("SELECT * FROM users WHERE id = '".$id."'");
			
			if($user_query->rowCount() > 0):
				$user_result = $user_query->fetchAll();
				
				return $user_result;
			endif;
		endif;
	}
	
	public function getUsers() {
		$user_query = $this->db->query("SELECT * FROM users");
		
		if($user_query->rowCount() > 0):
			return $user_query->fetchAll();
		endif;
	}
	
}