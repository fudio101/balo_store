<?php
//https://gokisoft.com/share-code-huong-dan-login-multi-platform-login-multi-devices-multi-browsers-session--cookie-trong-lap-trinh-phpmysql.html#dbhelper-php
//$sql = "insert into Role(name) values ('Admin')";
//$sql = "insert into Role(name) values ('$name')"; => $name = 'Admin => sql injection => join => framework (Laravel) => fix
//$name = 'Admin => \'Admin
//fix sql injection => $sql = "ghi cau lenh sql vao"
function fixSqlInject($sql)
{
	$sql = str_replace('\\', '\\\\', $sql);
	$sql = str_replace('\'', '\\\'', $sql);
	return $sql;
}

function getGet($key)
{
	$value = '';
	if (isset($_GET[$key])) {
		$value = $_GET[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getPost($key)
{
	$value = '';
	if (isset($_POST[$key])) {
		$value = $_POST[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getRequest($key)
{
	$value = '';
	if (isset($_REQUEST[$key])) {
		$value = $_REQUEST[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getCookie($key)
{
	$value = '';
	if (isset($_COOKIE[$key])) {
		$value = $_COOKIE[$key];
		$value = fixSqlInject($value);
	}
	return trim($value);
}

function getSecurityMD5($pwd)
{
	return md5(md5($pwd) . PRIVATE_KEY);
}

function getUserToken()
{
	if (isset($_SESSION['user'])) {
		return $_SESSION['user'];
	}
	$token = getCookie('token');
	$sql = "select * from db_token where token = '$token'";
	$item = executeResult($sql, true);
	if ($item != null) {
		$userId = $item['user_id'];
		$sql = "select * from db_user where id = '$userId' and status = 1";
		$item = executeResult($sql, true);
		if ($item != null) {
			$_SESSION['user'] = $item;
			return $item;
		}
	}

	return null;
}

function moveFile($key, $rootPath = "../../")
{
	if (!isset($_FILES[$key]) || !isset($_FILES[$key]['name']) || $_FILES[$key]['name'] == '') {
		return '';
	}

	$pathTemp = $_FILES[$key]["tmp_name"];

	$filename = time() . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
	//filename -> remove special character, ..., ...

	$newPath = "assets/photos/" . $filename . "." . pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);;

	move_uploaded_file($pathTemp, $rootPath . $newPath);

	return $newPath;
}

function deleteFile($key, $rootPath = "../../")
{
	$path = $rootPath . $key;
	if (unlink($path)) return true;
	else return false;
}

// nếu không phải link http thì thêm rootPath để điểu hướng đến thư mục
function fixUrl($thumbnail, $rootPath = "../../")
{
	if (stripos($thumbnail, 'http://') !== false || stripos($thumbnail, 'https://') !== false) {
	} else {
		$thumbnail = $rootPath . $thumbnail;
	}

	return $thumbnail;
}
