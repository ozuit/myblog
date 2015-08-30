<div class="col-md-8 content-main">
	 
		  <div class="single-grid">
				<h3><a href="index.php?c=home&m=showArticle&p=home&id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></h3>						 					 
				<p><?php echo $article['content']; ?></p>
		  </div>

		 <ul class="comment-list">
		 	<h5 class="list_comment">Các bình luận cho bài viết này</h5>
		 	<?php 
		 	$count = 0;
		 	foreach ($comments as $comment): 
		 		$date = new DateTime($comment['date']);
				$date_up = $date->format('d/m/Y');
				$count++;
		 	?>
	  		   <div class="desc">
	  		   <div class="content_comment"><?php echo $comment['username']; ?> đã viết vào <?php echo $date_up; ?>: <p><?php echo $comment['comment']; ?></p></div>
	  		   </div>
	  		   <div class="clearfix"></div>
	  		   </li>
	  		<?php endforeach; 
	  			if ($count == 0): ?>
		  		<div class="desc">
		  		<div class="content_comment">Không có bình luận nào!</div>
		  		</div>
		  		<div class="clearfix"></div>
		  		</li>
		  	<?php endif; ?>
	  	  </ul>

	  	  <?php if ($logged = isLogged()): ?>
		  <div class="content-form">
				 <h3>Để lại bình luận</h3>
				<form method="POST">
					<textarea placeholder="Nhập vào nội dung bình luận" name="comment"></textarea>
					<input type="hidden" name="user_id" value="<?php echo $_SESSION['logged']['id']; ?>">
					<input type="submit" value="Gửi"/>
			   </form>
		 </div>
		<?php endif; ?>
</div>