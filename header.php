<?php

session_start();
$path = explode("/", $_SERVER['PHP_SELF']);
$page = substr(array_pop($path), 0, -4);
include 'dbConnection.php';

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . 
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

console_log($page);
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Covid System Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- =======================================================
  * Template Name: Covid System - v2.3.1
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.php" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Covid System</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->
      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="index.php">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <li class="nav-heading">CRUD</li>

  <li class="nav-item">
    <a class="nav-link <?php if ($page != 'adminCrud') {echo 'collapsed';} ?>" href="adminCrud.php">
      <span>Admin CRUD</span>
    </a>
  </li>

  <li class="nav-heading">Pages</li>

  <li class="nav-item">
    <a class="nav-link <?php if ($page != 'articles') {echo 'collapsed';} ?>" href="articles.php">
      <span>Articles</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?php if ($page != 'countries') {echo 'collapsed';} ?>" href="countries.php">
      <span>Countries</span>
    </a>
  </li>

  <li class="nav-item">
    <a class="nav-link <?php if ($page != 'users') {echo 'collapsed';} ?>" href="users.php">
      <span>Users</span>
    </a>
  </li>


  <li class="nav-item">
    <a class="nav-link collapsed" data-bs-target="#query-nav" data-bs-toggle="collapse" href="#">
    <i class="bi bi-layout-text-window-reverse"></i><span>Queries</span><i class="bi bi-chevron-down ms-auto"></i>
    </a>
    <ul id="query-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
      <li>
        <a href="query10.php" class="<?php if ($page == 'query10') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 10</span>
        </a>
      </li>
      <li>
        <a href="query11.php" class="<?php if ($page == 'query11') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 11</span>
        </a>
      </li>
      <li>
        <a href="query12.php" class="<?php if ($page == 'query12') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 12</span>
        </a>
      </li>
      <li>
        <a href="query13.php" class="<?php if ($page == 'query13') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 13</span>
        </a>
      </li>
      <li>
        <a href="query14.php" class="<?php if ($page == 'query14') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 14</span>
        </a>
      </li>
      <li>
        <a href="query15.php" class="<?php if ($page == 'query15') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 15</span>
        </a>
      </li>
      <li>
        <a href="query16.php" class="<?php if ($page == 'query16') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 16</span>
        </a>
      </li>
      <li>
        <a href="query17.php" class="<?php if ($page == 'query17') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 17</span>
        </a>
      </li>
      <li>
        <a href="query18.php" class="<?php if ($page == 'query18') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 18</span>
        </a>
      </li>
      <li>
        <a href="query19.php" class="<?php if ($page == 'query19') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 19</span>
        </a>
      </li>
      <li>
        <a href="query20.php" class="<?php if ($page == 'query20') {echo 'active';} ?>">
          <i class="bi bi-circle"></i><span>Query 20</span>
        </a>
      </li>
    </ul>
  </li>
</ul>

</aside><!-- End Sidebar-->

<main id="main" class="main">


