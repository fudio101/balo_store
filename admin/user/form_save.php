<?php

if (!empty($_POST)) {
	$id = getPost('id');
	$fullname = getPost('fullname');
	$email = getPost('email');
	$phone_number = getPost('phone_number');
	$address = getPost('address');
	$password = getPost('password');
	if ($password != '') {
		$password = getSecurityMD5($password);
	}

	$role_id = getPost('role_id');

	if ($id > 0) {
		//update
		$sql = "select * from db_user where email = '$email' and id <> $id";
		$userItem = executeResult($sql, true);

		if ($userItem != null) {
			$msg = 'This email already exists in another account, please check again!!!';
		} else {
			if ($password != '') {
				$sql = "update db_user set fullname = '$fullname' email = '$email', phone = '$phone_number', address = '$address', password = '$password', role = $role_id where id = $id";
			} else {
				$sql = "update db_user set fullname = '$fullname', email = '$email', phone = '$phone_number', address = '$address', role = $role_id where id = $id";
			}
			execute($sql);
			$sql = "SELECT * FROM `db_user` WHERE id = $id;";
			$user = executeResult($sql, true);
			$_SESSION['user'] = $user;
			header('Location: index.php');
			die();
		}
	} else {
		$sql = "select * from db_user where email = '$email'";
		$userItem = executeResult($sql, true);
		//insert
		if ($userItem == null) {
			//insert
			$sql = "insert db_user User(fullname, username, password, role, email, phone , address) 
			values ('$fullname', '$username', '$password', '$role_id', '$email', '$phone_number', '$address')";
			execute($sql);
			header('Location: index.php');
			die();
		} else {
			//Tai khoan da ton tai -> failed
			$msg = 'Email has been registered, please check again!!!';
		}
	}
}
