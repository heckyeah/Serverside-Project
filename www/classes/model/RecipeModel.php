<?php

class RecipeModel extends Model {

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

}