<?php 

require_once('connection.php');
require_once('model/User.php');

class Utillities {

	public static function startSessionIfNotAlready()
	{
		if (! isset($_SESSION)) {
			session_start();
		}
	}

	public static function redirectIfAuthenticated()
	{
		if (! is_null(Utillities::getUser()) ) {
			header('Location: ../');
			exit();
		}
	}
	
	public static function redirectIfNotAuthenticated()
	{
		if ( is_null(Utillities::getUser()) ) {
			header('Location: ./login');
			exit();
		}
	}

	public static function registered($column, $value)
	{
		$connection = Connection::getConnection();
		$result = $connection->prepare("SELECT $column FROM users WHERE $column = ?");
		$result->execute([$value]);

		return $result->fetch(PDO::FETCH_ASSOC);
	}

	public static function getUser()
	{
		Utillities::startSessionIfNotAlready();
		
		if (! isset($_SESSION['user_id']) ) return null;

		$connection = Connection::getConnection();
		$statement = $connection->prepare("SELECT email, username FROM users WHERE id = ?");

		if ($statement->execute([ $_SESSION['user_id'] ])) {
			$result = $statement->fetch(PDO::FETCH_ASSOC);

			if (gettype($result) == 'boolean') return null;
			if (count($result) <= 0) return null;

			return new User($result['email'], $result['username']);
		} else return null;
	}
	
}

?>