<?php

require '../engine/functions.php';

// $sqlquery = "SELECT * FROM tbl_absen INNER JOIN user ON 'tbl_absen.id_user'='user.id_user'";
$sqlquery = "SELECT id_user,nama,nip FROM tbl_absen LEFT JOIN user ON tbl_absen.id_user = user.id";

$relasi = mysqli_query($conn, $sqlquery);

$coba = mysqli_fetch_assoc($relasi, MYSQLI_ASSOC);
// $coba = mysqli_fetch_assoc($relasi, MYSQLI_ASSOC);

// $coba = mysqli_fetch_object($relasi);
// SELECT col FROM absen LEFT JOIN user ON absen.user_id = user.id
?>
<?php
var_dump($coba);
echo "<br>";
// echo $coba["nama"];
// echo "<br>";
// echo $coba["nip"];
echo "<br>";
echo "<br>";
while ($coba = mysqli_fetch_assoc($relasi)) {
    echo $coba['nama'];
    echo "<br>";
    echo $coba['nip'];
    echo "<br>";
    echo "<br>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
</body>

</html>