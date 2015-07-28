<article>
	<div class="profile_container">
		<div class="cover">
			<div class="cover_change">
				<a href="#" class="click btn">Upload Cover</a>
				<div class="message_container">
					<div class="message">
						<h3>Cover uploader</h3>
						<div class="close"><a href="#" class="shut"><i class="fa fa-times"></i></a></i></div>
						<form action="index.php?page=profile" method="post" enctype="multipart/form-data">
							<div class="current_image">
								<span>Current Image:</span>
								<img src="img/user/covers/placeholder_cover.jpg" alt="">
							</div>
							<p>Select a photo from your computer</p>
							<div>
								<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
								<label class="btn" for="cover-image">Upload Image</label>
								<input type="file" name="cover-image" id="cover-image">
							</div>
							<div>
								<input type="button" class="btn" value="Sumbit">
							</div>
						</form>
					</div>
				</div>
			</div>
			<img src="img/user/covers/placeholder_cover.jpg" alt="">
			<div class="profile_details_container">
				<img src="http://anime.com.pl/img/user/08/8483.jpg" alt="My Profile">
				<div class="profile_details">
					<a href="#"><h3>Hekiera Mareroa</h3></a>
					<span>Master Chef</span>
				</div>
			</div>
		</div>
	</div>
</article>