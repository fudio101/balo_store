<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../database/dbhelper.php');

$user = getUserToken();
if ($user == null) {
	die();
}

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

	$sql = "delete from db_category where id = $id";
	execute($sql);
}

function modifyCategory()
{
	$id = getPost('id_modi');
	$name = getPost('name_modi');
	$link = getPost('link_modi');
	
	$sql = "select count(*) as total from db_category where name = '$name' or link = '$link'";
	$data = executeResult($sql, true);
	$total = $data['total'];
	if ($total > 0) {
		echo 'Category existed!!!';
		die();
	}
	$sql = "update db_category set name = '$name', link = '$link' where id = $id";
	execute($sql);
}

function addCategory()
{
	$name = getPost('name_add');
	$link = getPost('link_add');

	$sql = "select count(*) as total from db_category where name = '$name' or link = '$link'";
	$data = executeResult($sql, true);
	$total = $data['total'];
	if ($total > 0) {
		echo 'Category existed!!!';
		die();
	}
	$sql = "insert into db_category(name, link) values ('$name', '$link')";
	execute($sql);
}
