<div class="col-md-4 content-right">
 <div class="sidebar_account">
 	<h3>Đăng nhập hệ thống</h3>
 	<?php if (isset($error_login)): ?>
		<div class="alert alert-danger" style="color:red">
		   	<?php echo $error_login; ?>
		</div>
	<?php endif; ?>

	<?php if ($logged = isLogged()): ?>
	<ul class="nav nav-theme">	
		<li><a href="index.php?c=user&m=update&p=home">Welcome <strong><?php echo $logged['username']; ?></strong></a></li>
	    <li><a href="index.php?c=auth&m=logout&p=home">Đăng xuất</a></li>
    </ul>
    <?php else: ?>
	<form action="index.php?c=auth&m=login&p=home" method="POST" role="form">
	
		<div class="form-group">
			<label for="inputUsername">Tên đăng nhập</label>
			<input type="text" name="username" id="input" class="form-control" required="required" placeholder="Nhập vào username">
		</div>

		<div class="form-group">
			<label for="inputPassword">Mật khẩu</label>
			<input type="password" name="password" id="inputPassword" class="form-control" required="required" placeholder="Nhập vào password">
		</div>

		<button type="submit" class="btn btn-primary">Đăng nhập</button>
		<label style="margin-left:30px"><a href="index.php?c=auth&m=register&p=home">Bạn chưa có tài khoản?</a></label>
	</form>
	<?php endif; ?>
 </div>

 <div class="recent">
	 <h3>Các bài viết mới</h3>
	 <ul>
	 <?php foreach ($four_articles as $article) : ?>
	 <li><a href="index.php?c=home&m=showArticle&p=home&id=<?php echo $article['id']; ?>"><?php echo $article['title']; ?></a></li>
	 <?php endforeach; ?>
	 </ul>
 </div>
 <div class="categories">
	 <h3>Chủ đề</h3>
	 <ul>
	 <?php foreach ($four_category as $category) : ?>
	 <li><a href="index.php?c=home&m=category&p=home&id=<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a></li>
	 <?php endforeach; ?>
	 </ul>
 </div>
 <div class="clearfix"></div>
</div>