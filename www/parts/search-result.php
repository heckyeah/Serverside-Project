<div class="sort_panel">
		<form action="">
			<select>
				<option value="1">Most Popular</option>
				<option value="2">Most Viewed</option>
			</select>
			<select>
				<option value="1">Feeds 1 - 2</option>
				<option value="1">Feeds 3 - 4</option>
				<option value="1">Feeds 5+</option>
			</select>
			<select>
				<option value="1">0Min - 15Min</option>
				<option value="1">15Min - 1Hour</option>
				<option value="1">1Hour+</option>
			</select>
			<input type="submit" value="GO">
		</form>
	</div>

	<article>
		<ul>
			<?php
				// Get all the latest deals
				$result = $this->model->getRecipeCard();

				// Loop through each result and display inside a list item
				while( $row = $result->fetch_assoc() ) {
					echo 	'<li>
								<div class="thumbnail">
									<a href="index.php?page=recipe&recipeid='.$row['recipe_id'].'">
										<img src="img/recipes/thumbnail/'.$row['recipe_image'].'" alt="Mac And Cheese">
									</a>
								</div>';
					echo 		'<div class="information">
									<h3><a href="index.php?page=recipe&recipeid='.$row['recipe_id'].'">'.$row['title'].'</a></h3>
									<p>by <a href="index.php?page=profile&user='.$row['username'].'">'.$row['first_name'].' '.$row['last_name'].'</a></p>
									<hr>
									<div class="left">
										<span class="favorite"></span>
										<span class="numbers">15</span>
									</div>
									<div class="left">
										<span class="comments"></span>
										<span class="numbers">5</span>
									</div>
									<div class="right">
										<span class="time"></span>
										<span class="numbers">'.$row['cook_time'].'</span>
									</div>
								</div>
							</li>';
				}

			?>

		</ul>
		<div class="pages">
			<ol>
				<li><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#">3</a></li>
				<li><a href="#">4</a></li>
			</ol>
		</div>
	</article>