<?php
date_default_timezone_set('Asia/Jakarta');
$koneksi = new mysqli("localhost:1235", "root", "", "sikotalangsa");
function tanggal($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = bulan(substr($tgl, 5, 2));
    $tahun = substr($tgl, 0, 4);
    return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function bulan($bln)
{
    switch ($bln) {
        case 1:
            return "Januari";
            break;
        case 2:
            return "Februari";
            break;
        case 3:
            return "Maret";
            break;
        case 4:
            return "April";
            break;
        case 5:
            return "Mei";
            break;
        case 6:
            return "Juni";
            break;
        case 7:
            return "Juli";
            break;
        case 8:
            return "Agustus";
            break;
        case 9:
            return "September";
            break;
        case 10:
            return "Oktober";
            break;
        case 11:
            return "November";
            break;
        case 12:
            return "Desember";
            break;
    }
}
function usia($tanggallahir)
{
    $birthDate = new DateTime($tanggallahir);
    $currentDate = new DateTime();
    $ageInterval = $currentDate->diff($birthDate);
    return $ageInterval->y;
}
?>
<?php
$member = $koneksi->query("SELECT * FROM jabatan WHERE jabatan = 'Kabag'");
$jumlahmember = $member->num_rows;
$kasubag = $koneksi->query("SELECT * FROM jabatan WHERE jabatan = 'Kasubbag'");
$jumlahkasubag = $kasubag->num_rows;
$pengawas = $koneksi->query("SELECT * FROM jabatan WHERE jabatan = 'Pengelola/Pengawas'");
$jumlahpengawas = $pengawas->num_rows;
$analisis = $koneksi->query("SELECT * FROM jabatan WHERE jabatan = 'Analisis'");
$jumlahanalisis = $analisis->num_rows;
$pelaksana = $koneksi->query("SELECT * FROM jabatan WHERE jabatan = 'Pelaksana'");
$jumlahpelaksana = $pelaksana->num_rows;
?>