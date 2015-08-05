<div class="separate">
	<div class="one">
		<?php $this->alertMessage($this->passwordChangeSuccess, 'success_message'); ?>
		<?php $this->alertMessage($this->passwordChangeSuccess, 'success_message'); ?>
	</div>
</div>
<form action="index.php?page=account&accountinformation" method="post">
	<div class="seperate">
		<div class="one">
			<h1>Change profile image</h1>
		</div>
		<div class="one">
			<div class="seperate">
				<label for="">Current Image: </label>
				<img src="img/user/avatar/default.jpg" alt="" class="space">
			</div>
			<div class="seperate">
				<label for="profile">Profile Image: </label>
				<input type="file" name="" id="profile">
			</div>
			<input type="submit" class="btn space" value="Change Image">
		</div>
	</div>
</form>
<hr>
<form action="index.php?page=account&accountinformation" novalidate method="post">
	<div class="seperate">
		<div class="one">
			<h1>Change e-mail</h1>
		</div>
		<div class="two">
			<label for="current-email">Current e-mail: </label>
			<input type="email" name="current-email" placeholder="example@website.com" id="current-email">
			<?php $this->alertMessage($this->currentEmailError, 'error_message'); ?>
		</div>
		<div class="two">
			<label for="new-email">New e-mail: </label>
			<input type="email" name="new-email" placeholder="example@website.com" id="new-email">
			<?php $this->alertMessage($this->newEmailError, 'error_message'); ?>
		</div>
		<div class="one space">
			<input type="submit" class="btn" name="email-data" value="Change E-mail">
		</div>
	</div>
</form>
<hr>
<form action="index.php?page=account&accountinformation" novalidate method="post">
	<div class="seperate">
		<div class="one">
			<h1>Change Password</h1>
		</div>
		<div class="two">
			<label for="current-password">Current Password: </label>
			<input type="password" name="current-password" id="current-password">
			<?php $this->alertMessage($this->currentPasswordError, 'error_message'); ?>
			<label for="new-password">New Password: </label>
			<input type="password" name="new-password" id="new-password">
			<?php $this->alertMessage($this->newPasswordError, 'error_message'); ?>
			<label for="confirm-password">Confirm Password: </label>
			<input type="password" name="confirm-password" id="confirm-password">
			<?php $this->alertMessage($this->confirmPasswordError, 'error_message'); ?>
		</div>
		<div class="one space">
			<input type="submit" class="btn" name="password-data" value="Change Password">
		</div>
	</div>
</form>