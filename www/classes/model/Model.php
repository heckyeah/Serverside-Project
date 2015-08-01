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
		$requestPage = $_GET['page'];

		// Prepare the query
		$sql = "SELECT title, description FROM pages WHERE name = '$requestPage'";

		// Run the query
		$result = $this->dbc->query( $sql );

		// Make sure there is data in the result
		// if not then we need to get the 404 data instead
		if( $result->num_rows == 0 ) {

			// Prepare SQL to get the 404 page data
			$sql = "SELECT title, description FROM pages WHERE name = '404'   ";

			// Run the query
			$result = $this->dbc->query( $sql );

		}

		// Convert the result into an associative array
		$pageData = $result->fetch_assoc();

		// Save the title and description in the properties above
		$this->title 		= $pageData['title'];
		$this->description 	= $pageData['description'];

	}

}