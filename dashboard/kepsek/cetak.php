<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
require_once '../../engine/functions.php';

if (!isset($_SESSION["kepsek"])) {
    header("Location: ../../login.php");
    exit;
}

$now = date_create()->format('d-m-Y');

$datakepsek = $_SESSION["datakepsek"];
$datadetail = $_SESSION["datadetail"];

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


$mpdf = new \Mpdf\Mpdf();
$html = '
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <link rel="stylesheet" href="print.css">
    </head>
    <body>
    <center>
    <br>
    <h1>LAPORAN ABSENSI<br>
    SMA NEGERI 1 BUTON
    </h1>
    <p>
    Baubau, ' . date('d F Y', strtotime($now)) . '
    </p>
    <br>
<table class="pertama" border="1" cellpadding="10" cellspacing="0">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>NIP</th>
        <th>Tanggal / Waktu</th>
        <th>Keterangan</th>
    </tr>
</thead>';
$i = 1;
foreach ($dataabsenonly as $absen) {
    $html .= '<tr>
    <td>' . $i++ . '</td>
    <td>' . $absen["nama"] . '</td>
    <td>' . $absen["nip"] . '</td>
    <td>' . $absen["tanggal_absen"] . '</td>
    <td>Hadir</td>
    </tr>';
}

$html .= '</table></center></body></html>';

$mpdf->WriteHTML($html);
$mpdf->Output('laporan-absensi-KEPALA_SEKOLAH-' . $now . '.pdf', \Mpdf\Output\Destination::INLINE);
