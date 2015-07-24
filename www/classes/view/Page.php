<?php

class Page {

	// Function to build the HTML
	public function buildHTML() {

		# Header
		include 'parts/header.php';
		# Banner
		include 'parts/banner.php';
		# The content
		$this->contentHTML();
		# Footer
		include 'parts/footer.php';

	}
}