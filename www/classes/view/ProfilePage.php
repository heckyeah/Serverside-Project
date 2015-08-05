<?php

class ProfilePage extends Page {

	public function __construct($model) {
		parent:: __construct($model);

		//Get profile data
		$this->model->getAdditionalInfo();

	}

	// Methods
	public function contentHTML() {

		$username		= $this->model->username;
		$profileImage	= $this->model->profileImage;

		# Profile
		include 'parts/profile.php';
		# Work

	}

}