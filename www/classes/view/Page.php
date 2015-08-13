<?php

class Page {

	// Properties
	public $model;

	// Constructor
	public function __construct($model) {
		$this->model = $model;

		// Get page data
		$model->getPageInfo();

		//Get additional data
		$model->getAdditionalInfo();

	}

	// Function to build the HTML
	public function buildHTML() {

		//Get user data
		$result = $this->model->getUserInfo();
		// Convert the result into an associative array
		$userData = $result->fetch_assoc();
		$this->username 	= $userData['username'];

		// If the user is logged in then show their username in link
		// Otherwise just show "account"
		if( isset($_SESSION['username']) ) {
			$text = $_SESSION['username'];
		} else {
			$text = 'Account';
		}

		# Header
		include 'parts/header.php';
		# The content
		$this->contentHTML();
		# Footer
		include 'parts/footer.php';

	}

	public function alertMessage( $message, $type ) {
		if( $message == '' ) { return; }

		echo '<small class="php '.$type.'">';
		echo $message;
		echo '</small>';
		
	}
}