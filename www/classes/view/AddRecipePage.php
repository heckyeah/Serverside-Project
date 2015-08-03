<?php

class AddRecipePage extends Page {

	// Methods
	public function contentHTML() {

		// Make sure the user is logged in
		// If not then offer them a login or registration link
		if( !isset($_SESSION['username']) ) {

			// Redirect the user to login
			header('Location: index.php?page=login&notlogged');
			
			return;
		}
		
		# Home content
		include 'parts/add-recipe.php';

	}

}