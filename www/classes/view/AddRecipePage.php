<?php

class AddRecipePage extends Page {

	private $totalErrors = 0;
	private $recipeTitleError;
	private $recipeDirectionsError;
	private $userImageError;
	private $recipeTimeError;
	Private $recipeTitle;
	Private $recipeDirections;
	Private $recipeTime;
	Private $recipeVideo;



	public function __construct($model) {
		parent::__construct($model);

		// If the user has submitted the email change form
		if( isset($_POST['add-recipe']) ) {
			$this->processRecipe();
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
		
		# Add Recipe
		include 'parts/add-recipe.php';

	}

	public function processRecipe() {

		$recipeTitle 		= trim($_POST['recipe-title']);
		$recipeDirections 	= trim($_POST['recipe-directions']);
		$recipeTime 		= trim($_POST['cook-time']);
		$recipeServes 		= trim($_POST['serves']);
		$recipeVideo 		= trim($_POST['recipe-video']);

		$this->recipeTitle 		= $recipeTitle;
		$this->recipeDirections = $recipeDirections;
		$this->recipeTime 		= $recipeTime;
		$this->recipeVideo 		= $recipeVideo;

		if ( strlen($recipeTitle) > 40 ) {
			$this->recipeTitleError = 'Recipe name is too long, 45 characters max.';
			$this->totalErrors++;
		} elseif ( strlen($recipeTitle) == 0 ) {
			$this->recipeTitleError = 'Recipe title is required.';
			$this->totalErrors++;
		}

		if ( strlen($recipeDirections) > 2000 ) {
			$this->recipeDirectionsError = 'Recipe directions is too long please shorten, 2000 characters max.';
			$this->totalErrors++;
		} elseif ( strlen($recipeDirections) == 0 ) {
			$this->recipeDirectionsError = 'Recipe directions is required.';
			$this->totalErrors++;
		}

		if (strlen($recipeTime) > 3) {
			$this->recipeTimeError = 'Please enter up to 3 digits.';
			$this->totalErrors++;
		} else if ( $recipeTime == '' ) {
			$this->recipeTimeError = 'Please enter a time.';
			$this->totalErrors++;
		} elseif( !preg_match( '/^[0-9]{1,3}$/', $recipeTime ) ) {
			$this->recipeTimeError = 'Use only numbers. With a maximum of 3 digits.';
			$this->totalErrors++;
		}

		if ( $_FILES['cover-image']['name'] == '') {
			$this->userImageError = 'You must upload an image with your recipe.';
			$this->totalErrors++;
		} else {

			// If there is a file
			if( isset($_FILES['cover-image']) && $_FILES['cover-image']['name'] != '' ) {

				require 'vendor/ImageUploader.php';

				// Create instance of the Image Uploader
				$imageUploader = new ImageUploader();

				// Attempt to upload the file
				$result = $imageUploader->upload('cover-image', 'img/recipes/original/');

				// If the upload was a success
				if( $result == true ) {

					// Get the file name
					$imageName = $imageUploader->getImageName();

					// Prepare the variables
					$fileLocation = "img/recipes/original/$imageName";
					$destination = "img/recipes/cover/";

					// Make the recipe_image version
					$imageUploader->resize($fileLocation, 1000, $destination, $imageName);

					// Make thumbnail
					$destination = "img/recipes/thumbnail/";
					$imageUploader->resize($fileLocation, 230, $destination, $imageName);

					$_POST['cover-image'] = $imageName;
				} else {
					// Something went wrong
					$this->totalErrors++;
					$this->userImageError = $imageUploader->errorMessage;
				}

			}
		}

		if ( $this->totalErrors == 0 ) {
			$this->model->addRecipe();
		}

	} 

}