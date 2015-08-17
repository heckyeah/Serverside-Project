<?php

class LogoutPage extends Page {

	public function __construct( $model ) {

		parent::__construct( $model );

		// Log the user out
		if( isset($_SESSION['username']) ) {
			// Unsets the session so that the there is no privilege or user
			unset($_SESSION['username']);
			unset($_SESSION['privilege']);
			unset($_SESSION['user_id']);
		}

	}
	
	public function contentHTML() {

		// logout page
		include 'parts/logout.php';

	}



}