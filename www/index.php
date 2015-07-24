<?php

// Start the session
session_start();

// Determine what page the user wants
$_GET['page'] 	= isset($_GET['page']) ? $_GET['page'] : 'home';
$pageSelect		= $_GET['page'];

switch () {

	// Home
	case 'home':
		
		 include 'parts/header.php'; ?>
		 include 'parts/banner.php'; ?>
		 include 'parts/search-result.php'; ?>
		 include 'parts/footer.php'; ?>

	break;
}

?>

