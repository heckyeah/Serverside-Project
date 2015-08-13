<?php

class AddRecipeModel extends Model {

	// Methods
	public function getIngredients() {

		$sql = "SELECT ingredients_id, ingredient_name, type FROM ingredients";

		return $this->dbc->query($sql);

	}

	public function addRecipe() {

		$recipeTitle 		= $this->filter($_POST['recipe-title']);
		$recipeDirections 	= $this->filter($_POST['recipe-directions']);
		$recipeTime 		= $this->filter($_POST['cook-time']);
		$recipeServes 		= $this->filter($_POST['serves']);
		$recipeVideo 		= $this->filter($_POST['recipe-video']);
		$recipeVideo 		= $this->filter(substr("$recipeVideo", -11));
		$author 			= $_SESSION['user_id'];

		// If there is "recipe-image" in the post array then an image has been provided
		if( isset($_POST['cover-image']) ) {
			$image = $this->filter($_POST['cover-image']);
		} else {
			$image = 'default.jpg';
		}

		$sql = "INSERT INTO recipes 
				VALUES (NULL, '$recipeTitle', '$recipeDirections', '$image', '$recipeTime', '$recipeServes', '$recipeVideo', $author, 0, 0, CURRENT_TIMESTAMP)";

		// Run the SQL
		$this->dbc->query($sql);

		// Get the ID of the brand new recipe
		// We will use this to associate tags
		$recipeID = $this->dbc->insert_id;
				// Loop through each tag
		foreach( $_POST['ingredient'] as $tagID ) {
			// Filter the ID just in case the user has tampered with it
			$tagID = $this->filter($tagID);
			
			// Prepare SQL
			$sql = "INSERT INTO
						recipe_ingredients
					VALUES (NULL, $tagID, $recipeID)";

			// Run the query
			$this->dbc->query($sql);
		}
		

		header('Location: index.php?page=recipe&recipeid='.$recipeID );
	}

}