<h3 class="text-center">Danh sách các bài viết</h3>
<p class="btnAction">
    <a href="index.php?c=article&m=add" class="btn btn-primary">Thêm bài viết</a>
</p>
<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Date Up</th>
        <th>Categories</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    <?php
        $i = 0;
        foreach ($articles as $p):
        $i++; 
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $p['title']; ?></td>
        <td><?php echo date_format(date_create($p['date_up']), 'd/m/Y'); ?></td>
        <td><?php echo $p['name']; ?></td>
        <td><center><a href="index.php?c=article&m=edit&id=<?php echo $p['id']; ?>"><button type="button" class="btn btn-warning">Chỉnh sửa</button></a></center></td>
        <td><center><a href="index.php?c=article&m=delete&id=<?php echo $p['id']; ?>"><button type="button" class="btn btn-danger">Xóa bài</button></a></center></td>
    </tr>
    <?php        
        endforeach;
        if (!$i):
    ?>
    <tr>
        <td colspan="6" class="text-center"><strong>Không có bài viết nào.</strong></td>
    </tr>
    <?php endif; ?>
</table>