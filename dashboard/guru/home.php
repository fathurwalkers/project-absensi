<?php
session_start();
require_once '../../engine/functions.php';

if (!isset($_SESSION["guru"])) {
    header("Location: ../../index.php");
    exit;
}

$guru = $_SESSION["dataguru"];
$datadetailguru = $_SESSION["datadetail"];

$dataguru = query("SELECT user.username, detail.nama, detail.nip, detail.alamat, detail.telepon, user.email
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id
                    LEFT JOIN jabatan ON user.jabatan_id = jabatan.id
                    WHERE jabatan_id = '2'");


$datakepsek = query("SELECT user.username, detail.nama, detail.nip, detail.alamat, detail.telepon, user.email
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id
                    LEFT JOIN jabatan ON user.jabatan_id = jabatan.id
                    WHERE jabatan_id = '1'");
// $resultfetch = mysqli_fetch_assoc($dataguru);

$dataabsen = query("SELECT user.username, detail.nama, detail.nip, absensi.tanggal_absen
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id 
                    LEFT JOIN absensi ON user.id = absensi.user_id
                    WHERE user.id = '{$guru['id']}'");

$dataabsen2 = query("SELECT user.username, detail.nama, detail.nip, absensi.tanggal_absen
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id 
                    LEFT JOIN absensi ON user.id = absensi.user_id
                    WHERE user.id = '{$guru['id']}'");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <title>Aplikasi E-Absen Guru</title>
    <!-- Favicon-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link rel="icon" href="favicon.ico" type="image/x-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Core Css -->
    <link href="../../vendor/bsb/plugins/bootstrap/css/bootstrap.css" rel="stylesheet" />

    <!-- Waves Effect Css -->
    <link href="../../vendor/bsb/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../vendor/bsb/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../vendor/bsb/css/style.css" rel="stylesheet" />

    <!-- Admin../../vendor/bsb Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../vendor/bsb/css/themes/all-themes.css" rel="stylesheet" />

    <!-- <script src="../../vendor/rasterizejs/src/rasterize.js"></script>
    <script src="../../vendor/rasterizejs/src/util.js"></script>

    <script src="../../vendor/jspdfmaster/dist/jspdf.min.js"></script> -->

    <style>
        .legal {
            display: none !important;
        }
    </style>

</head>

<body class="theme-green">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING..." />
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">E-ABSEN #TBR</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->
                    <li>
                        <a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a>
                    </li>
                    <!-- #END# Call Search -->

                    <li>
                        <a href="logout.php" class="js-search" class="btn btn-primary">LOGOUT</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="https://cdn.iconscout.com/icon/free/png-256/user-avatar-contact-portfolio-personal-portrait-profile-1-5182.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?= $datadetailguru["nama"]; ?>
                    </div>
                    <div class="email"><?= $guru["email"]; ?>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 698px;">
                    <ul class="list" style="overflow: hidden; width: auto; height: 698px;">
                        <li class="header">Menu Navigasi</li>

                        <li class="focusOnActivate">
                            <a href="detail_guru.php" class="toggled waves-effect waves-block">
                                <i class="material-icons">person_pin</i>
                                <span>Informasi Pengguna</span>
                            </a>
                        </li>

                        <li class="focusOnActivate">
                            <a href="" class="toggled waves-effect waves-block">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                        </li>

                    </ul>
                    <div class="slimScrollBar" style="background: rgba(0, 0, 0, 0.5); width: 4px; position: absolute; top: 0px; opacity: 0.4; display: none; border-radius: 0px; z-index: 99; right: 1px; height: 523.875px;"></div>
                    <div class="slimScrollRail" style="width: 4px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(51, 51, 51); opacity: 0.2; z-index: 90; right: 1px;"></div>
                </div>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017
                    <a href="javascript:void(0);">Admin../../vendor/bsb - Material Design</a>.
                </div>
                <div class="version"><b>Version: </b> 1.0.5</div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <!-- Widgets -->
                <div class="container">
                    <div class="col-lg-11 col-md-4 col-sm-6 col-xs-12">
                        <div class="card">
                            <div class="header bg-green">
                                <h2>
                                    INFO
                                </h2>
                            </div>
                            <div class="body">
                                <h4>INFORMASI ABSENSI</h4>
                                <!-- <p>Absensi terbuka pada jam 06:00 / 08:00</p> -->
                                <p><button onclick="window.location.href='scanner.php'" class="btn btn-primary" id="cekaktif">
                                        Klik disini untuk absen
                                    </button></p>
                            </div>
                        </div>
                    </div>
                </div>
                <h2>DASHBOARD</h2>
            </div>



            <!-- Exportable Table -->

            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="printcontainer">
                            <div class="header">

                                <h2>
                                    HISTORY ABSENSI
                                </h2>
                            </div>
                            <div class="body">
                                <!-- <button onclick="exportdiv()" class="btn btn-info">
                                    Print PDF
                                </button> -->

                                <a href="cetak.php" target="_blank" class="btn btn-success">
                                    Cetak PDF
                                </a>

                                <br>
                                <br>
                                <div class="table-responsive">
                                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No</th>
                                                <th>Nama</th>
                                                <th>NIP</th>
                                                <th>Tanggal / Waktu</th>
                                                <th class="text-center">Keterangan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i = 1;
                                            while ($absenguru = mysqli_fetch_assoc($dataabsen)) { ?>
                                                <tr>
                                                    <td class="text-center"><?= $i++; ?></td>
                                                    <td><?= $absenguru["nama"]; ?></td>
                                                    <td><?= $absenguru["nip"]; ?></td>
                                                    <td><?= $absenguru["tanggal_absen"]; ?></td>
                                                    <td class="text-center">Hadir</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- #END# Exportable Table -->
        </div>

    </section>

    <!-- Jquery Core Js -->
    <script src="../../vendor/bsb/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../vendor/bsb/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Select Plugin Js -->
    <script src="../../vendor/bsb/plugins/bootstrap-select/js/bootstrap-select.js"></script>

    <!-- Slimscroll Plugin Js -->
    <script src="../../vendor/bsb/plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../vendor/bsb/plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="../../vendor/bsb/plugins/jquery-countto/jquery.countTo.js"></script>

    <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <script src="https://unpkg.com/jspdf@latest/dist/jspdf.min.js"></script>

    <!-- Custom Js -->
    <script src="../../vendor/bsb/js/admin.js"></script>

    <script>
        setInterval(function() {
            let currentTime = new Date().toLocaleTimeString("id-ID", {
                timeZone: "Asia/Makassar"
            });
            let minTIme = "06.00";
            let maxTime = "24.00";
            if (currentTime >= minTIme && currentTime <= maxTime) {
                document.getElementById("cekaktif").disabled = false;
            } else {
                document.getElementById("cekaktif").disabled = true;
            }
        }, 1000);
    </script>

    <script>
        // function exportpdf() {
        //     var pdfp = new jsPDF("p", "pt", "a4");
        //     pdfp.addHTML($('#print2'), 15, 15, function() {
        //         pdfp.save('laporan-absen-guru.pdf');
        //     });
        // }

        // function exportpdf() {
        //     var pdfp = new jsPDF("p", "pt", "a4");
        //     pdfp.addHTML(document.getElementById('#printjs'), 15, 15);
        //     pdfp.save('laporan-absen-guru.pdf');
        // }

        // function exportpdf() {
        //     var pdfp = new jsPDF("p", "pt", "a4");
        //     pdfp.fromHTML($('#printjs'), 15, 15);
        //     pdfp.save('laporan-absen-guru.pdf');
        // }
    </script>
</body>

</html>