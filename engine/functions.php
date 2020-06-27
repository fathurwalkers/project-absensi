<?php

include 'qrcode/qrgenerator/lib/full/qrlib.php';

$dbhost = 'localhost';
$dbusername = 'root';
$dbpass = '';
$dbname = 'absensiapp';

$conn = mysqli_connect($dbhost, $dbusername, $dbpass, $dbname);

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


function registrasi($data)
{
    global $conn;

    $username       = strtolower(stripslashes($data["username"]));
    $namalengkap    = htmlspecialchars($data["namalengkap"]);
    $password       = mysqli_real_escape_string($conn, $data["password"]);
    $email          = htmlspecialchars($data["email"]);
    $nip            = htmlspecialchars($data["nip"]);
    $alamat         = htmlspecialchars($data["alamat"]);
    $telepon        = htmlspecialchars($data["telepon"]);
    // $file = "232323.png";
    $qr = "erer";

    $checkusername = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($checkusername)) {
        echo "<script>
                alert('Username sudah terdaftar');
            </script>";

        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO user VALUES(null, '$username', '$password', '$email', '$namalengkap', '$nip', '$qr', '$alamat', '$telepon')";

    mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

// function loginadmin($data)
// {
//     global $conn;

//     $query = "SELECT admin"
// }
