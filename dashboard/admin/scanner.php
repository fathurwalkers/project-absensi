<?php
session_start();
// error_reporting(0);
require_once '../../engine/functions.php';

if (!isset($_SESSION["admin"])) {
    header("Location: ../../adminlogin.php");
    exit;
}

$dataadmin = $_SESSION["dataadmin"];
$datadetail = $_SESSION["datadetail"];

$dataguru = query("SELECT user.username, detail.nama, detail.nip, detail.alamat, detail.telepon, user.email
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id
                    LEFT JOIN jabatan ON user.jabatan_id = jabatan.id
                    WHERE jabatan_id = '2'");

// WHERE jabatan_id = '2'");


$datakepsek = query("SELECT user.username, detail.nama, detail.nip, detail.alamat, detail.telepon, user.email
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id
                    LEFT JOIN jabatan ON user.jabatan_id = jabatan.id
                    WHERE jabatan_id = '1'");
// $resultfetch = mysqli_fetch_assoc($dataguru);

$dataabsen = query("SELECT user.username, detail.nama, detail.nip, absensi.tanggal_absen
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id 
                    LEFT JOIN absensi ON user.detail_id = absensi.user_id
                    WHERE role_id = '1'");

?>
<?php
// if (!empty($_POST['qrcode'])) {
//     global $conn;
//     $qrcode = $_POST['qrcode'];
//     // $array = explode('|', $qrcode);
//     // $dataadmin = $_SESSION["dataadmin"];
//     // $datadetail = $_SESSION["datadetail"];
//     $nip = $datadetail["nip"];
//     $idadmin = $datadetail["id"];
//     $sqlmatch = "SELECT nip FROM detail WHERE nip = '$qrcode' LIMIT 1";
//     $match = mysqli_query($conn, $sqlmatch);

//     if (!mysqli_num_rows($match)) {
//         header("Location: ../../dashboard/admin/scanner.php");
//     } else {
//         $fetchqr = mysqli_fetch_assoc($match);
//         $_SESSION["cekqrcode"] =  $fetchqr;
//         header("Location: ../../dashboard/admin/scanner.php");
//         exit;
//     }


//     header("Location: ../../dashboard/admin/scanner.php");
//     // }
// }
if (!empty($_POST['qrcode']) && ($_POST['qrcode'] == $datadetail['nip'])) {
    // JADI DIDALAM SINI KITA INSERT DATA KE TABEL ABSEN ?
    global $conn;
    $id = $datadetail["id"];
    date_default_timezone_set("Asia/Makassar");
    $tanggal = date('Y-m-d H:i:s', strtotime('now'));
    $insert = "INSERT INTO absensi (user_id, tanggal_absen) VALUES ('$id', '$tanggal')";
    $query = mysqli_query($conn, $insert);
    $_SESSION["salah"] = $tanggal;
    header("Location: ../../dashboard/admin/admin.php");
    exit;
} else {
    $hehe = "Belum ada data";
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
    <style>
        .legal {
            display: none !important;
        }
    </style>
    <script src="js/jquery-3.4.1.min.js"></script>
    <!-- scanner -->
    <script src="../../engine/qrcode/scanner/vendor/modernizr/modernizr.js"></script>
    <script src="../../engine/qrcode/scanner/vendor/vue/vue.min.js"></script>
</head>

<body class="theme-green">
    <!-- Page Loader -->
    <!-- <div class="page-loader-wrapper">
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
    </div> -->
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
                        <?= $datadetail["nama"]; ?>
                    </div>
                    <div class="email"><?= $dataadmin["email"]; ?>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 698px;">
                    <ul class="list" style="overflow: hidden; width: auto; height: 698px;">
                        <li class="header">Menu Navigasi</li>

                        <!-- <li class="focusOnActivate">
                            <a href="detail" class="toggled waves-effect waves-block">
                                <i class="material-icons">person_pin</i>
                                <span>Informasi Pengguna</span>
                            </a>
                        </li> -->

                        <li class="focusOnActivate">
                            <a href="admin.php" class="toggled waves-effect waves-block">
                                <i class="material-icons">home</i>
                                <span>Home</span>
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

                        <li class="focusOnActivate">
                            <a href="detail_kepsek.php" class="toggled waves-effect waves-block">
                                <i class="material-icons">toc</i>
                                <span>Data Kepala Sekolah</span>
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
            <div class="container">
                <div class="col-lg-11 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                INFO
                            </h2>
                        </div>
                        <div class="body">
                            <h4>Ada absen yang sedang berlangsung</h4>
                            <p>terbuka untuk 5 menit lagi</p>
                            <p><a href="scanner.php" class="btn btn-primary">Klik disini untuk absen</a></p>
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
                                HISTORI ABSENSI
                            </h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>NIP</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php while ($absen = mysqli_fetch_assoc($dataabsen)) {
                                        ?>
                                            <tr>
                                                <td><?= $absen["nama"]; ?></td>
                                                <td><?= $absen["nip"]; ?></td>
                                                <td><?= $absen["tanggal_absen"]; ?></td>
                                                <td class="btn btn-success">Hadir
                                                </td>
                                                <td>
                                                    <a href="edit.php?id=<?= $kepsek["jabatan_id"]; ?>" class="btn btn-info">Edit</a><?= " "; ?>
                                                </td>
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
            <div class="container">
                <div class="col-lg-11 col-md-4 col-sm-6 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                Scanner
                            </h2>
                        </div>
                        <div class="body">
                            <center>
                                <!-- scan -->
                                <div id="app" class="row box">
                                    <div class="col-md-4 col-md-offset-4">
                                        <ul>
                                            <li v-if="cameras.length === 0" class="empty">No cameras found</li>
                                            <li v-for="camera in cameras">
                                                <span v-if="camera.id == activeCameraId" :title="formatName(camera.name)" class="active"><input type="radio" class="align-middle mr-1" checked> {{ formatName(camera.name) }}</span>
                                                <span v-if="camera.id != activeCameraId" :title="formatName(camera.name)">
                                                    <a @click.stop="selectCamera(camera)"> <input type="radio" class="align-middle mr-1">@{{ formatName(camera.name) }}</a>
                                                </span>
                                            </li>
                                        </ul>
                                        <div class="clearfix"></div>
                                        <!-- form scan -->
                                        <form action="" method="POST" id="myForm">
                                            <fieldset class="scheduler-border">
                                                <legend class="scheduler-border"> Masukkan NIP / Scan QR Code </legend>
                                                <input type="text" name="qrcode" id="code" autofocus>
                                            </fieldset>
                                        </form>
                                        <?php echo $hehe; ?>

                                    </div>
                                    <div class="col-xs-12 preview-container camera">
                                        <video id="preview" class="col-xs-12 thumbnail"></video>
                                    </div>
                                </div>
                                <!-- scanner -->
                            </center>
                        </div>
                    </div>
                </div>
            </div>
    </section>


    <script src="../../engine/qrcode/scanner/js/app.js"></script>
    <script src="../../engine/qrcode/scanner/vendor/instascan/instascan.min.js"></script>
    <script src="../../engine/qrcode/scanner/js/scanner.js"></script>



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