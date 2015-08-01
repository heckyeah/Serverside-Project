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

		# Header
		include 'parts/header.php';
		# The content
		$this->contentHTML();
		# Footer
		include 'parts/footer.php';

	}
}