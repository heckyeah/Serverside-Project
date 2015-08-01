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
				<select id="serves">
					<option value="1-2">1-2</option>
					<option value="3-4">3-4</option>
					<option value="5+">5+</option>
				</select>

				<label for="">Do you have a youtube video?</label>
				<input type="text" placeholder="https://www.youtube.com/watch?v=Eja8FKLzBU4" name="" id="">

				<label for="">Cover Photo </label>
				<input type="file" name="" id="">

			</div>
			<div class="add_recipe_half">
				<label for="">Ingredients: </label>
				<div id="ingredients">
					<span>
						<select class="ingredients">
							<option value="1-2">1-2</option>
							<option value="3-4">3-4</option>
							<option value="5+">5+</option>
						</select>
					</span>
				</div>
				<span class="error_message">Sorry you are past the limit of ingredients that we allow you to have.</span>
				<a href="#" id="add" class="btn">Add +</a>
			</div>
			<div class="add_recipe_full">
				<div class="add_recipe_forth">
				
				</div>
			</div>
			<div class="add_recipe_full">
				<input type="button" value="Submit Recipe" class="btn">
			</div>
		</form>
	</div>
</div>