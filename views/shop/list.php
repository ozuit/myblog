<?php
	require ROOT . DS . 'includes' . DS . 'function.php';

	$pagesize = 12;
	$total = getTotal('products')['total'];
	$pagenum = ceil($total/$pagesize);

	$page = (isset($_GET['page']) && (int)$_GET['page']>0) ? $_GET['page'] : 1;
	$offset = ($page-1)*$pagesize;
	$products =  getData($offset, $pagesize, 'products');
?>

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
	<div class="col-md-12">
		<div class="text-center">
			<ul class="pagination-md" id="phantrang"></ul>
		</div>
	</div>
	
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

	$(document).ready(function() {
		$("#phantrang").twbsPagination({
	        totalPages: <?php echo $pagenum;?>,
	        visiblePages: 5,
	        first: '<<',
	        last: '>>',
	        prev: '<',
	        next: '>',
	       	href: "?c=product&m=list&p=shop&page={{number}}"
	    });
	});
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