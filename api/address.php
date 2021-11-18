<?php

require_once("../database/dbhelper.php");

if (!empty($_POST)) {
    $action = $_POST['action'];
    switch ($action) {
        case 'getprovince':
            get_province();
            break;
        case 'getdistrict':
            get_district();
            break;
    }
}

function get_province()
{
    $data = executeResult('SELECT * FROM `db_province`');
    echo json_encode($data);
}

function get_district()
{
    $provinceid = $_POST['provinceid'];
    $data = executeResult("SELECT * FROM `db_district` WHERE provinceid=$provinceid");
    echo json_encode($data);
}