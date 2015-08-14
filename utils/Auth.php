<?php

require_once 'Logger.php';
require_once 'Input.php';
require_once '../bootstrap.php';

class Auth {
	public static function attempt($username, $password)
	{
		$data = User::findUserByEmail($username);
		if (empty($data)) {
			return 'Please create a user first.';
		} else {
			if (password_verify($password, $data[0]['password'])) {
				$_SESSION["LOGGED_IN_USER"]= $username;
			    header("Location: auth.login.php");
			    exit();
			} else {
			    echo 'Invalid password.';
			}
		}
	}

	public static function check()
	{
		if (!empty($_SESSION["LOGGED_IN_USER"])) {
			return true;
		} else {
			return false;
		}
	}

	public static function user()
	{
		$username = $_SESSION["LOGGED_IN_USER"];
		return $username;
	}

	public static function logout()
	{
		$_SESSION["LOGGED_IN_USER"]= array();

	    if (ini_get("session.use_cookies")) {
	        $params = session_get_cookie_params();
	        setcookie(session_name(), '', time() - 42000,
	            $params["path"], $params["domain"],
	            $params["secure"], $params["httponly"]
	        );
	    }

	    session_destroy();
	}

}

?>