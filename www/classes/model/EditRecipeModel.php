<?php

class EditRecipeModel extends Model {

	// Methods
	public function getIngredients() {

		$sql = "SELECT ingredients_id, ingredient_name, type FROM ingredients";

		return $this->dbc->query($sql);

	}

	public function getRecipeForEdit() {

		$recipeID = $this->filter($_GET['recipeid']);

		$sql = "SELECT recipe_id, title, directions, recipe_image, cook_time, recipe_video, user_id
				FROM recipes
				WHERE recipe_id = $recipeID";

		// Run the query
		$result = $this->dbc->query($sql);

		return $result->fetch_assoc();
	}

}