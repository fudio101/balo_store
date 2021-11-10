<?php
$title = 'User Manager';
$baseUrl = '../';
require_once('../layouts/header.php');
if ($user["role"] != "1")
	header('Location: ../');

$sql = "select db_user.*, db_usergroup.name as role_name 
	from db_user left join db_usergroup on db_user.role = db_usergroup.id 
	where db_user.status = 1 and (db_user.role = 2 or db_user.username = '" . $user["username"] . "')";
$data = executeResult($sql);
?>

<div class="row" style="margin-top: 48px;">
	<div class="col-md-12 table-responsive">
		<h3>User Manager</h3>

		<a href="editor.php"><button class="btn btn-success">Add User</button></a>

		<table class="table table-bordered table-hover" style="margin-top: 20px;">
			<thead>
				<tr>
					<th>#</th>
					<th>Full Name</th>
					<th>Username</th>
					<th>Email</th>
					<th>Phone Number</th>
					<th>Address</th>
					<th>Role</th>
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
					<td>' . $item['fullname'] . '</td>
					<td>' . $item['username'] . '</td>
					<td>' . $item['email'] . '</td>
					<td>' . $item['phone'] . '</td>
					<td>' . $item['address'] . '</td>
					<td>' . $item['role_name'] . '</td>
					<td style="width: 50px">
						<a href="editor.php?id=' . $item['id'] . '"><button class="btn btn-warning">Modify</button></a>
					</td>
					<td style="width: 50px">';
					if ($user['id'] != $item['id'] && $item['role'] != 1) {
						echo '<button onclick="deleteUser(' . $item['id'] . ')" class="btn btn-danger">Delete</button>';
					}
					echo '
					</td>
				</tr>';
				}
				?>
			</tbody>
		</table>
	</div>
</div>

<script type="text/javascript">
	function deleteUser(id) {
		option = confirm('Are you sure you want to delete this account?')
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