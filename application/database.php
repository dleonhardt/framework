<?php

namespace Application;

use PDO;

class Database {
	
  private static $conn = NULL;
	private $db;
	
	const DB_HOST = 'localhost';
	const DB_NAME = '';
	const DB_USER = '';
	const DB_PASS = '';
	
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
	
	public function __clone() {
		return false;
	}
	
	public function __wakeup() {
		return false;
	}
}