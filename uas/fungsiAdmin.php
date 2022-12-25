<?php 
// membuat koneksi
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
    if($ukuran_file > 10000000)
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

    move_uploaded_file($tmpfile,'image/'.$namafilebaru);
    
    // kita return nama file nya agar dapat masuk ke $gambar=$upload() pada function tambah
    return $namafilebaru;
}

function hapus ($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM barang WHERE id =$id ");
    return mysqli_affected_rows($conn);
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

function cari($keyword)
{
    $sql="SELECT * FROM barang
          WHERE
          nama LIKE '%$keyword%' OR 
          ";

        // kembalikan ke function query dengan parameter $sql
      return query($sql);

     // cat: pastikan $keyword pada line 77 terdapat petik satu karena nilainya berupa string
}
?>