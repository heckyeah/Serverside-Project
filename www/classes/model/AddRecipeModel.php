<?php

class AddRecipeModel extends Model {

	// Methods
	public function getIngredients() {

		$sql = "SELECT ingredient_name, type FROM ingredients";

		return $this->dbc->query($sql);

	}

}