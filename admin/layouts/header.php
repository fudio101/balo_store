<?php
session_start();
require_once($baseUrl . '../utils/utility.php');
require_once($baseUrl . '../database/dbhelper.php');

$user = getUserToken();
if ($user == null) {
  header('Location: ' . $baseUrl . 'authen/login.php');
  die();
}
?>

<!DOCTYPE html>
<html>

<head>
  <title><?= $title ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../../assets/images/icon.png" />

  <!-- Latest compiled and minified CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="<?= $baseUrl ?>../assets/css/dashboard.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.1/font/bootstrap-icons.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Popper JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">

    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">FinalShop</a>

    <ul class="navbar-nav px-3">

      <li class="nav-item text-nowrap">
        <a class="nav-link" href="<?= $baseUrl ?>authen/logout.php">Logout</a>
      </li>

    </ul>

  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar" style="height: 100%;">
        <div class="sidebar-sticky">
          <ul class="nav flex-column mt-5">

            <li class="nav-item">
              <a class="nav-link admin" href="<?= $baseUrl ?>">
                <i class="bi bi-house-fill"></i>
                Dashboard
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link category" href="<?= $baseUrl ?>category">
                <i class="bi bi-folder"></i>
                Categorys
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link product" href="<?= $baseUrl ?>product">
                <i class="bi bi-file-earmark-text"></i>
                Products
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link order" href="<?= $baseUrl ?>order">
                <i class="bi bi-minecart"></i>
                Orders
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link user" href="<?= $baseUrl ?>user">
                <i class="bi bi-people-fill"></i>
                Users
              </a>
            </li>

          </ul>
        </div>
      </nav>
      <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <!-- hien thi tung chuc nang cua trang quan tri START-->