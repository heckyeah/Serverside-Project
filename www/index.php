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
		# Require the home classes
		require 'classes/view/HomePage.php';
		require 'classes/model/HomeModel.php';
		# Connect to the page and model
		$model = new HomeModel();
		$page = new HomePage( $model );
	break;

	// Account
	case 'profile':
		# Require the Profile classes
		require 'classes/view/ProfilePage.php';
		require 'classes/model/ProfileModel.php';
		# Connect to the page and model
		$model = new ProfileModel();
		$page = new ProfilePage( $model );
	break;

	// Recipes
	case 'recipe':
		# Require the Profile classes
		require 'classes/view/RecipePage.php';
		require 'classes/model/RecipeModel.php';
		# Connect to the page and model
		$model = new RecipeModel();
		$page = new RecipePage( $model );
	break;

	// Add Recipe
	case 'addrecipe':
		# Require the Profile classes
		require 'classes/view/AddRecipePage.php';
		require 'classes/model/AddRecipeModel.php';
		# Connect to the page and model
		$model = new AddRecipeModel();
		$page = new AddRecipePage( $model );
	break;

	// 404 Error page
	default:
		require 'classes/model/Error404Model.php';
		require 'classes/view/Error404Page.php';
		$model = new Error404Model();
		$page = new Error404Page( $model );
	break;

}

// Load the content
$page->buildHTML();


