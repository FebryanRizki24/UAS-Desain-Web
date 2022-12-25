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

function tambah ($data)
{
    global $conn;

    // $nama   =htmlspecialchars($data["Nama"]) ;
    $nama   =htmlspecialchars($data["nama"]) ;
    $stok    =htmlspecialchars($data["stok"]);
    // $email  =htmlspecialchars($data["Email"]);
    // $jurusan=htmlspecialchars($data["Jurusan"]);
    // $gambar=htmlspecialchars($data["Gambar"]);

    $gambar=upload();
    // var_dump($gambar);die();
    if(!$gambar)
    {
        return false;
    }

    $query= " INSERT INTO barang
                VALUES
                ('','$nama','$stok','$gambar')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

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

    $jenis_gambar=['jpg','jpeg','gif','png'];
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

if(isset($_POST['submit']))
{
    
    // cek isi dari post menggunakan vardump
    // var_dump($_POST);
    // var_dump($_FILES);
    // die();

    //cek sukses data ditambah menggunakan function tambah pada functions.php
    if(tambah($_POST)>0)
    {
           echo "
            <script>
                alert('data berhasil disimpan');
                document.location.href='barang.php';
            </script>

           ";
    }else{
        echo "
        <script>
             alert('data gagal disimpan');
            document.location.href='tambah_data.php';
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
    <title>Tambah Barang</title>
    <link rel="stylesheet" href="uts.css">
</head>
<body>
    <header class="header">
        <h1 style="text-align: center; color:#d50707;">Tambah Data Barang</h1>
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
                <input type="text" id="nama" name="nama">
                <!-- <input type="text" name="date" id="date" style="width: 48%;" placeholder="date:(yyyy-mm-dd)"> -->
                <label for="Nim">Stok</label>
                <input type="text" name="stok" id="stok" required >
                <!-- <input type="text" name="time" id="time" style="width: 48%;" placeholder="time:(hh)"> -->
                <label for="Gambar">Gambar :</label>
                <input type="file" name="gambar" id="gambar">
                <button type="submit" name="submit">Tambah</button>
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