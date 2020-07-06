<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>TBR Calculator</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <style>
        .form-control {
            width: 15%;
            height: 10%;
            text-align: center;
            font-size: 20px;
        }

        .custom-select {
            width: 5%;
            height: 1%;
            text-align: center;
        }

        body {
            font-size: 20px;
        }

        h2 {
            font-size: 50px;
            font-weight: bold;
            color: #00E742;
            stroke: black;
        }
    </style>
</head>

<body>
    <center>
        <br>
        <br>
        <h1>Silahkan Jumlahkan sesuatu :</h1>
        <br>
        <form method="post">
            <input type="text" name="numb1" class="form-control"><br>
            <input type="text" name="numb2" class="form-control">
            <br>
            <select name="operator" id="" class="custom-select">
                <option>Kosong</option>
                <option>Tambah</option>
                <option>Kurang</option>
                <option>Kali</option>
                <option>Bagi</option>
            </select>
            <button type="submit" name="submit" value="submit" class="btn btn-success">Calculate</button>
        </form>
        <br>
        <h4>Hasil :<h4><br>
                <h2>

                    <?php

                    if (isset($_POST['submit'])) {
                        $result1 = $_POST['numb1'];
                        $result2 = $_POST['numb2'];
                        $operator = $_POST['operator'];
                        switch ($operator) {
                            case 'Kosong':
                                echo "You need to select any operator";
                                break;
                            case 'Tambah':
                                echo $result1 + $result2;
                                break;
                            case 'Kurang':
                                echo $result1 - $result2;
                                break;
                            case 'Kali':
                                echo $result1 * $result2;
                                break;
                            case 'Bagi':
                                echo $result1 / $result2;
                                break;
                        }
                    }
                    ?>
                </h2>
    </center>
</body>

</html>