<h3 class="text-center">Danh sách các comment</h3>
<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Username</th>
        <th>Comment</th>
        <th>Date post</th>
        <th>Article</th>
        <th style="text-align:center">Action</th>
    </tr>
    
    <?php
        $i = 0;
        foreach ($comments as $comment):
        $i++;
    ?>
    <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $comment['username']; ?></td>
        <td><?php echo $comment['comment']; ?></td>
        <td><?php echo $comment['date']; ?></td>
        <td><?php echo $comment['title']; ?></td>
        <td><center><a href="index.php?c=comment&m=delete&id=<?php echo $comment['id']; ?>"><button type="button" class="btn btn-warning">Delete</button></a></center></td>
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