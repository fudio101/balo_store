<?php

$fullname = $username = $msg = '';

if (!empty($_POST)) {
	$fullname = getPost('fullname');
	$username = getPost('username');
	$pwd = getPost('password');

	//validate
	if (empty($fullname) || empty($username) || empty($pwd) || strlen($pwd) < 6) {
	} else {
		//Validate thanh cong
		$userExist = executeResult("select * from db_user where username = '$username'", true);
		if ($userExist != null) {
			$msg = 'Username đã được đăng ký trên hệ thống';
		} else {
			$created_at = date('Y-m-d H:i:s');
			//Su dung ma hoa 1 chieu -> md5 -> hack
			$pwd = getSecurityMD5($pwd);

			$sql = "insert into db_user (fullname, username, password, role , created, status) values ('$fullname', '$username', '$pwd', 2, '$created_at', 1)";
			execute($sql);
			header('Location: login.php');
			die();
		}
	}
}
