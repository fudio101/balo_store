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
	$token = getCookie('token');
	if ($token != '') {
		$sql = "select * from db_token where token = '$token'";
		$result = executeResult($sql, true);
		if ($result != null) {

			$userId = $result['user_id'];
			if (isset($_SESSION['user']) && $_SESSION['user']['username'] == $userId) {
				return $_SESSION['user'];
			}

			$sql = "select * from db_user where id = '$userId' and status = 1";
			$item = executeResult($sql, true);
			if ($item != null) {
				$_SESSION['user'] = $item;
				return $item;
			}
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

	$filename = time() . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT) . "." . pathinfo($_FILES[$key]['name'], PATHINFO_EXTENSION);
	//filename -> remove special character, ..., ...

	$newPath = "assets/photos/" . $filename;

	move_uploaded_file($pathTemp, $rootPath . $newPath);

	return $filename;
}

function moveFiles($key, $rootPath = "../../")
{
	$return = '';
	$files = $_FILES[$key]['tmp_name'];
	$i = count($files);
	if ($i == 1) {
		return $return;
	}
	foreach ($files as $index => $tmp_name) {
		$filename = time() . str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT) . "." . pathinfo($_FILES[$key]['name'][$index], PATHINFO_EXTENSION);
		$newPath = "assets/photos/" . $filename;
		move_uploaded_file($tmp_name, $rootPath . $newPath);
		$return = $return . $filename . ((--$i > 0) ? "#" : "");
	}
	return $return;
}

function deleteFiles($key, $rootPath = "../../")
{
	foreach (explode("#", $key) as $img) {
		$path = $rootPath . "assets/photos/" . $img;
		if (!unlink($path))
			return false;
	}
	return true;
}

function deleteFile($key, $rootPath = "../../")
{
	$path = $rootPath . "assets/photos/" . $key;
	if (unlink($path)) return true;
	else return false;
}

// nếu không phải link http thì thêm rootPath để điểu hướng đến thư mục
function fixUrl($thumbnail, $rootPath = "../../")
{
	if (stripos($thumbnail, 'http://') !== false || stripos($thumbnail, 'https://') !== false) {
	} elseif ($thumbnail != "") {
		$thumbnail = $rootPath . "assets/photos/" . $thumbnail;
	}

	return $thumbnail;
}

// nếu không phải link http thì thêm rootPath để điểu hướng đến thư mục
// function asset($thumbnail)
// {
// 	$nameProject = "balostore";
// 	if (stripos($thumbnail, 'http://') !== false || stripos($thumbnail, 'https://') !== false) {
// 	} elseif ($thumbnail != "") {
// 		$thumbnail = '/'  . $nameProject . "/assets/photos/" . $thumbnail;
// 	}

// 	return $thumbnail;
// }
