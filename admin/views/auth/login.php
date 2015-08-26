<h3 class="text-center">Đăng nhập hệ thống</h3>
<hr>
<?php if (isset($error)): ?>
<div class="alert alert-error">
    <?php echo $error; ?>
</div>
<?php endif; ?>
<form action="" method="POST" role="form" style="width:50%; margin-left: 150px; margin-top:20px">

  <div class="form-group">
    <label for="inputEmail">Username</label>
    <input type="text" name="username" id="input" class="form-control" required="required" placeholder="Your Username">
  </div>

  <div class="form-group">
    <label for="inputPassword">Password</label>
    <input type="password" name="password" id="inputPassword" class="form-control" required="required" placeholder="Your Password">
  </div>

  <button type="submit" class="btn btn-primary">Sign in</button>

</form>