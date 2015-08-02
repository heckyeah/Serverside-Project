<div class="add_recipe_container">
	<div class="add_recipe">
		<form action="index.php?page=addrecipe">
			<h3>Add recipe details</h3>
			<div class="add_recipe_half">
				<label for="">Recipe Title: </label>
				<input type="text" name="" id="">

				<label for="">Recipe Directions: </label>
				<textarea name="" id="" ></textarea>

				<label for="">How long does it take to cook? </label>
				<input type="text" name="" id="">
				<label for="">How many people does this serve?</label>
				<select class="select-menu">
					<option value="1-2">1-2</option>
					<option value="3-4">3-4</option>
					<option value="5+">5+</option>
				</select>

				<label for="">Do you have a youtube video?</label>
				<input type="text" placeholder="https://www.youtube.com/watch?v=Eja8FKLzBU4" name="" id="">

				<label for="">Cover Photo: </label>
				<input type="file" name="" id="">

			</div>
			<div class="add_recipe_half">
				<label for="">Ingredients: </label>
				<div id="ingredients">
					<span>
						<select class="ingredients select-menu">
							<option disabled selected="selected">Select a Ingredient</option>
							<optgroup label="Meat">
								<option value="beef_patty">Beef Patty</option>
								<option value="beef_mince">Beef Mince</option>
								<option value="beef_steak">Beef Steak</option>
								<option value="chicken_patty">Chicken Patty</option>
								<option value="chicken_mince">Chicken Mince</option>
								<option value="chicken_steak">Chicken Steak</option>
								<option value="pork_bones">Pork Bones</option>
								<option value="bacon">Bacon</option>
								<option value="ham">Ham</option>
								<option value="Eggs">Eggs</option>
							</optgroup>
							<optgroup label="Vegetables">
								<option value="tomatoes">Tomatoes</option>
								<option value="onions">Onions</option>
								<option value="broccoli">Broccoli</option>
								<option value="carrots">Carrots</option>
								<option value="corn">Corn</option>
								<option value="lettuce">Lettuce</option>
							</optgroup>
							<optgroup label="Dairy">
								<option value="Milk">Milk</option>
								<option value="Cheese">Cheese</option>
								<option value="Cream">Cream</option>
								<option value="Yogurt">Yogurt</option>
							</optgroup>
							<optgroup label="Starch">
								<option value="Bread">Bread</option>
								<option value="Potatoes">Potatoes</option>
								<option value="Pasta">Pasta</option>
								<option value="Rice">Rice</option>
							</optgroup>
						</select>
					</span>
				</div>
				<span class="error_message">Sorry you are past the limit of ingredients that we allow you to have.</span>
				<a href="#" id="add" class="btn">Add +</a>
			</div>
			<div class="add_recipe_full">
				<input type="button" value="Submit Recipe" class="btn">
			</div>
		</form>
	</div>
</div>