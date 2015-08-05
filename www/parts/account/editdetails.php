<form action="index.php?page=account" method="post">
	<div class="seperate">
		<div class="one">
			<h1>Change your details </h1>
		</div>
		<div class="two">
			<label for="">First Name: </label>
			<input type="text" name="" id="">
		</div>
		<div class="two">
			<label for="">Last Name: </label>
			<input type="text" name="" id="">
		</div>
		<div class="one">
			<label for="">Describe yourself:</label>
			<textarea name="" id=""></textarea>
		</div>
		<div class="two">
			<label for="">Gender:</label>
			<div class="three">
				<input type="radio" name="gender" id="male" value="M"><label for="male" class="radio">Male</label>
			</div>
			<div class="three">
				<input type="radio" name="gender" id="female" value="F"><label for="female" class="radio">Female</label>
			</div>
			<div class="three">
				<input type="radio" name="gender" id="other" value="O"><label for="other" class="radio">Other</label>
			</div>
		</div>
		<div class="two">
			<label for="">Age: </label>
			<div class="three">
				<select name="" id="" class="select-menu">
					<option selected disabled >Age</option>
					<option value="18">18</option>
					<option value="19">19</option>
				</select>
			</div>
		</div>
		<div class="seperate space">
			<div class="one">
				<input type="submit" class="btn space" value="Update Details">
			</div>
		</div>
	</div>
</form>