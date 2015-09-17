<?php

	class Logger {
		
   
	public static function write($priority, $message) {
		if($priority != "DEBUG"){
			
		
		error_reporting(E_ERROR);
		if(!is_dir('/logs')){
		mkdir("logs");		
	    }
		date_default_timezone_set('Europe/Istanbul');
		$dt = date("d-m-Y H:i:s");
		$message = $dt." [".$priority."] - ".$message. "\r\n";
		file_put_contents("logs/kano.log", $message, FILE_APPEND | LOCK_EX);
	  }
	}
}	
?>

