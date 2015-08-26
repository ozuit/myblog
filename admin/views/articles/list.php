<h3 class="text-center">Danh sách các bài viết</h3>
<p class="btnAction">
    <a href="index.php?c=article&m=add" class="btn btn-primary">Thêm bài viết</a>
</p>
<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Description</th>
        <th>Date Up</th>
        <th>Categories</th>
    </tr>
    <?php
        $i = 0;
        foreach ($articles as $p):
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $p['title']; ?></td>
        <td><?php echo $p['description']; ?></td>
        <td><?php echo $p['date']; ?></td>
        <td><?php echo $p['name']; ?></td>
    </tr>
    <?php        
        endforeach;
        if (!$i):
    ?>
    <tr>
        <td colspan="5" class="text-center"><strong>Chưa có bài viết mới nào trong tháng này.</strong></td>
    </tr>
    <?php endif; ?>
</table>