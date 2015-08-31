<div class="col-md-3">
 <div class="sidebar_shop">
 	<?php if (isset($error_login)): ?>
		<div class="alert alert-danger" style="color:red">
		   	<?php echo $error_login; ?>
		</div>
	<?php endif; ?>

	<?php if ($logged = isLogged()): ?>
	<h3>Chào mừng <strong><?php echo $logged['username']; ?></strong></h3>
	<hr>
	<ul class="nav nav-theme">	
		<li>
			<a href="index.php?c=user&m=update&p=shop">Cập nhật tài khoản</a>
		</li>
		<li>
			<a href="index.php?c=user&m=check&p=shop">Kiểm tra đơn hàng</a>
		</li>
		<li>
			<a href="index.php?c=user&m=cart&p=shop">Giỏ hàng 
				<?php if (isset($_SESSION['cart']) && $_SESSION['cart']['number'] > 0) : ?>
					<span class="cart"><?php echo $_SESSION['cart']['number']; ?></span>
				<?php endif; ?>
			</a>
		</li>
	    <li>
	    	<a href="index.php?c=auth&m=logout&p=home">Đăng xuất</a>
	    </li>
    </ul>
    <?php else: ?>
    <h3>Đăng nhập hệ thống</h3>
    <hr style="margin-bottom:10px;">	
	<form action="index.php?c=auth&m=login&p=home" method="POST" role="form">
	
		<div class="form-group">
			<label for="inputUsername">Tên đăng nhập</label>
			<input type="text" name="username" id="input" class="form-control" required="required" placeholder="Nhập vào username">
		</div>

		<div class="form-group">
			<label for="inputPassword">Mật khẩu</label>
			<input type="password" name="password" id="inputPassword" class="form-control" required="required" placeholder="Nhập vào password">
		</div>

		<button type="submit" class="btn btn-primary">Nhập lại</button>
		<button type="submit" class="btn btn-success">Đăng nhập</button>
		<label style="margin-top:10px"><a href="index.php?c=auth&m=register&p=home">Bạn chưa có tài khoản?</a></label>
	</form>
	<?php endif; ?>
 </div>
</div>