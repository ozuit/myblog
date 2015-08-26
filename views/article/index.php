<div class="col-md-8" style="margin-bottom:40px;padding:0 15px 0 0;">
	 
		  <div class="single-grid">
				<img src="<?php echo $article['image_url']; ?>" alt=""/>						 					 
				<p><?php echo $article['content']; ?></p>
		  </div>

		 <ul class="comment-list">
		 	<?php 
		 	$count = 0;
		 	foreach ($comments as $comment): 
		 		$date = new DateTime($comment['date']);
				$date_up = $date->format('d/m/Y');
				$count++;
		 	?>
	  		   <h5 class="list_comment">Comments List</h5>
	  		   <div class="desc">
	  		   <div class="content_comment"><?php echo $comment['name']; ?> written on <?php echo $date_up; ?>: <p><?php echo $comment['comment']; ?></p></div>
	  		   </div>
	  		   <div class="clearfix"></div>
	  		   </li>
	  		<?php endforeach; 
	  			if ($count == 0): ?>
	  			<h5 class="list_comment">Comments List</h5>
		  		<div class="desc">
		  		<div class="content_comment">Not comments in current article!</div>
		  		</div>
		  		<div class="clearfix"></div>
		  		</li>
		  	<?php endif; ?>
	  	  </ul>

	  	  <?php if ($logged = isLogged()): ?>
		  <div class="content-form">
				 <h3>Leave a comment</h3>
				<form>
					<textarea placeholder="Message"></textarea>
					<input type="submit" value="SEND"/>
			   </form>
		 </div>
		<?php endif; ?>
</div>