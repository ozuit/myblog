<h3 class="text-center">Danh sách user đã đăng ký</h3>
<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Email</th>
        <th>Phone</th>
        <th style="text-align:center">Action</th>
    </tr>
    <?php
        $i = 0;
        foreach ($users as $user):
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $user['username']; ?></td>
        <td><?php echo $user['email']; ?></td>
        <td><?php echo $user['phone']; ?></td>
        <td><center><a href="index.php?c=user&m=delete&id=<?php echo $user['id']; ?>"><button type="button" class="btn btn-warning">Delete</button></a></center></td>
    </tr>
    <?php        
        endforeach;
        if (!$i):
    ?>
    <tr>
        <td colspan="6" class="text-center"><strong>Hiện tại không có user nào trong database</strong></td>
    </tr>
    <?php endif; ?>
</table>