<?php

// Loop through each result and display inside a list item
while( $row = $result->fetch_assoc() ) {
	echo 	'<li>
			<div class="thumbnail">
			<a href="index.php?page=recipe&recipeid='.$row['recipe_id'].'">
			<img src="img/recipes/thumbnail/'.$row['recipe_image'].'" alt="Mac And Cheese">
			</a>
			</div>';
	echo 	'<div class="information">
			<h3><a href="index.php?page=recipe&recipeid='.$row['recipe_id'].'">'.$row['title'].'</a></h3>
			<p>by '.$row['username'].'</p>
			<hr>
			<div class="right">
			<span class="time"></span>
			<span class="numbers">'.$row['cook_time'].' M</span>
			</div>
			</div>
			</li>';
}

?>