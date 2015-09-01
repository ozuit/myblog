<h3 class="text-center">Danh sách các payments</h3>

<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Member</th>
        <th>Title</th>
        <th>Number</th>
        <th>Date book</th>
        <th>Bill</th>
        <th>Status</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    <?php
        $i = 0;
        foreach ($payments as $p):
        $i++; 
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $p['fullname']; ?></td>
        <td><?php echo $p['title']; ?></td>
        <td><?php echo $p['number']; ?></td>
        <td><?php echo date_format(date_create($p['date_book']), 'd/m/Y'); ?></td>
        <td><?php echo $p['bill']; ?></td>
        <td><?php echo $p['status']; ?></td>
        <td><center><a href="index.php?c=payment&m=update&id=<?php echo $p['id']; ?>"><button type="button" class="btn btn-warning">Update</button></a></center></td>
        <td><center><a href="index.php?c=payment&m=delete&id=<?php echo $p['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a></center></td>
    </tr>
    <?php        
        endforeach;
        if (!$i):
    ?>
    <tr>
        <td colspan="8" class="text-center"><strong>Chưa có đơn hàng mới nào trong tháng này.</strong></td>
    </tr>
    <?php endif; ?>
</table>