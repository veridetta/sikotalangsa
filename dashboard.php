<?php include 'header.php'; ?>
<div class="az-content-body pd-lg-l-40 d-flex flex-column">
    <div class="container-fluid">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah
            </button>
        </div>
        <button type="button" value="Export Excel" onclick="window.open('laporan-excel.php')" class="btn btn-success">Export to Excel</button>
        <button type="button" value="Export PDF" onclick="window.open('laporan-cetak.php', '_blank')" class="btn btn-danger">Export to Pdf</button>
        <br><br>
        <div class="modal fade" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Tambah Data</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <form method="post" enctype="multipart/form-data">
                        <div class="modal-body">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Nama:</label>
                                    <input type="text" class="form-control" name="nama">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>NIP:</label>
                                    <input type="number" class="form-control nip-input" name="nip">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Pangkat:</label>
                                    <select class="form-control" name="pangkat">
                                        <option value="IV/c">IV/c</option>
                                        <option value="IV/b">IV/b</option>
                                        <option value="IV/a">IV/a</option>
                                        <option value="III/d">III/d</option>
                                        <option value="III/c">III/c</option>
                                        <option value="III/b">III/b</option>
                                        <option value="III/a">III/a</option>
                                        <option value="II/d">II/d</option>
                                        <option value="II/c">II/c</option>
                                        <option value="II/b">II/b</option>
                                        <option value="II/a">II/a</option>
                                        <option value="I/d">I/d</option>
                                        <option value="I/c">I/c</option>
                                        <option value="I/b">I/b</option>
                                        <option value="I/a">I/a</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Jabatan:</label>
                                    <select class="form-control" name="jabatan">
                                        <option value="Kabag">Kabag</option>
                                        <option value="Kasubbag">Kasubbag</option>
                                        <option value="Pengelola/Pengawas">Pengelola/Pengawas</option>
                                        <option value="Analisis">Analisis</option>
                                        <option value="Pelaksana">Pelaksana</option>
                                    </select>
                                </div>
                                <!-- tambahan -->
                                <div class="form-group col-md-12">
                                    <label>Pilih Kasubbag:</label>
                                    <select class="form-control" name="kasubbag">
                                        <option value="0">-- Pilih Kasubbag --</option>
                                       <?php $kasubbag = $koneksi->query("SELECT * FROM jabatan WHERE jabatan = 'Kasubbag'"); ?>
                                        <?php while ($data = $kasubbag->fetch_assoc()) { ?>
                                            <option value="<?= $data['idjabatan']; ?>"><?= $data['nama']." - ".$data['keterangan']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Keterangan Jabatan:</label>
                                    <input type="text" class="form-control" name="keterangan">
                                </div>
                                <!-- tambahan -->
                                <div class="form-group col-md-12">
                                    <label>Tanggal Lahir:</label>
                                    <input type="date" class="form-control" name="tanggallahir">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Usia:</label>
                                    <input type="number" class="form-control" name="usia">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Tugas & Wewenang:</label>
                                    <textarea rows="5" class="form-control" name="tugas"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Pegawai - Organisasi</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="table" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th width="30px">No.</th>
                                        <th width="100px">Nama</th>
                                        <th width="50px">NIP</th>
                                        <th width="50px">Pangkat</th>
                                        <th width="70px">Jabatan</th>
                                        <th width="70px">Kasubbag</th>
                                        <th width="70px">Keterangan Jabatan</th>
                                        <th width="80px">Tanggal Lahir</th>
                                        <th width="30px">Usia</th>
                                        <th width="100px">Tugas & Wewenang</th>
                                        <th width="50px">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $nomor = 1;
                                    $ambil = $koneksi->query("SELECT * FROM Jabatan ORDER BY FIELD(jabatan, 'Kabag', 'Kasubbag', 'Pengelola/Pengawas','Analisis','Pelaksana')");
                                    while ($data = $ambil->fetch_assoc()) { 
                                        if( $data['relasi'] != '0'){
                                            $kassubbag = $koneksi->query("SELECT * FROM jabatan WHERE idjabatan = '".$data['relasi']."'")->fetch_assoc();
                                        }
                                        
                                        ?>
                                        
                                        <tr>
                                            <td><?php echo $nomor; ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['nip'] ?></td>
                                            <td><?php echo $data['pangkat'] ?></td>
                                            <td><?php echo $data['jabatan'] ?></td>
                                            <td><?php if($data['relasi'] != '0'){echo $kassubbag['nama'];} ?></td>
                                            <td><?php echo $data['keterangan'] ?></td>
                                            <td><?php echo tanggal($data['tanggallahir']) ?></td>
                                            <td><?php echo $data['usia'] ?></td>
                                            <td><?php echo $data['tugas'] ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning m-1" data-toggle="modal" data-target="#modalEdit<?= $data['idjabatan']; ?>">Ubah</button>
                                                <a href="hapus.php?id=<?php echo $data['idjabatan']; ?>" class="btn btn-danger m-1" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="modalEdit<?= $data['idjabatan']; ?>" tabindex="-1" role="dialog" aria-labelledby="modalEditLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalEditLabel">Ubah Data</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="id" value="<?= $data['idjabatan']; ?>">
                                                            <div class="form-row">
                                                                <div class="form-group col-md-12">
                                                                    <label for="nama">Nama:</label>
                                                                    <input type="text" class="form-control" id="nama" value="<?= $data['nama']; ?>" name="nama" required>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="nip">NIP:</label>
                                                                    <input type="number" class="form-control nip-input" id="nip" value="<?= $data['nip']; ?>" name="nip" required>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="pangkat">Pangkat:</label>
                                                                    <select class="form-control" id="pangkat" name="pangkat" required>
                                                                        <option value="IV/c" <?php if ($data['pangkat'] == 'IV/c') echo 'selected'; ?>>IV/c</option>
                                                                        <option value="IV/b" <?php if ($data['pangkat'] == 'IV/b') echo 'selected'; ?>>IV/b</option>
                                                                        <option value="IV/a" <?php if ($data['pangkat'] == 'IV/a') echo 'selected'; ?>>IV/a</option>
                                                                        <option value="III/d" <?php if ($data['pangkat'] == 'III/d') echo 'selected'; ?>>III/d</option>
                                                                        <option value="III/c" <?php if ($data['pangkat'] == 'III/c') echo 'selected'; ?>>III/c</option>
                                                                        <option value="III/b" <?php if ($data['pangkat'] == 'III/b') echo 'selected'; ?>>III/b</option>
                                                                        <option value="III/a" <?php if ($data['pangkat'] == 'III/a') echo 'selected'; ?>>III/a</option>
                                                                        <option value="II/d" <?php if ($data['pangkat'] == 'II/d') echo 'selected'; ?>>II/d</option>
                                                                        <option value="II/c" <?php if ($data['pangkat'] == 'II/c') echo 'selected'; ?>>II/c</option>
                                                                        <option value="II/b" <?php if ($data['pangkat'] == 'II/b') echo 'selected'; ?>>II/b</option>
                                                                        <option value="II/a" <?php if ($data['pangkat'] == 'II/a') echo 'selected'; ?>>II/a</option>
                                                                        <option value="I/d" <?php if ($data['pangkat'] == 'I/d') echo 'selected'; ?>>I/d</option>
                                                                        <option value="I/c" <?php if ($data['pangkat'] == 'I/c') echo 'selected'; ?>>I/c</option>
                                                                        <option value="I/b" <?php if ($data['pangkat'] == 'I/b') echo 'selected'; ?>>I/b</option>
                                                                        <option value="I/a" <?php if ($data['pangkat'] == 'I/a') echo 'selected'; ?>>I/a</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="jabatan">Jabatan:</label>
                                                                    <select class="form-control" id="jabatan" name="jabatan" required>
                                                                        <option <?php if ($data['jabatan'] == 'Kabag') echo 'selected'; ?> value="Kabag">Kabag</option>
                                                                        <option <?php if ($data['jabatan'] == 'Kasubbag') echo 'selected'; ?> value="Kasubbag">Kasubbag</option>
                                                                        <option <?php if ($data['jabatan'] == 'Pengelola/Pengawas') echo 'selected'; ?> value="Pengelola/Pengawas">Pengelola/Pengawas</option>
                                                                        <option <?php if ($data['jabatan'] == 'Analisis') echo 'selected'; ?> value="Analisis">Analisis</option>
                                                                        <option <?php if ($data['jabatan'] == 'Pelaksana') echo 'selected'; ?> value="Pelaksana">Pelaksana</option>
                                                                    </select>
                                                                </div>
                                                                <!-- tambahan -->
                                                                <div class="form-group col-md-12">
                                                                    <label>Pilih Kasubbag:</label>
                                                                    <select class="form-control" name="kasubbag">
                                                                        <option value="">-- Pilih Kasubbag --</option>
                                                                    <?php $kasubbag = $koneksi->query("SELECT * FROM jabatan WHERE jabatan = 'Kasubbag'"); ?>
                                                                        <?php while ($data = $kasubbag->fetch_assoc()) { ?>
                                                                            <option value="<?= isset($data['idjabatan']) ? $data['idjabatan'] : ''; ?>" <?= isset($data['idjabatan'], $selectedId) && $data['idjabatan'] == $selectedId ? 'selected' : ''; ?>>
                                                                                <?= $data['nama']." - ".$data['keterangan']; ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label>Keterangan Jabatan:</label>
                                                                    <input type="text" class="form-control" name="keterangan" value="<?= isset($data['keterangan']) ? $data['keterangan'] : ''; ?>">
                                                                </div>
                                                                <!-- tambahan -->
                                                                <div class="form-group col-md-12">
                                                                    <label for="tanggallahir">Tanggal Lahir:</label>
                                                                    <input type="date" class="form-control" id="tanggallahir" value="<?= $data['tanggallahir']; ?>" name="tanggallahir" required>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="usia">Usia:</label>
                                                                    <input type="number" class="form-control" id="usia" value="<?= $data['usia']; ?>" name="usia" required>
                                                                </div>
                                                                <div class="form-group col-md-12">
                                                                    <label for="tugas">Tugas & Wewenang:</label>
                                                                    <textarea class="form-control" id="tugas" name="tugas" required><?= isset($data['tugas']) ? $data['tugas'] : ''; ?></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <?php $nomor++; ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if (isset($_POST["edit"])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $pangkat = $_POST['pangkat'];
    $jabatan = $_POST['jabatan'];
    $kasubbag = $_POST['kasubbag'];
    $tanggallahir = $_POST['tanggallahir'];
    $keterangan = $_POST['keterangan'];
    $usia = $_POST['usia'];
    $tugas = $_POST['tugas'];

    $sql = "UPDATE jabatan 
        SET nama = '$nama', nip = '$nip', pangkat = '$pangkat', jabatan = '$jabatan', relasi = '$kasubbag', keterangan='$keterangan', tanggallahir = '$tanggallahir', usia = '$usia', tugas = '$tugas'
        WHERE idjabatan = '$id'";
    $koneksi->query($sql) or die(mysqli_error($koneksi));
    echo "<script>alert('Data berhasil di edit')</script>";
    echo "<script>location='dashboard.php';</script>";
}
if (isset($_POST["simpan"])) {
    $nama = $_POST['nama'];
    $nip = $_POST['nip'];
    $keterangan = $_POST['keterangan'];
    $kasubbag = $_POST['kasubbag'];
    $pangkat = $_POST['pangkat'];
    $jabatan = $_POST['jabatan'];
    $tanggallahir = $_POST['tanggallahir'];
    $usia = $_POST['usia'];
    $tugas = $_POST['tugas'];

    $sql = "INSERT INTO jabatan (nama, nip, pangkat, jabatan, tanggallahir, usia, tugas, relasi, keterangan) 
        VALUES ('$nama', '$nip', '$pangkat', '$jabatan', '$tanggallahir', '$usia', '$tugas', '$kasubbag', '$keterangan')";
    $koneksi->query($sql) or die(mysqli_error($koneksi));
    echo "<script>alert('Data berhasil ditambahkan')</script>";
    echo "<script>location='dashboard.php';</script>";
}
?>

<?php include 'footer.php'; ?>
<script>
    const nipInputs = document.querySelectorAll('.nip-input');
    nipInputs.forEach(function(input) {
        input.addEventListener('input', function() {
            let inputValue = input.value;
            if (inputValue.length > 18) {
                inputValue = inputValue.slice(0, 18);
                input.value = inputValue;
            }
        });
    });
</script>