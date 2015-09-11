<?php

class LoginView {
	private static $login = 'LoginView::Login';
	private static $logout = 'LoginView::Logout';
	private static $name = 'LoginView::UserName';
	private static $password = 'LoginView::Password';
	private static $cookieName = 'LoginView::CookieName';
	private static $cookiePassword = 'LoginView::CookiePassword';
	private static $keep = 'LoginView::KeepMeLoggedIn';
	private static $messageId = 'LoginView::Message';
	private $controllerLogin;
	
	public function __construct($controllerLogin) {
        $this->controllerLogin = $controllerLogin;
    }
	
	/**
	 * Create HTTP response
	 *
	 * Should be called after a login attempt has been determined
	 *
	 * @return  void BUT writes to standard output and cookies!
	 */
	public function response() {
		
		$message = '';
		
		if(isset($_POST[self::$login])) {
			
			$test = false;
			
			$test = $this->controllerLogin->compareLogin(self::$name, self::$password);
			
			if($test == true) {
				$message = 'Success!';
			$response = $this->generateLogoutButtonHTML($message);
			}
			else {
				$message = 'Wrong username and password!';
			$response = $this->generateLoginFormHTML($message);
			}
			

			
			
			

			
			/*
			if(isset($_POST[self::$name])){
				$message = 'Username can not be empty!';
				$response = $this->generateLoginFormHTML($message);
			}
			else {
			*/	
				
				
				
			
			/*
			if(!isset($_POST[self::$password])){
				$message = 'Password can not be empty!';
				return $response = $this->generateLoginFormHTML($message);
			}
			*/
			
		}
		else {
			$response = $this->generateLoginFormHTML($message);
		}
		return $response;
	}

	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLogoutButtonHTML($message) {
		return '
			<form  method="post" >
				<p id="' . self::$messageId . '">' . $message .'</p>
				<input type="submit" name="' . self::$logout . '" value="logout"/>
			</form>
		';
	}
	
	/**
	* Generate HTML code on the output buffer for the logout button
	* @param $message, String output message
	* @return  void, BUT writes to standard output!
	*/
	private function generateLoginFormHTML($message) {
		return '
			<form method="post" > 
				<fieldset>
					<legend>Login - enter Username and password</legend>
					<p id="' . self::$messageId . '">' . $message . '</p>
					
					<label for="' . self::$name . '">Username :</label>
					<input type="text" id="' . self::$name . '" name="' . self::$name . '" value="" />

					<label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" />

					<label for="' . self::$keep . '">Keep me logged in  :</label>
					<input type="checkbox" id="' . self::$keep . '" name="' . self::$keep . '" />
					
					<input type="submit" name="' . self::$login . '" value="login" />
				</fieldset>
			</form>
		';
	}
	
	//CREATE GET-FUNCTIONS TO FETCH REQUEST VARIABLES
	private function getRequestUserName() {
		//RETURN REQUEST VARIABLE: USERNAME
	}
	
}