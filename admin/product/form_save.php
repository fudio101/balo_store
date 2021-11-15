<?php
if (!empty($_POST)) {
	$id = getPost('id');
	$title = getPost('title');
	$price = getPost('price');

	$thumbnail = moveFile('thumbnail');
	// $img = moveFile('img');

	$description = getPost('description');
	$category_id = getPost('category_id');
	$producer_id = getPost('producer_id');

	$user_ = $user['username'];

	if ($id > 0) {
		//update
		if ($thumbnail != '') {
			$sql = "SELECT avatar FROM db_product WHERE id = $id";
			$item = executeResult($sql, true);
			deleteFile($item['avatar']);
			$sql = "update db_product set avatar = '$thumbnail', name = '$title', price = $price, detail = '$description', catid = '$category_id', modified_by = '$user_' where id = $id";
		} else {
			$sql = "update db_product set name = '$title', price = $price, detail = '$description', catid = '$category_id', modified_by = '$user_' where id = $id";
		}

		execute($sql);

		header('Location: ./');
		die();
	} else {
		//insert
		$sql = "INSERT INTO `db_product`(`catid`, `name`, `avatar`, `img`, `detail`, `producer`, `price`, `created_by`) 
		VALUES ($category_id, '$title', '$thumbnail', '$thumbnail', '$description', $producer_id, '$price', '$user_')";
		execute($sql);

		header('Location: ./');
		die();
	}
}
