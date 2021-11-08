<?php
if(!empty($_POST)) {
	$id = getPost('id');
	$title = getPost('title');
	$price = getPost('price');
	
	$thumbnail = moveFile('thumbnail');
	// $img = moveFile('img');

	$description = getPost('description');
	$category_id = getPost('category_id');
	$created_at = $updated_at = date('Y-m-d H:s:i');

	if($id > 0) {
		//update
		if($thumbnail != '') {
			$sql = "update db_product set avatar = '$thumbnail', name = '$title', price = $price, detail = '$description', modified = '$updated_at', catid = '$category_id' where id = $id";
		} else {
			$sql = "update db_product set name = '$title', price = $price, detail = '$description', modified = '$updated_at', catid = '$category_id' where id = $id";
		}
		
		execute($sql);

		header('Location: index.php');
		die();
	} else {
		//insert
		// $sql = "insert into db_product(thumbnail, title, price, discount, description, updated_at, created_at, deleted, category_id) values ('$thumbnail', '$title', '$price', '$discount', '$description', '$updated_at', '$created_at', 0, $category_id)";
		$sql = "INSERT INTO `db_product`(`catid`, `name`, `avatar`, `img`, `detail`, `producer`, `number`, `price`, `created_by`) 
		VALUES ('$category_id', '$name', '$thumbnail', '$thumbnail',)";
		execute($sql);

		header('Location: index.php');
		die();
	}
}