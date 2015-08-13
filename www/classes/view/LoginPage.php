<?php

class LoginPage extends Page {

	// Properties
	private $usernameError;
	private $passwordError;
	private $loginError;
	protected $username;
	
	public function __construct( $model ) {

		parent::__construct($model);

		// If the user has submitted the form
		if( isset($_POST['username']) ) {

			// Process the login form
			$this->processLoginForm();

		}

	}

	public function contentHTML() {

		if (!isset( $_SESSION['username']) ) {
			$heading = 'You must login to visit this page';
		} else {
			$heading = 'Log into your account';
		}

		include 'parts/login.php';

	}

	public function processLoginForm() {

		// Save the login form data
		$this->username = trim($_POST['username']);

		// Validate the form before attempting to log in
		if( trim($_POST['username']) == '' ) {
			$this->usernameError = ' Username is required';
		}

		if( $_POST['password'] == '' ) {
			$this->passwordError = 'Password is required';
		}

		// If there are no errors
		if( $this->passwordError == '' && $this->usernameError == '' ) {
			// Use the model to check if the user has the right credentials
			$this->model->attemptLogin();

			// If this code runs then the user was not redirected
			// therefore they did not have correct login credentials
			$this->loginError = 'Username or password are incorrect';

		}

	}

}
