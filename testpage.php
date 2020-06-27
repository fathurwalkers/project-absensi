<?php
session_start();
include 'engine/functions.php';

if (!isset($_SESSION["loginadmin"])) {
    header("Location: adminlogin.php");
    exit;
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
    <?= var_dump($_SESSION["admindata"]); ?>
</body>

</html>