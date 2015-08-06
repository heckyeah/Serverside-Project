<?php

class AddRecipePage extends Page {

	private $totalErrors = 0;
	private $recipeTitleError;
	private $recipeDirectionsError;

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
		
		# Home content
		include 'parts/add-recipe.php';

	}

	public function processRecipe() {

		$recipeTitle 		= $_POST['recipe-title'];
		$recipeDirections 	= $_POST['recipe-directions'];
		$recipeTime 		= $_POST['cook-time'];
		$recipeServes 		= $_POST['serves'];

		if ( strlen($recipeTitle) > 2000 ) {
			$this->recipeTitleError = 'Recipe name is too long, 45 characters max.';
			$this->totalErrors++;
		} elseif ( strlen($recipeTitle) == 0 ) {
			$this->recipeTitleError = 'Recipe title is required.';
			$this->totalErrors++;
		}

		if ( strlen($recipeDirections) > 45 ) {
			$this->recipeDirectionsError = 'Recipe directions is too long please shorten, 2000 characters max.';
			$this->totalErrors++;
		} elseif ( strlen($recipeDirections) == 0 ) {
			$this->recipeDirectionsError = 'Recipe directions is required.';
			$this->totalErrors++;
		}

	

		if ( $this->totalErrors == 0 ) {
			$this->model->addRecipe();
		}

	} 

}