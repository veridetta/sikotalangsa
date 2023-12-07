<?php include 'header.php'; ?>
<div class="az-content az-content-dashboard">
    <div class="container">
        <div class="az-content-body">
            <div class="row row-sm mg-b-20">
                <div class="col-lg-12 ht-lg-100p">
                    <div class="card card-dashboard-one">
                        <div class="card-body">
                            <div class="flot-chart-wrapper">
                                <center>
                                    <img style="height: 400px; object-fit: cover;" width="90%" src="assets_home/welcome.jpg">
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Jumlah Kabag</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-4"><?php echo $jumlahmember ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <br><br>
                            <a href="index.php?halaman=dashboard.php" class="btn btn-primary mt-3 btn-sm">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                        Jumlah Kasubag</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-4"><?php echo $jumlahkasubag ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <br><br>
                            <a href="index.php?halaman=dashboard.php" class="btn btn-info mt-3 btn-sm">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Jumlah Pengawas</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-4"><?php echo $jumlahpengawas ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <br><br>
                            <a href="index.php?halaman=dashboard.php" class="btn btn-warning mt-3 btn-sm">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-4 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                        Jumlah Analisis</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-4"><?php echo $jumlahanalisis ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <br><br>
                            <a href="index.php?halaman=dashboard.php" class="btn btn-danger mt-3 btn-sm">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-md-4 mb-4">
                    <div class="card border-left-info shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Jumlah Pelaksana</div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800 mt-4"><?php echo $jumlahpelaksana ?></div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-list fa-2x text-gray-300"></i>
                                </div>
                            </div>
                            <br><br>
                            <a href="index.php?halaman=dashboard.php" class="btn btn-success mt-3 btn-sm">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php'; ?>