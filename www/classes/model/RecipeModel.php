<?php

class RecipeModel extends Model {

	public function getIngredients() {

		$recipeID = $this->filter($_GET['recipeid']);

		$sql = "SELECT ingredients_id, ingredient_name, type
				FROM ingredients";

		// Run the query
		return $this->dbc->query($sql);

	}

	public function getIngredientsToDisplay() {

		$recipeID = $this->filter($_GET['recipeid']);

		$sql = "SELECT ingredients.ingredients_id AS ingID, ingredient_name, type
				FROM ingredients
				JOIN recipe_ingredients
				ON ingredients.ingredients_id = recipe_ingredients.ingredients_id
				WHERE recipe_id = $recipeID";

		// Run the query
		return $this->dbc->query($sql);

	}

	public function getRecipe() {

		$recipeID = $this->filter($_GET['recipeid']);

		$sql = "SELECT 	recipe_id, 
						title, 
						directions, 
						recipe_image, 
						cook_time, 
						recipe_video, 
						recipes.user_id,
						username
				FROM users
				JOIN recipes
				ON users.user_id = recipes.user_id
				WHERE recipe_id = $recipeID";

		// Run the query
		$result = $this->dbc->query($sql);

		// Turn it into an associative array and capture
		$recipeData = $result->fetch_assoc();

		$this->coverImage 			= $recipeData['recipe_image'];
		$this->recipeID 			= $recipeData['recipe_id'];
		$this->recipeTitle 			= $recipeData['title'];
		$this->recipeDirections 	= $recipeData['directions'];
		$this->recipeVideo 			= $recipeData['recipe_video'];
		$this->recipeTime 			= $recipeData['cook_time'];
		$this->recipeUser 			= $recipeData['username'];
	}

	public function updateRecipe() {

		$recipeID 			= $this->filter($_GET['recipeid']);
		$recipeTitle 		= $this->filter($_POST['recipe-title']);
		$recipeDirections 	= $this->filter($_POST['recipe-directions']);
		$recipeTime 		= $this->filter($_POST['cook-time']);
		$recipeServes 		= $this->filter($_POST['serves']);
		$recipeVideo 		= $this->filter(substr($_POST['recipe-video'], -11));
		$author 			= $_SESSION['user_id'];

		if ($_SESSION['privilege'] == 'admin') {

			// Get the ID of the recipe owner
			$sql = "SELECT user_id FROM recipes WHERE recipe_id = $recipeID";
			$result = $this->dbc->query($sql);
			$result = $result->fetch_assoc();
			$author = $result['user_id'];
		}
		// Query to see if there is existing info in the database
		$sql = "SELECT recipe_image
				FROM recipes
				WHERE user_id = $author && recipe_id = $recipeID";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// If there is a result then do an update
		if( $result->num_rows == 1 ) {
			
			// If the user has provided an image
			if( isset($_POST['recipe-image']) ) {
				$image = $this->filter($_POST['recipe-image']);

				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				if($data['recipe_image'] != 'default.jpg') {
					// Delete the old images
					unlink('img/recipes/original/'.$data['recipe_image']);
					unlink('img/recipes/cover/'.$data['recipe_image']);
					unlink('img/recipes/thumbnail/'.$data['recipe_image']);
				}
			} else {
				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				// No new image
				$image = $data['recipe_image'];
			}

			$sql = "UPDATE recipes
					SET title = '$recipeTitle', 
						directions = '$recipeDirections', 
						cook_time = $recipeTime, 
						recipe_video = '$recipeVideo',
						recipe_image = '$image'
					WHERE recipe_id = $recipeID && user_id = $author;";

		} elseif( $result->num_rows == 0 ) {

			// If there is "recipe-image" in the post array then an image has been provided
			if( isset($_POST['recipe-image']) ) {
				$image = $this->filter($_POST['recipe-image']);
			} else {
				$image = 'default.jpg';
			}

			// INSERT
			$sql = "INSERT INTO recipes
					VALUES (NULL, '$recipeTitle', '$recipeDirections', '$image', $recipeTime, '$recipeServes', '$recipeVideo', $author, 0, 0, CURRENT_TIME )";
		}

		// Run the SQL
		$this->dbc->query($sql);

		// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}

		return false;

	}

	public function updateIngredients() {

		$recipeID = $this->filter($_GET['recipeid']);

		$sql = "DELETE FROM recipe_ingredients
				WHERE recipe_id = $recipeID";

		$this->dbc->query($sql);

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

	}

	public function getRecipeDetails() {
		$recipeID = $_GET['recipeid'];

		$sql ="	SELECT username, (SELECT profile_image FROM additional_info WHERE users.user_id = additional_info.user_id ) AS profile_image
				FROM users                    
				JOIN recipes
				ON users.user_id = recipes.user_id
                WHERE recipe_id = $recipeID ";

		// Run the aql and capture it
		return $this->dbc->query($sql);

	}

}
