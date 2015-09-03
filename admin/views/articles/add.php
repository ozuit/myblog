<h3 class="text-center">Thêm bài học mới</h3>

<?php if (isset($error)): ?>
  <div class="alert alert-warning">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <?php echo $error; ?>
  </div>
<?php endif; ?>

<form action="" method="POST" role="form" enctype="multipart/form-data">

  <div class="form-group">
    <label for="">Title</label>
    <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Input a title">
  </div>

  <div class="form-group">
    <label for="">Description</label>
    <textarea name="description" id="inputMota" class="form-control" rows="2" required="required"></textarea>
  </div>

  <div class="form-group">
    <label for="">Image_url</label>
    <input type="text" class="form-control" id="inputTitle" name="image_url" placeholder="Input a image for thumnail">
  </div>

  <div class="form-group">
    <label for="">Category</label>
    <select name="category_id" id="input" class="form-control">
      <option value="">-- Select One --</option>
      <?php foreach ($categories as $value) : ?>
      <option value="<?php echo $value['id']; ?>"><?php echo $value['name']; ?></option>
      <?php endforeach; ?>
    </select>
  </div>

  <div class="form-group">
    <label for="">Content</label>
    <textarea name="content" id="ckeditor1" class="form-control"></textarea>
  </div>

  <script type="text/javascript">
  CKEDITOR.replace( 'ckeditor1', {
    uiColor: '#27A5E0',
    height: 300,
    toolbarCanCollapse: true,
    filebrowserImageUploadUrl: "http://myblog.cu/includes/ckeditor/plugins/imgArticles.php"
  });
  </script>

  <div class="form-group">
    <label for="">Tags</label>
    <input type="text" class="form-control" name="tags" placeholder="Mỗi tag cách nhau bởi dấu phẩy, ví dụ: php, mysql,…">
  </div>

  <button type="submit" class="btn btn-success">Lưu bài học</button>
  <a href="index.php?c=article&m=list"><button type="button" class="btn btn-primary">Hủy bỏ</button></a>
</form>

