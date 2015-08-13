<div class="register_container">
	<div class="register_form">
		<form novalidate action="index.php?page=register" method="post">
			<h1>Registration Form</h1>

			<label>Username: </label>
			<input type="text" name="username" placeholder="iambatman" value="<?php echo $this->username; ?>">
			<?php $this->alertMessage($this->usernameError, 'error_message' ); ?>
			<label>E-Mail: </label>
			<input type="email" name="email" placeholder="bat@cave.com" value="<?php echo $this->email; ?>">
			<?php $this->alertMessage($this->emailError, 'error_message'); ?>
			<label>Password: </label>
			<input type="password" name="password1">
			<label>Confirm Password: </label>
			<input type="password" name="password2">
			<?php $this->alertMessage($this->passwordError, 'error_message'); ?>
			<input type="submit" class="btn" value="Register account!" name="register-account">
		</form>
	</div>
</div>
