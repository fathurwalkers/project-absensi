<?php

require_once 'engine/functions.php';

if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Username berhasil terdaftar');
             </script>";
    } else {
        echo mysqli_error($conn);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test register</title>
    <style>
        .form-registrasi {
            margin: 10px;
            padding-bottom: 1%;
            display: block;


        }
    </style>
</head>

<body>
    <div class="form-registrasi">

        <form action="" method="post">

            <br>
            Nama Lengkap :
            <br>
            <input type="text" name="namalengkap">

            <br>
            username :
            <br>
            <input type="text" name="username">

            <br>
            Password :
            <br>
            <input type="password" name="password">


            <br>
            Email :
            <br>
            <input type="text" name="email">

            <br>
            NIP :
            <br>
            <input type="text" name="nip">

            <br>
            Alamat :
            <br>
            <input type="text" name="alamat">

            <br>
            Telepon :
            <br>
            <input type="text" name="telepon">

            <br>
            <br>
            <button type="submit" name="register">Register</button>

        </form>
    </div>
</body>

</html>