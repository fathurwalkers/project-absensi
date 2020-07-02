<?php
session_start();
require_once __DIR__ . '/../../vendor/autoload.php';
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


$mpdf = new \Mpdf\Mpdf();
$html = '
<html>
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
    <link rel="stylesheet" href="print.css">
    </head>
    <body>
    <center>
    <br>
    <h1>Histori Absensi</h1>
    <br>
<table border="1" cellpadding="10" cellspacing="0">
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
foreach ($dataabsen as $absen) {
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
$mpdf->Output('laporan-absensi.pdf', \Mpdf\Output\Destination::INLINE);
