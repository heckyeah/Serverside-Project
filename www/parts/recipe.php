<div class="recipe_header">
	<div class="chef_info">
		<img src="img/recipes/cover/<?php echo $this->model->coverImage; ?>" alt="">
		<a href="#" class="click btn">Edit Recipe</a>
			<div class="message_container">
				<div class="message">
					<h3>Edit Recipe</h3>
					<div class="close"><a href="#" class="shut"><i class="fa fa-times"></i></a></i></div>
					<form action="index.php?page=recipe&recipeid=<?php echo $this->model->recipeID; ?>" method="post" enctype="multipart/form-data">
						<div class="seperate">
							<div class="two">
								<label for="recipe-title">Recipe Title: </label>
								<input type="text" name="recipe-title" id="recipe-title" value="<?php echo $this->model->recipeTitle; ?>">

								<label for="recipe-directions">Recipe Directions: </label>
								<textarea name="recipe-directions" id="recipe-directions" ><?php echo $this->model->recipeDirections; ?></textarea>
							</div>
							<div class="two">
								<label for="cook-time">How long does it take to cook? </label>
								<input type="text" name="cook-time" id="cook-time" value="<?php echo $this->model->recipeTime; ?>">
								<label for="">How many people does this serve?</label>
								<select name="serves" class="select-menu">
									<option value="1-2">1-2</option>
									<option value="3-4">3-4</option>
									<option value="5+">5+</option>
								</select>

								<label for="">Do you have a youtube video?</label>
								<input type="text" placeholder="https://www.youtube.com/watch?v=Eja8FKLzBU4" name="recipe-video" id="recipe-video" value="https://www.youtube.com/<?php echo $this->model->recipeVideo; ?>">

								<label for="recipe-image">Upload Image</label>
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
								<input type="file" name="recipe-image" id="recipe-image">
							</div>
						</div>
						<div class="one space">
							<input type="submit" name="edit-recipe" id="edit-recipe" value="Save Changes" class="btn">
						</div>
					</form>
				</div>
			</div>
		<div class="details_container">
			<div class="recipe_details">
				<div class="icon_container">
					<ul>
						<li>
							<span class="favorite"></span>
							<span class="numbers">14</span>
						</li>
						<li>
							<span class="comments"></span>
							<span class="numbers">32</span>
						</li>
						<li>
							<span class="time"></span>
							<span class="numbers"><?php echo $this->model->recipeTime; ?> M</span>
						</li>
					</ul>
					
				</div>
			</div>
			<div class="profile_details">
				<img src="img/user/avatar/default.jpg" alt="">
				<div class="name">
					<h3>Hekiera Mareroa</h3>
					<h4>Master Chef</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<article class="recipe_container">
	<h2><?php echo $this->model->recipeTitle; ?></h2>
	<div class="recipe_email">
		<h3>Ingredients</h3>
		<form action="index.php?page=recipe">
			<table style="width:100%">
				<?php 

					$result = $this->model->getIngredientsToDisplay();

					while( $row = $result->fetch_assoc() ) {
						echo	'<tr>';
						echo	'<td><input type="checkbox" name="recipe_item" id="recipe_list"></td>';
						echo	'<td>'.$row['ingredient_name'].'</td>'; 
						echo	'</tr>';
					}
				?>
				<tr>
					<td colspan="2"><input type="button" value="Email Me"></td>
				</tr>
			</table>
		</form>
		<button class="click ingredients_btn">Edit Ingredients</button>
		<div class="ingredients_container">
			<div class="ingredients">
				<h3>Edit Ingredients</h3>
				<div class="close"><a href="#" class="shut"><i class="fa fa-times"></i></a></i></div>
				<form action="index.php?page=recipe&recipeid=<?php echo $this->model->recipeID; ?>" method="post" enctype="multipart/form-data">
					<div class="seperate">
						<label for="">Ingredients: </label>
						<?php

							// Get all the ingredients
							$result = $this->model->getIngredients();

							// Loop through the ingredients and put them into an array
							$allIngredients = [];

							while( $row = $result->fetch_assoc() ) {
								$allIngredients[] = $row;
							}
							
							$allTypes = [];

							// Loop over the ingredients and get all the types
							foreach($allIngredients as $item) {
								$allTypes[] = $item['type'];
							}	

							// Get each type once
							$allTypes = array_unique($allTypes);

							// Reset the IDs
							$allTypes = array_values($allTypes);

						?>

						<?php for($i=0; $i<10; $i++) : ?>
						<div class="two">
							<select name="ingredient[]" class="ingredients select-menu">
								<option disabled selected="selected">Select a Ingredient</option>
									<?php 
										foreach( $allTypes as $type ) {
											// Echo out the heading
											echo '<optgroup label="'.$type.'">';
											// Loop through all the ingredients and only echo the ones that relate to the type we are currently looping through
											foreach( $allIngredients as $item ) {
												// If the type of this ingredient == the type we are looping for
												if( $item['type'] == $type ) {
													echo '<option value="'.$item['ingredients_id'].'">';
													echo $item['ingredient_name'];
													echo '</option>';
												}
											}
											echo '</optgroup>';
										}
									?>
							</select>
						</div>
						<?php endfor; ?>
					</div>
					<div class="one space">
						<input type="submit" value="Save Changes" name="change-ingredients" id="change-ingredients" class="btn">
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="recipe_directions">
		<h3>Directions</h3>
		<div class="directions">
			<p><?php echo $this->model->recipeDirections; ?><p>			
		</div>
	</div>
	<hr>
	<div class="recipe_video_section">
		<h3>Video</h3>
		<div class="video_container">
			<iframe src="https://www.youtube.com/embed/<?php echo $this->model->recipeVideo; ?>" frameborder="0" allowfullscreen></iframe>
		</div>
	</div>
<!-- Comments Section 	
	<hr>
	<div class="comment_section">
		<div class="comments_user">
			<img src="img/user/avatar/default.jpg" alt="">
		</div>
		<div class="comments_textarea">
			<form action="index.php?page=recipe" methos="post">
				<p>
					<textarea name="comment" placeholder="What did you think of the recipe?" id="" cols="50" rows="5"></textarea>
				</p>
				<p>
					<input type="submit" name="add-comment" class="btn" value="Post Comment">
				</p>	
			</form>
		</div>
	</div>
	<div class="posted_comments">
		<div class="comments_post">
			<img src="img/user/avatar/default_icon.jpg" alt="">
			<h3>Hekiera Mareroa</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sit odit, error maiores nostrum deleniti at fugiat, quibusdam repellat enim consequuntur, hic voluptatibus quod inventore pariatur. Fugiat tenetur illo, neque voluptatem.</p>
		</div>
	</div> -->
</article>