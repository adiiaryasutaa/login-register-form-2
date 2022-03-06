<?php 

require_once('connection.php');
require_once('util.php');

$connection = Connection::getConnection();

class Register {

	public static $error = [];

	private static function validate($email, $username, $password, $repeat_password)
	{
		if (Utillities::registered('email', $email)) {
			Register::$error['email'] = 'Email has been registered.';
		}
		
		if (Utillities::registered('username', $username)) {
			Register::$error['username'] = 'Username has been registered.';
		}

		if (strlen($password) < 6) {
			Register::$error['password'] = 'Min password length is 6 characters.';
		}

		if (strlen($password) > 20) {
			Register::$error['password'] = 'Max password length is 20 characters.';
		}

		if ($password != $repeat_password) {
			Register::$error['repeat_password'] = 'Must be match with password.';
		}
	}

	public static function store($email, $username, $password, $repeat_password)
	{
		global $connection;

		Register::validate($email, $username, $password, $repeat_password);

		if (Register::$error) return;
		else {
			// encrypt password
			$password = password_hash($password, PASSWORD_BCRYPT);
		
			// store to database
			$statement = $connection->prepare("INSERT INTO users (email, password, username) VALUES (?, ?, ?)");
			if ($statement->execute([$email, $password, $username])) {
				Utillities::startSessionIfNotAlready();
				$_SESSION['user_id'] = $connection->lastInsertId();

				Utillities::redirectIfAuthenticated();
			}
		}
	}
}

class Login {

	public static $error = [];

	private const USING_EMAIL = 'email';
	private const USING_USERNAME = 'username';

	private static $whatUserUseForLogin = '';

	private static function loginError() 
	{
		Login::$error['error'] = "There's an invalid input";
	}

	private static function systemError()
	{
		Login::$error['error'] = "There's problem in our system, please try again";
	}

	private static function validate($email_or_username, $password)
	{
		global $connection;

		Login::$whatUserUseForLogin = filter_var($email_or_username, FILTER_VALIDATE_EMAIL)
																		 ? Login::USING_EMAIL : Login::USING_USERNAME;

		if (! Utillities::registered(Login::$whatUserUseForLogin, $email_or_username)) {
			Login::loginError();
			return;
		}

		$statement = $connection->prepare("SELECT password FROM users WHERE " . Login::$whatUserUseForLogin . " = ?");

		if ($statement->execute([$email_or_username])) {
			$hashed_password = $statement->fetch(PDO::FETCH_ASSOC)['password'];
			if (! password_verify($password, $hashed_password)) {
				Login::loginError();
			}
		} else {
			Login::systemError();
		}
	}

	public static function authenticate($email_or_username, $password)
	{
		global $connection;

		Login::validate($email_or_username, $password);

		if (Login::$error) return;
		else {
			$statement = $connection->prepare("SELECT id FROM users WHERE " . Login::$whatUserUseForLogin . " = ?");

			if ($statement->execute([$email_or_username])) {
				Utillities::startSessionIfNotAlready();
				$_SESSION['user_id'] = $statement->fetch(PDO::FETCH_ASSOC)['id'];
				Utillities::redirectIfAuthenticated();
			} else {
				Login::systemError();
			}
		}
	}

}

class Logout {
	public static function start() {
		Utillities::startSessionIfNotAlready();
		$_SESSION = [];

		Utillities::redirectIfNotAuthenticated();
	}
}

?>