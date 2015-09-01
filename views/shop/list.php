<div class="col-md-9 shop_main">
<?php foreach ($products as $p) : ?>
	<div class="col-md-3">
		<div class="thumbnail">
			<a onclick="getDetail(<?php echo $p['id']; ?>)" style="cursor: pointer;">
				<img src="<?php echo $p['image']; ?>" alt="<?php echo $p['title']; ?>">
			</a>
			<div class="caption">
				<a onclick="getDetail(<?php echo $p['id']; ?>)" style="cursor: pointer;">
					<h4><?php echo $p['title']; ?></h4>
				</a>
				<p class="price">
					<?php echo number_format($p['price'],0,",","."); ?> đ
				</p>
				<p class="add">
					<a href="index.php?c=product&m=cart&p=shop&id=<?php echo $p['id']; ?>" class="btn btn-primary btn-theme">Thêm vào giỏ hàng</a>
				</p>
			</div>
		</div>
	</div>
<?php endforeach; ?>
</div>

<script type="text/javascript">
	function getDetail (product_id) {
		$.ajax({
			url: 'index.php?c=product&m=detail',
			type: 'POST',
			dataType: 'text',
			data: {product_id: product_id},
			success: function(data){
				$('.modal-body').html(data);
				$('#modal-detail').modal('show');
			}
		});
	}
</script>

<div class="modal fade" id="modal-detail">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header" style="background-color:#DCDCDC;border-radius:6px;"> 
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h3 class="modal-title">Chi tiết sản phẩm</h3>
			</div>
			<div class="modal-body" style="height:300px;">

			</div>
		</div>
	</div>
</div>