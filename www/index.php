<?php

// Start the session
session_start();

// Determine what page the user wants
$_GET['page'] 	= isset($_GET['page']) ? $_GET['page'] : 'home';
$pageSelect		= $_GET['page'];

// Require some classes
require 'classes/view/Page.php';
require 'classes/model/Model.php';

switch ( $pageSelect ) {

	// Home
	case 'home':
		require 'classes/view/HomePage.php';
		require 'classes/model/HomeModel.php';
		
		$model = new HomeModel();
		$page = new HomePage( $model );
	break;

	// Home
	case 'default':
		echo 'none';
	break;

}

// Load the content
$page->buildHTML();


