<?php 
	$aInfo = $this->model->getAdditionalInfo();
	$profileData = $aInfo->fetch_assoc();

	if ( $aInfo->num_rows == 1 ) {
		if ( !$profileData['first_name'] == '' && !$profileData['last_name'] == '') {
			$profileUsername = $profileData['first_name'].' '.$profileData['last_name'];
		}

		if ($profileData['cover_image'] == '') {
			$profileCover = 'default.jpg';
		} else {
			$profileCover = $profileData['cover_image'];
		}

		if ($profileData['profile_image'] == '') {
			$profileImage = 'default.jpg';
		} else {
			$profileImage = $profileData['profile_image'];
		}

	} else {
		$profileImage = 'default.jpg';
		$profileCover = 'default.jpg';
	}

	 if ( $profileData['first_name'] == '' && $profileData['last_name'] == '') {
		$uInfo = $this->model->getUserInfo(); 
		$userData = $uInfo->fetch_assoc();
		$profileUsername = $userData['username'];
	}

?>

<article>
	<div class="profile_container">
		<div class="cover">
			<div class="cover_change">
				<a href="#" class="click btn">Upload Cover</a>
				<div class="message_container">
					<div class="message">
						<h3>Cover uploader</h3>
						<div class="close"><a href="#" class="shut"><i class="fa fa-times"></i></a></i></div>
						<form action="index.php?page=profile" method="post" enctype="multipart/form-data">
							<div class="current_image">
								<span>Current Image:</span>
								<img src="img/user/covers/edited/<?php echo $profileCover; ?>" alt="">
							</div>
							<p>Select a photo from your computer</p>
							<div>
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
								<label for="cover-image">Upload Image</label>
								<input type="file" name="cover-image" id="cover-image">
							</div>
							<div>
								<input type="submit" name="change-cover" id="change-cover" class="btn" value="Sumbit">
							</div>
						</form>
					</div>
				</div>
			</div>
			<img src="img/user/covers/edited/<?php echo $profileCover; ?>" alt="">
			<div class="profile_details_container">
				<img src="img/user/avatar/edited/<?php echo $profileImage; ?>" alt="My Profile">
				<div class="profile_details">
					<a href="#"><h3><?php echo $profileUsername; ?></h3></a>
					<span>Master Chef</span>
				</div>
			</div>
		</div>
	</div>
</article>

<article>
	<ul>
		<?php
			// Get all the latest recipes by the user
			$result = $this->model->getProfileRecipeCard();
			include 'parts/recipe-card.php';
		?>
	</ul>
</article>