<?php

class Model {

	// Properties
	protected $dbc;
	public $title;
	public $description;

	// Constructor
	public function __construct() {

		// Connect to the database and save the connection in the property above
		$this->dbc = new mysqli('localhost', 'root', '', 'munch');

	}

	// Get the page information from the database
	public function getPageInfo() {

		// Obtain the name of the requested page
		$requestPage = $this->filter($_GET['page']);

		// Prepare the query
		$sql = "SELECT title, description FROM pages WHERE name = '$requestPage'";

		// Run the query
		return $this->dbc->query( $sql );

		// Make sure there is data in the result
		// if not then we need to get the 404 data instead
		if( $result->num_rows == 0 ) {

			// Prepare SQL to get the 404 page data
			$sql = "SELECT title, description FROM pages WHERE name = '404'   ";

			// Run the query
			return $this->dbc->query( $sql );

		}

	}
	// Instead of wrighting it the long way
	protected function filter($value) {
		return $this->dbc->real_escape_string( $value );
	}

	// Gets the addtional indo of the user for the pages that need it
	public function getAdditionalInfo() {

		$userID = $_SESSION['user_id'];

		$sql ="	SELECT first_name, last_name, bio, profile_image, cover_image, age, gender
				FROM additional_info
				WHERE user_id = $userID";


		// Run the aql and capture it
		return $this->dbc->query($sql);

	}
	// Just grabs the username for where the username is used on the website
	public function getUserInfo() {

			$userID = $_SESSION['user_id'];

			$sql = "SELECT username
					FROM users
					WHERE user_id = $userID";
			
			return $this->dbc->query($sql);
	}

}