<?php

class RecipeModel extends Model {

	// Method 
	public function getIngredients() {

		$sql = "SELECT ingredients_id, ingredient_name, type FROM ingredients";

		return $this->dbc->query($sql);

	}

	public function getIngredientsToDisplay() {

		$recipeID = $_GET['recipeid'];

		$sql = "SELECT ingredient_name
				FROM ingredients
				JOIN recipe_ingredients
				ON ingredients.ingredients_id = recipe_ingredients.ingredients_id
				WHERE recipe_id = $recipeID";

		// Run the query
		$result = $this->dbc->query($sql);

		return $result;

	}

	public function getRecipe() {

		$recipeID = $_GET['recipeid'];

		$sql = "SELECT recipe_id, title, directions, recipe_image, cook_time, recipe_video, user_id
				FROM recipes
				WHERE recipe_id = $recipeID";

		// Run the query
		$result = $this->dbc->query($sql);

		return $result->fetch_assoc();
	}

	public function getRecipeForEdit() {

		$recipeID = $_GET['recipeid'];

		$sql = "SELECT recipe_id, title, directions, recipe_image, cook_time, recipe_video, user_id
				FROM recipes
				WHERE recipe_id = $recipeID";

		// Run the query
		$result = $this->dbc->query($sql);

		return $result->fetch_assoc();
	}

	public function updateRecipe() {

		$recipeID 			= $_GET['recipeid'];
		$recipeTitle 		= $_POST['recipe-title'];
		$recipeDirections 	= $_POST['recipe-directions'];
		$recipeTime 		= $_POST['cook-time'];
		$recipeServes 		= $_POST['serves'];
		$recipeVideo 		= $_POST['recipe-video'];
		$recipeVideo 		= substr("$recipeVideo", -11);
		$author 			= $_SESSION['user_id'];

		$sql = "UPDATE recipes
				SET title = '$recipeTitle', 
					directions = '$recipeDirections', 
					cook_time = $recipeTime, 
					recipe_video = '$recipeVideo'
				WHERE recipe_id = $recipeID && user_id = $author;";
		// Run the SQL
		$this->dbc->query($sql);

	}

}
