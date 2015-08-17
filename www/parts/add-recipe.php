<div class="add_recipe_container">
	<div class="add_recipe">
		<form action="index.php?page=addrecipe" method="POST" enctype="multipart/form-data">
			<h3>Add recipe details</h3>
			<div class="add_recipe_half">
				<label for="recipe-title">Recipe Title: </label>
				<input type="text" name="recipe-title" id="recipe-title" value="<?php echo $this->recipeTitle; ?>">
				<?php $this->alertMessage($this->recipeTitleError, 'error_message'); ?>

				<label for="recipe-directions">Recipe Directions: </label>
				<textarea name="recipe-directions" id="recipe-directions" ><?php echo $this->recipeDirections; ?></textarea>
				<?php $this->alertMessage($this->recipeDirectionsError, 'error_message'); ?>

				<label for="cook-time">How long does it take to cook? </label>
				<input type="text" name="cook-time" id="cook-time" value"<?php echo $this->recipeTime; ?>">
				<?php $this->alertMessage($this->recipeTimeError, 'error_message'); ?>

				<label for="">How many people does this serve?</label>
				<select name="serves" class="select-menu">
					<option value="1-2">1-2</option>
					<option value="3-4">3-4</option>
					<option value="5+">5+</option>
				</select>

				<label for="">Do you have a youtube video?</label>
				<input type="text" placeholder="https://www.youtube.com/watch?v=Eja8FKLzBU4" name="recipe-video" id="recipe-video" value="<?php echo $this->recipeVideo; ?>">

				<label for="">Cover Photo: </label>
				<input type="hidden" name="MAX_FILE_SIZE" value="2000000">
				<input type="file" name="cover-image" id="cover-image">
				<?php $this->alertMessage($this->userImageError, 'error_message'); ?>

			</div>
			<div class="add_recipe_half">
				<label for="">Ingredients: </label>
				<div id="ingredients">
				
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

					<span>
						<?php for($i=0; $i<10; $i++) : ?>
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
						<?php endfor; ?>

					</span>
				</div>
			</div>
			<div class="add_recipe_full">
				<input type="submit" name="add-recipe" value="Submit Recipe" class="btn">
			</div>
		</form>
	</div>
</div>