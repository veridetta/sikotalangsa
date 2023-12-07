<html>
<title>Laporan</title>
<style type="text/css">
    body {
        -webkit-print-color-adjust: exact;
        padding: 25px
    }

    #table {
        font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    #table td,
    #table th {
        padding: 8px;
        padding-top: 5px;
        border: 1px solid black;
    }

    #table tr {
        padding-top: 5px;
        padding-bottom: 5px;
    }

    #table tr:hover {
        background-color: #ddd;
    }

    #table th {
        padding-top: 5px;
        padding-bottom: 5px;
        text-align: left;
        background-color: #b30404;
        color: white;
    }

    @page {
        size: auto;
        margin: 0;
    }

    hr {
        display: block;
        margin-top: 0.5em;
        margin-bottom: 0.5em;
        margin-left: auto;
        margin-right: auto;
        border-style: inset;
        border-width: 1px;
    }
</style>

<?php
include 'koneksi.php';
?>
<?php
$ambil = $koneksi->query("SELECT * FROM jabatan");
$data = $ambil->fetch_assoc();
?>

<body>
    <br><br>
    <center>
        <h2>DAFTAR JABATAN<br></h2>
    </center> <br>
    <table class="table table-bordered table-striped" id="table" width="670px" style="font-size: 10pt !important;
">
        <thead class="bg-danger">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>NIP</th>
                <th>Pangkat</th>
                <th>Jabatan</th>
                <th>Kasubbag</th>
                <th>Keterangan Jabatan</th>
                <th>Tanggal Lahir</th>
                <th>Usia</th>
                <th>Tugas & Wewenang</th>
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
                </tr>
                <?php $nomor++; ?>
            <?php } ?>
        </tbody>
    </table>
</body>
<script>
    window.print();
</script>

</html>