<?php

class RecipePage extends Page {

	private $totalErrors = 0;

	public function __construct($model) {
		parent:: __construct($model);


		// If the user has submitted the recipe change form
		if( isset($_POST['edit-recipe']) ) {
			$this->processRecipe();
		}

		// If the user has submitted the email change form
		if( isset($_POST['change-ingredients']) ) {
			$this->processRecipe();
		}

		//Get profile data
		$this->recipeInfo = $this->model->getRecipe();

		$this->recipeEditInfo = $this->model->getRecipe();

	}

	public function contentHTML() {

		include 'parts/recipe.php';

	}

	public function processRecipe() {

		// If there is a file
		if( isset($_FILES['recipe-image']) && $_FILES['recipe-image']['name'] != '' ) {

			require 'vendor/ImageUploader.php';

			// Create instance of the Image Uploader
			$imageUploader = new ImageUploader();

			// Attempt to upload the file
			$result = $imageUploader->upload('recipe-image', 'img/recipes/original/');

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

				$_POST['recipe-image'] = $imageName;
			} else {
				// Something went wrong
				$this->totalErrors++;
				$this->userImageError = $imageUploader->errorMessage;
			}

		}

		

		if( $this->totalErrors == 0 ) {
		$result = $this->model->updateRecipe();

			// If the result was good
			if( $result ) {
				// Redirect the user to login
				header('Location: index.php?page=recipe&recipeid='.$_GET['recipeid'] );
				$this->userSuccess = 'Successfully changed your info';
			} else {
				$this->userFail = 'Info not updated';
			}
		}
	}

}