<h3 class="text-center">Thay đổi thông tin sản phẩm</h3>

<?php if (isset($error)): ?>
  <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $error; ?>
  </div>
<?php endif; ?>

<form action="" method="POST" role="form" enctype="multipart/form-data">

  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Input a title" value="<?php echo $product['title']; ?>">
  </div>

  <div class="form-group">
    <label for="">Image_url</label>
    <input type="text" class="form-control" id="inputTitle" name="image" placeholder="Input a image for thumnail" value="<?php echo $product['image']; ?>">
  </div>

  <div class="form-group">
    <label for="">Price</label>
    <input type="text" class="form-control" id="inputPrice" name="price" placeholder="Input a price" value="<?php echo $product['price']; ?>">
  </div>

  <div class="form-group">
    <label for="">Detail</label>
    <textarea name="description" id="ckeditor2" class="form-control" rows="2" required="required"><?php echo $product['description']; ?></textarea>
  </div>

  <script type="text/javascript">
  CKEDITOR.replace( 'ckeditor2', {
    uiColor: '#27A5E0',
    height: 300,
    toolbarCanCollapse: true,
    filebrowserImageUploadUrl: "http://myblog.cu/includes/ckeditor/plugins/imgProducts.php"
  });
  </script>

  <button type="submit" class="btn btn-success">Cập nhật</button>
  <a href="index.php?c=product&m=list"><button type="button" class="btn btn-primary">Hủy bỏ</button></a>
</form>

