<?php include 'headerhome.php'; ?>
<div class="banner_section layout_padding">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container">
                    <p class="banner_text mb-4">Selamat Datang Di Website</p>
                    <h1 style="font-size: 40px;" class="banner_taital">Bagian Organisasi dan Kepegawaian Sekretariat Daerah Kota Langsa</h1>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <p class="banner_text mb-4">Selamat Datang Di Website</p>
                    <h1 style="font-size: 40px;" class="banner_taital">Bagian Organisasi dan Kepegawaian Sekretariat Daerah Kota Langsa</h1>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container">
                    <p class="banner_text mb-4">Selamat Datang Di Website</p>
                    <h1 style="font-size: 40px;" class="banner_taital">Bagian Organisasi dan Kepegawaian Sekretariat Daerah Kota Langsa</h1>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="about_section layout_padding">
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
<div class="about_section layout_padding">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="about_taital_main">
                    <h1 class="about_taital">Kata Sambutan</h1>
                    <p class="about_text">Assalamu’alaikum Wr. Wb
                        Alhamdulillahi Rabbil Aalamin
                        Washshalaatu Wassalaamu ‘alaa Asyrafil Albiyaa’i Wal Mursaliin
                        Wa’alaa Aalihi wa shahbihi Ajma’iin</p>
                    <p class="about_text mb-2">Alhamdulillah, Puji Syukur kepada Allah SWT, yang telah memberikan karunia-Nya kepada kita semua berupa nikmat iman dan Islam.
                        Shalawat beriring salam tak bosan-bosannya kita sampaikan kepangkuan baginda Rasulullah Nabi Besar Muhammad SAW, Para sahabat dan keluarga beliau serta pengikutnya yang istiqamah.</p>
                    <p class="about_text mb-2">Perkembangan teknologi informasi serta komunikasi yang semakin cepat yang dibarengi dengan semakin kritisnya sikap masyarakat terhadap berbagai pelaksanaan dan hasil pembangunan yang sedang dilaksanakan telah mendorong pemerintah pusat dan daerah untuk melaksanakan pemerintahan secara efektif, efisien dan transparan. Sebagai sebuah jawaban terhadap tuntutan tersebut adalah upaya untuk menyelenggarakan pemerintahan yang berbasis elektronik (digital electronic). Pemerintah yang berbasis elektronik atau yang kita kenal dengan electronic government (e-government) diharapkan akan memberikan dampak terhadap peningkatan efisiensi pada jalur informasi. Dengan adanya peningkatan informasi ini nantinya masyarakat umum serta pelaku bisnis akan mudah mengakses berbagai informasi yang mereka butuhkan berbagai hal yang menyangkut Kota Langsa.
                    </p>
                    <p class="about_text mb-2">Langkah ini akan simultan dengan pembaikan penyelenggaraan dan pengelolaan pemerintah secara lebih baik sebagai langkah awal menuju terciptanya pemerintahan yang Good Governance. Kita berharap nantinya masyarakat serta pelaku bisnis akan dapat melihat berbagai perkembangan pembangunan serta potensi bisnis di daerah ini.
                    </p>
                    <p class="about_text mb-2">Wa billahittaufiq walhidayah assalamu’alaikum Wr. Wb
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'footerhome.php'; ?>
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

    kasubbag.forEach(function(kasubbag) {
        var middleIndex = Math.floor(kasubbag.children.length / 2);
        kasubbag.children[middleIndex].children = kasubbag.children[middleIndex].children || [];
        kasubbag.children[middleIndex].children = kasubbag.children[middleIndex].children.concat(analisis_pelaksana);
    });
    
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
</script>