<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    <link rel="icon" href="icon.jpg">
    <link rel="stylesheet" href="uts.css">
    <style>
        .header{
            margin-right: 17px;
        }
    </style>
</head>
<body id="top">
    <header class="header">
        <h1 style="text-align: center; color:#d50707;">Booking Disini Cuy</h1>
    </header> 
    
    <main>
        <div class="flex-container">
            <div class="flex-item-left">
                <img src="bahan1.jpeg" style="width: 30vh">
                <br>
                <h3 style="color:#d50707; font-family:'Times New Roman', Times, serif;"> <b>Note:</b>Isi data Booking dengan JUJUR!!! </h3>
                <a href="uasFebryan.php" class="alamat" style="font-size: 20px;"><< Kembali</a>
            </div>
        <div class="flex-item-right">
            <form action="isibook.php" method="POST">
                <input type="text" id="name" name="name" placeholder="Your Name">
                <!-- <input type="text" name="date" id="date" style="width: 48%;" placeholder="date:(yyyy-mm-dd)"> -->
                <input type="date" name="date" id="date" style="width: 48%;" placeholder="date:(yyyy-mm-dd)">
                <!-- <input type="text" name="time" id="time" style="width: 48%;" placeholder="time:(hh)"> -->
                <input type="time" name="time" id="time" style="width: 48%;" placeholder="time:(hh)">
                <input type="text" name="model" id="model" placeholder="Your hair model">
                <textarea name="deskripsi" id="textarea" cols="30" rows="10" placeholder="njalokmu piye?"></textarea>
                <button type="submit" name="submit" value=<?php echo date("h:i:sa"); ?>>Send Message</button>
            </form>
        </div>
    </main>

    <footer class="footer">
        <br><br><br>
        <p class="cr">&copy; Copyright : Luckside Barbershop</p>
        <br><br><br>
    </footer>
</body>
</html>

