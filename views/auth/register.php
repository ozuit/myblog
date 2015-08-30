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
        <label for="">Tên đăng nhập</label>
        <input type="text" class="form-control" id="inputUserName" placeholder="Nhập vào tên đăng nhập" name="username" value="<?php echo (isset($postData) ? $postData['username'] : ''); ?>" required="required">
      </div>

      <div class="form-group">
        <label for="">Mật khẩu</label>
        <input type="password" id="inputPassword" placeholder="Nhập vào mật khẩu" name="password" class="form-control" required="required">
      </div>

      <div class="form-group">
        <label for="">Họ và tên</label>
        <input type="text" class="form-control" id="inputFullName" placeholder="Nhập vào họ và tên đầy đủ" name="fullname" value="<?php echo (isset($postData) ? $postData['fullname'] : ''); ?>" required="required">
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input type="email" id="inputEmail" placeholder="Nhập vào địa chỉ email" name="email" value="<?php echo (isset($postData) ? $postData['email'] : ''); ?>" class="form-control" required="required">
      </div>

      <div class="form-group">
        <label for="">Số điện thoại</label>
        <input type="text" class="form-control" id="inputPhone" placeholder="Nhập vào số điện thoại cá nhân" name="phone" value="<?php echo (isset($postData) ? $postData['phone'] : ''); ?>" required="required">
      </div>
    
      <div class="form-group">
        <label for="">Địa chỉ</label>
        <textarea name="address" id="inputAddress" class="form-control" rows="3" required="required" placeholder="Nhập vào địa chỉ nơi ở hiện tại"><?php echo (isset($postData) ? $postData['address'] : ''); ?></textarea>
      </div>

      <button type="submit" class="btn btn-primary">Nhập lại</button>
      <button type="submit" class="btn btn-success">Đăng ký</button>
    </form>
  </div>
</div>