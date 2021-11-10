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
			deleteProduct();
			break;
	}
}

function deleteProduct()
{
	global $user_;
	$id = getPost('id');
	$updated_at = date("Y-m-d H:i:s");
	$sql = "UPDATE `db_product` SET `modified_by`='$user_',`status`=0 WHERE `id`=$id";
	execute($sql);
}
