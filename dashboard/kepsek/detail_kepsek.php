<?php
session_start();
require_once '../../engine/functions.php';

if (!isset($_SESSION["login"])) {
    header("Location: ../../login.php");
    exit;
}

$kepsekdata = $_SESSION["kepsekdata"];

if (isset($_POST["generate"])) {

    //$text = $_POST[];

    global $kepsekdata;

    $path = '../../assets/img/qrimage/';
    $file = $path . $kepsekdata["username"] . ".png";

    $id_kepsek = $kepsekdata["id_kepsek"];

    $qrtext = $_POST["qrkepsek"];

    $generated = QRcode::png($qrtext, $file, 'L', 10, 2);

    // $sqlinsert = "UPDATE tbl_kepsek SET 'qrcode' = '$file' WHERE 'id_kepsek' = '$id_kepsek'";

    // mysqli_query($conn, $sqlinsert);
}

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

    <!-- BOOTSTRAP -->
    <style>
        .legal {
            display: none !important;
        }

        .sidebar .user-info {
            padding: 13px 15px 12px 15px;
            white-space: nowrap;
            position: relative;
            border-bottom: 1px solid #e9e9e9;
            background-color: green;
            height: 135px;
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

                    <li class="pull-right">
                        <a href="javascript:void(0);" class="js-right-sidebar" data-close="true"><i class="material-icons">more_vert</i></a>
                    </li>
                    <!-- LOGOUT -->
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
                    <img src="https://images.vexels.com/media/users/3/147101/isolated/preview/b4a49d4b864c74bb73de63f080ad7930-instagram-profile-button-by-vexels.png" width="48" height="48" alt="User" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <a href="profile.php" class=""><?= $kepsekdata["nama"]; ?></a>
                    </div>
                    <div class="email"><?= $kepsekdata["email"]; ?></div>

                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 698px;">
                    <ul class="list" style="overflow: hidden; width: auto; height: 698px;">
                        <li class="header">Menu Navigasi</li>

                        <li class="focusOnActivate">
                            <a href="detail.php" class="toggled waves-effect waves-block" name="detail">
                                <i class="material-icons">info</i>
                                <span>Profile</span>
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
                                <i class="material-icons">date_range</i>
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
                <h2>INFORMASI PENGGUNA</h2>
            </div>
        </div>
        <!-- USER DETAIL -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header bg-green">
                    <h2>
                        <?= "Detail user" ?>
                    </h2>
                </div>
                <div class="body">
                    <h5>Nama Lengkap : <?= $kepsekdata["nama"]; ?></h5>
                    <h5>NIP : <?= $kepsekdata["nip"]; ?></h5>
                    <h5>Email : <?= $kepsekdata["email"]; ?></h5>
                    <h5>Nomor Telepon : <?= $kepsekdata["telepon"]; ?></h5>
                    <h5>Alamat : <?= $kepsekdata["alamat"]; ?></h5>
                </div>
            </div>
        </div>

        <!-- QR CODE SECTION -->
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
            <div class="card">
                <div class="header bg-green">
                    <h2>
                        Buat QRCODE
                    </h2>
                </div>
                <div class="body">
                    <center>
                        <img src="../../assets/img/qrimage/<?= $kepsekdata["qrcode"] . ".png"; ?>" width="250px">

                        <form action="" method="post">
                            <input type="hidden" name="qrkepsek" value="<?= $kepsekdata["nip"]; ?>">
                            <br>
                            <button type="submit" name="generate" class="btn btn-success">GENERATE</button>
                        </form>

                    </center>
                </div>
            </div>
        </div>

        <!-- Exportable Table -->
        <!-- #END# Exportable Table -->
        <!-- Exportable Table -->
        <!-- #END# Exportable Table -->
        </div>
    </section>
    <!-- JS -->
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