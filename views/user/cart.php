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
                $i = 0;
                foreach ($products as $key => $p):
                $i++; 
        ?>
        <form method="POST" id="frm">
        <tr>
            <td style="vertical-align: middle;"><center><input type="checkbox" value="<?php echo $p[0]['id']; ?>" name="delete[]"></center></td>
            <td>
                <div class="col-md-3" style="width:100px">
                    <a href="" class="thumbnail">
                        <img src="<?php echo $p[0]['image']; ?>" alt="<?php echo $p[0]['title']; ?>">
                    </a>
                </div>
            </td>
            <td style="vertical-align: middle;"><input style="border:0; background-color:#fff" type="text" name="title[<?php echo $p[0]['id']; ?>]" value="<?php echo $p[0]['title']; ?>"></td>
            <td style="vertical-align: middle;"><input type="number" name="number[<?php echo $p[0]['id']; ?>]" min="1" id="number<?php echo $p[0]['id']; ?>" class="form-control" value="1"></td>
            <td style="vertical-align: middle; width:150px"><?php echo $p[0]['price']; ?></td>
            <td style="vertical-align: middle;"><input style="border:0; background-color:#fff; width:150px" type="text" name="price[<?php echo $p[0]['id']; ?>]" id="thanhTien<?php echo $p[0]['id']; ?>" value="<?php echo $p[0]['price']; ?>"></td>
        </tr>
        <input type="hidden" name="product_id[]" value="<?php echo $p[0]['id']; ?>">
        
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
        <button type="button" class="btn btn-primary" style="float:right" id="book">Đặt hàng</button>
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

<div class="modal fade" id="modal-payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#DCDCDC;border-radius:6px 6px 0 0;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Xác nhận đơn đặt hàng</h4>
            </div>
            <div class="modal-body">
                <h4>Thông tin khách hàng</h4>
                <ul style="list-style-type:none; margin-left:20px; margin-top:10px">
                    <li>Họ và tên: <?php echo $_SESSION['logged']['fullname']; ?></li>
                    <li>Số điện thoại: <?php echo $_SESSION['logged']['phone']; ?></li>
                    <li>Địa chỉ: <?php echo $_SESSION['logged']['address']; ?></li>
                </ul>
                <hr>
                <h4 id="total"></h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-success" id="confirm">Xác nhận</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-confirm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="background-color:#DCDCDC;border-radius:6px 6px 0 0;">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Xác nhận đặt hàng</h4>
            </div>
            <div class="modal-body">
                <p style="text-align: justify">Các sản phẩm mà bạn đặt đã được hệ thống ghi nhận lại, bạn có thể kiểm tra tình trạng đơn hàng của mình bằng cách click vào mục 'Kiểm tra đơn hàng' trong menu bên</p>
                <p>Xin cảm ơn!</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-theme" data-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
       $("#checkall").change(function() {
            $("input:checkbox").prop("checked", $(this).prop("checked"));
        });

       $("#book").click(function(event) {
            var postData = $("#frm").serialize();
            $.ajax({
                url: 'index.php?c=user&m=total',
                type: 'POST',
                dataType: 'text',
                data: postData,
                success: function(total){
                    $('#total').html("Tổng giá trị hóa đơn là: " + total + " VNĐ");
                    $("#modal-payment").modal('show');
                }
            });  
       });

       $("#confirm").click(function(event) {
            var postData = $("#frm").serialize();
            $.ajax({
                url: 'index.php?c=user&m=payment',
                type: 'POST',
                dataType: 'text',
                data: postData,
                success: function(status){
                    if (status) {
                        $('#modal-payment').modal('hide');
                        $('#modal-confirm').modal('show');
                    };
                }
            });  
       });
    });
</script>