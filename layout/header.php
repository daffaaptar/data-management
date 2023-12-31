<?php

include 'config/app.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $title; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets-template/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="icon" href="https://amalsolution.com/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Famal-logo-lg.bef288eb.png&w=256&q=75">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="assets-template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="assets-template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets-template/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="assets-template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="assets-template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="assets-template/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <!-- <a href="index.php" class="brand-link">
                <img src="https://amalsolution.com/_next/image?url=%2F_next%2Fstatic%2Fmedia%2Famal-logo-lg.bef288eb.png&w=256&q=75" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light"></span>
            </a> -->

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="assets-template/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block"><?= $_SESSION['nama']; ?></a>
        </div>
    </div>
                <!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <li class="nav-header">Daftar Menu</li>

        <?php if ($_SESSION['level'] == "super-admin" || $_SESSION['level'] == "admin") : ?>
        <li class="nav-item">
                <a href="dashboard.php" class="nav-link">
                    <i class="nav-icon fas fa-home"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <?php endif; ?>

            <?php if ($_SESSION['level'] == "karyawan" ) : ?>
        <li class="nav-item">
            <a href="absen.php" class="nav-link">
                    <i class="nav-icon fas fa-pen"></i>
                        <p>
                            Absen
                        </p>
                </a>
            </li>
            <?php endif; ?>
            
            <?php if ($_SESSION['level'] == "karyawan" ) : ?>
        <li class="nav-item">
            <a href="overtime.php" class="nav-link">
                    <i class="nav-icon fas fa-clock"></i>
                        <p>
                            Lembur
                        </p>
                </a>
            </li>
            <?php endif; ?>

            <?php if ($_SESSION['level'] == "karyawan") : ?>
        <li class="nav-item">
            <a href="activity.php" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                        <p>
                            Aktifitas
                        </p>
                </a>
            </li>
            <?php endif; ?>
        <?php if ($_SESSION['level'] == "karyawan") : ?>
            <li class="nav-item">
                <a href="presensi.php" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Rekap Absen
                    </p>
                </a>
            </li>
            <?php endif; ?>

        <?php if ($_SESSION['level'] == "karyawan") : ?>
            <li class="nav-item">
                <a href="rekaplembur.php" class="nav-link">
                    <i class="nav-icon fas  fa-clock"></i>
                    <p>
                        Rekap Lembur
                    </p>
                </a>
            </li>
            <?php endif; ?>
        <?php if ($_SESSION['level'] == "karyawan") : ?>
            <li class="nav-item">
                <a href="rekapaktivitas.php" class="nav-link">
                    <i class="nav-icon fas  fa-user"></i>
                    <p>
                        Rekap Aktifitas
                    </p>
                </a>
            </li>
            <?php endif; ?>


            <?php if ($_SESSION['level'] == "super-admin" || $_SESSION['level'] == "admin") : ?>
            <li class="nav-item">
                <a href="dataakun.php" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>
                        Data Karyawan
                    </p>
                </a>
            </li>
            <?php endif; ?>

            <?php if ($_SESSION['level'] == "super-admin" || $_SESSION['level'] == "admin") : ?>
            <li class="nav-item">
                <a href="absensi-akun.php" class="nav-link">
                    <i class="nav-icon fas fa-book"></i>
                    <p>
                        Rekap Absensi
                    </p>
                </a>
            </li>
            <?php endif; ?>
        
        <li class="nav-item">
            <a href="logout.php" class="nav-link">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                <p>
                    Keluar
                </p>
            </a>
        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
