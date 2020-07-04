<?php
session_start();
include 'engine/functions.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM user WHERE username = '{$username}' AND password = '$password' AND role_id = '3' LIMIT 1";

    $run = mysqli_query($conn, $query);

    if (!$run) {
        echo "password username salah";
    } else {
        $result = mysqli_fetch_assoc($run);

        if (!empty($result)) {
            $sqlquery = "SELECT * FROM detail WHERE id = '{$result['detail_id']}'";
            $ambildatadetail = mysqli_query($conn, $sqlquery);
            $row = mysqli_fetch_assoc($ambildatadetail);
            $_SESSION['datadetail'] = $row;
            $_SESSION["datakepsek"] = $result;
            $_SESSION["kepsek"] = true;
            header("Location: dashboard/kepsek/home.php");
            exit;
        }
    }
}

?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style type="text/css">
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }

        .wave {
            position: fixed;
            height: 100%;
            left: 0;
            bottom: 0;
            z-index: -1;
        }

        .container {
            width: 100vw;
            height: 100vh;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            grid-gap: 7rem;
            padding: 0 2rem;
        }

        .img {
            display: flex;
            justify-content: flex-end;
            align-items: center;
        }

        .img img {
            width: 500px;
        }

        .login-container {
            display: flex;
            align-items: center;
            text-align: center;
        }

        form {
            width: 360px;
        }

        .avatar {
            width: 100px;
        }

        form h2 {
            font-size: 2.9rem;
            text-transform: uppercase;
            margin: 15px 0;
            color: #037971;
        }

        .input-div {
            position: relative;
            display: grid;
            grid-template-columns: 7% 93%;
            margin: 25px 0;
            padding: 5px;
            border-bottom: 2px solid #037971;
        }

        .input-div:after,
        .input-div:before {
            content: '';
            position: absolute;
            bottom: -2px;
            width: 0;
            height: 2px;
            background-color: #38d39f;
            transition: .3s;
        }

        .input-div:after {
            right: 50%;
        }

        .input-div:before {
            left: 50%;
        }

        .input-div.focus .i i {
            color: #38d39f;
        }

        .input-div.focus div h5 {
            top: -5px;
            font-size: 15px;
            color: #38d39f;
        }

        .input-div.focus:after,
        .input-div.focus:before {
            width: 50%;
        }

        .input-div.one {
            margin-top: 0;
        }

        .input-div.two {
            margin-bottom: 4px;
        }

        .i {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .i i {
            color: #037971;
            transition: .3s;
        }

        .input-div>div {
            position: relative;
            height: 45px;
        }

        .input-div>div h5 {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #2b817b;
            font-size: 18px;
            transition: .3s;
        }

        .input {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border: none;
            outline: none;
            background: none;
            padding: 0.5rem 0.7rem;
            font-size: 1.2rem;
            font-family: 'Poppins', sans-serif;
            color: #555;
        }

        a {
            display: block;
            text-align: right;
            text-decoration: none;
            color: #999;
            font-size: 0.9rem;
            transition: .3s;
        }

        a:hover {
            color: #037971;
        }

        .btn {
            display: block;
            width: 100%;
            height: 50px;
            border-radius: 25px;
            margin: 1rem 0;
            font-size: 1.2rem;
            outline: none;
            border: none;
            background-image: linear-gradient(to right, #32be8f, #38d39f, #32be8f);
            cursor: pointer;
            color: #fff;
            text-transform: uppercase;
            font-family: 'Poppins', sans-serif;
            background-size: 200%;
            transition: .5s;
        }

        .btn:hover {
            background-position: right;
        }

        .links a:nth-child(1) {
            float: left;
        }

        .links a:nth-child(2) {
            float: right;
        }

        @media screen and (max-width: 1050px) {
            .container {
                grid-gap: 5rem;
            }
        }

        @media screen and (max-width: 1000px) {
            form {
                width: 290px;
            }

            form h2 {
                font-size: 2.4rem;
                margin: 8px;
            }

            .img img {
                width: 400px;
            }
        }

        @media screen and (max-width: 900px) {
            .img {
                display: none;
            }

            .container {
                grid-template-columns: 1fr;
            }

            .wave {
                display: none;
            }

            .login-container {
                justify-content: center;
            }
        }
    </style>
</head>

<body>
    <script src="https://kit.fontawesome.com/ab00d86059.js" crossorigin="anonymous"></script>
    <img class="wave" src="https://raw.githubusercontent.com/Jhonierpc/WebDevelopment/master/Login%20Responsive/img/wave.png" alt="">
    <div class="container">
        <div class="img">
            <img src="assets/img/loginbanner.svg" alt="">
        </div>
        <div class="login-container">
            <form action="" method="post">
                <img class="avatar" src="data:image/svg+xml;base64,PHN2ZyBpZD0iNDU3YmYyNzMtMjRhMy00ZmQ4LWE4NTctZTliOTE4MjY3ZDZhIiBkYXRhLW5hbWU9IkxheWVyIDEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHdpZHRoPSI2OTgiIGhlaWdodD0iNjk4IiB2aWV3Qm94PSIwIDAgNjk4IDY5OCI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJiMjQ3OTQ2Yy1jNjJmLTRkMDgtOTk0YS00YzNkNjRlMWU5OGYiIHgxPSIzNDkiIHkxPSI2OTgiIHgyPSIzNDkiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBvZmZzZXQ9IjAiIHN0b3AtY29sb3I9ImdyYXkiIHN0b3Atb3BhY2l0eT0iMC4yNSIvPjxzdG9wIG9mZnNldD0iMC41NCIgc3RvcC1jb2xvcj0iZ3JheSIgc3RvcC1vcGFjaXR5PSIwLjEyIi8+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSJncmF5IiBzdG9wLW9wYWNpdHk9IjAuMSIvPjwvbGluZWFyR3JhZGllbnQ+PC9kZWZzPjx0aXRsZT5wcm9maWxlIHBpYzwvdGl0bGU+PGcgb3BhY2l0eT0iMC41Ij48Y2lyY2xlIGN4PSIzNDkiIGN5PSIzNDkiIHI9IjM0OSIgZmlsbD0idXJsKCNiMjQ3OTQ2Yy1jNjJmLTRkMDgtOTk0YS00YzNkNjRlMWU5OGYpIi8+PC9nPjxjaXJjbGUgY3g9IjM0OS42OCIgY3k9IjM0Ni43NyIgcj0iMzQxLjY0IiBmaWxsPSIjZjVmNWY1Ii8+PHBhdGggZD0iTTYwMSw3OTAuNzZhMzQwLDM0MCwwLDAsMCwxODcuNzktNTYuMmMtMTIuNTktNjguOC02MC41LTcyLjcyLTYwLjUtNzIuNzJINDY0LjA5cy00NS4yMSwzLjcxLTU5LjMzLDY3QTM0MC4wNywzNDAuMDcsMCwwLDAsNjAxLDc5MC43NloiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0yNTEgLTEwMSkiIGZpbGw9IiMwMzc5NzEiLz48Y2lyY2xlIGN4PSIzNDYuMzciIGN5PSIzMzkuNTciIHI9IjE2NC45IiBmaWxsPSIjMzMzIi8+PHBhdGggZD0iTTI5My4xNSw0NzYuOTJIMzk4LjgxYTAsMCwwLDAsMSwwLDB2ODQuNTNBNTIuODMsNTIuODMsMCwwLDEsMzQ2LDYxNC4yOGgwYTUyLjgzLDUyLjgzLDAsMCwxLTUyLjgzLTUyLjgzVjQ3Ni45MmEwLDAsMCwwLDEsMCwwWiIgb3BhY2l0eT0iMC4xIi8+PHBhdGggZD0iTTI5Ni41LDQ3M2g5OWEzLjM1LDMuMzUsMCwwLDEsMy4zNSwzLjM1djgxLjE4QTUyLjgzLDUyLjgzLDAsMCwxLDM0Niw2MTAuMzdoMGE1Mi44Myw1Mi44MywwLDAsMS01Mi44My01Mi44M1Y0NzYuMzVBMy4zNSwzLjM1LDAsMCwxLDI5Ni41LDQ3M1oiIGZpbGw9IiNmZGI3OTciLz48cGF0aCBkPSJNNTQ0LjM0LDYxNy44MmExNTIuMDcsMTUyLjA3LDAsMCwwLDEwNS42Ni4yOXYtMTNINTQ0LjM0WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTI1MSAtMTAxKSIgb3BhY2l0eT0iMC4xIi8+PGNpcmNsZSBjeD0iMzQ2LjM3IiBjeT0iMzcyLjQ0IiByPSIxNTEuNDUiIGZpbGw9IiNmZGI3OTciLz48cGF0aCBkPSJNNDg5LjQ5LDMzNS42OFM1NTMuMzIsNDY1LjI0LDczMy4zNywzOTBsLTQxLjkyLTY1LjczLTc0LjMxLTI2LjY3WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTI1MSAtMTAxKSIgb3BhY2l0eT0iMC4xIi8+PHBhdGggZD0iTTQ4OS40OSwzMzMuNzhzNjMuODMsMTI5LjU2LDI0My44OCw1NC4zbC00MS45Mi02NS43My03NC4zMS0yNi42N1oiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0yNTEgLTEwMSkiIGZpbGw9IiMzMzMiLz48cGF0aCBkPSJNNDg4LjkzLDMyNWE4Ny40OSw4Ny40OSwwLDAsMSwyMS42OS0zNS4yN2MyOS43OS0yOS40NSw3OC42My0zNS42NiwxMDMuNjgtNjkuMjQsNiw5LjMyLDEuMzYsMjMuNjUtOSwyNy42NSwyNC0uMTYsNTEuODEtMi4yNiw2NS4zOC0yMmE0NC44OSw0NC44OSwwLDAsMS03LjU3LDQ3LjRjMjEuMjcsMSw0NCwxNS40LDQ1LjM0LDM2LjY1LjkyLDE0LjE2LTgsMjcuNTYtMTkuNTksMzUuNjhzLTI1LjcxLDExLjg1LTM5LjU2LDE0LjlDNjA4Ljg2LDM2OS43LDQ2Mi41NCw0MDcuMDcsNDg4LjkzLDMyNVoiIHRyYW5zZm9ybT0idHJhbnNsYXRlKC0yNTEgLTEwMSkiIGZpbGw9IiMzMzMiLz48ZWxsaXBzZSBjeD0iMTk0Ljg2IiBjeT0iMzcyLjMiIHJ4PSIxNC4wOSIgcnk9IjI2LjQyIiBmaWxsPSIjZmRiNzk3Ii8+PGVsbGlwc2UgY3g9IjQ5Ny44IiBjeT0iMzcyLjMiIHJ4PSIxNC4wOSIgcnk9IjI2LjQyIiBmaWxsPSIjZmRiNzk3Ii8+PC9zdmc+" alt="">
                <h2>E-ABSEN</h2>
                <?php
                if (isset($error)) {
                    echo "<script>
                        alert('Password salah!'');
                        </script>";
                }
                ?>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input class="input" type="text" name="username">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" type="password" name="password">
                    </div>
                </div>
                <button type="submit" class="btn" name="login">LOGIN</button>
                <div class="links">
                    <a href="adminlogin.php">Login Admin</a>
                    <a href="index.php">Login Guru</a>
                </div>
            </form>
        </div>
    </div>
    <script type="text/javascript" src="js/main.js"></script>
    <script>
        const inputs = document.querySelectorAll('.input');

        function focusFunc() {
            let parent = this.parentNode.parentNode;
            parent.classList.add('focus');
        }

        function blurFunc() {
            let parent = this.parentNode.parentNode;
            if (this.value == "") {
                parent.classList.remove('focus');
            }
        }

        inputs.forEach(input => {
            input.addEventListener('focus', focusFunc);
            input.addEventListener('blur', blurFunc);
        });
    </script>
</body>

</html>