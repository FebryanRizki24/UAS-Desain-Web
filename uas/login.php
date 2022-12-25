<?php
session_start();
require 'functions.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['username'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM users WHERE id=$id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ($key == hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION['login'])) {
    header("location:uasFebryan.php");
    exit;
}


if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];


    $result = mysqli_query($conn, "SELECT * FROM users WHERE username='$username'");

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row["password"])) {
            //set session
            $_SESSION["login"] = true;

            //cek remember me
            if (isset($_POST['remember'])) {
                //enkripsi cookie menggunakan hash tipe sha256
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);
            }

            //redirect ke halaman index.php 
            header("Location:uasFebryan.php");
            exit;
        }
    }
    $error = true;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Cuy</title>
    <link rel="icon" href="icon.jpg">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            height: 100vh;
            background: url('bg.jpg');
            display: flex;
            align-items: center;
            justify-content: center;
            background-repeat: no-repeat;
            background-size: 100%;
            background-position-y: -100px;
        }
        .container{
            height: 100%;
            display: flex;
            justify-content:center;
            align-items:center;
            height: 100%;
            color: black;

        } 
        .login-form{
            width: 480px;
            height: min-content;
            padding: 20px;
            /* background-color: aliceblue !important; */
            border-radius: 10px;
            /* justify-content: center; */
            /* float: right;
            margin-top: 200px; */
        }
        p {
            text-align: center;
        }
        .judul{
            font-family: monospace;
            background: black;
            padding-top:25px ;
            padding-bottom: 25px;
            color: white;
        }

    </style>
</head>

<body>
    <div class="container mb-3">
        <div class="card login-form"> 
        <h1 class="card-title text-center judul">Login Cuy <br> <p style="font-size:10px;line-height:30px">Luckside Barbershop</p> </h1>

        <?php if (isset($error)) : ?>
            <p style="color:red;font-style=bold">
                Username dan password salah</p>

        <?php endif ?>

        <form action="cek_login.php" method="POST">
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn btn-primary" name="login">Submit</button>

            <br><br><br><br>
            <p>belum punya akun?
                <a href="registrasi.php">register now!</a>
            </p>
        </form>
        </div>
    </div>
</body>

</html>