<?php

class AddRecipeModel extends Model {

	// Methods
	public function getIngredients() {

		$sql = "SELECT ingredients_id, ingredient_name, type FROM ingredients";

		return $this->dbc->query($sql);

	}

	public function addRecipe() {

		$recipeTitle = $_POST['recipe-title'];
		$recipeDirections = $_POST['recipe-directions'];
		$recipeTime = $_POST['cook-time'];
		$recipeServes = $_POST['serves'];
		$author = $_SESSION['user_id'];

		$sql = "INSERT INTO recipes 
				VALUES (NULL, '$recipeTitle', '$recipeDirections', 0, 'MacAndCheese.jpg', '$recipeTime', '$recipeServes', $author, 0, 0, CURRENT_TIMESTAMP)";
				
		// Run the SQL
		$this->dbc->query($sql);

	}

}