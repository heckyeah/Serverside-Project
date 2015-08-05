<div class="login_container">
	<div class="login_form">
		<form action="index.php?page=login" method="post" novalidate>

			<h1><?php echo $heading ?></h1>

			<label>Username: </label>
			<input type="text" name="username" placeholder="Username" value="<?php echo $this->username; ?>">
			<?php $this->alertMessage($this->usernameError, 'error_message'); ?>
			<label>Password: </label>
			<input type="password" name="password" placeholder="Password">
			<?php $this->alertMessage($this->passwordError, 'error_message'); ?>
			<input type="submit" class="btn" value="Log In">
			<?php $this->alertMessage($this->loginError, 'error_message'); ?>
		</form>
	</div>
</div>