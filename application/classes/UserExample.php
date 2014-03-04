<?php

namespace Application\Classes;

use Application\Database;

class UserExample {
	
	private $db;
	
	public function __construct() {
		$this->db = Database::getConnection();
	}
	
	public function createUser($data) {
		if(isset($data) && is_array($data)):
			$fields = implode(", ", array_keys($data));
			$values = str_repeat("?, ", count($data) - 1)." ?";
			
			$stmt = $this->db->prepare("INSERT INTO users (".$fields.") VALUES (".$values.")");
			$stmt->execute(array_values($data));
		endif;
	}
	
	public function updateUser($data) {
		if(isset($data) && isset($data['id']) && is_array($data)):
			$id = $data['id'];
			unset($data['id']);
						
			$fields = implode(" = ?, ", array_keys($data));
				
			$stmt = $this->db->prepare("UPDATE users SET ".$fields." = ? WHERE id = ".$id);
			$stmt->execute(array_values($data));
		endif;
	}
	
	public function deleteUser($data) {
		if(isset($data) && isset($data['id']) && !empty($data['id'])):
			$stmt = $this->db->prepare("DELETE FROM users WHERE id = ?");
			$stmt->execute(array_values($data));
		endif;
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