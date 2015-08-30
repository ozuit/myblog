<div class="col-md-8 content-main">
	<div class="content-grid">
	<?php foreach ($articles as $article) : 
		$date = new DateTime($article['date_up']);
		$date_up = $date->format('M d, Y');
	?>					 
	 <div class="content-grid-info">
		 <img src="<?php echo $article['image_url']; ?>" alt=""/>
		 <div class="post-info">
		 <h4><a href="index.php?c=home&m=showArticle&p=home&id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a>  <?php echo $date_up; ?> / <?php echo $comments[$article['id']]; ?> Comments</h4>
		 <p><?php echo $article['description']; ?></p>
		 <a href="index.php?c=home&m=showArticle&p=home&id=<?php echo $article['id']; ?>"><span></span>READ MORE</a>
		 </div>
	 </div>
	<?php endforeach; ?>
	</div>
</div>