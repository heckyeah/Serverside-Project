<?php

class ProfilePage extends Page {

	private $totalErrors = 0;

	public function __construct($model) {
		parent:: __construct($model);

		//Get profile data
		$this->model->getAdditionalInfo();

		if( isset($_POST['change-cover']) ) {
			$this->profileCover();
		}

	}

	// Methods
	public function contentHTML() {

		$username		= $_SESSION['username'];


		# Profile
		include 'parts/profile.php';
		# Work

	}

	public function profileCover() {

		require 'vendor/ImageUploader.php';

		// Create instance of the Image Uploader
		$imageUploader = new ImageUploader();

		// Attempt to upload the file
		$result = $imageUploader->upload('cover-image', 'img/user/covers/original/');

		// If the upload was a success
		if( $result == true ) {

			// Get the file name
			$imageName = $imageUploader->getImageName();

			// Prepare the variables
			$fileLocation = "img/user/covers/original/$imageName";
			$destination = "img/user/covers/edited/";

			// Make the avatar version
			$imageUploader->resize($fileLocation, 1000, $destination, $imageName);

			$_POST['cover-image'] = $imageName;
		} else {
			// Something went wrong
			$this->totalErrors++;
			$this->userImageError = $imageUploader->errorMessage;
		}

		if( $this->totalErrors == 0 ) {
		$result = $this->model->changeCover();

			// If the result was good
			if( $result ) {
				// Redirect the user to login
				header('Location: index.php?page=profile');
				$this->userSuccess = 'Successfully changed your info';
			} else {
				$this->userFail = 'Info not updated';
			}
		}

	}

}