<?php

class ProfilePage extends Page {

	// Methods
	public function contentHTML() {

		# Profile
		include 'parts/profile.php';
		# Work
		include 'parts/search-result.php';

	}

}