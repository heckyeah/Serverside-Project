<?php 
	$aInfo = $this->model->getAdditionalInfo();
	$profileData = $aInfo->fetch_assoc();

	if ( $aInfo->num_rows == 1 ) {
		$profileImage = $profileData['profile_image'];
		$profileCover = $profileData['cover_image'];
		if ( !$profileData['first_name'] == '' && !$profileData['last_name'] == '') {
			$profileUsername = $profileData['first_name'].' '.$profileData['last_name'];
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

	$firstname 	= $profileData['first_name'];
	$lastname 	= $profileData['last_name'];
	$bio 		= $profileData['bio'];

?>


<form action="index.php?page=account" method="post" enctype="multipart/form-data">
	<div class="seperate">
		<div class="one">
			<h1>Change your details </h1>
		</div>
		<div class="seperate">
		</div>
		<div class="two">
			<label for="">First Name: </label>
			<input type="text" name="first-name" id="first-name" value="<?php echo $firstname; ?>">
		</div>
		<div class="two">
			<label for="">Last Name: </label>
			<input type="text" name="last-name" id="last-name" value="<?php echo $lastname; ?>">
		</div>
		<div class="one">
			<label for="">Describe yourself:</label>
			<textarea name="bio" id="bio"><?php echo $bio; ?></textarea>
		</div>
		<div class="two">
			<label for="">Gender:</label>
			<div class="three">
				<input type="radio" name="gender" id="male" value="M"><label for="male" class="radio">Male</label>
			</div>
			<div class="three">
				<input type="radio" name="gender" id="female" value="F"><label for="female" class="radio">Female</label>
			</div>
			<div class="three">
				<input type="radio" name="gender" id="other" value="O"><label for="other" class="radio">Other</label>
			</div>
		</div>
		<div class="two">
			<label for="">Age: </label>
			<div class="three">
				<select name="age" id="age" class="select-menu">
					<option selected disabled >Age</option>
					<option value="18">18</option>
					<option value="19">19</option>
				</select>
			</div>
		</div>
		<div class="one">
				<div class="seperate">
					<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
					<label for="profile">Profile Image: </label>
					<input type="file" name="profile-image" id="profile-image">
				</div>
			</div>
		<div class="seperate space">
			<div class="one">
				<input type="submit" class="btn space" name="update-details" id="update-details" value="Update Details">
			</div>
		</div>
	</div>
</form>