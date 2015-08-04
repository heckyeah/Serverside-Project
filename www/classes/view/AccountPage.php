<?php

class AccountPage extends Page {

	// Methods
	public function contentHTML() {

		// Make sure the user is logged in
		// If not then offer them a login or registration link
		if( !isset($_SESSION['username']) ) {

			// Redirect the user to login
			header('Location: index.php?page=login&notlogged');
			
			return;
		}

		if (isset( $_GET['editdetails']) ) {
			$post = 'parts/account/editdetails.php';
		} elseif (isset( $_GET['userstatus']) ) {
			$post = 'parts/account/userstatus.php';
		} else {
			$post = '';
		}

		# Home content
		include 'parts/account.php';
	}

}