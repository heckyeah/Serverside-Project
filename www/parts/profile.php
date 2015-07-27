<article>
	<div class="profile_container">
		<div class="cover">
			<div class="cover_change">
				<a href="#" class="click">Upload Cover</a>
				<div class="message_container">
					<div class="message">
						<h3>Cover uploader</h3>
						<form action="index.php?page=profile" method="post" enctype="multipart/form-data">
							<input type="hidden" name="MAX_FILE_SIZE" value="1000000">
							<div>
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