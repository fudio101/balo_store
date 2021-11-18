<?php
require_once('./utils/utility.php');
require_once('./database/dbhelper.php');

//echo $_SERVER['SERVER_NAME'].'<br>';

function asset($path=''){
    $ASSET_URL = 'http://localhost/finalshop/';
    return $ASSET_URL.$path;
}

//echo asset();

// $row = executeResult("INSERT INTO `db_usergroup`(`name`) VALUES ('Bao')");

// print_r($row[0]);

$cart = '[{"id":9,"quantity":1},{"id":11,"quantity":3}]';

$cartDecode = json_decode($cart);

echo '<pre>';
print_r($cartDecode);
echo '</pre>';
