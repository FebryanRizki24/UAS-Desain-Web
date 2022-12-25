<?php
    require 'functions.php';

    if(isset($_POST['register']))
    {
        if(registrasi($_POST)>0)
        {
            echo "
                <script>
                    alert('user berhasil ditambahkan');
                </script>
            ";
            header('location:login.php');
        }else
        {
            echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrasi Cuy</title>
    <link rel="icon" href="icon.jpg">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
       label  {
            display:block;
        }
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
        <h1 class="card-title text-center judul">Registrasi Cuy <br> <p style="font-size:10px;line-height:30px">Luckside Barbershop</p> </h1>

        <form action="" method="POST">
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3 mt-3">
                <label for="username" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Konfirmasi Password</label>
                <input type="password" class="form-control" id="password2" name="password2">
            </div>
            <button type="submit" class="btn btn-primary" name="register">Submit</button>

            <br><br><br><br>
            <p>sudah punya akun?
                <a href="login.php">login aja!</a>
            </p>
        </form>
        </div>
    </div>
    <!-- <h1> Halaman Registrasi</h1>
    <form action="" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <label for="password2">Konfirmasi Password :</label>
                <input type="password" name="password2" id="password2 ">
            </li>
            <li>
                <button type="submit" name="register">Registrasi</button>
            </li>
        </ul>
        <p>sudah punya akun? <a href="login.php">login</a></p>
    </form> -->
    
</body> 
</html>