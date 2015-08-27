<h3 class="text-center">Chỉnh sửa category</h3>

<?php if (isset($error)): ?>
  <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $error; ?>
  </div>
<?php endif; ?>

<form action="" method="POST" role="form" enctype="multipart/form-data">

  <div class="form-group">
    <label for="">Name</label>
    <input type="text" class="form-control" id="inputName" name="name" placeholder="Input a name for category" value="<?php echo $category['name']; ?>">
  </div>

  <button type="submit" class="btn btn-success">Lưu category</button>
  <a href="index.php?c=category&m=list"><button type="button" class="btn btn-primary">Hủy bỏ</button></a>
</form>

