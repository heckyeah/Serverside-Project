<?php

class AccountPage extends Page {

	private $totalErrors = 0;

	private $currentEmailError;
	private $newEmailError;

	private $currentPasswordError;
	private $newPasswordError;
	private $confirmPasswordError;
	private $passwordChangeSuccess;

	public function __construct($model) {
		parent::__construct($model);

		// If the user has submitted the avatar change form
		if( isset($_POST['change-avatar']) ) {
			$this->processChangeAvatar();
		}

		// If the user has submitted the email change form
		if( isset($_POST['email-data']) ) {
			$this->processEmailChange();
		}

		// If the user has submitted the password change form
		if( isset($_POST['password-data']) ) {
			$this->processPasswordChange();
		}

	}

	// Methods
	public function contentHTML() {

		// Make sure the user is logged in
		// If not then offer them a login or registration link
		if( !isset($_SESSION['username']) ) {

			// Redirect the user to login
			header('Location: index.php?page=login&notlogged');
			
			return;
		}
		// Set permissions for what a user can see and what an admin can see
		//If the account is a admin he can use all links.
		if ( $_SESSION['privilege'] == 'admin' ) {

			// Get the address of the links from the GET array and show the page accordingly
			if ( isset( $_GET['editdetails']) ) {
				// The user details page
				$post = 'parts/account/editdetails.php';
			} elseif ( isset( $_GET['accountinformation']) ) {
				// The edit recipe page
				$post = 'parts/account/accountinformation.php';
			} elseif ( isset( $_GET['manageusers']) ) {
				// The edit recipe page
				$post = 'parts/account/manageusers.php';
			} elseif ( isset( $_GET['managerecipes']) ) {
				// The edit recipe page
				$post = 'parts/account/managerecipes.php';
			} else {
				$post = '';
			}
			
		// If the account is a user then he can only use these links
		} elseif ( $_SESSION['privilege'] == 'user' ) {
			// Get the address of the links from the GET array and show the page accordingly
			if ( isset( $_GET['editdetails']) ) {
				// The user details page
				$post = 'parts/account/editdetails.php';
			} elseif ( isset( $_GET['accountinformation']) ) {
				// The edit recipe page
				$post = 'parts/account/accountinformation.php';
			} elseif ( isset( $_GET['editrecipe']) ) {
				// The edit recipe page
				$post = 'parts/account/editrecipe.php';
			} else {
				$post = '';
			}
		}

		# Account content
		include 'parts/account.php';
	}

	public function processEmailChange() {

		// Make life easier
		// So i dont have to use the post array
		$currentMail 	= trim($_POST['current-email']);
		$newMail      	= trim($_POST['new-email']);

		// Validate the current email field
		if ( strlen($currentMail) == 0 ) {
			$this->currentEmailError = 'Required';
			$this->totalErrors++;
		} elseif ( !$this->model->checkEmail($currentMail) ) {
			$this->currentEmailError = 'Incorrect email';
			$this->totalErrors++;
		}

		// Validate the new email field
		// if the string length is less then 6 or more the 254 throw a error
		if( strlen($newMail) < 6 || strlen($newMail) > 254 ) {
			$this->newEmailError = 'E-Mail is an invalid length';
			$this->totalErrors++;
		// If the email doesnt conform to email address standards throw a error
		} elseif( !filter_var( $newMail, FILTER_VALIDATE_EMAIL ) ) {
			$this->newEmailError = 'Invalid E-Mail format. example@example.com';
			$this->totalErrors++;
		// If the email is already in use
		} elseif( $this->model->checkEmailExists( $newMail ) ) {
			$this->newEmailError = 'E-Mail already in use';
			$this->totalErrors++;
		}

		// Change the email
		if ($this->totalErrors == 0 ) {
			// Update the Email
			$this->model->updateEmail();
		}
	}

	public function processPasswordChange() {

		// Make life easier
		// So I dont have to use the post array
		$currentPassword	= $_POST['current-password'];
		$newPassword		= $_POST['new-password'];
		$confirmPassword	= $_POST['confirm-password'];

		// Validate
		if( strlen($currentPassword) == 0 ) {
			$this->currentPasswordError = 'Required';
			$this->totalErrors++;
		} elseif( !$this->model->checkPassword($currentPassword) ) {
			$this->currentPasswordError = 'Incorrect password';
			$this->totalErrors++;
		}

		if( strlen($newPassword) < 8 ) {
			$this->newPasswordError = 'Needs to be more than 8 characters';
			$this->totalErrors++;
		}

		if( strlen($confirmPassword) < 8 ) {
			$this->confirmPasswordError = 'Needs to be more than 8 characters';
			$this->totalErrors++;
		} elseif( $confirmPassword != $newPassword ) {
			$this->confirmPasswordError = 'Does not match the new password';
			$this->totalErrors++;
		}

		// Change the email
		if ($this->totalErrors == 0 ) {
			// Update the Password
			$this->model->updatePassword();
			$this->passwordChangeSuccess = 'Your Password has been changed';
		}
	}

	public function processChangeAvatar() {

		if( isset($_FILES['profile-image']) && $_FILES['profile-image']['name'] != '' ) {

			require 'vendor/ImageUploader.php';

			// Create instance of the Image Uploader
			$imageUploader = new ImageUploader();

			// Attempt to upload the file
			$result = $imageUploader->upload('profile-image', 'img/user/avatar/original/');

			// If the upload was a success
			if( $result == true ) {

				// Get the file name
				$imageName = $imageUploader->getImageName();

				// Prepare the variables
				$fileLocation = "img/user/avatar/original/$imageName";
				$destination = "img/user/avatar/edited/";

				// Make the recipe_image version
				$imageUploader->resize($fileLocation, 110, $destination, $imageName);

				// Make thumbnail
				$destination = "img/user/avatar/icon/";
				$imageUploader->resize($fileLocation, 34, $destination, $imageName);

				$_POST['profile-image'] = $imageName;
			} else {
				// Something went wrong
				$this->totalErrors++;
				$this->userImageError = $imageUploader->errorMessage;
			}
		}
		if ( $this->totalErrors == 0 ) {
			$this->model->changeAvatar();

		}


	}
}