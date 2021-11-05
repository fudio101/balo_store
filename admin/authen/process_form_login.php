<?php
$fullname = $username = $msg = '';

if (!empty($_POST)) {
	$username = getPost('username');
	$pwd = getPost('password');
	$pwd = getSecurityMD5($pwd);

	$sql = "select * from db_user where username = '$username' and password = '$pwd' and status = 1";
	$userExist = executeResult($sql, true);
	if ($userExist == null) {
		$msg = 'Đăng nhập không thanh công, vui lòng kiểm tra username hoặc mật khẩu!!!';
	} else {
		//login thanh cong
		$token = getSecurityMD5($userExist['username'] . time());
		setcookie('token', $token, time() + 4 * 60 * 60 * 1000, '/');
		$created_at = date('Y-m-d H:i:s');

		$_SESSION['user'] = $userExist;

		$userId = $userExist['id'];
		$sql = "insert into db_token (user_id, token, created_at) values ('$userId', '$token', '$created_at')";
		execute($sql);

		header('Location: ../');
		die();
	}
}
