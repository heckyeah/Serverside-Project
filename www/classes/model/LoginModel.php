<?php

class LoginModel extends Model {

	public function attemptLogin() {

		// Extract the data from the POST array
		$username = $_POST['username'];
		$password = $_POST['password'];

		// Filter the data
		$username = $this->dbc->real_escape_string( $username );

		// Prepare SQL to find a user and get the hashed password
		$sql = "SELECT user_id, password, privilege FROM users WHERE username = '$username'  ";

		// Run the SQL
		$result = $this->dbc->query( $sql );

		// Make sure there is a result
		if( $result->num_rows == 0 ) {
			return;
		}

		// Extract the data from the result
		$data = $result->fetch_assoc();

		// Use the password compat library
		require 'vendor/password.php';

		// Compare the passwords
		if( password_verify( $password, $data['password'] ) ) {

			// Credentials are correct
			$_SESSION['username'] = $username;
			$_SESSION['privilege'] = $data['privilege'];
			$_SESSION['user_id'] = $data['user_id'];

			// Redirect the user
			header('Location: index.php?page=profile');

		}

	}

}
