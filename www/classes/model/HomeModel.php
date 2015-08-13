<?php

class HomeModel extends Model {

	// Methods
	public function getRecipeCard() {
		
		$sql = ("	SELECT recipe_id, username, recipe_image, cook_time, title 
					FROM recipes JOIN users 
					ON recipes.user_id = users.user_id
					ORDER BY time 
					DESC LIMIT 12
					");

		return $this->dbc->query($sql);
	}
}