<?php

class Database {
	
  private static $conn = NULL;
	private $db;
	
	const DB_HOST = 'localhost';
	const DB_NAME = 'test';
	const DB_USER = 'root';
	const DB_PASS = 'root';
	
  public function __construct() {
		try {
			$this->db = new PDO("mysql:host=".self::DB_HOST.";dbname=".self::DB_NAME, self::DB_USER, self::DB_PASSWORD);
			$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
  }
	
	public function __destruct() {
		$this->db = NULL;
	}
	
  public static function getConnection() {
		if(self::$conn == NULL)
			self::$conn = new Database();
		
    return self::$conn;
  }
	
	public function query($sql) {
		return $this->db->query($sql);
	}
}