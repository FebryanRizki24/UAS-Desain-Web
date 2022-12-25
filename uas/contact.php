<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Me</title>
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
                    <li><a href="uasFebryan.php" class="current-page">Home</a></li>
                    <li><a href="gallery.php">Gallery</a></li>
                    <li><a href="barber.php">BarberMan</a></li>
                    <li><a href="shop.php">LuckShop</a></li>
                    <li><a href="about.php">About</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <main>
        <div class="flex-container">
            <div class="flex-item-left">
                <h4>We are located at</h4>
                <a href="https://goo.gl/maps/qrwkVfPqL6qWiFWT8" target="_blank" class="alamat">JL Melati
                Sedayulawas, Brondong, Lamongan</a>
                <h4>Instagram</h4>
                <a href="https://www.instagram.com/luckyhaircut_" target="_blank" class="alamat">
                    luckyhaircut_
                </a>
                <h4>WhatsApp</h4>
                <a href="https://wa.me/6281359441044" target="_blank" class="alamat">081359441044</a>
                <!-- <h2 style="color:#d50707;">Reservation?</h2>
                <a href="booking.php" class="alamat">Book now!</a> -->
            </div>
        <div class="flex-item-right">
            <form action="action.php" method="POST">
                <input type="text" id="fname" name="email" placeholder="Your Email">
                <input type="text" name="subject" id="subject" placeholder="Subject">
                <textarea name="deskripsi" id="textarea" cols="30" rows="10"></textarea>
                <button type="submit" name="submit" value=<?php echo date("d-m-Y"); ?>>Send Message</button>
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

