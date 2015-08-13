<?php

class ProfileModel extends Model {

	// Methods
	public function getProfileRecipeCard() {
		
		$username = $_SESSION['username'];

		$sql = "	SELECT recipe_id, username, recipe_image, cook_time, title 
					FROM recipes JOIN users 
					ON recipes.user_id = users.user_id
					WHERE users.username = '$username'
					ORDER BY time 
					DESC LIMIT 12
					";

		return $this->dbc->query($sql);
	}

	public function changeCover() {

		// Get the userID
		$userID = $_SESSION['user_id'];

		// Query to see if there is existing info in the database
		$sql = "SELECT cover_image
				FROM additional_info
				WHERE user_id = $userID";

		// Run the SQL
		$result = $this->dbc->query($sql);

		// If there is a result then do an update
		if( $result->num_rows == 1 ) {
			
			// If the user has provided an image
			if( isset($_POST['cover-image']) ) {
				$image = $this->filter($_POST['cover-image']);

				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				if($data['cover_image'] != 'default.jpg') {
					// Delete the old images
					unlink('img/user/covers/original/'.$data['cover_image']);
					unlink('img/user/covers/edited/'.$data['cover_image']);
				}
			} else {
				// Convert the result into an associative array
				$data = $result->fetch_assoc();

				// No new image
				$image = $data['cover_image'];
			}

			// UPDATE
			$sql = "UPDATE additional_info
					SET cover_image = '$image'
					WHERE user_id = $userID";

		} elseif( $result->num_rows == 0 ) {

			// If there is "cover-image" in the post array then an image has been provided
			if( isset($_POST['cover-image']) ) {
				$image = $this->filter($_POST['cover-image']);
			} else {
				$image = 'default.jpg';
			}

			// INSERT
			$sql = "INSERT INTO users_additional_info (cover_image)
					VALUES ('$image')";
		}

		// Run the SQL
		$this->dbc->query($sql);

		// If the query failed
		if( $this->dbc->affected_rows == 1 ) {
			return true;
		}

		return false;

	}



}