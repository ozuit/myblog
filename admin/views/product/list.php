<h3 class="text-center">Danh sách các sản phẩm</h3>
<p class="btnAction">
    <a href="index.php?c=product&m=add" class="btn btn-primary">Thêm sản phẩm</a>
</p>

<table class="table table-bordered">
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Image</th>
        <th>Price</th>
        <th colspan="2" class="text-center">Action</th>
    </tr>
    <?php
        $i = 0;
        foreach ($products as $p):
        $i++; 
    ?>
    <tr>
        <td style="vertical-align: middle;"><?php echo $i; ?></td>
        <td style="vertical-align: middle;"><?php echo $p['title']; ?></td>
        <td>
            <div class="col-md-3" style="width:100px">
                <a href="" class="thumbnail">
                    <img src="<?php echo $p['image']; ?>" alt="<?php echo $p['title']; ?>">
                </a>
            </div>
        </td>
        <td style="vertical-align: middle;"><?php echo $p['price']; ?></td>
        <td style="vertical-align: middle;"><center><a href="index.php?c=product&m=edit&id=<?php echo $p['id']; ?>"><button type="button" class="btn btn-warning">Chỉnh sửa</button></a></center></td>
        <td style="vertical-align: middle;"><center><a href="index.php?c=product&m=delete&id=<?php echo $p['id']; ?>"><button type="button" class="btn btn-danger">Xóa</button></a></center></td>
    </tr>
    <?php        
        endforeach;
        if (!$i):
    ?>
    <tr>
        <td colspan="6" class="text-center"><strong>Hiện tại không có sản phẩm nào trong database!</strong></td>
    </tr>
    <?php endif; ?>
</table>