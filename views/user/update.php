<div class="col-md-9 content-main">
  <div class="account">
    <h3 class="text-center">Thay đổi thông tin cá nhân</h3>
    <?php if (isset($success)): ?>
    <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $success; ?>
    </div>
    <?php endif; ?>

    <form action="" method="POST" role="form">

      <div class="form-group">
        <label for="">Họ và tên</label>
        <input type="text" class="form-control" id="inputFullName" placeholder="Nhập vào họ và tên đầy đủ" name="fullname" value="<?php echo (isset($_POST['fullname']) ? $_POST['fullname'] : $user['fullname']); ?>" required="required">
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input type="email" id="inputEmail" placeholder="Nhập vào địa chỉ email" name="email" value="<?php echo (isset($_POST['email']) ? $_POST['email'] : $user['email']); ?>" class="form-control" required="required">
      </div>

      <div class="form-group">
        <label for="">Số điện thoại</label>
        <input type="text" class="form-control" id="inputPhone" placeholder="Nhập vào số điện thoại cá nhân" name="phone" value="<?php echo (isset($_POST['phone']) ? $_POST['phone'] : $user['phone']); ?>" required="required">
      </div>
    
      <div class="form-group">
        <label for="">Địa chỉ</label>
        <textarea name="address" id="inputAddress" class="form-control" rows="3" required="required" placeholder="Nhập vào địa chỉ nơi ở hiện tại"><?php echo (isset($_POST['address']) ? $_POST['address'] : $user['address']); ?></textarea>
      </div>

      <button type="reset" class="btn btn-primary">Nhập lại</button>
      <button type="submit" class="btn btn-success">Cập nhật</button>
    </form>
  </div>
</div>