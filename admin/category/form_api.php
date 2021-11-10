<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if ($user == null) {
	die();
}
$user_ = $user["username"];

if (!empty($_POST)) {
	$action = getPost('action');

	switch ($action) {
		case 'delete':
			deleteCategory();
			break;
		case 'modify':
			modifyCategory();
			break;
		case 'add':
			addCategory();
			break;
	}
}

function deleteCategory()
{
	$id = getPost('id_del');

	$sql = "select count(*) as total from db_product where catid = $id and status = 1";
	$data = executeResult($sql, true);
	// var_dump($data);
	$total = $data['total'];
	if ($total > 0) {
		echo 'The list contains products, not deleted!!!';
		die();
	}
	global $user_;
	$sql = "UPDATE `db_category` SET `status`=0,`modified_by`='$user_' WHERE `id`=$id";
	execute($sql);
}

function modifyCategory()
{
	$id = getPost('id_modi');
	$name = getPost('name_modi');

	$sql = "select count(*) as total from db_category where name = '$name'";
	$data = executeResult($sql, true);
	$total = $data['total'];
	if ($total > 0) {
		echo 'Category existed!!!';
		die();
	}
	global $user_;
	$sql = "UPDATE `db_category` SET `name`='$name',`modified_by`='$user_' WHERE id = $id";
	execute($sql);
}

function addCategory()
{
	$name = getPost('name_add');

	$sql = "select count(*) as total from db_category where name = '$name'";
	$data = executeResult($sql, true);
	$total = $data['total'];
	if ($total > 0) {
		echo 'Category existed!!!';
		die();
	}
	global $user_;
	$sql = "INSERT INTO db_category(`name`, `created_by`, `status`) VALUES ('$name', '$user_', 1)";
	execute($sql);
	echo "Add Category Successfully";
}
