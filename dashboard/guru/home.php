<?php
session_start();
require_once '../../engine/functions.php';

if (!isset($_SESSION["guru"])) {
    header("Location: ../../loginguru.php");
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

                        <li class="focusOnActivate">
                            <a href="" class="toggled waves-effect waves-block">
                                <i class="material-icons">edit</i>
                                <span>Buat Absen</span>
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
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">playlist_add_check</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TASKS</div>
                            <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">help</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW TICKETS</div>
                            <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">forum</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW COMMENTS</div>
                            <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person_add</i>
                        </div>
                        <div class="content">
                            <div class="text">NEW VISITORS</div>
                            <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            HISTORY ABSENSI
                        </h2>
                    </div>
                    <div class="body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                <thead>
                                    <tr>
                                        <th>Nama Guru</th>
                                        <th>NIP</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Telepon</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>

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