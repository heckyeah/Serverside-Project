<?php

// Start the session
session_start();

require '../config.php';

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

	// Edit Recipe
	case 'editrecipe':
		# Require the Profile classes
		require 'classes/view/EditRecipePage.php';
		require 'classes/model/EditRecipeModel.php';
		# Connect to the page and model
		$model = new EditRecipeModel();
		$page = new EditRecipePage( $model );
	break;

	// Login
	case 'login':
		# Require the Profile classes
		require 'classes/view/LoginPage.php';
		require 'classes/model/LoginModel.php';
		# Connect to the page and model
		$model = new LoginModel();
		$page = new LoginPage( $model );
	break;

	// Logout
	case 'logout':
		# Require the Profile classes
		require 'classes/view/LogoutPage.php';
		require 'classes/model/LogoutModel.php';
		# Connect to the page and model
		$model = new LogoutModel();
		$page = new LogoutPage( $model );
	break;

	// Register
	case 'register':
		# Require the Profile classes
		require 'classes/view/RegisterPage.php';
		require 'classes/model/RegisterModel.php';
		# Connect to the page and model
		$model = new RegisterModel();
		$page = new RegisterPage( $model );
	break;

	// Account
	case 'account':
		# Require the Profile classes
		require 'classes/view/AccountPage.php';
		require 'classes/model/AccountModel.php';
		# Connect to the page and model
		$model = new AccountModel();
		$page = new AccountPage( $model );
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


