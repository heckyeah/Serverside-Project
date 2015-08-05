<?php

class AccountModel extends Model {

	// Account Email Functions

	public function checkEmail($currentMail) {

		// Get the username of the person logged in
		$username = $_SESSION['username'];

		$sql = "SELECT email FROM users WHERE username = '$username'";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// Convert into an associative array
		$data = $result->fetch_assoc();

		// Compare the current password against user existing password
		if( $currentMail == $data['email']  ) {
			return true;
		} else {
			return false;
		}

	}

	public function checkEmailExists( $email ) {

		// Filter the email address to make the SQL safe
		$email = $this->filter( $email );

		// Prepare SQL
		$sql = "SELECT email FROM users WHERE Email = '$email'  ";

		// Run the SQL
		$result = $this->dbc->query( $sql );


		if( $result->num_rows ) {
			return true;
		} else {
			return false;
		}

	}

	public function updateEmail() {

		// Get the username of the person logged in
		$username = $_SESSION['username'];

		// Get email from form
		$newEmail = $_POST['new-email'];

		$sql = "UPDATE users SET email = '$newEmail' WHERE username = '$username'";

		// Run the SQL
		$this->dbc->query($sql);

		// Ensure the password update worked
		if( $this->dbc->affected_rows != 0 ) {
			return true;
		} else {
			return false;
		}

	}

	// Account Password Functions

	public function checkPassword( $password ) {

		// Get the username of the person who is logged in
		$username = $_SESSION['username'];

		// Get the password of the account that is logged in
		$sql =("SELECT Password FROM users WHERE Username = '$username'");

		// Run the sql
		$result = $this->dbc->query($sql);

		// Convert into an associative array
		$data = $result->fetch_assoc();

		// Need the password compat library
		require 'vendor/password.php';

		// Compare the current password against user existing password
		if( password_verify($password, $data['Password']) ) {
			return true;
		} else {
			return false;
		}

	}

	public function updatePassword() {

		// Get the username of the person logged in
		$username = $_SESSION['username'];

		// Require the password compat library
		require 'vendor/password.php';

		// Get password from form
		$newPassword = $_POST['new-password'];

		$newPassword = password_hash( $newPassword, PASSWORD_BCRYPT);

		$sql = "UPDATE users SET password = '$newPassword' WHERE username = '$username'";

		// Run the SQL
		$this->dbc->query($sql);

		// Ensure the password update worked
		if( $this->dbc->affected_rows != 0 ) {
			return true;
		} else {
			return false;
		}

	}

}