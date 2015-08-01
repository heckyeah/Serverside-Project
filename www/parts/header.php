<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $description; ?>">
	<link rel="stylesheet" href="scss/main.css">
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

	<nav>
		<div class="container">
			<ul>
				<li class="nav_menu">
					<a href="index.php?page=profile">
						<img src="img/user/avatar/default_icon.jpg" alt="Hekiera Mareroa">
						<span>Hekiera Mareroa <i class="fa fa-caret-down"></i></span>
					</a>
					<ul>
						<li><a href="index.php?page=profile">My Profile</a></li>
						<li><a href="index.php?page=addrecipe">Add Recipe</a></li>
					</ul>
				</li>
			</ul>
			<div class="search">
				<form action="">
					<input type="text" placeholder="Recipe Search" name="" id="">
					<button><i class="fa fa-search"></i></button>
				</form>	
			</div>
			<div class="logo">
				<a href="index.php"><img src="img/logo.jpg" alt=""></a>
			</div>
		</div>
	</nav>