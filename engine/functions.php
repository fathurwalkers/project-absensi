<?php

include 'qrcode/qrgenerator/lib/full/qrlib.php';

$dbhost = 'localhost';
$dbusername = 'root';
$dbpass = '';
$dbname = 'absensiproject';

$conn = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);


date_default_timezone_set("Asia/Makassar");


function query($query)
{
    global $conn;

    $result = mysqli_query($conn, $query);

    // $rows = [];
    // while ($row = mysqli_fetch_assoc($result)) {
    //     $rows = $row;
    // }
    return $result;
}


// function registrasi($data)
// {
//     global $conn;

//     $username       = strtolower(stripslashes($data["username"]));
//     $namalengkap    = htmlspecialchars($data["namalengkap"]);
//     $password       = mysqli_real_escape_string($conn, $data["password"]);
//     $email          = htmlspecialchars($data["email"]);
//     $nip            = htmlspecialchars($data["nip"]);
//     $alamat         = htmlspecialchars($data["alamat"]);
//     $telepon        = htmlspecialchars($data["telepon"]);
//     // $file = "232323.png";
//     $qr = "erer";

//     $checkusername = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

//     if (mysqli_fetch_assoc($checkusername)) {
//         echo "<script>
//                 alert('Username sudah terdaftar');
//             </script>";

//         return false;
//     }

//     $password = password_hash($password, PASSWORD_DEFAULT);

//     $sql = "INSERT INTO user VALUES(null, '$username', '$password', '$email', '$namalengkap', '$nip', '$qr', '$alamat', '$telepon')";

//     mysqli_query($conn, $sql);

//     return mysqli_affected_rows($conn);
// }


// if (isset($_POST["generate"])) {

//     //$text = $_POST[];

//     $path = '../assets/img/qrimage/';
//     $file = $path . uniqid() . ".png";

//     $qrtext = $_POST["id_kepsek"];

//     $generated = QRcode::png($qrtext, $file, 'L', 10, 2);

//     echo "<center><img src='" . $file . "'></center>";
// }


// function loginadmin($data)
// {
//     global $conn;

//     $query = "SELECT admin"
// }
