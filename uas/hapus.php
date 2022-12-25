<?php
$conn=mysqli_connect("localhost","root","","dbcontact");
// cek koneksi jika error
if (!$conn) {
    die('Koneksi Error : '.mysqli_connect_errno() 
    .' - '.mysqli_connect_error());
 }
//ambil data dari tabel mahasiswa/query data keluhan
$result=mysqli_query($conn,"SELECT * FROM booking");  

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

function hapus ($id){
    global $conn;
    mysqli_query($conn,"DELETE FROM booking WHERE id =$id ");
    return mysqli_affected_rows($conn);
}

// menggunakan method get untuk mengambil id yg telah terseleksi oleh user dan dimasukkan 
// ke dalam variabel baru yaitu $id
$id=$_GET["id"];

if( hapus ($id)>0){
    echo "
    <script>
        alert('data berhasil dihapus');
        document.location.href='daftarBook.php';
    </script>
    ";
}else{
    echo "
    <script>
         alert('data gagal dihapus');
        document.location.href='daftarBook.php';
     </script>";
    echo "<br>";
    echo mysqli_error($conn);
}
?>

