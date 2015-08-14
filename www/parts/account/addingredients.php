<div class="seperate">
	<div class="one">
		<h1>Manage Recipes</h1>
	</div>
</div>
<div class="seperate">
	<form action="index.php?page=account&managerecipes" method="post">
		<div class="one">
			<h2>Add ingredient</h2>
		</div>
		<div class="two">
			<label for="">New Ingredient: </label>
			<input type="text" name="ingredient-name" id="ingredient-name">
		</div>
		<div class="two">
			<label for="type">Ingredient Category: </label>
			<select name="type" class="ingredients select-menu">
				<option disabled selected="selected">Select a Type</option>
				<?php 
						// Get all the ingredients
						$result = $this->model->getIngredientTypes();
						
						$allTypes = [];

						// Loop over the ingredients and get all the types
						while($row = $result->fetch_assoc()) {
							$allTypes[] = $row['type'];
						}	

						// Get each type once
						$allTypes = array_unique($allTypes);

						// Reset the IDs
						$allTypes = array_values($allTypes);


					foreach( $allTypes as $type ) {
						// Echo out the options
						echo '<option>';
						echo $type;
						echo '</option>';
					}
				?>
			</select>
		</div>
		<div class="one">
			<input type="submit" class="btn space" name="insert-ingredient" id="insert-ingredient" value="Add Ingredient">
		</div>
	</form>
</div>