<?php
$title = 'Quản Lý Sản Phẩm';
$baseUrl = '../';
require_once('../layouts/header.php');

$sql = "select db_product.*, db_category.name as category_name from db_product left join db_category on db_product.catid = db_category.id where db_product.status = 1";
$data = executeResult($sql);
?>

<div class="row" style="margin-top: 46px;">
	<div class="col-md-12 table-responsive">
		<h3>Product Management</h3>

		<a href="editor.php"><button class="btn btn-success">Add Product</button></a>

		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>STT</th>
					<th>Thumbnail</th>
					<th>Name</th>
					<th>Price</th>
					<th>Category</th>
					<th style="width: 50px"></th>
					<th style="width: 50px"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$index = 0;
				foreach ($data as $item) {
					echo '<tr>
					<th>' . (++$index) . '</th>
					<td><img src="' . fixUrl($item['thumbnail']) . '" style="height: 100px"/></td>
					<td>' . $item['title'] . '</td>
					<td>' . number_format($item['discount']) . ' VNĐ</td>
					<td>' . $item['category_name'] . '</td>
					<td style="width: 50px">
						<a href="editor.php?id=' . $item['id'] . '"><button class="btn btn-warning">Sửa</button></a>
					</td>
					<td style="width: 50px">
						<button onclick="deleteProduct(' . $item['id'] . ')" class="btn btn-danger">Xoá</button>
					</td>
				</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function deleteProduct(id) {
		option = confirm('Are you sure you want to delete this product?')
		if (!option) return;

		$.post('form_api.php', {
			'id': id,
			'action': 'delete'
		}, function(data) {
			location.reload()
		})
	}
</script>

<?php
require_once('../layouts/footer.php');
?>