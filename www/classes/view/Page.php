<?php

class Page {

	// Properties
	public $model;

	// Constructor
	public function __construct($model) {
		$this->model = $model;

		// Get page data
		$model->getPageInfo();

	}

	// Function to build the HTML
	public function buildHTML() {

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