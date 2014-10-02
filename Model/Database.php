<?php
/**
 * Database Model
 *
 * @author Chris Pierce
 */
class Database {
	
	/**
	 * @static var instance
	 */
	private static $instance = null;

	/**
	 * Private Constructor
	 */
	private function __construct() {
	
	}

	/**
	 * return instance or create connection
	 *
	 * @params void
	 * @return object (PDO)
	 */
	public static function getInstance() {
		if (!self::$instance) {
			self::$instance = new PDO("mysql:host=localhost;dbname=cpierce_dev", 'cpierce', 'kie9Aog9utahxeew');;
			self::$instance-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}
		return self::$instance;
	}

	/**
	 * private clone method
	 *
	 * @params void
	 * @return void
	 */
	private function __clone() {
	}
	 
}