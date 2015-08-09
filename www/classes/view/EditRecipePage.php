<?php

class EditRecipePage extends Page {

	public function __construct($model) {
		parent::__construct($model);

		$this->recipeEditInfo = $this->model->getRecipeForEdit();

	}

	public function contentHTML() {

		# Edit Recipe
		include 'parts/edit-recipe.php';

	}


}