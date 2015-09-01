<h3 class="text-center">Danh sách các góp ý</h3>

<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>City</th>
        <th>Message</th>
        <th class="text-center">Action</th>
    </tr>
    <?php
        $i = 0;
        foreach ($contacts as $c):
        $i++; 
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $c['name']; ?></td>
        <td><?php echo $c['email']; ?></td>
        <td><?php echo $c['phone']; ?></td>
        <td><?php echo $c['city']; ?></td>
        <td><?php echo $c['message']; ?></td>
        <td><center><a href="index.php?c=contact&m=delete&id=<?php echo $c['id']; ?>"><button type="button" class="btn btn-danger">Delete</button></a></center></td>
    </tr>
    <?php        
        endforeach;
        if (!$i):
    ?>
    <tr>
        <td colspan="7" class="text-center"><strong>Không có góp ý nào.</strong></td>
    </tr>
    <?php endif; ?>
</table>