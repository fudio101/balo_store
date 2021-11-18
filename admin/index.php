<?php
$title = 'Dashboard Page';
$baseUrl = '';
require_once('layouts/header.php');

$sql = "SELECT COUNT(*) AS total FROM `db_product` WHERE `status` = 1";
$total = executeResult($sql, true)['total'];

$sql = "SELECT SUM(`number`-`number_buy`) AS total_ FROM `db_product` WHERE `status` = 1";
$total_ = executeResult($sql, true)['total_'];

$sql = "SELECT COUNT(*) AS orders FROM `db_order` WHERE `status_code`=1";
$orders = executeResult($sql, true)['orders'];

$sql = "SELECT COUNT(*) AS deliveringOders FROM `db_order` WHERE `status_code`=2";
$deliveringOders = executeResult($sql, true)['deliveringOders'];

$sql = "SELECT COUNT(*) AS deliveredOders FROM `db_order` WHERE `status_code`=2";
$deliveredOders = executeResult($sql, true)['deliveredOders'];

$sql = "SELECT COUNT(`number`*`price`) AS revenue FROM `db_orderdetail`";
$revenue = executeResult($sql, true)['revenue'];
?>

<div class="row">
	<div class="col-md-12" style="margin-top:24px">
		<h1>Dashboard</h1>
	</div>
</div>
<div class="row">

	<div class="col-md-3 shadow-lg mb-5 bg-body rounded px-3 py-4 m-5" id="card">
		<div class="rounded-circle bg-info" style="height: 100px;width: 100px;">
			<center>
				<i class="bi bi-cart-plus-fill" style="color:white; font-size:64px"></i>
			</center>
		</div>
		<div class="ms-5">
			<div style="font-size: 64px"><?= number_format($total, 0, ',', '.') ?></div>
			<div>Products</div>
		</div>
	</div>

	<div class="col-md-3 shadow-lg mb-5 bg-body rounded px-3 py-4 my-5 mx-auto">
		<div class="rounded-circle bg-info" style="height: 100px;width: 100px;">
			<center>
				<i class="bi bi-shop" style="color:white; font-size:64px"></i>
			</center>
		</div>
		<div class="ms-5">
			<div style="font-size: 64px"><?= number_format($total_, 0, ',', '.') ?></div>
			<div>Total products</div>
		</div>
	</div>

	<div class="col-md-3 shadow-lg mb-5 bg-body rounded px-3 py-4 m-5">
		<div class="rounded-circle bg-info" style="height: 100px;width: 100px;">
			<center>
				<i class="bi bi-bell-fill" style="color:white; font-size:64px"></i>
			</center>
		</div>
		<div class="ms-5">
			<div style="font-size: 64px"><?= number_format($orders, 0, ',', '.') ?></div>
			<div>Orders to be processed</div>
		</div>
	</div>

	<div class="col-md-3 shadow-lg mb-5 bg-body rounded px-3 py-4 m-5">
		<div class="rounded-circle bg-info" style="height: 100px;width: 100px;">
			<center>
				<i class="bi bi-truck" style="color:white; font-size:64px"></i>
			</center>
		</div>
		<div class="ms-5">
			<div style="font-size: 64px"><?= number_format($deliveringOders, 0, ',', '.') ?></div>
			<div>Orders are being delivered</div>
		</div>
	</div>

	<div class="col-md-3 shadow-lg mb-5 bg-body rounded px-3 py-4 my-5 mx-auto">
		<div class="rounded-circle bg-info" style="height: 100px;width: 100px;">
			<center>
				<i class="bi bi-truck-flatbed" style="color:white; font-size:64px"></i>
			</center>
		</div>
		<div class="ms-5">
			<div style="font-size: 64px"><?= number_format($deliveredOders, 0, ',', '.') ?></div>
			<div>Orders delivered</div>
		</div>
	</div>

	<div class="col-md-3 shadow-lg mb-5 bg-body rounded px-3 py-4 m-5">
		<div class="rounded-circle bg-info" style="height: 100px;width: 100px;">
			<center>
				<i class="bi bi-cash-coin" style="color:white; font-size:64px"></i>
			</center>
		</div>
		<div class="ms-5">
			<div style="font-size: 50px" id="revenue"></div>
			<div>Sales revenue</div>
		</div>
	</div>

	<script>
		$(document).ready(function() {
			$('#revenue').text(new Intl.NumberFormat('vi-VN', {
				style: 'currency',
				currency: 'VND'
			}).format(<?= $revenue; ?>));
		});
	</script>

</div>
<?php
require_once('layouts/footer.php');
?>