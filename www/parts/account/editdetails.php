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
	$age 		= $profileData['age'];
	$gender 	= $profileData['gender'];

?>


<form action="index.php?page=account&editdetails" method="post" enctype="multipart/form-data">
	<div class="seperate">
		<div class="one">
			<?php $this->alertMessage($this->detailsSuccess, 'success_message'); ?>
			<h1>Change your details </h1>
		</div>
		<div class="seperate">
		</div>
		<div class="two">
			<label for="">First Name: </label>
			<input type="text" name="first-name" id="first-name" value="<?php echo $firstname; ?>">
			<?php $this->alertMessage($this->firstnameError, 'error_message'); ?>
		</div>
		<div class="two">
			<label for="">Last Name: </label>
			<input type="text" name="last-name" id="last-name" value="<?php echo $lastname; ?>">
			<?php $this->alertMessage($this->lastnameError, 'error_message'); ?>
		</div>
		<div class="two">
			<label for="">Gender:</label>

			<?php 
				$array = ['M','F','O'];
				foreach ($array as $value) {
					if ($value == 'M') {
						if ( $gender == 'M' ) {
							$checked = 'checked';
						} else {
							$checked = '';
						}
						$text = 'Male';
					} elseif ($value == 'F') {
						if ( $gender == 'F' ) {
							$checked = 'checked';
						} else {
							$checked = '';
						}
						$text = 'Female';
					} elseif ($value == 'O') {
						if ( $gender == 'O' ) {
							$checked = 'checked';
						} else {
							$checked = '';
						}
						$text = 'Other';
					}

				 	echo '<div class="three">';
					echo '<input type="radio" name="gender" id="'.$value.'" value="'.$value.'" '.$checked.'>';
					echo '<label class="radio">'.$text.'</label>';
					echo '</div>';
				 }
			?>
		</div>
		<div class="two">
			<label for="">Age: </label>
			<div class="three">
				<select name="age" id="age" class="select-menu">
					<option selected disabled >Age</option>
					<?php 
						$i=17;
						while( $i<100 ) {
						
						if ( !$age == '' && $age == $i ) {
							$selected = 'selected';
						} else {
							$selected = '';
						}

						echo '<option '.$selected.' vlaue="'.$i.'">';
						echo $i;
						echo '</option>';
						$i++;
					} ?>
				</select>
			</div>
		</div>
		<div class="one">
			<label for="">Describe yourself:</label>
			<textarea name="bio" id="bio"><?php echo $bio; ?></textarea>
			<?php $this->alertMessage($this->bioError, 'error_message'); ?>
		</div>
		<div class="one">
				<div class="seperate">
					<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
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