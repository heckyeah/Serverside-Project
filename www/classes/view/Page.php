<?php

class Page {

	// Properties
	public $title;
	public $description;
	public $model;

	// Constructor
	public function __construct($model) {
		$this->model = $model;

		// Get page data
		$model->getPageInfo();
	}

	// Function to build the HTML
	public function buildHTML() {
		$title 			= $this->model->title;
		$description 	= $this->model->description;

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

	public function errorMessage( $message, $type ) {
		if( $message == '' ) { return; }

		echo '<small class="php '.$type.'">';
		echo $message;
		echo '</small>';
		
	}
}