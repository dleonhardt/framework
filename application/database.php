<?php

namespace Application;

use PDO;

class Database {
	
  private static $conn = NULL;
	private $db;
	
	const DB_HOST = 'localhost';
	const DB_NAME = 'test';
	const DB_USER = 'root';
	const DB_PASS = 'root';
	
  public function __construct() {
		try {
			$this->db = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASS);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			die("Connection Error: ".$e->getMessage());
		}
  }
	
	public function __destruct() {
		$this->db = NULL;
	}
	
  public static function getConnection() {
		if(self::$conn == NULL)
			self::$conn = new Database;
		
    return self::$conn;
  }
	
	public function query($sql) {
		return $this->db->query($sql);
	}
	
	public function prepare($sql) {
		return $this->db->prepare($sql);
	}
	
	public function insert($table, $data) {
		if(isset($data) && is_array($data)):
			$fields = implode(", ", array_keys($data));
			$values = str_repeat("?, ", count($data) - 1)." ?";
			
			$stmt = $this->db->prepare("INSERT INTO ".$table." (".$fields.") VALUES (".$values.")");
			$stmt->execute(array_values($data));
		endif;
	}
	
	public function update($table, $data) {
		if(isset($data) && isset($data['id']) && is_array($data)):
			$id = $data['id'];
			unset($data['id']);
						
			$fields = implode(" = ?, ", array_keys($data));
				
			$stmt = $this->db->prepare("UPDATE ".$table." SET ".$fields." = ? WHERE id = ".$id);
			$stmt->execute(array_values($data));
		endif;
	}
	
	public function delete($table, $data) {
		if(isset($data) && isset($data['id']) && !empty($data['id'])):
			$stmt = $this->db->prepare("DELETE FROM ".$table." WHERE id = ?");
			$stmt->execute(array_values($data));
		endif;
	}
	
	public function __clone() {
		return false;
	}
	
	public function __wakeup() {
		return false;
	}
}