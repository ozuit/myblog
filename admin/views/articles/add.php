<h3 class="text-center">Thêm bài viết mới</h3>

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
    <label for="">Categories</label>
    <select name="category" id="inputCategory" class="form-control">
      <option value="idCategory">-- Select One --</option>
    </select>
  </div>

  <div class="form-group">
    <label for="">Content</label>
    <textarea name="content" id="content" class="ckeditor form-control"></textarea>
  </div>

  <button type="submit" class="btn btn-success">Lưu bài viết</button>
  <button type="button" class="btn btn-primary">Hủy bỏ</button>
</form>