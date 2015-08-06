<?php

class HomeModel extends Model {

	// Methods
	public function getRecipeCard() {
		
		$sql = ("	SELECT recipe_id, title, recipe_image, cook_time, username, first_name, last_name
					FROM recipes JOIN users JOIN additional_info
					WHERE users.user_id = recipes.user_id && additional_info.user_id = users.user_id
					ORDER BY time 
					DESC LIMIT 12
					");

		return $this->dbc->query($sql);
	}
}