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
    $conn=mysqli_connect("localhost","root","","dbcontact");
    // cek koneksi jika error
    if (!$conn) {
        die('Koneksi Error : '.mysqli_connect_errno() 
        .' - '.mysqli_connect_error());
     }
    //ambil data dari tabel mahasiswa/query data keluhan
    $result=mysqli_query($conn,"SELECT * FROM keluhan");  
    
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

    $mahasiswa=query(" SELECT * FROM keluhan");

    //tombol cari ditekan
    //cari pada line 7 adalah name dari button
    if(isset($_POST["cari"]))
    {
        // cari line 10 adalah function cari dan keyword adalah name dari inputan text 
        $mahasiswa=cari($_POST["keyword"]);
    }

    function cari($keyword)
{
    $sql="SELECT * FROM keluhan
          WHERE
          email LIKE '%$keyword%' OR
          subject LIKE '%$keyword%' OR
          deskripsi LIKE '%$keyword%' OR
          submit LIKE '%$keyword%'  
          ";

        // kembalikan ke function query dengan parameter $sql
      return query($sql);
}
?>
 
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Keluhan Pelanggan</title>
    <link rel="icon" href="icon.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="uts.css">
</head>
<body>
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
                </ul>
            </nav>
        </div>
    </header>
<h1 style="font-family:monospace; text-align:center;"> Daftar Keluhan Pelanggan </h1>

<form action="" method="post">
    <!-- autofocus atribut pada html 5 yang digunakan untuk memberikan tanda pertama kali ke inputan pada saat page di reload-->
    <!-- placeholder atribut yang digunakan untuk menampilkan tulisan pada textbox -->
    <!-- autocomplete digunakan agar history pencarian dari user lain tidak ada -->
    <input type="text" name="keyword" size="40" autofocus placeholder="masukkan keyword pencarian" autocomplete="off">
    <button type="submit" name="cari" class="btn btn-dark" style="font-family: monospace;"> Cari </button>
</form>
<br>

<table border="1" cellpadding="10" cellspacing="0" class="table table-dark table-striped table-hover table-bordered table-responsive">
<tr>
    <th>No</th>
    <th>Email</th>
    <th>Subject</th>
    <th>Deskripsi</th>
    <th>Submit</th>
    <th></th>
</tr>
<?php $i=1 ?>

<?php foreach ($mahasiswa as $row):?>
<tr>
    <td><?=  $i; ?></td>
    <td><?=  $row["email"]; ?></td>
    <td><?=  $row["subject"]; ?></td>
    <td><?=  $row["deskripsi"]; ?></td>
    <td><?=  $row["submit"]; ?></td>
    <td>
        <a href="mailto:<?= $row['email']; ?>" class="btn btn-light" style="width: 49%;">Balas</a>
        <a href="hapusKeluhan.php?id=<?php echo $row["id"];?>"onclick="return confirm('Apakah data ini akan dihapus')" class="btn btn-light" style="width:49%">Hapus</a>
    </td>
</tr>
<?php $i++ ?>
<?php endforeach;?>

</table>
</body>
</html>