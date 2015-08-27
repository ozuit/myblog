<h3 class="text-center">Danh sách các category</h3>
<p class="btnAction">
    <a href="index.php?c=category&m=add" class="btn btn-primary">Thêm category</a>
</p>
<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Categories</th>
        <th style="text-align:center" colspan="2">Action</th>
    </tr>
    <?php
        $i = 0;
        foreach ($categories as $c):
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $c['name']; ?></td>
        <td><center><a href="index.php?c=category&m=edit&id=<?php echo $c['id']; ?>"><button type="button" class="btn btn-warning">Update</button></a></center></td>
        <td><center><a href="index.php?c=category&m=delete&id=<?php echo $c['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a></center></td>
    </tr>
    <?php        
        endforeach;
        if (!$i):
    ?>
    <tr>
        <td colspan="5" class="text-center"><strong>Hiện tại không có user nào trong database</strong></td>
    </tr>
    <?php endif; ?>
</table>