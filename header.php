<?php
session_start();
include 'koneksi.php';

if (empty($_SESSION['akun'])) {
    echo "<script> alert('Maaf, anda belum login, silahkan login terlebih dahulu');</script>";
    echo "<script> location ='login.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Meta -->
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Bagian Organisasi dan Kepegawaian Sekretariat Daerah Kota Langsa</title>

    <link href="assets_home/home/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets_home/home/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets_home/home/lib/typicons.font/typicons.css" rel="stylesheet">
    <link href="assets_home/home/lib/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets_home/home/css/azia.css">
    <script src="assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="assets/DataTables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="assets_home/home/logo.png" />

</head>

<body>
    <div class="az-header">
        <div class="container">
            <div class="az-header-left">
                <a href="beranda.php">
                    <h3 class="text-dark"> Data Kepegawaian</h3>
                </a>
                <a href="beranda.php" class="nav-link" style="padding-left: 50px;">Dashboard</a>
                <a href="dashboard.php" class="nav-link">Data Kepegawaian</a>
            </div>
            <div class="az-header-right">
                <div class="dropdown az-profile-menu">
                    <a href="" class="az-img-user"><img src="assets_home/home/adm.png" alt=""></a>
                    <div class="dropdown-menu">
                        <div class="az-dropdown-header d-sm-none">
                            <a href="" class="az-header-arrow"><i class="icon ion-md-arrow-back"></i></a>
                        </div>
                        <a href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar dari Halaman ini ?')" class="dropdown-item"><i class="typcn typcn-power-outline"></i> Log Out</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>