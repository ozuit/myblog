<?php 
    if (isset($_POST['delProduct'])) {
        foreach ($_POST['delete'] as $key) {
           unset($_SESSION['cart']['id'][$key]);
           unset($products[$key]);
           ($_SESSION['cart']['number'] > 0) ? $_SESSION['cart']['number']-- : 0;
        }
    }
?>

<div class="col-md-9 content-main">
  <div class="account">
    <h3 class="text-center">Giỏ hàng của bạn</h3>
    <?php if (isset($products)): ?>
    <table class="table table-bordered">
        <tr>
            <th style="vertical-align: middle;">
                <center><input type="checkbox" id="checkall"></center>
            </th>
            <th style="vertical-align: middle;">Hình ảnh</th>
            <th style="vertical-align: middle;">Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Đơn giá<br>(VNĐ)</th>
            <th>Thành tiền<br>(VNĐ)</th>
        </tr>
        <?php
                $total = 0;
                $i = 0;
                foreach ($products as $key => $p):
                $i++; 
        ?>
        <form method="POST">
        <tr>
            <td style="vertical-align: middle;"><center><input type="checkbox" value="<?php echo $p[0]['id']; ?>" name="delete[]"></center></td>
            <td>
                <div class="col-md-3" style="width:100px">
                    <a href="" class="thumbnail">
                        <img src="<?php echo $p[0]['image']; ?>" alt="<?php echo $p[0]['title']; ?>">
                    </a>
                </div>
            </td>
            <td style="vertical-align: middle;"><input style="border:0; background-color:#fff" disabled type="text" name="title[]" id="inputTitle" value="<?php echo $p[0]['title']; ?>"></td>
            <td style="vertical-align: middle;"><input type="number" name="number[<?php echo $p[0]['id']; ?>]" min="1" id="number<?php echo $p[0]['id']; ?>" class="form-control" value="1"></td>
            <td style="vertical-align: middle; width:150px"><?php echo $p[0]['price']; ?></td>
            <td style="vertical-align: middle;"><input style="border:0; background-color:#fff; width:150px" disabled type="text" name="price[<?php echo $p[0]['id']; ?>]" id="thanhTien<?php echo $p[0]['id']; ?>" value="<?php echo $p[0]['price']; ?>"></td>
        </tr>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#number<?php echo $p[0]['id']; ?>").change(function(event) {
                    $("#thanhTien<?php echo $p[0]['id']; ?>").val($("#number<?php echo $p[0]['id']; ?>").val()*<?php echo $p[0]['price']; ?>);
                });
            });
        </script>
        <?php  endforeach; ?>
    </table>

    <p class="btnAction">
        <a href="index.php?c=product&m=list&p=shop" class="btn btn-theme">Tiếp tục mua sắm</a>
        <a href="index.php?c=product&m=list&p=shop" class="btn btn-primary" style="float:right">Đặt hàng</a>
        <button type="submit" name="delProduct" class="btn btn-danger" style="float:right; margin-right:10px">Xóa sản phẩm</button>
    </p>
    </form>
    <?php else : ?>
        <div class="alert alert-info">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <strong>Chưa có sản phẩm nào trong giỏ hàng của bạn!</strong>
        </div>
        <a href="index.php?c=product&m=list&p=shop"><button type="button" class="btn btn-large btn-block btn-primary" style="width:100px;">Mua ngay</button></a>
    <?php endif; ?>
 </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
       $("#checkall").change(function() {
            $("input:checkbox").prop("checked", $(this).prop("checked"));
        });
    });
</script>

