<?php
$conn=mysqli_connect("localhost","root","","dbcontact");
// cek koneksi jika error
if (!$conn) {
    die('Koneksi Error : '.mysqli_connect_errno() 
    .' - '.mysqli_connect_error());
 }
//ambil data dari tabel mahasiswa/query data booking
$result=mysqli_query($conn,"SELECT * FROM barang");  

// function query akan menerima isi paramater dari string query yg ada pada index2.php (line 3)
function query($query_kedua)
{
    // dikarenakan $conn diluar function query maka dibutuhkan scope global $conn
    global $conn; 
    $result = mysqli_query($conn,$query_kedua);
    // wadah kosong untuk menampung isi array pada saat looping line 16
    $rows = [];
    while ( $row = mysqli_fetch_assoc($result)){
        $rows[]=$row;    
    }
    return $rows;
}

$mahasiswa=query(" SELECT * FROM barang");

//tombol cari ditekan
//cari pada line 7 adalah name dari button
if(isset($_POST["cari"]))
{
    // cari line 10 adalah function cari dan keyword adalah name dari inputan text 
    $mahasiswa=cari($_POST["keyword"]);
}


function cari($keyword)
{
$sql="SELECT * FROM barang
      WHERE
      nama LIKE '%$keyword%'
      ";

    // kembalikan ke function query dengan parameter $sql
  return query($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LuckShop</title>
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

    <h2 class="svs-tema">Shop</h2>

    <form action="" method="POST">
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari" class="btn btn-dark" style="font-family:monospace"> Cari </button>
    </form>
    <br><br>

    <!-- <main> -->
        <div class="columnShop" style="display:flex;flex-wrap:wrap;max-width:100%;position:relative;margin:auto;justify-content:space-around;">
            <?php $i = 1; ?>
            <?php foreach($mahasiswa as $row): ?>
            <?php $i; ?>
            
            <div class="kontener">
            <img src="<?php echo $row["gambar"]; ?>" alt="" height="400" width="400" srcset="">
            <div class="konten" style="font-size:50px;font-family:monospace;color:#d50707">
            <?= $row["nama"]; ?>
            </div>
            </div>
            <?php $i++ ?>
            <?php endforeach;?>
            <!-- <a href="https://wa.me/6281359441044" target="_blank"><img src="shop1.png" alt="" style="width: 24%" class="s1"></a>
            <a href="https://wa.me/6281359441044" target="_blank"><img src="shop2.png" alt="" style="width: 24%" class="s2"></a> -->
        </div>
        <br><br>
    <!-- </main> -->

    <footer class="footer">
        <br><br><br>
        <p class="cr">&copy; Copyright : Luckside Barbershop</p>
        <br><br><br>
    </footer>
</body>
</html>