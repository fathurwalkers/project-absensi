<?php
session_start();
require_once '../../engine/functions.php';

if (!isset($_SESSION["admin"])) {
    header("Location: ../../adminlogin.php");
    exit;
}

$now = date_create()->format('d-m-Y');

$dataadmin = $_SESSION["dataadmin"];
$datadetail = $_SESSION["datadetail"];

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

$datakepsek2 = query("SELECT user.username, detail.nama, detail.nip, detail.alamat, detail.telepon, user.email
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id
                    LEFT JOIN jabatan ON user.jabatan_id = jabatan.id
                    WHERE jabatan_id = '1' LIMIT 1");

// $resultfetch = mysqli_fetch_assoc($dataguru);
$dataabsen = query("SELECT user.username, detail.nama, detail.nip, absensi.tanggal_absen
                    FROM user
                    LEFT JOIN detail ON user.detail_id = detail.id 
                    LEFT JOIN absensi ON user.id = absensi.user_id ORDER BY tanggal_absen DESC");

?>
<!DOCTYPE html>
<html lang="en" moznomarginboxes mozdisallowselectionprint>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <style type="text/css" media="print">
        @print {
            @page {
                size: A4
            }

            @page :footer {
                display: none;
            }

            @page :header {
                display: none;
            }
        }

        .btn {
            display: none;
        }
    </style>

    <title>Print Documents</title>
</head>

<body>

    <div class="text-center mb-4 mt-3">
        <h2>LAPORAN ABSENSI<br>
            SMA NEGERI 1 BUTON
        </h2>
    </div>

    <div class="container">
        <button onclick="window.print();" class="btn btn-primary mb-4" id="print">Cetak</button>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">NIP</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col" class="text-center">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                while ($absen = mysqli_fetch_assoc($dataabsen)) {
                ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $absen["nama"]; ?></td>
                        <td><?= $absen["nip"]; ?></td>
                        <td><?= $absen["tanggal_absen"]; ?></td>
                        <td class="text-center">
                            Hadir
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div class="float-right">
            <table class="">
                <tbody>
                    <tr>
                        <td>Baubau, <?= date('d F Y', strtotime($now)) ?></td>
                    </tr>
                    <tr>
                        <td>Kepala Sekolah</td>
                    </tr>
                    <?php while ($absensi2 = mysqli_fetch_assoc($datakepsek2)) { ?>
                        <tr>
                            <td style="padding-top: 2.5rem !important;">
                                <?= $absensi2["nama"]; ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>




    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>