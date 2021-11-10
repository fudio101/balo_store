<?php
$title = 'Product Category Management';
$baseUrl = '../';
require_once('../layouts/header.php');

$sql = "select * from db_category where status = 1";
$data = executeResult($sql);
?>

<div class="row" style="margin-top: 46px;">

	<div class="col-md-12" style="margin-bottom: 20px;">
		<h3>Product Category Management</h3>
	</div>

	<!-- Add category -->
	<div class="col-md-4 bg-info p-2 text-dark bg-opacity-10" style="height: 120px;">
		<form class="form-group" onsubmit="submitForm();">

			<div class="input-group mb-3">
				<span class="input-group-text" id="basic-addon3">Name</span>
				<input name="name" id="name" type="text" class="form-control">
			</div>

			<button class="btn btn-success mt-2 float-end">Save</button>
		</form>
	</div>

	<!-- Table -->
	<div class="col-md-8 table-responsive">
		<table class="table table-bordered table-hover">
			<thead>
				<tr>
					<th scope="col">#</th>
					<th scope="col">Name</th>
					<th scope="col"></th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				$index = 0;
				foreach ($data as $item) : ?>

					<tr>
						<th scope="row"><?= ++$index ?></th>
						<td><?= $item['name'] ?></td>
						<td style="width: 50px">
							<button onclick="modifyCategory(<?= $item['id'] ?>, '<?= $item['name'] ?>', '<?= $item['link'] ?>')" class="btn btn-warning">Modify</button>
						</td>
						<td style="width: 50px">
							<button onclick="deleteCategory(<?= $item['id'] ?>);" class="btn btn-danger">Delete</button>
						</td>
					</tr>

				<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function deleteCategory(id) {
		option = confirm('Are you sure you want to delete this product category?')
		if (!option) return;

		$.post('form_api.php', {
			'id_del': id,
			'action': 'delete'
		}, function(data) {
			if (data != null && data != '') {
				alert(data);
				return;
			}
			location.reload()
		})
	}

	function modifyCategory(id, name, link) {
		name_ = prompt('Enter new category name: ', name);
		if (name == name_ || !name_) {
			alert('Invalid input!!!');
			return;
		}

		$.post('form_api.php', {
			'id_modi': id,
			'name_modi': name_,
			'action': 'modify'
		}, function(data) {
			if (data != null && data != '') {
				alert(data);
				return;
			}
			location.reload()
		})
	}

	function submitForm() {
		name = $('#name').val().trim();
		if (name == "") {
			alert('Please enter all required fields');
			return;
		}

		$.post('form_api.php', {
			'name_add': name,
			'action': 'add'
		}, function(data) {
			if (data != null && data != '') {
				alert(data);
				return;
			}
			location.reload()
		})
	}
</script>

<?php
require_once('../layouts/footer.php');
?>