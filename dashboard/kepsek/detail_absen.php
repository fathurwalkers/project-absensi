<?php
session_start();
require_once '../../engine/functions.php';

if (!isset($_SESSION["kepsek"])) {
    header("Location: ../../login.php");
    exit;
}

$datakepsek = $_SESSION["datakepsek"];
$datadetail = $_SESSION["datadetail"];

$idkepsekonly = $datakepsek['id'];

$dataguru = query("SELECT user.username, detail.nama, detail.nip, detail.alamat, detail.telepon, user.email
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id
                    LEFT JOIN jabatan ON user.jabatan_id = jabatan.id
                    WHERE jabatan_id = '2'");


$datalistkepsek = query("SELECT user.username, detail.nama, detail.nip, detail.alamat, detail.telepon, user.email
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id
                    LEFT JOIN jabatan ON user.jabatan_id = jabatan.id
                    WHERE jabatan_id = '1'");
// $resultfetch = mysqli_fetch_assoc($dataguru);

$dataabsen = query("SELECT user.username, detail.nama, detail.nip, absensi.tanggal_absen
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id 
                    LEFT JOIN absensi ON user.id = absensi.user_id WHERE role_id = '2' ORDER BY tanggal_absen DESC");

$dataabsenonly = query("SELECT user.username, detail.nama, detail.nip, absensi.tanggal_absen
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id 
                    LEFT JOIN absensi ON user.id = absensi.user_id  
                    WHERE role_id = '3' ORDER BY tanggal_absen DESC");

$dataabsenonly2 = query("SELECT user.username, detail.nama, detail.nip, absensi.tanggal_absen
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id 
                    LEFT JOIN absensi ON user.id = absensi.user_id  
                    WHERE user.id = '$idkepsekonly' ORDER BY tanggal_absen DESC");

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <title>Aplikasi E-Absen Guru</title>
    <!-- Favicon-->
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

    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="index.html">E-ABSEN</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
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
                        <?= $datadetail["nama"]; ?>
                    </div>
                    <div class="email"><?= $datakepsek["email"]; ?>
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
                            <a href="home.php" class="toggled waves-effect waves-block">
                                <i class="material-icons">home</i>
                                <span>Home</span>
                            </a>
                        </li>

                        <li class="focusOnActivate">
                            <a href="detail_kepsek.php" class="toggled waves-effect waves-block">
                                <i class="material-icons">person_pin</i>
                                <span>Informasi Pengguna</span>
                            </a>
                        </li>

                        <li class="focusOnActivate">
                            <a href="detail_absen.php" class="toggled waves-effect waves-block">
                                <i class="material-icons">analytics</i>
                                <span>History Absensi</span>
                            </a>
                        </li>

                        <li class="focusOnActivate">
                            <a href="detail_guru.php" class="toggled waves-effect waves-block">
                                <i class="material-icons">toc</i>
                                <span>Data Guru</span>
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

                <h2>DASHBOARD</h2>
            </div>


            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                HISTORI ABSENSI SAYA
                            </h2>
                        </div>
                        <div class="body">

                            <a href="cetak3.php" target="_blank" class="btn btn-success">
                                Cetak PDF
                            </a>
                            <br>
                            <br>


                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Tanggal/Waktu</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no11 = 1; ?>
                                        <?php while ($absenonly = mysqli_fetch_assoc($dataabsenonly2)) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no11++; ?></td>
                                                <td><?= $absenonly["nama"]; ?></td>
                                                <td><?= $absenonly["nip"]; ?></td>
                                                <td><?= $absenonly["tanggal_absen"]; ?></td>
                                                <td>Hadir</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->



            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                HISTORY ABSEN KEPALA SEKOLAH
                            </h2>
                        </div>
                        <div class="body">

                            <a href="cetak.php" target="_blank" class="btn btn-success">
                                Cetak PDF
                            </a>
                            <br>
                            <br>


                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Tanggal/Waktu</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no2 = 1; ?>
                                        <?php while ($absenonly = mysqli_fetch_assoc($dataabsenonly)) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no2++; ?></td>
                                                <td><?= $absenonly["nama"]; ?></td>
                                                <td><?= $absenonly["nip"]; ?></td>
                                                <td><?= $absenonly["tanggal_absen"]; ?></td>
                                                <td>Hadir</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->


            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                HISTORY ABSEN GURU
                            </h2>
                        </div>
                        <div class="body">
                            <a href="cetak2.php" target="_blank" class="btn btn-success">
                                Cetak PDF
                            </a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Tanggal/Waktu</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1; ?>
                                        <?php while ($absen = mysqli_fetch_assoc($dataabsen)) { ?>
                                            <tr>
                                                <td class="text-center"><?= $no++; ?></td>
                                                <td><?= $absen["nama"]; ?></td>
                                                <td><?= $absen["nip"]; ?></td>
                                                <td><?= $absen["tanggal_absen"]; ?></td>
                                                <td>Hadir</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
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

    <!-- Custom Js -->
    <script src="../../vendor/bsb/js/admin.js"></script>
    <script src="../../vendor/bsb/js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="../../vendor/bsb/js/demo.js"></script>
</body>

</html>