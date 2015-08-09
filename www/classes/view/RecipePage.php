<?php

class RecipePage extends Page {

	public function __construct($model) {
		parent:: __construct($model);


		// If the user has submitted the email change form
		if( isset($_POST['edit-recipe']) ) {
			$this->model->updateRecipe();
		}

		//Get profile data
		$this->recipeInfo = $this->model->getRecipe();

		$this->recipeEditInfo = $this->model->getRecipeForEdit();

	}

	public function contentHTML() {

		include 'parts/recipe.php';

	}
}