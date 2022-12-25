<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gallery</title>
<link rel="icon" href="icon.jpg">
<link rel="stylesheet" href="uts.css">
<style>
 * {box-sizing: border-box;}
.mySlides {display: none;}
img {vertical-align: middle;}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 20%;
}

/* The dots/bullets/indicators */
.dot {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}

@keyframes fade {
  from {opacity: 4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .text {font-size: 11px}
}
.glr{
    color: red;
    text-align: center;
    font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;
    letter-spacing: 1px;
}
.column{
    display: flex;
    max-width: 100%;
    position: relative;
    margin: auto;
    flex-wrap: wrap;
    justify-content: space-around;
}
 </style>
</head>
<body id="top">
    <header class="header">
        <div class="container container-nav">
            <div class="site-title">
                <a href="https://www.instagram.com/luckyhaircut_" target="_blank" style="text-decoration:none;"> 
                <img src="bahan1.jpeg" alt="bahan1" class="img-bahan1">
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
<h2 class="glr">Gallery Pengunjung</h2>

<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 4</div>
  <a href="https://www.instagram.com/p/CKgOC-dgzZ-/?utm_source=ig_web_copy_link">
    <img src="ss6.jpg" style="width:200px;display: block;
    margin-left: auto;
    margin-right: auto;
    width: 20%;">
</a>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 4</div>
  <a href="https://www.instagram.com/p/CRKtbIDFgP3/?utm_source=ig_web_copy_link">
    <img src="ss4.jpg" style="width:200px;display: block;
    margin-left: auto;
    margin-right: auto;
    width: 20%;">
</a>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 4</div>
  <a href="https://www.instagram.com/p/COnBxfQAJSE/?utm_source=ig_web_copy_link"> 
    <img src="ss3.jpg" style="width:200px;display: block;
    margin-left: auto;
    margin-right: auto;
    width: 20%;">
</a>
</div>

<div class="mySlides fade">
    <div class="numbertext">4 / 4</div>
    <a href="https://www.instagram.com/p/CQYQgZjAapg/?utm_source=ig_web_copy_link">
        <img src="ss4.jpg" style="width:200px;display: block;
        margin-left: auto;
        margin-right: auto;
        width: 20%;">
</a>
  </div>
</div>
<br>
<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<br>
<br>
<div class="row gallery-row">
    <div class="column">
        <img src="ss5.jpg" alt="" style="width: 24%">
        <img src="ss2.jpg" alt="" style="width: 24%">
        <img src="ss3.jpg" alt="" style="width: 24%">
        <img src="ss4.jpg" alt="" style="width: 24%">
        <img src="ss7.jpg" alt="" style="width: 24%">
        <img src="ss8.jpg" alt="" style="width: 24%">
        <img src="ss9.jpg" alt="" style="width: 24%">
        <img src="ss10.jpg" alt="" style="width: 24%">
    </div>
</main>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 3000); // Change image every 3 seconds
}
</script>

<footer class="footer">
    <br><br><br>
    <p class="cr">&copy; Copyright : Luckside Barbershop</p>
    <br><br><br>
</footer>
</body>
</html> 