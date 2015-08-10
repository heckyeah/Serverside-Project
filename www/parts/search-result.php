<!-- Filter Recipes
<div class="sort_panel">
	<form action="">
		<select class="select-menu">
			<option value="1">Most Popular</option>
			<option value="2">Most Viewed</option>
		</select>
		<select class="select-menu">
			<option value="1">Feeds 1 - 2</option>
			<option value="1">Feeds 3 - 4</option>
			<option value="1">Feeds 5+</option>
		</select>
		<select class="select-menu">
			<option value="1">0Min - 15Min</option>
			<option value="1">15Min - 1Hour</option>
			<option value="1">1Hour+</option>
		</select>
		<input type="submit" class="btn" value="GO">
	</form>
</div> -->

	<article>
		<ul>
			<?php
				// Get all the latest deals
				$result = $this->model->getRecipeCard();
				include 'parts/recipe-card.php';
			?>

		</ul>
<!-- Pagination
		<div class="pages">
			<ol>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
			</ol>
		</div> -->
	</article>