<?php
session_start();
include 'koneksi.php';

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>Bagian Organisasi dan Kepegawaian Sekretariat Daerah Kota Langsa</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="stylesheet" type="text/css" href="beranda/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="beranda/css/style.css">
    <link rel="stylesheet" href="beranda/css/responsive.css">
    <link rel="icon" href="beranda/images/logo.png" type="image/gif" />
    <link rel="stylesheet" href="beranda/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Righteous&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="beranda/css/owl.carousel.min.css">
    <link rel="stylesheet" href="beranda/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" href="beranda/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.8.2/css/jquery.orgchart.css"/>
</head>

<body>
    <div class="header_section">
        <div class="header_main">
            <div class="mobile_menu">
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="logo_mobile"><a href="index.php"><img src="beranda/images/logo.png"></a></div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="profil.php">Profil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="visimisi.php">Visi & Misi</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="album.php">Album</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " href="login.php">Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="container-fluid">
                <div class="logo"><a href="index.php"><img style="height: 100px;" src="beranda/images/logo.png"></a></div>
                <div class="menu_main">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="profil.php">Profil</a></li>
                        <li><a href="visimisi.php">Visi & Misi</a></li>
                        <li><a href="album.php">Album</a></li>
                        <li><a href="login.php">Login</a></li>
                    </ul>
                </div>
            </div>
        </div>