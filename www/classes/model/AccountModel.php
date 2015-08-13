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
		$newPassword = $this->filter($_POST['new-password']);

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

	public function updateInfo() {

		// Get the userID
		$userID 	= $_SESSION['user_id'];
		$firstname 	= $_POST['first-name'];
		$lastname 	= $_POST['last-name'];
		$bio 		= $_POST['bio'];
		$gender 	= $_POST['gender'];

		// Query to see if there is existing info in the database
		$sql = "SELECT profile_image, first_name, last_name, bio, gender
				FROM additional_info
				WHERE user_id = $userID";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// If there is a result then do an update
		if( $result->num_rows == 1 ) {
			
			// If the user has provided an image
			if( isset($_POST['profile-image']) ) {
				$image = $this->filter($_POST['profile-image']);

				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				if($data['profile_image'] != 'default.jpg') {
					// Delete the old images
					unlink('img/user/avatar/original/'.$data['profile_image']);
					unlink('img/user/avatar/edited/'.$data['profile_image']);
					unlink('img/user/avatar/icon/'.$data['profile_image']);
				}
			} else {
				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				// No new image
				$image = $data['profile_image'];
			}

			// UPDATE
			$sql = "UPDATE additional_info
					SET profile_image = '$image',
						first_name = '$firstname',
						last_name = '$lastname',
						bio = '$bio',
						gender = '$gender'
					WHERE user_id = $userID";

		} elseif( $result->num_rows == 0 ) {

			// If there is "profile-image" in the post array then an image has been provided
			if( isset($_POST['profile-image']) ) {
				$image = $this->filter($_POST['profile-image']);
			} else {
				$image = 'default.jpg';
			}

			// INSERT
			$sql = "INSERT INTO additional_info (additional_info_id, first_name, last_name, bio, gender, profile_image, user_id)
					VALUES (NULL, '$firstname', '$lastname', '$bio', '$gender', '$image', $userID )";
		}

		// Run the SQL
		$this->dbc->query($sql);

		// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}

		return false;

	}

}