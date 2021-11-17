<?php

echo $_SERVER['SERVER_NAME'].'<br>';

function asset($path=''){
    $ASSET_URL = 'http://localhost/finalshop/';
    return $ASSET_URL.$path;
}

echo asset();

