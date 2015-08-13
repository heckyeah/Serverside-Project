<!DOCTYPE html>
<html lang="en">
<head>
	<?php 
		$result = $this->model->getPageInfo();
		$pageInfo = $result->fetch_assoc();

		$title 		= $pageInfo['title'];
		$description 		= $pageInfo['description'];

		$result = $this->model->getUserInfo();
		$userInfo = $result->fetch_assoc();

		$username 	= $userInfo['username'];
	?>
	<meta charset="UTF-8">
	<title><?php echo $title; if ($_GET['page'] == 'profile') { echo $username; } ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="<?php echo $description; ?>">
	<link rel="stylesheet" href="scss/main.css">
	<link rel="stylesheet" href="scss/jquery-ui.css">
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>

	<nav>
		<div class="container">
			<div class="account_drop">
				<ul>
					<?php 

					$profile = $this->model->getAdditionalInfo();

					if ( $profile->num_rows == 1 ) {
						$profileData = $profile->fetch_assoc();
						$profileImage = $profileData['profile_image'];
					} else {
						$profileImage = 'default.jpg';
					}

					// If the user is logged in then show their username in link
					// Otherwise just show "account"
					if( isset($_SESSION['username']) ) {
						$avatar 	= $profileImage;
						$profile 	= $_SESSION['username'];
					} else {
						$profile 	= 'Account';
						$avatar 	= '';
					}

					?>

					<li class="nav_menu">
						<a href="#">
							<?php if( isset($_SESSION['username'] ) ) { echo '<img src="img/user/avatar/icon/'.$avatar.'" alt="">'; } ?>
							<span><?php echo $profile; ?><i class="fa fa-caret-down"></i></span>
						</a>
						<ul>
							<?php

							    // If the user is not logged in
							    if( !isset($_SESSION['username']) ) : ?>
							    
									<li><a href="index.php?page=register">Register</a></li>
									<li><a href="index.php?page=login">Login</a></li>

									<?php elseif ( isset($_SESSION['username']) && isset($_SESSION['privilege']) ) : ?>

									<li><a href="index.php?page=profile">My Profile</a></li>
									<li><a href="index.php?page=addrecipe">Add Recipe</a></li>

									<?php if ( $_SESSION['privilege'] == 'admin') : ?>

										<li><a href="index.php?page=account">Admin Panel</a></li>

									<?php elseif ( $_SESSION['privilege'] == 'user') : ?>

										<li><a href="index.php?page=account">User Panel</a></li>

									<?php endif;  ?>

									<li><a href="index.php?page=logout">Logout</a></li>
						    	<?php endif;
							?>
						</ul>
					</li>
				</ul>
			</div>
			<div class="logo">
				<a href="index.php"><img src="img/logo_small.png" alt=""></a>
			</div>
			<div class="search">
				<form action="">
					<input type="text" placeholder="Recipe Search" name="" id="">
					<button><i class="fa fa-search"></i></button>
				</form>	
			</div>
		</div>
	</nav>