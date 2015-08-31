<div class="col-md-9 content-main">
  <div class="account">
    <h3 class="text-center">Danh sách các đơn đặt hàng của bạn</h3>

    <table class="table table-bordered">
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Ngày đặt hàng</th>
        </tr>
        <?php
            $i = 0;
            foreach ($categories as $c):
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $c['name']; ?></td>
            <td><?php echo $c['date_book']; ?></td>
        </tr>
        <?php        
            endforeach;
            if (!$i):
        ?>
        <tr>
            <td colspan="5" class="text-center"><strong>Hiện tại bạn chưa có đơn hàng nào!</strong></td>
        </tr>
        <?php endif; ?>
    </table>

    <p class="btnAction">
        <a href="index.php?c=shop&m=list&p=shop" class="btn btn-theme">Tiếp tục mua sắm</a>
    </p>
 </div>
</div>