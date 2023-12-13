<html>
<title>Laporan</title>
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
    .orgchart { background: #fff !important; }
    .orgchart td.left, .orgchart td.right, .orgchart td.top { border-color: #aaa; }
    .orgchart td>.down { background-color: #aaa; }
    .orgchart .node .title {background-color: #009933 !important;
        width: 190px !important;
        font-size: 13px !important;
        padding: 8px !important;
        height:auto !important;
    }
    .orgchart .node .content {height: auto !important;width: 190px !important;}
    .orgchart .middle-level .title { background-color: #006699; }
    .orgchart .middle-level .content { border-color: #006699; }
    .orgchart .product-dept .title { background-color: #009933; }
    .orgchart .product-dept .content { border-color: #009933; }
    .orgchart .rd-dept .title { background-color: #993366; }
    .orgchart .rd-dept .content { border-color: #993366; }
    .orgchart .pipeline1 .title { background-color: #996633; }
    .orgchart .pipeline1 .content { border-color: #996633; }
    .orgchart .frontend1 .title { background-color: #cc0066; }
    .orgchart .frontend1 .content { border-color: #cc0066; }
</style>

<?php
include 'koneksi.php';
?>
<?php
$ambil = $koneksi->query("SELECT * FROM jabatan");
$data = $ambil->fetch_assoc();
?>

<body>
    <div class="about_section layout_padding" id="print">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="about_taital_main">
                        <div class="d-flex row col-12">
                            <div class="col-2 h-100 row ">
                                <div class="my-auto pt-3">
                                    <img src="beranda/images/logo.png" width="100px" height="100px" class="my-auto">
                                </div>
                            </div>
                            <div class="banner col-10 h-100">
                                <p class="m-0 mt-2 h5">BAGAN STRUKTUR</p>
                                <h1 class="m-0 display-4 font-weight-bold">BAGIAN ORGANISASI</h1>
                                <p class="m-0 mb-2 h6">SEKRETARIAT DAERAH</p>
                            </div>
                        </div>
                        <div class="col-12 row justify-content-center text-center">
                            <div id="chart-container"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="beranda/js/jquery.min.js"></script>
<script src="beranda/js/popper.min.js"></script>
<script src="beranda/js/bootstrap.bundle.min.js"></script>
<script src="beranda/js/jquery-3.0.0.min.js"></script>
<script src="beranda/js/plugin.js"></script>
<script src="beranda/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="beranda/js/custom.js"></script>
<script src="beranda/js/owl.carousel.js"></script>
<script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/orgchart/3.8.2/js/jquery.orgchart.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
<script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
    window.scrollTo(0,0);  
</script>
<script>
    <?php $jabatan = $koneksi->query("SELECT * FROM jabatan"); ?>

    var jabatan = <?php echo json_encode($jabatan->fetch_all(MYSQLI_ASSOC)); ?>;
    
    var kabag = jabatan.filter(function(jabatan) {
        return jabatan.jabatan == 'Kabag';
    })[0];
    var kasubbag = jabatan.filter(function(jabatan) {
        return jabatan.jabatan == 'Kasubbag';
    });
    kasubbag.forEach(function(kasubbag) {
        kasubbag.children = jabatan.filter(function(jabatan) {
            console.log(jabatan.relasi, kasubbag.idjabatan); // replace 'id' with the correct property name if it's different
            return jabatan.relasi == kasubbag.idjabatan; 
        }).map(function(jabatan) {
            return {
                id: jabatan.idjabatan, // replace 'id' with the correct property name if it's different
                name: jabatan.jabatan,
                nodeTitle: jabatan.jabatan,
                nodeContent: "<p class='m-0'><small>"+jabatan.nama+"</small></p><p class='m-0'><small>NIP. "+jabatan.nip+"</small></p><p class='m-0'><small>"+jabatan.keterangan+"</small></p>",
            };
        });
    });
    kabag.children = kasubbag.map(function(kasubbag) {
        return {
            id: kasubbag.id,
            name:kasubbag.jabatan,
            nodeTitle: kasubbag.nama,
            nodeContent: "<p class='m-0'><small>"+kasubbag.nama+"</small></p><p class='m-0'><small>NIP. "+kasubbag.nip+"</small></p><p class='m-0'><small>"+kasubbag.keterangan+"</small></p>",
            children: kasubbag.children
        };
    });
    var analisis_pelaksana = jabatan.filter(function(jabatan) {
        return jabatan.jabatan == 'Analisis' || jabatan.jabatan == 'Pelaksana';
    }).map(function(jabatan) {
        return {
            id: jabatan.id,
            name:jabatan.jabatan,
            nodeTitle: jabatan.nama,
            nodeContent: "<p class='m-0'><small>"+jabatan.nama+"</small></p><p class='m-0'><small>NIP. "+jabatan.nip+"</small></p><p class='m-0'><small>"+jabatan.keterangan+"</small></p>",
        };
    });
    
    var middleKasubbagIndex = Math.floor(kasubbag.length / 2);
    var middleKasubbag = kasubbag[middleKasubbagIndex];
    var middleChildIndex = Math.floor(middleKasubbag.children.length / 2);
    middleKasubbag.children[middleChildIndex].children = middleKasubbag.children[middleChildIndex].children || [];
    middleKasubbag.children[middleChildIndex].children = middleKasubbag.children[middleChildIndex].children.concat(analisis_pelaksana);
    
    var chart = $('#chart-container').orgchart({
        'data': {
            id: '111',
            name : kabag.jabatan,
            nodeTitle: kabag.nama,
            nodeContent: "<p class='m-0'><small>"+kabag.nama+"</small></p><p class='m-0'><small>NIP. "+kabag.nip+"</small></p><p class='m-0'><small>"+kabag.keterangan+"</small></p>",
            relationship: '111', 
            children: kabag.children
        },
        'nodeContent': 'nodeContent',
        'nodeID': 'id',
        'createNode': function($node, data) {
            $node.on('click', function(event) {
                if (!$(event.target).is('.edge, .toggleBtn')) {
                    $('#selected-node').val(data.id).trigger('change');
                }
            });
        }
    });
    //wait for chart rendered completely
    setTimeout(function() {
        html2canvas(document.querySelector(".about_section.layout_padding")).then(canvas => {
            var imgData = canvas.toDataURL('image/png');
            var doc = new jsPDF("l", "mm", "a4");
            var width = doc.internal.pageSize.getWidth();
            var height = doc.internal.pageSize.getHeight();
            doc.addImage(imgData, 'JPEG', 0, 0, width, height);
            doc.save('bagan-export.pdf');
        });
    }, 1000);
</script>

</html>