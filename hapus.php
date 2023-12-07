
<?php
include 'koneksi.php';
$koneksi->query("DELETE FROM jabatan WHERE idjabatan='$_GET[id]'");
echo "<script>alert('Data Berhasil Di Hapus');</script>";
echo "<script>location='index.php';</script>";

?>