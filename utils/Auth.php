<?php


//THIS IS BOILERPLATE CODE FOR OUR AUTH CLASS



require_once 'Log.php';
require_once 'Input.php';

class Auth {
	public static $password = '$2y$10$SLjwBwdOVvnMgWxvTI4Gb.YVcmDlPTpQystHMO2Kfyi/DS8rgA0Fm';

	public static function attempt($username, $password)
	{
		if (password_verify($password, static::$password)) {
			$_SESSION["LOGGED_IN_USER"]= $username;
		    header("Location: authorized3.php");
		    exit();
		} else {
		    echo 'Invalid password.';
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