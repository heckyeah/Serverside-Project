<div class="account_container">
	<div class="account_panel">
		<?php 
			if ( $_SESSION['privilege'] == 'user' ) {

				include 'parts/usercontrols.php';

			}

			if ( $_SESSION['privilege'] == 'admin' ) {

				include 'parts/usercontrols.php';
				include 'parts/admincontrols.php';

			}
		?>
	</div>
	<div class="account_form">
		<?php 
			if ( !$post == '') {
				include $post;
			} else {
				echo 'error';
			}
		?>
	</div>
</div>