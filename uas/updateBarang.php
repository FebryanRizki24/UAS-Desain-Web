<?php
$conn=mysqli_connect("localhost","root","","dbcontact");
// cek koneksi jika error
if (!$conn) {
    die('Koneksi Error : '.mysqli_connect_errno() 
    .' - '.mysqli_connect_error());
 }
//ambil data dari tabel mahasiswa/query data keluhan
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

function upload()
{   
    $nama_file  =$_FILES['gambar']['name'];
    $ukuran_file=$_FILES['gambar']['size']; 
    $error      =$_FILES['gambar']['error'];
    $tmpfile    =$_FILES['gambar']['tmp_name'];
    
    if($error===4)
    {
        //pastikan pada inputan gambar tidak terdapat atribut required
        echo "
            <script>
                alert('Tidak ada gambar yang diupload');
            </script>
        ";
        return false;
    }

    $jenis_gambar=['jpg','jpeg','gif','png','jfif'];
    $pecah_gambar=explode('.',$nama_file); 
    $pecah_gambar=strtolower(end($pecah_gambar));
    if(!in_array($pecah_gambar,$jenis_gambar))
    {
        echo "
            <script> 
                alert('yang anda upload bukan file gambar');
            </script>
            ";
            return false;
    }

   
    // cek kapasitas gambar dalam byte kalau 1000000 byte = 1 Megabyte
    if($ukuran_file > 30000000)
    {
        echo "
            <script> 
                alert('ukuran gambar terlalu besar');
            </script>    
        ";
        return false;
    }

    //generate id untuk penamaan gambar dengan function uniqid()
    $namafilebaru=uniqid(); 
    $namafilebaru .= '.';
    $namafilebaru .= $pecah_gambar;
    // var_dump ($namafilebaru);die();

    move_uploaded_file($tmpfile,$namafilebaru);
    
    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $namafilebaru;
}

function edit ($data){
    global $conn;

    $id         =$data["id"];
    $nama       =htmlspecialchars($data["nama"]) ;
    $stok        =htmlspecialchars($data["stok"]);
    // $email      =htmlspecialchars($data["Email"]);
    // $jurusan    =htmlspecialchars($data["Jurusan"]);
    $GambarLama=htmlspecialchars($data["GambarLama"]);

    // cek apakah user menekan button browse
    if($_FILES['gambar']['error']===4)
    {
        $gambar=$GambarLama;
    }else
    {
        $gambar=upload();
    }
      
    $query= " UPDATE barang SET 
               nama = '$nama',
               stok = '$stok',
               gambar = '$gambar' 
               WHERE id= $id ";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}

$id=$_GET["id"];

$mhs=query("SELECT * FROM barang WHERE id=$id")[0];

if(isset($_POST["submit"]))
{
    
    //cek sukses data dirubah menggunakan function edit pada functions.php
    if(edit($_POST)>0)
    {
        // die();
           echo "
            <script>
                alert('data berhasil diperbaharui');
                document.location.href='barang.php';
            </script>
           "
           ;
    }else{
        echo "
        <script>
             alert('data gagal diperbaharui');
            document.location.href='updateBarang.php';
         </script>";
        echo "<br>";
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
    <title>Update data barang</title>
    <link rel="stylesheet" href="uts.css">
</head>
<body>
    <header class="header">
        <h1 style="text-align: center; color:#d50707;">Update Data Barang</h1>
    </header>

    <main>
        <div class="flex-container">
            <div class="flex-item-left">
                <img src="bahan1.jpeg" style="width: 30vh">
                <br>
                <a href="barang.php" class="alamat" style="font-size: 20px;"><< Kembali</a>
            </div>
        <div class="flex-item-right">
            <form action="" method="post" enctype="multipart/form-data">
                <label for="Nama">Nama Barang</label>
                <input type="hidden" name="id" value="<?= $mhs["id"] ?>">
                <input type="hidden" name="GambarLama" value="<?= $mhs["Gambar"]; ?>"> 

                <!-- <input type="text" name="date" id="date" style="width: 48%;" placeholder="date:(yyyy-mm-dd)"> -->
                <label for="Nama"></label>
                <input type="text" name="nama" id="nama" value="<?= $mhs["nama"]; ?>" >
                <!-- <input type="text" name="time" id="time" style="width: 48%;" placeholder="time:(hh)"> -->
                <label for="Nim">Stok</label>
                <input type="text" name="stok" id="stok" required value="<?= $mhs["stok"]; ?>">
                <label for="Gambar">Gambar</label><br>
                <img src="<?= $mhs["gambar"];?>" alt="" height="100" width="100">
                <input type="file" name="gambar" id="gambar" >
                <button type="submit" name="submit">Update</button>
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