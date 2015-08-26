<div class="col-md-8 content-main">
  <div class="account">
    <h3 class="text-center">Đăng ký thành viên</h3>
    <?php if (isset($error_register)): ?>
    <div class="alert alert-warning" style="color:red">
          <?php echo $error_register; ?>
    </div>
    <?php endif; ?>

    <form action="" method="POST" role="form">

      <div class="form-group">
        <label for="">Fullname</label>
        <input type="text" class="form-control" id="inputName" placeholder="Your fullname" name="name" value="<?php echo (isset($postData) ? $postData['name'] : ''); ?>" required="required">
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input type="email" id="inputEmail" placeholder="Email" name="email" value="<?php echo (isset($postData) ? $postData['email'] : ''); ?>" class="form-control" required="required">
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <input type="password" id="inputPassword" placeholder="Password" name="password" class="form-control" required="required">
      </div>

      <button type="submit" class="btn btn-success">Register</button>
    </form>
  </div>
</div>