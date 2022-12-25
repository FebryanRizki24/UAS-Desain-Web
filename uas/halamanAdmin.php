<?php
session_start();
$username=$_SESSION['username'];
$level=$_SESSION['level'];
if(!empty($username)&&($level=='admin')){
    // echo'
    // <script>
    // alert("Welcome sekarang anda login sebagai user");
    // </script>
    // ';
}else{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UAS-Lucky Haircut</title>
    <link rel="icon" href="icon.jpg">
    <link rel="stylesheet" href="uts.css">

</head>
<body id="top">
    <header class="header">
        <div class="container container-nav">
            <div class="site-title">
                <a href="https://www.instagram.com/luckyhaircut_" target="_blank" style="text-decoration:none;"> 
                    <img src="bahan1.jpeg" alt="bahan1" class="img-bahan1"></a>
                <h1>Lucky Haircut</h1>
                <p class="subtitle">Est 2017</p>
                <p class="subtitle">Luckside Barbershop</p>
            </div>
            <nav>
                <ul>
                    <li><a href="halamanAdmin.php" class="current-page">Home</a></li>
                    <li><a href="keluhan.php">Keluhan</a></li>
                    <li><a href="daftarBook.php">Booking</a></li>
                    <li><a href="barang.php">Barang</a></li>
                    <li><a href=""><img src="user.png" alt="" class="user"></a>
                        <ul class="drop">
                            <li style="margin-bottom: 10px;"><a href="login.php">Login</a></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <main>
        <div id="home">
            <div class="overlay">
                <div class="landing-text">
                    <h3>HALAMAN ADMIN NIH YEE!!</h3>
                    <h1>Lucky Haircut</h1>
                    <p style="font-family:cursive;">EST 2017</p>
                    <hr id="hr-main">
                </div>
            </div>
        </div>
    </main>
    <footer class="footer">
        <br><br><br>
        <p class="cr">&copy; Copyright : Luckside Barbershop</p>
        <br><br><br>
    </footer>
</body>
</html>