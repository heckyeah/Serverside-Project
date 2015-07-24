<?php

class Model {

	// Constructor
	public function __construct() {

		// Connect to the database and save the connection in the property above
		$this->dbc = new mysqli('localhost', 'root', '', 'munch');

	}
}