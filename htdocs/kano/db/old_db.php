<?php

	class Db {
    
    private static $connection;
	
    //private static $servername = "localhost";
  

    /**
     * Connect to the database
     * 
     * @return bool false on failure / mysqli MySQLi object instance on success
     */
    public static function connect(){    
        // Try and connect to the database
        if(!isset(self::$connection)) {
			 echo( "New connection<br>" );
			 
            // Load configuration as an array. Use the actual location of your configuration file
            //$config = parse_ini_file('./config.ini'); 
            //self::$connection = new mysqli('localhost',$config['username'],$config['password'],$config['dbname']);
            self::$connection = new mysqli("localhost", "kano", "kano", "kano");
        }

        // If connection was not successful, handle the error
        if(self::$connection === false) {
            // Handle error - notify administrator, log to a file, show an error screen, etc.
			die("Connection failed: " . $connection->connect_error);
            return false;
        }
        return self::$connection;
    }
	
	public static function closeConn(){
		self::$connection->close();
	}

}	
?>

