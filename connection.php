<?php 

class Connection {
	private static $host = 'localhost';
	private static $port = '3308';
	private static $db = 'pwpb_auth';
	private static $username = 'root';
	private static $password = '';

	public static function getConnection()
	{
		return new PDO("mysql:host=" . Connection::$host . ":" . Connection::$port . ";dbname=" . Connection::$db, 	
										Connection::$username, Connection::$password);
	}
}

?>