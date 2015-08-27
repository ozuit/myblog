<div class="col-md-4 content-right">
 <div class="account">
 	<h3>LOGIN ACCOUNT</h3>
 	<?php if (isset($error_login)): ?>
		<div class="alert alert-danger" style="color:red">
		   	<?php echo $error_login; ?>
		</div>
	<?php endif; ?>

	<?php if ($logged = isLogged()): ?>
	<ul class="nav nav-tabs nav-stacked">	
		<li><a href="#">Welcome <strong><?php echo $logged['username']; ?></strong></a></li>
	    <li><a href="index.php?c=auth&m=logout&p=home">Logout</a></li>
    </ul>
    <?php else: ?>
	<form action="index.php?c=auth&m=login&p=home" method="POST" role="form">
	
		<div class="form-group">
			<label for="inputEmail">Email</label>
			<input type="email" name="email" id="input" class="form-control" required="required" placeholder="Your Email">
		</div>

		<div class="form-group">
			<label for="inputPassword">Password</label>
			<input type="password" name="password" id="inputPassword" class="form-control" required="required" placeholder="Your Password">
		</div>

		<button type="submit" class="btn btn-primary">Sign in</button>
		<label style="margin-left:30px"><a href="index.php?c=auth&m=register&p=home">Do you have an account?</a></label>
	</form>
	<?php endif; ?>
 </div>
 <div class="recent">
	 <h3>RECENT POSTS</h3>
	 <ul>
	 <?php foreach ($four_articles as $article) : ?>
	 <li><a href="index.php?c=article&m=show&p=home&id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></li>
	 <?php endforeach; ?>
	 </ul>
 </div>
 <!-- <div class="comments">
 	 <h3>RECENT COMMENTS</h3>
 	 <ul>
 	 <li><a href="#">Amada Doe </a> on <a href="#">Hello World!</a></li>
 	 <li><a href="#">Peter Doe </a> on <a href="#"> Photography</a></li>
 	 <li><a href="#">Steve Roberts  </a> on <a href="#">HTML5/CSS3</a></li>
 	 </ul>
 </div>
 <div class="clearfix"></div>
 <div class="archives">
 	 <h3>ARCHIVES</h3>
 	 <ul>
 	 <li><a href="#">October 2013</a></li>
 	 <li><a href="#">September 2013</a></li>
 	 <li><a href="#">August 2013</a></li>
 	 <li><a href="#">July 2013</a></li>
 	 </ul>
 </div> -->
 <div class="categories">
	 <h3>CATEGORIES</h3>
	 <ul>
	 <?php foreach ($four_category as $category) : ?>
	 <li><a href="index.php?c=page&m=category&p=home&id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
	 <?php endforeach; ?>
	 </ul>
 </div>
 <div class="clearfix"></div>
</div>