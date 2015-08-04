<div class="account_container">
	<div class="account_panel">
		<ul>
			<li><h2>My Details</h2></li>
			<li><a href="index.php?page=account">Home</a></li>
			<li><a href="index.php?page=account&editdetails">Edit Details</a></li>
		</ul>
		<ul>
			<li><h2>Recipes</h2></li>
			<li><a href="#">Add Recipe</a></li>
			<li><a href="#">Edit Recipes</a></li>
		</ul>
		<ul>
			<li><h2>Users</h2></li>
			<li><a href="#">Deactivate User</a></li>
			<li><a href="#">Promote User</a></li>
		</ul>
	</div>
	<div class="account_form">
		<?php 
			if ( !$post == '') {
				include $post;
			}
		?>
	</div>
</div>