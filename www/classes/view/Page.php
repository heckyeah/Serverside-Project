<?php

class Page {

	// Function to build the HTML
	public function buildHTML() {

		# Header
		include 'parts/header.php';
		# The content
		$this->contentHTML();
		# Footer
		include 'parts/footer.php';

	}
}