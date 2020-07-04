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

function tambahdata($data)
{
    global $conn;

    $username_guru       = strtolower(stripslashes($data["usernameguru"]));
    $password_guru       = mysqli_real_escape_string($conn, $data["passwordguru"]);
    $email_guru          = htmlspecialchars($data["emailguru"]);

    $namalengkap_guru    = htmlspecialchars($data["namalengkapguru"]);
    $nip_guru            = htmlspecialchars($data["nipguru"]);
    $telepon_guru        = htmlspecialchars($data["teleponguru"]);
    $alamat_guru         = htmlspecialchars($data["alamatguru"]);
    $jabatan_guru        = $data["jabatanguru"];
    $role_guru           = $data["roleguru"];
    $qr_guru             = strtolower(stripslashes($data["usernameguru"]));
    $qr_guru            .= ".png";

    // $id_detailnew = 15;

    $cek_username = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username_guru'");

    if (mysqli_fetch_assoc($cek_username)) {
        echo "<script>
            alert('Username yang anda pilih sudah ada!');
            </script>";
        return false;
    }


    $query_detail = "INSERT INTO detail (nama, nip, alamat, telepon, qrcode) 
                    VALUES ('$namalengkap_guru', '$nip_guru', '$alamat_guru', '$telepon_guru', '$qr_guru')";
    $insert_detail = mysqli_query($conn, $query_detail);

    $new_data_id = mysqli_insert_id($conn);

    $query_user  = "INSERT INTO user (username, password, email, detail_id, jabatan_id, role_id) VALUES ('$username_guru', '$password_guru', '$email_guru', '$new_data_id', '$jabatan_guru', '$role_guru')";

    $insert_user = mysqli_query($conn, $query_user);

    return mysqli_affected_rows($conn);
}
