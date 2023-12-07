<?php
session_start();
include 'koneksi.php';

if (isset($_POST["simpan"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $ambil = $koneksi->query("SELECT * FROM akun WHERE email='$email' AND password='$password'");
    $akunyangcocok = $ambil->num_rows;

    if ($akunyangcocok >= 1) {
        $akun = $ambil->fetch_assoc();
        $_SESSION['akun'] = $akun;
        echo "<script>alert('Anda sukses login sebagai Admin');</script>";
        echo "<script>location ='beranda.php';</script>";
    } else {
        echo "<script>alert('Email atau Password anda salah');</script>";
        echo "<script>location ='login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-90680653-2"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-90680653-2');
    </script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Responsive Bootstrap 4 Dashboard Template">
    <meta name="author" content="BootstrapDash">

    <title>Bagian Organisasi dan Kepegawaian Sekretariat Daerah Kota Langsa</title>
    <link href="assets_home/home/lib/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="assets_home/home/lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <link href="assets_home/home/lib/typicons.font/typicons.css" rel="stylesheet">
    <link rel="stylesheet" href="assets_home/home/css/azia.css">
    <link rel="shortcut icon" href="assets_home/home/logo.png" />
    <style>
        body {
            background-image: url("assets_home/home/bg.jpg");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
</head>

<body class="az-body">
    <div class="az-signin-wrapper">
        <div class="az-card-signin">
            <center>
                <img style="height: 130px;object-fit:cover" width="100px" src="assets_home/home/logo.png">
            </center>
            <div class="az-signin-header">
                <center>
                    <h3>Silahkan Login</h3>
                </center>
            </div>
            <form method="post">
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" placeholder="Masukkan Email Anda" name="email" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Masukkan Password Anda" required>
                </div>
                <button class="btn btn-az-primary btn-block" name="simpan" value="simpan">Login</button>
            </form>
        </div>
    </div>

    <script src="assets_home/home/lib/jquery/jquery.min.js"></script>
    <script src="assets_home/home/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets_home/home/lib/ionicons/ionicons.js"></script>
    <script src="assets_home/home/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets_home/home/js/jquery.cookie.js" type="text/javascript"></script>
    <script src="assets_home/home/js/azia.js"></script>
</body>

</html>