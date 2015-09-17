<?php
require_once("util/logger.php"); 
	class Db {
		
    private $_connection;
	private static $_instance; //The single instance
	private $_host = "localhost";
	private $_username = "kano";
	private $_password = "kano";
	private $_database = "kano";
	
    /*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		// If no instance then make one
		if(!self::$_instance) { 
		//echo( "New connection<br>" );
		Logger::write("DEBUG", "New connection");
			self::$_instance = new self();
		}
		return self::$_instance;
	}
	// Constructor
	private function __construct() {		
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(), E_USER_ERROR);
		}
	}
	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }
	// Get mysqli connection
	public function getConnection() {
		return $this->_connection;
	}
	
	public function closeConn(){
		Logger::write("DEBUG", "Close connection");
		$this->_connection->close();
	}

}	
?>

