<h3 class="text-center">Thay đổi trạng thái</h3>

<?php if (isset($error)): ?>
  <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $error; ?>
  </div>
<?php endif; ?>

<form action="" method="POST" role="form">

  <div class="form-group">
    <label for="">Member</label>
    <input type="text" class="form-control" value="<?php echo $payment['fullname']; ?>" disabled>
  </div>

  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" value="<?php echo $payment['title']; ?>" disabled>
  </div>

  <div class="form-group">
    <label for="">Number</label>
    <input type="text" class="form-control" value="<?php echo $payment['number']; ?>" disabled>
  </div>

  <div class="form-group">
    <label for="">Date book</label>
    <input type="text" class="form-control" value="<?php echo date_format(date_create($payment['date_book']), 'd/m/Y'); ?>" disabled>
  </div>

  <div class="form-group">
    <label for="">Bill</label>
    <input type="text" class="form-control" value="<?php echo $payment['bill']; ?>" disabled>
  </div>

  <div class="form-group">
    <label for="">Status</label>
    <select name="status" id="input" class="form-control">
      <option value="chờ xét duyệt...">chờ xét duyệt...</option>
      <option value="đang giao hàng">đang giao hàng</option>
      <option value="đã giao hàng">đã giao hàng</option>
    </select>
  </div>


  <button type="submit" class="btn btn-success">Lưu status</button>
  <a href="index.php?c=payment&m=list"><button type="button" class="btn btn-primary">Hủy bỏ</button></a>
</form>

